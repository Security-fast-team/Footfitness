<?php

namespace App\Http\Controllers;

use App\Models\Category;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use App\Models\CompanyInfo;
use App\Models\CompanyContact;
use App\Models\Shipping;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{


    /*public function redirect(){
        $user = Auth::user()->user_info_id;

        if ($user == '1'){
            return view('backend.pages.index');
        }else{
            return view('frontend.index');
        }
    }

    public function indexs(){
        return view('frontend.index');
    }*/


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //websiteSetting check
        $data = CompanyInfo::all();
            if(count($data)<1){
                return redirect()->route('company-details.create');
            }
            $n['shipping'] = Shipping::all();
            return view('frontend.index',$n);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

   public function productFetch($id = null){
        if($id){
            $n['company_info'] = CompanyInfo::first();
            $n['company_contact_info'] = CompanyContact::first();
            $n['shipping'] = Shipping::all();
            $n['products'] = Product::where('cat_id',$id)->get();
            return view('frontend.index',$n);
        }
    }

    public function categoryWiseShow($id = null){
        if($id){
            $n['products'] = Product::where('cat_id',$id)->get();
            $n['categories'] = Category::all();

            return view('frontend.cat_wise_show_product',$n);
        }
    }

    // All category show
    public function all_category(){
        $n['categories'] = Category::all();
        return view('frontend.all_category', $n);
    }

    // All product show
    public function all_product(){
        $n['products'] = Product::paginate(30);
        return view('frontend.all_product', $n);
    }


}
