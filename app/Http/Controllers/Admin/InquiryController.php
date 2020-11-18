<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Member\ImageController;
use App\Http\Requests\Member\InquiryRequest;
use App\Inquiry;
use Illuminate\Http\Request;
use App\lib\Helpers;
class InquiryController extends Controller
{
    public function index()
    {
        $inquirys = Inquiry::where(
            'parent_id',null)->orderBy('seen')->orderBy('created_at','desc')->paginate(Inquiry::paginateNumber);
        return view('admin.inquiry.index')->with('inquirys',$inquirys);
    }

    public function show($id)
    {
        $inquiry = Inquiry::findorfail($id);
        $this->update($inquiry);
        $inquiry = $inquiry->parent_id?$inquiry->inquiry:$inquiry;
        return view('admin.inquiry.show')->with('inquiry',$inquiry);
    }

    public function store(InquiryRequest $request)
    {
        $image = new ImageController();
        $result = $request->file?Helpers::upload($request):'not_image';
        $inquiry = new Inquiry();
        $inquiry->title = $request->title?$request->title:null;
        $inquiry->user_id = auth()->user()->id;
        $inquiry->message = $request->message;
        $inquiry->parent_id = $request->parent_id?$request->parent_id : null;
        $inquiry->save();
        if($result != 'not_image'){
            $image->store($result,$inquiry);
        }

        request()->session()->flash('message', __('general.message.inquiry_create_successful'));
        request()->session()->flash('success', 1);
        return redirect()->route('admin_inquiry_show',$inquiry->parent_id);
    }
    public function update($inquiry)
    {
        if($inquiry->inquirys()->where('seen','not-seen')->count())
        {
            $inquiry->inquirys()->where('seen','not-seen')->where('user_id','!=',auth()->user()->id)->update([
                'seen' => 'seen'
            ]);
        }
        else{
            $inquiry->update([
                'seen' => 'seen'
            ]);
        }
    }

}
