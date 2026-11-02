<?php

namespace Modules\EMS\Imports;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Modules\EMS\Models\ExportProduct;
use Modules\EMS\Models\ProductCategory;
use PhpOffice\PhpSpreadsheet\Exception as SpreadsheetException;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception as ReaderException;

class ExportProductImporter
{
    private const HEADERS = [
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
    ];

    public function import(UploadedFile $file): int
    {
        try {
            $reader = IOFactory::createReader('Xlsx');
            $reader->setReadDataOnly(true);
            $spreadsheet = $reader->load($file->getRealPath());
        } catch (ReaderException|SpreadsheetException) {
            throw ValidationException::withMessages([
                'file' => ['The uploaded file is not a valid Excel workbook.'],
            ]);
        }

        $rows = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        $headerRow = $rows[1] ?? [];
        $columns = [];

        foreach ($headerRow as $column => $header) {
            $columns[Str::lower(trim((string) $header))] = $column;
        }

        $missingHeaders = array_values(array_diff(self::HEADERS, array_keys($columns)));
        if ($missingHeaders !== []) {
            throw ValidationException::withMessages([
                'file' => ['Missing required Excel headers: '.implode(', ', $missingHeaders).'.'],
            ]);
        }

        $categoryIds = ProductCategory::query()->pluck('id')->all();
        $availableSlugs = array_fill_keys(ExportProduct::query()->pluck('slug')->all(), true);
        $products = [];
        $errors = [];

        foreach (array_slice($rows, 1, null, true) as $rowNumber => $cells) {
            $product = [];
            foreach (self::HEADERS as $header) {
                $value = $cells[$columns[$header]] ?? null;
                $product[$header] = is_string($value) ? trim($value) : $value;
            }

            if (count(array_filter($product, static fn ($value) => $value !== null && $value !== '')) === 0) {
                continue;
            }

            $product['botanical_name'] = $product['botanical_name'] ?: null;
            $product['hs_code_buyer_country'] = $product['hs_code_buyer_country'] ?: null;
            $product['unit_price'] = $product['unit_price'] === '' ? null : $product['unit_price'];

            $validator = Validator::make($product, [
                'category_id' => ['required', 'integer', Rule::in($categoryIds)],
                'name_bangla' => ['required', 'string', 'max:255'],
                'name_bangla_display' => ['required', 'string', 'max:255'],
                'name_banglish' => ['required', 'string', 'max:255'],
                'name_english_with_bangla' => ['required', 'string', 'max:255'],
                'name_english' => ['required', 'string', 'max:255'],
                'name_english_display' => ['required', 'string', 'max:255'],
                'botanical_name' => ['nullable', 'string', 'max:255'],
                'hs_code' => ['required', 'string', 'max:20'],
                'hs_code_buyer_country' => ['nullable', 'string', 'max:20'],
                'unit_price' => ['nullable', 'numeric', 'decimal:0,2', 'min:0', 'max:99999999.99'],
                'currency' => ['required', 'string', 'size:3', 'alpha'],
            ]);

            if ($validator->fails()) {
                foreach ($validator->errors()->all() as $message) {
                    $errors[] = "Row {$rowNumber}: {$message}";
                }

                if (count($errors) >= 100) {
                    break;
                }

                continue;
            }

            $slug = Str::slug($product['name_english']) ?: 'product';
            $uniqueSlug = $slug;
            $suffix = 2;
            while (isset($availableSlugs[$uniqueSlug])) {
                $uniqueSlug = "{$slug}-{$suffix}";
                $suffix++;
            }
            $availableSlugs[$uniqueSlug] = true;

            $product['slug'] = $uniqueSlug;
            $product['is_active'] = true;
            $product['notes'] = null;
            $products[] = $product;
        }

        $spreadsheet->disconnectWorksheets();
        unset($spreadsheet);

        if ($errors !== []) {
            if (count($errors) >= 100) {
                $errors[] = 'Additional row errors were omitted. Fix these errors and import again.';
            }

            throw ValidationException::withMessages(['file' => $errors]);
        }

        if ($products === []) {
            throw ValidationException::withMessages([
                'file' => ['The workbook contains no product rows to import.'],
            ]);
        }

        DB::transaction(function () use ($products): void {
            foreach ($products as $product) {
                ExportProduct::create($product);
            }
        });

        return count($products);
    }
}
