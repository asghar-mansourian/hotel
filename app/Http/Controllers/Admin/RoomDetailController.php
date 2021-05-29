<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ValidatorRequest;
use App\Http\Requests\Admin\RoomDetailRequest;
use App\Project;
use App\ProjectRoom;
use App\RoomDetail;
use Illuminate\Http\Request;

class RoomDetailController extends Controller
{
    use ValidatorRequest;

    public function index()
    {
        $roomDetails = RoomDetail::paginate(RoomDetail::paginateNumber);

        return view('admin.room_details.index',compact('roomDetails'));

    }

    public function create()
    {
        $projects = Project::all();

        return view('admin.room_details.create',compact('projects'));
    }

    public function getProjectRoom()
    {
        $rooms = ProjectRoom::where('project_id',\request()->get('project'))->get();

        return response()->json([
            'rooms' => $rooms
        ],200);
    }

    public function store(Request $request)
    {
        $roomDetailRequest = new RoomDetailRequest();
        $validate = $this->validateRules($roomDetailRequest->rules(), $request);
        if ($validate != null)
            return $this->validateRules($roomDetailRequest->rules(), $request);
        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $format = $image->getClientOriginalExtension();

            $fileName = $image->getClientOriginalName();
            $fileName = substr($fileName, 0, strrpos($fileName, '.'));
            $fileName = str_replace(' ', '', $fileName);
            $Random_Number = rand(0, 9999);
            $name = $fileName . '-' . $Random_Number . '.' . $format;

            $destinationPath = public_path('/images/projects');
            $image->move($destinationPath, $name);
        }
        RoomDetail::create([
            'project_room_id' =>$request->room_id,
            'description' => $request->description,
            'description_ru' => $request->description_ru,
            'description_az' => $request->description_az,
            'picture' => $name
        ]);
        session()->flash('message', __('custom.roomDetail_message_create'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function edit($id)
    {
        $roomDetail = RoomDetail::find($id);

        $projects = Project::all();

        return view('admin.room_details.edit',compact('roomDetail','projects'));
    }

    public function update(Request $request,$id)
    {
        $roomDetailRequest = new RoomDetailRequest();
        $validate = $this->validateRules($roomDetailRequest->rules(), $request);
        if ($validate != null)
            return $this->validateRules($roomDetailRequest->rules(), $request);

        if ($request->hasFile('new_picture')) {
            $image = $request->file('new_picture');
            $format = $image->getClientOriginalExtension();

            $fileName = $image->getClientOriginalName();
            $fileName = substr($fileName, 0, strrpos($fileName, '.'));
            $fileName = str_replace(' ', '', $fileName);
            $Random_Number = rand(0, 9999);
            $name = $fileName . '-' . $Random_Number . '.' . $format;

            $destinationPath = public_path('/images/projects');
            $image->move($destinationPath, $name);
        }
        else{
            $name = $request->input('picture');
        }

        RoomDetail::findOrFail($id)->update([
            'project_room_id' =>$request->room_id,
            'description' => $request->description,
            'description_ru' => $request->description_ru,
            "description_az" => $request->description_az,
            'picture' => $name
        ]);
        session()->flash('message', __('custom.roomDetail_message_create'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function destroy($id)
    {
        $roomDetail = RoomDetail::findOrFail($id);
         if(public_path('/images/projects/'.$roomDetail->picture))
             unlink(public_path('/images/projects/'.$roomDetail->picture));
         $roomDetail->delete();
        session()->flash('message', __('custom.roomDetail_message_create'));
        session()->flash('success', 1);
        return back();
    }
}
