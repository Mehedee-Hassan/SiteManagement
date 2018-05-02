<?php

namespace App\Http\Controllers;

use App\Port;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class PortController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
//        $this->middleware('App\Http\Middleware\UserRole',
//            [
//                'except' => [
//                    'error.404'
//                ]
//            ]
//        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ports = \App\Port::all();
        return view('port.index')->with('ports',$ports);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('port.main.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);

        $port = new \App\Port;
        $port->name = $request->port_name;
        $port->save();

        return redirect('/port');

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
        $port = Port::find($id);
        return view('port.edit')->with('port',$port);
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
        $port = Port::find($id);
        $port->name = $request->port_name;
        $port->save();

        return redirect('/port');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $port = Port::find($id);



        $works = \App\Work::where('port_id',$port->id)->get();

        foreach ($works as $work) {



            $images = \App\Image::where('work_id', $work->id)->get();
            foreach ($images as $image) {
                Storage::disk('local')->delete($image->name);
                $image->delete();
            }

            $work->delete();
        }


        $port->delete();

        return redirect('/port');

    }




}
