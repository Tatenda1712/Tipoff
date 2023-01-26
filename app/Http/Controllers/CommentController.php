<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
     $istip=   Comment::create(["comment"=>$request->comment,"likes"=>"0","share"=>"0","tip_id"=>$request->tipoff_id]);
            
     if($istip){
        return response()->json(["data"=>"created"]);
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
    public function addshare(Request $request)
    {
        $tipoff=Comment::where("id",$request->comment_id)->first();
        $newshare=$tipoff->share+1;
     $istip=Comment::where("id",$request->comment_id)->update(["share"=>$newshare]);
            
     if($istip){
        return response()->json(["data"=>"created"]);
     }
     else{
        return response()->json(["data"=>"error"]);
     }
    
    }
    public function addlike(Request $request)
    {
        $tipoff=Comment::where("id",$request->comment_id)->first();
        $newlike=$tipoff->likes+1;
     $istip=Comment::where("id",$request->comment_id)->update(["likes"=>$newlike]);
            
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
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommentRequest  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
