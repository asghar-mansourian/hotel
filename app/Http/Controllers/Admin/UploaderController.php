<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Member\Arvan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UploaderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read Uploader|edit Uploader|create Uploader|delete Uploader']);
    }


    public function imageUploaderIndex()
    {
        return view('admin.uploader.imageUploader');
    }

    public function imageUploaderStore(Request $request, $type)
    {
        $errors = null;

        $rules = [
            'photo_name' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $messages = [
            'photo_name.required' => 'لطفا تصویر را انتخاب کنید',
            'photo_name.image' => 'فایل باید از نوع تصویر باشد',
            'photo_name.mimes' => 'فرمت فایل باید jpg یا png  باشد',
            'photo_name.max' => 'حجم فایل نباید بیشتر از 2 مگابایت باشد',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {

            $errors = $validator->errors()->all();
            return \response()->json(['error' => $errors], 401);
        }
        if ($request->hasFile('photo_name')) {
            $image = $request->file('photo_name');
            $format = $image->getClientOriginalExtension();
            $size = $this->formatSizeUnits($image->getSize());

            $fileName = $image->getClientOriginalName();
            $fileName = substr($fileName, 0, strrpos($fileName, '.'));
            $fileName = str_replace(' ', '', $fileName);
            $Random_Number = rand(0, 9999);
            $name = $fileName . '-' . $Random_Number . '.' . $format;


//            $name = time() . '.' . $image->getClientOriginalExtension();


            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);

            DB::table('medias')
                ->insert([
                    "file" => $name,
                    "format" => $format,
                    "size" => $size,
                    "section" => $type,
                    "type" => 'image',
                ]);
            return \response()->json([
                "pic" => $name,
                "format" => $format,
                "size" => $size,
            ], 200);
        }
    }

    public function imagesUploaderIndex()
    {
        return view('admin.uploader.imagesUploader');
    }

    public function filesUploaderIndex()
    {
        return view('admin.uploader.filesUploader');
    }

    public function fileUploaderStore(Request $request , $type)
    {
        $errors = null;

        $rules = [
            'file_name' => 'required|mimes:mp4,doc,pdf,jpeg,png,jpg,gif,svg|max:500000',
        ];

        $messages = [
            'file_name.required' => 'لطفا فایل را انتخاب کنید',
            'file_name.file' => 'فایل باید از نوع فایل باشد',
            'file_name.mimes' => 'فرمت فایل باید pdf یا doc  باشد',
            'file_name.max' => 'حجم فایل نباید بیشتر از 50 مگابایت باشد',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {

            $errors = $validator->errors()->all();
            return \response()->json(['error' => $errors], 401);
        }


        if ($request->hasFile('file_name')) {
            $image = $request->file('file_name');
            $format = $image->getClientOriginalExtension();
            $size = $this->formatSizeUnits($image->getSize());

            $fileName = $image->getClientOriginalName();
            $fileName = substr($fileName, 0, strrpos($fileName, '.'));
            $fileName = str_replace(' ', '', $fileName);
            $Random_Number = rand(0, 9999);
            $name = $fileName . '-' . $Random_Number . '.' . $format;

            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);

            DB::table('medias')
                ->insert([
                    "file" => $name,
                    "format" => $format,
                    "size" => $size,
                    "section" => $type,
                    "type" => 'file',
                ]);

            return \response()->json([
                "pic" => $name,
                "format" => $format,
                "size" => $size,

            ], 200);
        }
    }

    public function videoUploaderStore(Request $request)
    {
        $errors = null;

        $rules = [
            'file_name' => 'required|mimes:mp4|max:500000',
        ];

        $messages = [
            'file_name.required' => 'لطفا فایل را انتخاب کنید',
//            'file_name.file' => 'فایل باید از نوع فایل باشد',
            'file_name.mimes' => 'فرمت فایل باید pdf یا doc  باشد',
            'file_name.max' => 'حجم فایل نباید بیشتر از 50 مگابایت باشد',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {

            $errors = $validator->errors()->all();
            return \response()->json(['error' => $errors], 401);
        }


        if ($request->hasFile('file_name')) {
            $image = $request->file('file_name');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $format = $image->getClientOriginalExtension();
            $size = $this->formatSizeUnits($image->getSize());

            $destinationPath = public_path('/media');
            $image->move($destinationPath, $name);
            $arvan = new Arvan();
            $nameId = $arvan->storeVideo($name);

            return \response()->json([
                "pic" => $nameId,
                "format" => $format,
                "size" => $size,

            ], 200);
        }
    }

    public function ckeditorUploader(Request $request)
    {
        $CKEditor = $request->input('CKEditor');
        $funcNum = $request->input('CKEditorFuncNum');
        $message = $url = '';
        $file_param = $request->file('upload');
        $format = $file_param->getClientOriginalExtension();
        $size = $this->formatSizeUnits($file_param->getSize());
        $fileName = $file_param->getClientOriginalName();
        $fileName = substr($fileName, 0, strrpos($fileName, '.'));
        $fileName = str_replace(' ', '', $fileName);
        $Random_Number = rand(0, 9999);
        $name_file_new = $fileName . '-' . $Random_Number . '.' . $file_param->guessClientExtension();
        //$thumb_img = Image::make($file->getRealPath())->resize(100, 100);
        $destinationPath = 'images/';
        $file_param->move($destinationPath, $name_file_new);
        $url = 'images/' . $name_file_new;
        $url = asset($url);
        return '<script>window.parent.CKEDITOR.tools.callFunction(' . $funcNum . ', "' . $url . '", "' . $message . '")</script>';
    }

    public function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
    }


}
