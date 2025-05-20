<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;

public function store(Request $request)
{
    $validated = $request->validate([
        'class_name' => 'required|string|exists:store,class_name',
        'product_name' => 'required|string|max:255',
        'image' => 'nullable|image|max:2048',
        'price' => 'required|numeric|min:0',
    ]);

    $product = new Product();
    $product->product_code = (string) Str::uuid();  // UUIDで主キーを生成
    $product->class_name = $validated['class_name'];
    $product->product_name = $validated['product_name'];
    $product->price = $validated['price'];

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('product_images', 'public');
        $product->image_path = $path;
    }

    $product->save();

    return redirect()->back()->with('success', '商品が登録されました');
}
