<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Designer;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        $designers = Designer::all();

        $categories = Category::all();

        return view('dashboard.products.index', compact('products', 'designers', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $input = $request->all();

        $uploaded_file = $request->picture;

        $originalFileName = pathinfo($uploaded_file->getClientOriginalName(), PATHINFO_FILENAME);
        $fileName = preg_replace('/\s+/', '', $originalFileName) . '-' . uniqid() . '.' . $uploaded_file->getClientOriginalExtension();
        $uploaded_file->storeAs('public/uploads/', $fileName);

        $filePath = 'uploads/' . $fileName;

        $input['image'] = $filePath;

        unset($input['picture']);
        // $file->file_path = $filePath;
        // $file->file_name = $originalFileName;

        $product = Product::create($input);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->back();
    }
}
