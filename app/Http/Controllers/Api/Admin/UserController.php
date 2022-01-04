<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;
class UserController extends Controller
{
    public function csvExport(Request $request){
        $post = $request->all();

        $response = new StreamedResponse(function () use ($request, $post){
            $stream = fopen('php://output', 'w');
            // stream_filter_prepend($stream, 'convert.iconv.utf-8/cp932//TRANSLIT');
            mb_convert_variables('SJIS', 'UTF-8', $stream);
            $results = User::all();
            if(empty($results[0])){
                fputcsv($stream, [
                    'データが存在しません'
                ]);
            }else{
                foreach($results as $row){
                    fputcsv($stream, $this->_csvRow($row));
                }
            }
            fclose($stream);

        });
        $response->headers->set('Content-Type', 'application/octet-stream');
        $response->headers->set('content-disposition', 'attachment; filename=benchi_hoiku.csv');

        return $response;
    }
    private function _csvRow($row){
        return [
            $row->id,
            $row->name,
            $row->email
        ];
    }
}
