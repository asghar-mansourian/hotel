<?php

namespace App\Http\Controllers\Member\Inquiry;

use App\Http\Controllers\Controller;
use App\Http\Requests\Member\InquiryRequest;
use App\Inquiry;
use App\lib\Helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Member\ImageController;
use Illuminate\Support\Str;
class InquiryController extends Controller
{
    public function index()
    {
        $inquirys = Inquiry::where([
            'user_id' => auth()->user()->id,
            'parent_id' => null
        ])->orderBy('created_at','desc')->paginate(Inquiry::paginateNumber);
        return view('members.inquiry.index')->with('inquirys', $inquirys);
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

        if($inquiry->parent_id){
            request()->session()->flash('message', __('general.message.inquiry_create_successful'));
            request()->session()->flash('success', 1);
            return redirect()->route('inquiry_show',$inquiry->parent_id);
        }

        request()->session()->flash('message', __('general.message.inquiry_create_successful'));
        request()->session()->flash('success', 1);
        return redirect()->route('inquiry');
    }

    public function show($id)
    {
        $inquiry = Inquiry::findOrfail($id);
        if($inquiry->user_id == auth()->user()->id){
            if($inquiry->parent_id){
                abort(404, 'Page not found');
            }
            $this->update($inquiry);
            return view('members.inquiry.show')->with('inquiry',$inquiry);
        }
        abort(404, 'Page not found');
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
