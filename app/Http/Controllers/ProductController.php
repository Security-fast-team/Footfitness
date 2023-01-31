<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\PostCategory;
use App\Models\ProductGallery;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::getAllProduct();

        return view('backend.pages.product.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        $n['brands']=Brand::get();
        $n['category']=Category::all();

        return view('backend.pages.product.create',$n);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $insert = new Product();
            $insert->title = $request->title;
            $insert->sku = $request->sku;
            $insert->summary = $request->summary;
            $insert->description = $request->description;
            $insert->cat_id = $request->cat_id;
            $insert->price = $request->price;
            $insert->discount = $request->discount;
            $insert->brand_id = $request->brand_id;
            $insert->condition = $request->condition;
            $insert->stock = $request->stock;
            $insert->status = $request->status;

            if($request->file('photo')){
                $file= $request->file('photo');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('product'), $filename);
                $insert->photo = 'product/'.$filename;
            }

            $insert->slug = $request->title;
            $insert->is_featured = $request->input('is_featured',0);
            $insert->save();


          if ($files = $request->file('product_gallery')){
            foreach ($files as $file){
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = 'new'.$image_name.'.'.$ext;
                $file->move(public_path('product'), $image_full_name);
                $image_path = 'product/'.$image_full_name;
                $insert_gallery = new ProductGallery();
                $insert_gallery->img = $image_path;
                $insert_gallery->product_id = $insert->id;
                $insert_gallery->save();
            }
        }

        if($insert){
            request()->session()->flash('success','Product Successfully added');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand=Brand::get();
        $product=Product::findOrFail($id);
        $category=Category::all();
        $items=Product::all();
        // return $items;
        return view('backend.pages.product.edit')->with('product',$product)
                    ->with('brands',$brand)
                    ->with('categories',$category)->with('items',$items);
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
        $update=Product::findOrFail($id);
        // $this->validate($request,[
        //     'title'=>'string|required',
        //     'sku'=>'string|required',
        //     'summary'=>'string|required',
        //     'description'=>'string|nullable',
        //     'size'=>'nullable',
        //     'stock'=>"required|numeric",
        //     'cat_id'=>'required|exists:categories,id',
        //     'brand_id'=>'nullable|exists:brands,id',
        //     'status'=>'required|in:active,inactive',
        //     'condition'=>'required|in:default,new,hot',
        //     'price'=>'required|numeric',
        //     'discount'=>'nullable|numeric'
        // ]);

        $update->title = $request->title;
        $update->sku = $request->sku;
        $update->summary = $request->summary;
        $update->description = $request->description;
        $update->cat_id = $request->cat_id;
        $update->price = $request->price;
        $update->discount = $request->discount;
        $update->brand_id = $request->brand_id;
        $update->condition = $request->condition;
        $update->stock = $request->stock;
        $update->status = $request->status;

        if($request->file('photo')){
            $file= $request->file('photo');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('product'), $filename);
            $update->photo = 'product/'.$filename;
        }

        $update->slug = $request->title;
        $update->is_featured = $request->input('is_featured',0);
        $update->save();


      if ($files = $request->file('product_gallery')){
        $delete = ProductGallery::where('product_id',$id)->delete();
        foreach ($files as $file){
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = 'new'.$image_name.'.'.$ext;
            $file->move(public_path('product'), $image_full_name);
            $image_path = 'product/'.$image_full_name;
            $insert_gallery = new ProductGallery();
            $insert_gallery->img = $image_path;
            $insert_gallery->product_id = $update->id;
            $insert_gallery->save();
        }
    }
        if($update){
            request()->session()->flash('success','Product Successfully updated');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::findOrFail($id);
        $status=$product->delete();

        if($status){
            request()->session()->flash('success','Product successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting product');
        }
        return redirect()->route('product.index');
    }

    // Product details code
    public function product_details($id){
        $data = Product::with(['productGallery'])->find($id);

        return view('frontend.product_details', compact('data'));
    }

    // Show gallery image code
    public function show_gallery($id){
        $data = Product::with(['productGallery'])->find($id);

        return view('backend.pages.product.show_gallery', compact('data'));
    }
}
