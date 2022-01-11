<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'product_name' => 'required',
            'product_category' => 'required',
            'product_desc' => 'required',
            'harga' => 'required|numeric',

        ]);
        if ($request->hasFile('file_path')) {
            $request->validate([
                'file_path' => 'mimes:jpg,png,jpeg,gif,svg,JPG' // Only allow .jpg, .bmp and .png file types.
            ]);
            $request->file('file_path')->store('product', 'public');

        $products = [
            "product_name" => $request->get('product_name'),
            "product_category" => $request->get('product_category'),
            "product_desc" => $request->get('product_desc'),
            "harga"=> $request->get('harga'),
            "file_path" => $request->file('file_path')->hashName()
        ];

        Product::create($products);

    }


     //   Product::create($input);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::findOrFail($id);
        return view('products.show', compact('products','products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::find($id);
        
        return view('products.edit', compact('products','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = Product::findOrFail($id);

        $this->validate($request, [
            'product_name' => 'required',
            'product_category' => 'required',
            'product_desc' => 'required',
            'file_path' => 'required',
            'harga' => 'required|numeric',
        ]);
        if ($request->hasFile('file_path')) {
            $request->validate([
                'file_path' => 'mimes:jpg,png,jpeg,gif,svg,JPG' // Only allow .jpg, .bmp and .png file types.
            ]);
            $request->file('file_path')->store('product', 'public');

        $products = new Product();
        $products = (object) [
            "product_name" => $request->get('product_name'),
            "product_category" => $request->get('product_category'),
            "product_desc" => $request->get('product_desc'),
            "harga"=> $request->get('harga'),
            "file_path" => $request->file('file_path')->hashName()
        ];

     $products->save();

    }
    
  
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::findOrFail($id);

        $products->delete();
        
        return redirect()->route('products.index');
    }
}
