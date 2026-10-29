<?php

namespace Modules\EMS\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Modules\EMS\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    public function index(): JsonResponse
    {
        $categories = ProductCategory::query()
            ->withCount('products')
            ->latest('id')
            ->get();

        return response()->json(['data' => $categories]);
    }

    public function store(Request $request): JsonResponse
    {
        $category = ProductCategory::create($request->validate($this->rules()));

        return response()->json([
            'message' => 'Category created successfully.',
            'data' => $category->loadCount('products'),
        ], 201);
    }

    public function show(ProductCategory $category): JsonResponse
    {
        return response()->json([
            'data' => $category->loadCount('products'),
        ]);
    }

    public function update(Request $request, ProductCategory $category): JsonResponse
    {
        $category->update($request->validate($this->rules($category)));

        return response()->json([
            'message' => 'Category updated successfully.',
            'data' => $category->loadCount('products'),
        ]);
    }

    public function destroy(ProductCategory $category): JsonResponse
    {
        if ($category->products()->exists()) {
            return response()->json([
                'message' => 'This category cannot be deleted while products are assigned to it.',
            ], 409);
        }

        $category->delete();

        return response()->json(['message' => 'Category deleted successfully.']);
    }

    private function rules(?ProductCategory $category = null): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'slug' => [
                'required',
                'string',
                'max:100',
                Rule::unique('product_categories', 'slug')->ignore($category?->id),
            ],
            'description' => ['nullable', 'string'],
            'is_active' => ['required', 'boolean'],
        ];
    }
}
