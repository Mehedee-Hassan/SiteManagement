<?php

namespace App\Http\Controllers;

use App\Image;
use App\Port;
use App\Work;
use Illuminate\Http\Request;
use Carbon\Carbon;
use function Psy\debug;
use Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;


class WorkController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = Work::all();

//        dd($works);
        return view('work.index')->with('works',$works);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $port = Port::all();
        return view('work.main.create')->with("ports",$port);
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
        $this->validate($request, [
            'description_of_work' => 'required',
            'contractor_name' => 'required',
            'work_place' => 'required',
        ]);

        $work =  new \App\Work;
        $work->description = $request->description_of_work;
        $work->contractor = $request->contractor_name;
        $work->work_place = $request->work_place;
        $work->labour = $request->labour;
        $work->mason = $request->mason;
        $work->port_id = $request->port_id;
        $work->remark = $request->remark==null ? "":$request->remark;
        $work->save();
        $work_id = $work->id;

        if(!is_null($request->work_image)) {
            if (count($request->work_image) > 0) {

                $i=0;
                foreach ( $request->work_image as $file){
                    if(isset($file)){
                        $filename = $work_id."_".Carbon::now()->format('d_m_Y__H_i_s').'_'.$i.".".$file->getClientOriginalExtension();

                        Storage::disk('local')->put($filename,  File::get($file));

                        $imagepath ='uploads/'.$work->port_id.'/'.$work_id.'/'.$filename.".".$file->getClientOriginalExtension();
//                        $file->move('uploads/'.$work->port_id.'/'.$work_id , $filename.".".$file->getClientOriginalExtension());
                        $i += 1;


                        $image = new \App\Image;
                        $image->name = $filename;
                        $image->image_path = $file->getClientMimeType();
                        $image->update_date = Carbon::today();
                        $image->work_id = $work->id;
                        $image->save();

                    }

                }



            }
        }

        return redirect('/work');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $work = Work::find($id);
        $ports = Port::all();
        $port = Port::find($work->port_id);

        $images =\App\Image::where("work_id",$id)->get()->toarray();

//        dd($work) ;
        return view('work.edit')->with(['work'=> $work,'ports'=>$ports,'port'=>$port,'images'=>$images]);
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

        print_r($id);
        $this->validate($request, [
            'description_of_work' => 'required',
            'contractor_name' => 'required',
            'work_place' => 'required',
        ]);

        if(!is_numeric($request->labour)){
            $request->labour = 0;
        }

        if(!is_numeric($request->mason)){
            $request->mason = 0;
        }

        $work =  Work::find($id);
        $work->description = $request->description_of_work;
        $work->contractor = $request->contractor_name;
        $work->work_place = $request->work_place;
        $work->labour = $request->labour;
        $work->mason = $request->mason;
        $work->port_id = $request->port_id;
        $work->remark = $request->remark==null ? "":$request->remark;
        $work->save();

        $work_id = $work->id;


//        dd($work);

        if(!is_null($request->image_to_delete)) {
            if (count($request->image_to_delete) > 0) {

                $i = 0;
                foreach ($request->image_to_delete as $image_id) {
                    $image = Image::find($image_id);

                    Storage::disk('local')->delete($image->name);

                    $image->delete();
                }
            }
        }


        if(!is_null($request->work_image)) {
            if (count($request->work_image) > 0) {

                $i=0;
                foreach ( $request->work_image as $file){
                    if(isset($file)){
                        $filename = $work_id."_".Carbon::now()->format('d_m_Y__H_i_s').'_'.$i.".".$file->getClientOriginalExtension();
                        Storage::disk('local')->put($filename,  File::get($file));

                        $imagepath ='uploads/'.$work->port_id.'/'.$work_id.'/'.$filename.".".$file->getClientOriginalExtension();
//                        $file->move('uploads/'.$work->port_id.'/'.$work_id , $filename.".".$file->getClientOriginalExtension());
                        $i += 1;


                        $image = new \App\Image;
                        $image->name = $filename;
                        $image->image_path = $file->getClientMimeType();
                        $image->update_date = Carbon::today();
                        $image->work_id = $work->id;
                        $image->save();

                    }

                }



            }
        }


        return redirect('/work/'.$work_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Image $site)
    {
        dd($request);
    }


    public function deleteImage($id,$imageId){
        Log::info("test");

        $image = \App\Image::find($imageId);
        Storage::disk('local')->delete($image->name);

        $image->delete();


        $work = Work::find($id);
        $ports = Port::all();
        $port = Work::find($work->port_id);

        $images =\App\Image::where("work_id",$id)->get()->toarray();




            return;
//        return view('work.edit')->with(['work'=> $work,'ports'=>$ports,'port'=>$port,'images'=>$images]);
    }



    public function deleteWork($id){
        $work = \App\Work::find($id);

        $images = \App\Image::where('work_id',$id)->get();
        foreach ($images as $image){
            Storage::disk('local')->delete($image->name);

            $image->delete();
        }

        $work->delete();

        return redirect('/work');
    }

    public function getImageFile($filename){
        $image = \App\Image::where('name',$filename)->first();

            if(!is_null($image)){
                $image = $image->toArray();
                $file = Storage::disk('local')->get($filename);
                return (new Response($file, 200))->header('Content-Type', $image['image_path']);
            }
        return new Response(404);

    }
}
