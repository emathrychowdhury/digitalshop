<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products= Product::all();
        return view('backendTheme.products.index',[
            'products'=>$products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backendTheme.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        $request->file();
//        dd($request);
//        $imagName=$request->file();
//        dd('imagName');
        $request->validate([
            'title'=> ['required','min:3'],
            'description'=> ['required'],
            'price'=> ['required','min:2'],
            'image'=> ['required'],
        ]);
        Product::create([
            'title'=> $request->title,
            'description'=> $request->description,
            'price'=> $request->price,
            'status'=>1,
            'image'=>$this->uploadImage(request()->file('image'))
        ]);

        return redirect()->route('products.index')->withMessage('Product added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('backendTheme.products.show',[
            'product'=>$product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {

        return view('backendTheme.products.edit',[
            'product'=>$product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title'=> ['required','min:3'],
            'price'=> ['required','min:2'],
        ]);
        $requestData=[
            'title'=> $request->title,
            'description'=> $request->description,
            'price'=> $request->price,
        ];
        if($request->hasFile('image')){
            $requestData['image']=$this->uploadImage(request()->file('image'));
        }
        $product->update($requestData);

//            'image'=>$this->uploadImage(request()->file('image'))
        return redirect()->route('products.index')->withMessage('Product updated
        successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->withMessage('product deleted successfully');
    }

    public function ProductInactive($id)
    {
        Product::findOrFail($id)->update(['status'=>0]);
        return redirect()->route('products.index')->withMessage('product Inactive successfully');
    }
    public function ProductActive($id)
    {
        Product::findOrFail($id)->update(['status'=>1]);
        return redirect()->route('products.index')->withMessage('product Active successfully');
    }

    public function uploadImage($file)
    {
        $fileName=time().'.'.$file->getClientOriginalExtension();
        Image::make($file)
            ->resize(200,200)
            ->save(storage_path().'/app/public/'.$fileName);
        return $fileName;
    }
}
