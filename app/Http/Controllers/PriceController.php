<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Service;
use Excel;


class PriceController extends Controller
{
    public function download_price(){
        $services = Service::with(['prices'=>function($query){
            $query->select('id','service_id','title','price','price_max')->orderBy('sort');
        }])->select('id','title')->get();
        $info = Excel::create('file_export',function($excel) use($services){
            $excel->setTitle('Export');
            $excel->setCreator('Medi-Light')
                ->setCompany('Medi-Light');
            $excel->setDescription('Export');
            $excel->getDefaultStyle()
                ->getAlignment()
                ->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                $excel->sheet(str_limit('Цены на услуги',27,''), function ($sheet) use ($services) {
                    $sheet->getDefaultRowDimension()->setRowHeight(20);
                    foreach($services as $service){
                        $rn=$sheet->getHighestRow()+2;
                        $sheet->row($rn,[$service->title]);
                        $sheet->row($rn, function ($row) {
                            $row->setFontSize(18);
                            $row->setFontWeight('bold');
                        });

                        if($service->prices->count()>0) {
                            $sheet->row($sheet->getHighestRow() + 1, array('id', 'id услуги', 'название', 'начальная цена', 'максимальная цена'));
                            $sheet->row($sheet->getHighestRow(), function ($row) {
                                $row->setFontSize(14);
                                $row->setFontWeight('bold');
                            });
                            $sheet->setHeight($sheet->getHighestRow(), 30);
                            $sheet->rows($service->prices->toArray());
                        }
                    }
                });

        })->download('xls');//->store('xls', storage_path('excel/exports'),true);
    }
    public function download_price_client(){
        $services = Service::with(['prices'=>function($query){
            $query->select('service_id','title','price','price_max')->orderBy('sort');
        }])->select('id','title')->get();
        $info = Excel::create('file_export',function($excel) use($services){
            $excel->setTitle('Export');
            $excel->setCreator('Medi-Light')
                ->setCompany('Medi-Light');
            $excel->setDescription('Export');
            $excel->getDefaultStyle()
                ->getAlignment()
                ->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
            $excel->sheet(str_limit('Цены на услуги',27,''), function ($sheet) use ($services) {
                $sheet->getDefaultRowDimension()->setRowHeight(20);
                foreach($services as $service){
                    $rn=$sheet->getHighestRow()+2;
                    $sheet->row($rn,[$service->title]);
                    $sheet->row($rn, function ($row) {
                        $row->setFontSize(18);
                        $row->setFontWeight('bold');
                    });

                    if($service->prices->count()>0) {
                        $sheet->row($sheet->getHighestRow() + 1, array( 'название', 'начальная цена', 'максимальная цена'));
                        $sheet->row($sheet->getHighestRow(), function ($row) {
                            $row->setFontSize(14);
                            $row->setFontWeight('bold');
                        });
                        $sheet->setHeight($sheet->getHighestRow(), 30);
                        foreach($service->prices as $pr){
                            unset($pr['service_id']);
                        }
                        $sheet->rows($service->prices->toArray());
                    }
                }
            });
        })->download('xls');//->store('xls', storage_path('excel/exports'),true);
    }
    public function numToAlpha($num){
        $alpha = ['','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
        $num=intval($num);
        $res='';
        if($num<=26){
            $res=$alpha[$num];
        }else{
            $new_num = floor($num/26);
            $ost=($num%26);
            if($new_num>26){
                $res= $this->numToAlpha($new_num);
            }else{
                $res= $alpha[$new_num];
            }
            $res.=$alpha[$ost];
        }
        return $res;

    }
}
