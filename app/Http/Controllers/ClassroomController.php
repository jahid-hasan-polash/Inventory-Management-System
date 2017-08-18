<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Classroom;
use Validator;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $classes = Classroom::where('building_id',$id)->get();
        return view('classroom.index')
                    ->with('classes', $classes)
                    ->with('building_id',$id)
                    ->with('title','Index of Classrooms');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        
        return view('classroom.create')
                    ->with('building_id', $id)
                    ->with('title','Create new Classroom');
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

            $classroom = new Classroom;
            $classroom->building_id = $id;
            $classroom->roomNo = $data["roomNo"];
            $classroom->capacity = $data["capacity"];

            if($classroom->save()){
                return redirect()->route('building.classroom',$id)
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
        $room = Classroom::find($id);
        return view('classroom.edit')->with('classroom',$room)->with('title','Edit Classroom Info');
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

            $classroom = Classroom::find($id);
            $classroom->roomNo = $data["roomNo"];
            $classroom->capacity = $data["capacity"];

            if($classroom->save()){
                return redirect()->route('building.classroom',$classroom->building_id)
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
