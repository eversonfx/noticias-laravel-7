<?php
namespace App\Classes;

use Illuminate\Http\Request;

class UploadHelper
{
    public function fileUploadPost(Request $request)
    {
        //Verifica se publicacao para ir a pasta correta
        if ($request->tipopublicacao != null) {
            $path = "/tipos_de_documentos/" . $request->tipopublicacao;
        } else {
            $path = '';
        }

        $fileName = uniqid(date('HisYmd')) . '.' . $request->file->extension();

        if ($request->file->move(public_path('uploads' . $path), $fileName)) {
            return $path . "/" . $fileName;
        } else {
            return null;
        }
    }

    public function multipleFileUploadPost(int $idAtualizacaoProjeto, String $folder, Request $request)
    {
        if ($request->hasfile('files')) {
            foreach ($request->file('files') as $file) {
                $filename = uniqid(date('HisYmd'))."_".$idAtualizacaoProjeto. '.' . $file->extension();
                $file->move(public_path('uploads/'.$folder.'/'.str_replace(".", "", $file->extension()) .'/'), $filename);
                $data[] = $filename;
            }
        }
        return $data;
    }

    public function destroy($id)
    {
        $image = \DB::table('files')->where('id', $id)->first();
        $file = $image->your_file_path;
        $filename = public_path() . '/uploads_folder/' . $file;
        $file->delete($filename);
    }
}
