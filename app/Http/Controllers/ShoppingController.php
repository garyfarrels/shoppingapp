<?php

namespace App\Http\Controllers;

use App\Models\shopping;
use Illuminate\Http\Request;
use Validator;

class ShoppingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shopping = shopping::all();
        return response()->json($shopping);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        $validator= Validator::make($request->all(), [
            'Name' => 'required',
            'CreatedDate' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $shopping =shopping::create([
            'Name' => $request->Name,
            'CreatedDate' => $request->CreatedDate,
            
         ]);

         return response()->json(['shopping' =>$shopping]);
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
     * @param  \App\Models\shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shopping=shopping::where('id',$id)->get();
        return response()->json($shopping);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function edit(shopping $shopping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, shopping $shopping)
    {
       shopping::where('id',$shopping->id)
        ->update([
            'Name' => $request->Name,
            'CreatedDate' => $request->CreatedDate,
        ]);
        $data=shopping::where('id',$shopping->id)->first();
        return response()->json(['data' =>$data,'message'=>'Success updated data']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function destroy(shopping $shopping)
    {
        $shopping=shopping::destroy($shopping->id);
        return response()->json(['message'=>'Success delete data']);
    }
}
