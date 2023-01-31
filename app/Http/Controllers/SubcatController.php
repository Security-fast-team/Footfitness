<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcat;
use Illuminate\Http\Request;

class SubcatController extends Controller
{
   public function index()
    {
        $subcat=Subcat::where('status','active')->get();
        // return $subcat;
        return view('backend.pages.subcat.index')->with('subcats',$subcat);
    }

    public function create()
    {
         $n['cats']=Category::where('status','active')->get();
        return view('backend.pages.subcat.create',$n);
    }

     public function edit($id)
    {
         $n['cats']=Category::where('status','active')->get();
         $n['subcat']=Subcat::find($id);
        return view('backend.pages.subcat.edit',$n);
    }

    public function store(Request $req){
        $submit = New Subcat();
        $submit->cat_id = $req->cat_id;
        $submit->title = $req->title;
        $submit->status = $req->status;
        if($req->file('img')){
            $file= $req->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('subcat'), $filename);
            $submit->img= 'subcat/'.$filename;
        }
        
        $status=$submit->save();
        if($status){
            request()->session()->flash('success','Sub-category successfully added');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('subcat.index');
    }

    public function update(Request $req){
        $update =  Subcat::find($req->id);
        $update->cat_id = $req->cat_id;
        $update->title = $req->title;
        $update->status = $req->status;
        if($req->file('img')){
            $file= $req->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('subcat'), $filename);
            $update->img= 'subcat/'.$filename;
        }
        
        $status=$update->save();
        if($status){
            request()->session()->flash('success','Sub-category successfully Updated');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('subcat.index');
    }

     public function destroy($id)
    {
        $subcat=Subcat::findOrFail($id);
        $subcat->delete();

        request()->session()->flash('success','Sub-category successfully deleted');
        return redirect()->route('subcat.index');
    }
}
