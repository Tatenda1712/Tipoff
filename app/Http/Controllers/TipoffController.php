<?php

namespace App\Http\Controllers;

use App\Models\Tipoff;
use App\Models\Comment;
use App\Http\Requests\StoreTipoffRequest;
use App\Http\Requests\UpdateTipoffRequest;
use Illuminate\Http\Request;

class TipoffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $tips = Tipoff::get();
       $tips= Tipoff::latest()->with('comments')->get();
       $comments= Comment::where('tip_id',1)->get();
        if($tips!=null){
            return response()->json(["data"=>$tips,"comment"=>count($comments)]);
        }
        else{
            return response()->json(["data"=>"error"]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
     $istip=   Tipoff::create(["tipoff"=>$request->tipoff,"likes"=>"0","share"=>"0"]);
            
     if($istip){
        return response()->json(["data"=>"created"]);
     }
     else{
        return response()->json(["data"=>"error"]);
     }
    
    }
    public function addshare(Request $request)
    {
        $tipoff=Tipoff::where("id",$request->tipoff_id)->first();
        $newshare=$tipoff->share+1;
     $istip=Tipoff::where("id",$request->tipoff_id)->update(["share"=>$newshare]);
            
     if($istip){
        return response()->json(["data"=>"created"]);
     }
     else{
        return response()->json(["data"=>"error"]);
     }
    
    }
    public function addlike(Request $request)
    {
        $tipoff=Tipoff::where("id",$request->tipoff_id)->first();
        $newlike=$tipoff->likes+1;
     $istip=Tipoff::where("id",$request->tipoff_id)->update(["likes"=>$newlike]);
            
     if($istip){
        return response()->json(["data"=>"created"]);
     }
     else{
        return response()->json(["data"=>"error"]);
     }
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTipoffRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipoffRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipoff  $tipoff
     * @return \Illuminate\Http\Response
     */
    public function show(Tipoff $tipoff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipoff  $tipoff
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipoff $tipoff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipoffRequest  $request
     * @param  \App\Models\Tipoff  $tipoff
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipoffRequest $request, Tipoff $tipoff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipoff  $tipoff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipoff $tipoff)
    {
        //
    }
}
