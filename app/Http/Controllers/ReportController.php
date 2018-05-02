<?php

namespace App\Http\Controllers;

use App\Port;
use Illuminate\Http\Request;

class ReportController extends Controller
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ports = \App\Port::all();
        return view('report.main.create')->with('ports',$ports);

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
        $port = \App\Port::find($request->port_id);
        $works = \App\Work::where('port_id',$request->port_id)->get()->toarray();

        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();

        $header = array('size' => 16, 'bold' => true);

        $fancyTableStyle = array('borderSize' => 6,
            'borderColor' => '000000',
            'cellMargin' =>10,
            'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER,
            'cellSpacing' => 15,
            'align','center',
            'valign','center');

        $headTableStyle = array('cellSpacing' => 5,'cellMargin' =>5,'size' => 11, 'bold' => true,'align','center');
        $rowTableStyle = array('align','center','valign','center');

        $rows = 10;
        $cols = 5;
        $section->addText($port->name, $header);
        $table = $section->addTable($fancyTableStyle);


        $table->addRow();
        $table->addCell(1750)->addText("No.",$headTableStyle,array( 'align' => 'center','valign'=>'center'));
        $table->addCell(1750)->addText("Description of Works",$headTableStyle,array( 'align' => 'center','valign'=>'center'));
        $table->addCell(1750)->addText("Contractor Name",$headTableStyle,array( 'align' => 'center','valign'=>'center'));
        $table->addCell(1750)->addText("Work Place",$headTableStyle,array( 'align' => 'center','valign'=>'center'));
        $table->addCell(1750)->addText("The work site no of labour",$headTableStyle,array( 'align' => 'center','valign'=>'center'));
        $table->addCell(1750)->addText("Remark",$headTableStyle,array( 'align' => 'center','valign'=>'center'));


        $myFontStyle = array('cellSpacing' => 5, 'align' => 'center');

//        $workCount = count($works);
//        dd($works);
        $r =1;
        $sum = 0;
//        for ($r = 1; $r <= $workCount; $r++) {
        foreach ($works as $work){
//            print_r($work);
            $table->addRow();
            $table->addCell(1750)->addText($r,$myFontStyle , array( 'cellSpacing' => 5,'align' => 'center'));
            $table->addCell(1750)->addText($work['description'],$myFontStyle,array( 'cellSpacing' => 5,'align' => 'center'));
            $table->addCell(1750)->addText($work['contractor'],$myFontStyle,array( 'cellSpacing' => 5,'align' => 'center'));
            $table->addCell(1750)->addText($work['work_place'],$myFontStyle,array( 'cellSpacing' => 5,'align' => 'center'));
            $table->addCell(1750)->addText("Mason - ".$work['mason']."<w:br />"."Labour-".$work['labour'],$myFontStyle,array( 'cellSpacing' => 5,'align' => 'center'));
            $table->addCell(1750)->addText($work['remark'],$myFontStyle,array( 'cellSpacing' => 5,'align' => 'center'));
        $r++;

        $m = is_numeric($work['mason'])?$work['mason']:0;
        $l = is_numeric($work['labour'])?$work['labour']:0;
        $sum += ($m+$l);
        }


        $bottomStyle = array('size' => 14, 'bold' => true ,'align'=>'center');

        $section->addText("<w:br />");
        $section->addText("<w:br />");
        $section->addText("Total Mason+Labour= ".$sum, $bottomStyle,array('align'=>'center'));

//        dd();
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        try {
            $objWriter->save(storage_path('WorkReport.docx'));
        } catch (Exception $e) {
        }


        return response()->download(storage_path('WorkReport.docx'));
    }




}
