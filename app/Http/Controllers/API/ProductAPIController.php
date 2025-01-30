<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\str;
use App\Http\Resources\ProductResource;

class ProductAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function product_index()
    {
        try {
            $products = Product::get();
            return response()->json([
                'data' => ProductResource::collection($products),
                'status' => true,
                'status_code' => 200,
                'message' => 'Products retrieved successfully',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'status_code' => 500,
                'message' => 'Error: ' . $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function product_show($product_id)
    {
        try {
            $product = Product::find($product_id);
            if ($product) {
                return response()->json([
                    'data' => new ProductResource($product),
                    'status' => true,
                    'status_code' => 200,
                    'message' => 'Product retrieved successfully',
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'status_code' => 200,
                    'message' => 'Product not found',
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'status_code' => 500,
                'message' => 'Error: ' . $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function product_insert(Request $request)
    {
        try {
            $product = new Product();
            $product->product_name = $request->input('product_name');
            $product->title = $request->input('title');
            $product->product_description = $request->input('product_description');
            $product->product_active = $request->input('product_active');
            $product->product_stock = $request->input('product_stock');
            $product->product_price = $request->input('product_price');
            $product->product_sale_price = $request->input('product_sale_price');
            $product->product_color = $request->input('product_color');

            $product_image = '';
            if ($request->hasFile('product_image')) {
                $file1_o = $request->file('product_image');
                $product_image = Str::random(10) . '.' . $file1_o->getClientOriginalExtension();
                $file1_o->move(public_path('assets/images/product_image'), $product_image);
                $product_image = asset('assets/images/product_image/' . $product_image);
                $product->product_image = $product_image;
            }

            $product->save();

            return response()->json([
                'data' => new ProductResource($product),
                'status' => true,
                'status_code' => 200,
                'message' => 'Product inserted successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'status_code' => 500,
                'message' => 'Error: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function product_update($product_id, Request $request)
    {
        try {
            $product = Product::find($product_id);
            if ($product) {
                $product->product_name = $request->product_name;
                $product->title = $request->title;
                $product->product_description = $request->product_description;
                $product->product_active = $request->product_active;
                $product->product_stock = $request->product_stock;
                $product->product_price = $request->product_price;
                $product->product_sale_price = $request->product_sale_price;
                $product->product_color = $request->product_color;
                $product_image = '';
                if ($request->hasFile('product_image')) {
                    $file1_o = $request->file('product_image');
                    $product_image = Str::random(10) . '.' . $file1_o->getClientOriginalExtension();
                    $file1_o->move(public_path('assets/images/product_image'), $product_image);
                    $product_image = asset('assets/images/product_image/' . $product_image);
                    $product->product_image = $product_image;
                }
                $product->save();

                return response()->json([
                    'data' => new ProductResource($product),
                    'status' => true,
                    'status_code' => 200,
                    'message' => 'Product updated successfully',
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'status_code' => 200,
                    'message' => 'Product not found',
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'status_code' => 500,
                'message' => 'Error: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function product_delete($product_id)
    {
        try {
            $product = Product::find($product_id);
            if ($product) {
                $product->delete();
                return response()->json([
                    'message' => 'Product deleted successfully',
                    'status' => true,
                    'status_code' => 200,
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Product not found',
                    'status' => false,
                    'status_code' => 200,
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage(),
                'status' => false,
                'status_code' => 500,
            ], 500);
        }
    }
}
