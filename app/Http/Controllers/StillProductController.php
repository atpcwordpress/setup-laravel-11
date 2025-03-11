<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StillProductController extends Controller
{
    public function getProduct(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::select([
                'id',
                'product_name',
                'title',
                'product_description',
                'product_active',
                'product_stock',
                'product_price',
                'product_sale_price',
                'product_color',
                'product_image'
            ]);

            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    return '
                    <a href="javascript:void(0)" class="btn btn-sm btn-primary edit" data-id="' . $row->id . '">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-danger delete" data-id="' . $row->id . '">
                        <i class="fas fa-trash"></i>
                    </a>
                ';
                })
                ->rawColumns(['action', 'product_image'])
                ->make(true);
        }
        return view('GetProduct');
    }

    public function view($id)
    {
        $product = Product::findOrFail($id);
        return view('ProductView', compact('product'));
    }
}
