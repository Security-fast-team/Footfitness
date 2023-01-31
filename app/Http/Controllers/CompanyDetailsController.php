<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyInfo;
use App\Models\CompanyContact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class CompanyDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('company_details.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $n['company_infos'] = CompanyInfo::first();
        $n['company_contact_infos'] = CompanyContact::first();
       return view('backend.setting.create',$n);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'title' => 'required|string',
            'logo' => 'required|img|mines:png,jpg',
            'address' => 'required',
            'phone' => 'nullable|string',
            'whatsapp' => 'nullable|string',
            'facebook_page_link' => 'nullable|url',
            'facebook_group_link' => 'nullable|url'
        ];
        // $message =[
        //     'required'=> ':attribute is required'
        //     'unique'
        // ];
// $request->validate($rules);
// dd($request->all);
        Validator::make($request->all(),$rules);
        if(!CompanyInfo::first()){
            // Save Company Information
            $insert = new CompanyInfo;
            $insert->name = $request->name;
            $insert->title = $request->title;

            if($request->file('logo')){
                $file= $request->file('logo');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('company_details'), $filename);
                $insert->logo= 'company_details/'.$filename;
            }
            // $insert->logo = $request->logo;
            $insert->address = $request->address;
            $insert->save();
        }else{
            $update = CompanyInfo::find($request->info_id);
            $update->name = $request->name;
            $update->title = $request->title;

            if($request->file('logo')){
                $file= $request->file('logo');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('company_details'), $filename);
            $update->logo= 'company_details/'.$filename;
            }
            $update->address = $request->address;
            $update->save();
        }

        // Save Company Contact Information
        if(!CompanyContact::first()){

            $insertContactInfo = new CompanyContact;
            $insertContactInfo->phone = $request->phone;
            $insertContactInfo->whatsapp = $request->whatsapp;
            $insertContactInfo->facebook_page_link = $request->facebook_page_link;
            $insertContactInfo->facebook_group_link = $request->facebook_group_link;
             $insertContactInfo->email = $request->email;
            $insertContactInfo->save();
        }else{
            $update_contact = CompanyContact::find($request->contact_id);
            $update_contact->phone = $request->phone;
            $update_contact->whatsapp = $request->whatsapp;
            $update_contact->facebook_page_link = $request->facebook_page_link;
            $update_contact->facebook_group_link = $request->facebook_group_link;
            $update_contact->email = $request->email;
            $update_contact->save();
        }

        if(Auth::user()->roll){
            return redirect()->route('admin')->with('msg','<script> alert("Successfully Set your website setting");</script>');
        }

        return redirect()->route('home')->with('msg','<script> alert("Successfully Set your website setting");</script>');
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
}
