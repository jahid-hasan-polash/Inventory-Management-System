<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\OthersRoom;
use Validator;

class OthersroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $others = OthersRoom::where('building_id',$id)->get();
        return view('othersrooms.index')
                    ->with('othersrooms', $others)
                    ->with('building_id',$id)
                    ->with('title','Index of Othersrooms');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('othersrooms.create')
                    ->with('building_id',$id)
                    ->with('title','Create new Other Room');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
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

            $otherRoom = new OthersRoom;
            $otherRoom->building_id = $id;
            $otherRoom->roomNo = $data["roomNo"];
            $otherRoom->capacity = $data["capacity"];

            if($otherRoom->save()){
                return redirect()->route('building.others',$id)
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
        $room = OthersRoom::find($id);
        return view('othersrooms.edit')->with('otherRoom',$room)->with('title','Edit Others Room Info');
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

            $otherRoom = OthersRoom::find($id);
            $otherRoom->building_id = $id;
            $otherRoom->roomNo = $data["roomNo"];
            $otherRoom->capacity = $data["capacity"];

            if($otherRoom->save()){
                return redirect()->route('building.others',$otherRoom->building_id)
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
