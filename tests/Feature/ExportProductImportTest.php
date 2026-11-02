<?php

namespace Tests\Feature;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Schema;
use Modules\EMS\Models\ExportProduct;
use Modules\EMS\Models\ProductCategory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Tests\TestCase;

class ExportProductImportTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutMiddleware();

        Schema::create('product_categories', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('export_products', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('category_id');
            $table->string('name_bangla');
            $table->string('name_bangla_display');
            $table->string('name_banglish');
            $table->string('name_english_with_bangla');
            $table->string('name_english');
            $table->string('name_english_display');
            $table->string('botanical_name')->nullable();
            $table->string('hs_code', 20);
            $table->string('hs_code_buyer_country', 20)->nullable();
            $table->decimal('unit_price', 10, 2)->nullable();
            $table->char('currency', 3);
            $table->string('slug')->unique();
            $table->boolean('is_active')->default(true);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    protected function tearDown(): void
    {
        Schema::dropIfExists('export_products');
        Schema::dropIfExists('product_categories');

        parent::tearDown();
    }

    public function test_it_imports_products_and_keeps_blank_buyer_country_hs_code_nullable(): void
    {
        $category = ProductCategory::create([
            'name' => 'Vegetables',
            'slug' => 'vegetables',
            'is_active' => true,
        ]);

        $response = $this->post(route('ems.products.import'), [
            'file' => $this->workbook([
                [$category->id, 'উসতা', 'উসতা', 'BITTER GOURD BABY', 'USTA', 'BITTER GOURD BABY', 'BITTER GOURD BABY', 'Momordica charantia', '07099390', '', '1.40', 'USD'],
            ]),
        ], [
            'Accept' => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest',
        ]);

        $response->assertCreated()
            ->assertJsonPath('count', 1);

        $this->assertDatabaseHas('export_products', [
            'category_id' => $category->id,
            'hs_code' => '07099390',
            'hs_code_buyer_country' => null,
            'slug' => 'bitter-gourd-baby',
            'is_active' => true,
        ]);
    }

    public function test_it_does_not_import_any_rows_when_a_workbook_row_is_invalid(): void
    {
        $category = ProductCategory::create([
            'name' => 'Vegetables',
            'slug' => 'vegetables',
            'is_active' => true,
        ]);

        $response = $this->post(route('ems.products.import'), [
            'file' => $this->workbook([
                [$category->id, 'উসতা', 'উসতা', 'BITTER GOURD BABY', 'USTA', 'BITTER GOURD BABY', 'BITTER GOURD BABY', 'Momordica charantia', '07099390', '', '1.40', 'USD'],
                [999, 'করলা', 'করলা', 'BITTER GOURD', 'KOROLLA', 'BITTER GOURD', 'BITTER GOURD', '', '07099390', '', '1.40', 'USD'],
            ]),
        ], [
            'Accept' => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest',
        ]);

        $response->assertUnprocessable()
            ->assertJsonValidationErrors('file');
        $this->assertSame(0, ExportProduct::query()->count());
    }

    private function workbook(array $products): UploadedFile
    {
        $spreadsheet = new Spreadsheet;
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->fromArray([
            [
                'category_id',
                'name_bangla',
                'name_bangla_display',
                'name_banglish',
                'name_english_with_bangla',
                'name_english',
                'name_english_display',
                'botanical_name',
                'hs_code',
                'hs_code_buyer_country',
                'unit_price',
                'currency',
            ],
            ...$products,
        ]);

        $path = tempnam(sys_get_temp_dir(), 'export-products-');

        try {
            (new Xlsx($spreadsheet))->save($path);
            $content = file_get_contents($path);
        } finally {
            $spreadsheet->disconnectWorksheets();
            unlink($path);
        }

        return UploadedFile::fake()->createWithContent('products.xlsx', $content);
    }
}
