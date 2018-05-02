<?php

namespace App\Http\Controllers;

use App\Port;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('App\Http\Middleware\UserRoleAdmin',
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
        $users = \App\User::all()->where('email' ,'!=','razin.meha@gmail.com');
        return view('user.index')->with('users',$users);
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

        if($id==1) {
            if (Auth::user()->email == "razin.meha@gmail.com") {
//                pass
            }else{
                return redirect('/user');
            }
        }

        $user = \App\User::find($id);
        return view('user.edit')->with('user',$user);
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
        $user = \App\User::find($id);
        $user->role  = $request->user_role;
        $user->save();

        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $port = \App\User::find($id);
        $port->delete();
        return redirect('/user');

    }




}
