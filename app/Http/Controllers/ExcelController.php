<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ExcelController extends Controller
{
    public function index()
    {

        \Excel::create('nz', function ($excel)  {

            $excel->sheet('Sheetname', function ($sheet)  {
                $findings = findings::all( ['audit_title','finding_num'] );
                $sheet->fromArray( $findings );
                $sheet->row(1,array('Audit Title','Finding Number'));
                $sheet->cell('A1:B1', function($cells) {
                    $cells->setBackground('#000000');
                    $cells->setFontColor('#ffffff');
                    $cells->setFont(array(
                        'family'     => 'Calibri',
                        'size'       => '16',
                        'bold'       =>  true
                    ));//setFont
                });//Sheet->cell
            });//Sheet->sheet

        })->store('xls', storage_path('excel/exports'))->export('xls')->redirect('home');


    }


    public function export_each_findings($finding_id,$finding_num)
    {
        $this->fid = $finding_id;
        $this->fnum = $finding_num;
        \Excel::create($this->fnum, function ($excel )  {
            $excel->setTitle('QA Findings');
            $excel->setCreator( Auth::user()->name );
            $excel->sheet($this->fnum, function ($sheet)  {
                $findings = findings::findOrfail($this->fid);
//             $action = action::Where('finding_numlink',"=", $this->fnum)->all();
                $sheet->fromModel(
                    [[
                        $findings->finding_num,
                        $findings->audit_title,
                        $findings->finding_category,
                        $findings->risk,
                        $findings->findings,
                    ]]);
                $sheet->row(1,array(
                    'Finding Number',
                    'Audit Title',
                    'Category',
                    'Risk',
                    'Findings'
                ));
                $sheet->setBorder('A1:E1', 'thin');
                $sheet->cell('A1:E1', function($cells) {
                    $cells->setBackground('#282828');
                    $cells->setFontColor('#ffffff');
                    $cells->setAlignment('center');
                    $cells->setValignment('middle');
                    $cells->setFont(array(
                        'family'     => 'Calibri',
                        'size'       => '12',
                        'bold'       =>  true
                    ));//setFont
                });//Sheet->cell
            });//Sheet->sheet

        })->store('xls', storage_path('excel/exports'))->export('xls')->redirect('home');

        return $finding_id . $finding_num;
    }
}
