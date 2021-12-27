<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\File\File;

class UploadImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'image|mimes:jpg,jpeg,png',
            'imageBase64' => 'nullable|string',
        ];
    }

    public function validationData()
    {
        $all = parent::validationData();

        // imageBase64パラメータがあればUploadedFileオブジェクトに変換してimageFileパラメータに上書きする。
        // if ($this->has('imageBase64')) {
        //     // base64をデコード。プレフィックスに「data:image/jpeg;base64,」のような文字列がついている場合は除去して処理する。
        //     $data = explode(',', $this->get('imageBase64'));
        //     if (isset($data[1])) {
        //         $fileData = base64_decode($data[1]);
        //     } else {
        //         $fileData = base64_decode($data[0]);
        //     }

        //     // tmp領域に画像ファイルとして保存してUploadedFileとして扱う
        //     $tmpFilePath = sys_get_temp_dir() . '/' . Str::uuid()->toString();

        //     file_put_contents($tmpFilePath, $fileData);
        //     $tmpFile = new File($tmpFilePath);

        //     $file = new UploadedFile(
        //         $tmpFile->getPathname(),
        //         $tmpFile->getFilename(),
        //         $tmpFile->getMimeType(),
        //         0,
        //         true // Mark it as test, since the file isn't from real HTTP POST.
        //     );
        //     dd($file->getClientOriginalExtension());
        //     $this->image = $file;
        // }
        // return $this->all();
        list($fileInfo, $fileData) = explode(';', $this->get('imageBase64'));
        $extension = explode('/', $fileInfo)[1];
        // $fileDataにある"base64,"を削除する
        list(, $fileData) = explode(',', $fileData);
        // base64をデコード
        $fileData = base64_decode($fileData);


        // ランダムなファイル名生成
        $fileName = md5(uniqid(rand(), true)). ".$extension";
        $this->image = $fileData;

        return $this->all();


    }

}
