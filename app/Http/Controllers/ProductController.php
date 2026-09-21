<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function index()
    {
        $product = DB::table('products')->get();
        return view('product', compact('product'));
    }

    function createProduct()
    {
        return view('formProduct');
    }

    function changeStatus($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        if ($product) {
            DB::table('products')->where('id', $id)->update([
                'status' => !$product->status,
                'updated_at' => now(),
            ]);
        }
        return redirect()->back()->with('success', 'สลับสถานะสินค้าเรียบร้อยแล้ว');
    }

    function edit($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        return view('edit-product', compact('product'));
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'detail' => 'required',
        ], [
            'name.required' => 'กรุณากรอกชื่อสินค้า',
            'price.required' => 'กรุณากรอกราคาสินค้า',
            'price.numeric' => 'ราคาสินค้าต้องเป็นตัวเลข',
            'detail.required' => 'กรุณากรอกรายละเอียดสินค้า',
        ]);

        DB::table('products')->where('id', $id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'detail' => $request->detail,
            'status' => $request->status,
            'updated_at' => now(),
        ]);

        return redirect('/product')->with('success', 'ปรับปรุงข้อมูลสินค้าเรียบร้อยแล้ว');
    }

    function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric|min:0',
        ], [
            'name.required' => 'กรุณากรอกชื่อสินค้า',
            'price.required' => 'กรุณากรอกราคาสินค้า',
            'price.numeric' => 'ราคาสินค้าต้องเป็นตัวเลข',
        ]);

        DB::table('products')->insert([
            'name' => $request->name,
            'price' => $request->price,
            'detail' => $request->detail ?? '',
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/product')->with('success', 'บันทึกสินค้าเรียบร้อยแล้ว');
    }
}
