<?php

namespace Modules\EMS\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Modules\EMS\Models\ExportProduct;

class ExportProductController extends Controller
{
    public function index(): JsonResponse
    {
        $products = ExportProduct::query()
            ->with('category:id,name')
            ->latest('id')
            ->get();

        return response()->json(['data' => $products]);
    }

    public function store(Request $request): JsonResponse
    {
        $product = ExportProduct::create($request->validate($this->rules()));

        return response()->json([
            'message' => 'Product created successfully.',
            'data' => $product->load('category:id,name'),
        ], 201);
    }

    public function show(ExportProduct $product): JsonResponse
    {
        return response()->json([
            'data' => $product->load('category:id,name'),
        ]);
    }

    public function update(Request $request, ExportProduct $product): JsonResponse
    {
        $product->update($request->validate($this->rules($product)));

        return response()->json([
            'message' => 'Product updated successfully.',
            'data' => $product->load('category:id,name'),
        ]);
    }

    public function destroy(ExportProduct $product): JsonResponse
    {
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully.']);
    }

    private function rules(?ExportProduct $product = null): array
    {
        return [
            'category_id' => ['required', 'integer', Rule::exists('product_categories', 'id')],
            'name_bangla' => ['required', 'string', 'max:255'],
            'name_bangla_display' => ['required', 'string', 'max:255'],
            'name_banglish' => ['required', 'string', 'max:255'],
            'name_english_with_bangla' => ['required', 'string', 'max:255'],
            'name_english' => ['required', 'string', 'max:255'],
            'name_english_display' => ['required', 'string', 'max:255'],
            'botanical_name' => ['nullable', 'string', 'max:255'],
            'hs_code' => ['required', 'string', 'max:20'],
            'unit_price' => ['nullable', 'numeric', 'decimal:0,2', 'min:0', 'max:99999999.99'],
            'currency' => ['required', 'string', 'size:3', 'alpha'],
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('export_products', 'slug')->ignore($product?->id),
            ],
            'is_active' => ['required', 'boolean'],
            'notes' => ['nullable', 'string'],
        ];
    }
}
