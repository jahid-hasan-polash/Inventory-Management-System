<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Labroom;
use Validator;

class LabroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $labs = Labroom::where('building_id',$id)->get();
        return view('labroom.index')
                    ->with('labs', $labs)
                    ->with('building_id',$id)
                    ->with('title','Index of Labrooms');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('labroom.create')
                    ->with('building_id',$id)
                    ->with('title','Create new Labroom');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $rules =[
            'roomNo'                  => 'required',
            'capacity'                 => 'required'
        ];
        $data = $request->all();

        $validation = Validator::make($data,$rules);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }else{

            $labroom = new Labroom;
            $labroom->building_id = $id;
            $labroom->roomNo = $data["roomNo"];
            $labroom->capacity = $data["capacity"];

            if($labroom->save()){
                return redirect()->route('building.labroom',$id)
                            ->with('success','Created successfully.');
            }else{
                return redirect()->route('dashboard')
                            ->with('error',"Something went wrong.Please Try again.");
            }
        }
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
        $room = Labroom::find($id);
        return view('labroom.edit')->with('labroom',$room)->with('title','Edit Labroom Info');
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
        $rules =[
            'roomNo'                  => 'required',
            'capacity'                 => 'required'
        ];
        $data = $request->all();

        $validation = Validator::make($data,$rules);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }else{

            $labroom = Labroom::find($id);
            $labroom->roomNo = $data["roomNo"];
            $labroom->capacity = $data["capacity"];

            if($labroom->save()){
                return redirect()->route('building.labroom',$labroom->building_id)
                            ->with('success','Created successfully.');
            }else{
                return redirect()->route('dashboard')
                            ->with('error',"Something went wrong.Please Try again.");
            }
        }
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
