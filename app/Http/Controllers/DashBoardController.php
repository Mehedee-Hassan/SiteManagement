<?php

namespace App\Http\Controllers;

use App\Port;
use Illuminate\Http\Request;
use Auth;

class DashBoardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('App\Http\Middleware\UserRole',
            [
                'except' => [
                    'error.404'
                ]
            ]
        );
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $imageUDate = \App\Image::select('update_date')->distinct()->orderBy('update_date', 'desc')->get()->toArray();

        $portCount = \App\Port::count();
        $workCount = \App\Work::count();

        return view('dashboard.index')->with(array('update_dates'=>$imageUDate,'portCount'=>$portCount,"workCount"=>$workCount));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
    public function show($dates,$flag)
    {

//        $image_path = \App\Image::all()->groupBy('update_date')->toarray();

        if($flag == 1)
        $image_path = \App\Image::all()->sortByDesc('update_date')->groupBy('update_date')->toarray();
//        dd($image_path);

        if($flag == 2) {
            $image_only_date = \App\Image::where('update_date', $dates)->get()->toArray();
            return view('work.show.image')->with(array('images'=>$image_only_date,'flag'=>$flag));
        }

//      show images group by by work id
        if($flag == 3){
            $image_only_work = \App\Image::all()->groupBy('work_id')->toarray();
            return view('work.show.image')->with(array('images'=>$image_only_work,'flag'=>$flag));
        }




        return view('work.show.image')->with(array('images'=>$image_path,'flag'=>$flag));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }



    public function generate(Request $request)
    {

    }




}
