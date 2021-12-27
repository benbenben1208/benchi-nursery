<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ImageService
{
    public  function uploadImage($imageFile, $folderName)
    {
        //このサービスクラスは使いまわしをしたいので、少し拡張性を考えて変更。
        //画像ファイルが配列で入ってきた場合 (例)(image1 image2 image3 image4のような)、求人に画像が複数ついたりする場合等を考慮、
        is_array($imageFile)
            ? $file = $imageFile['image']
            : $file = $imageFile;

        Storage::putFile('public/' . $folderName . '/', $file);
        return '/' .$folderName . '/' . $file->getClientOriginalName();
    }
    public function uploadBase64Image($imageFile, $folderName)
    {
        list($fileInfo, $fileData) = explode(';', $imageFile);
        $extension = explode('/', $fileInfo)[1];
        // $fileDataにある"base64,"を削除する
        list(, $fileData) = explode(',', $fileData);
        // base64をデコード
        $fileData = base64_decode($fileData);


        // ランダムなファイル名生成
        $fileName = md5(uniqid(rand(), true)). ".$extension";
        $filePath = $folderName . '/' . $fileName;
        Storage::disk('s3')->put($filePath . '/', $fileData);
        return '/' .$folderName . '/' . $fileName;
    }
}
