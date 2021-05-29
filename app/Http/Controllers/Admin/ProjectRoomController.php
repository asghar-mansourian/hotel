<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Member\ImageController;
use App\Http\Controllers\Traits\ValidatorRequest;
use App\Http\Requests\Admin\RoomRequest;
use App\Image;
use App\Project;
use App\ProjectRoom;
use Illuminate\Http\Request;

class ProjectRoomController extends Controller
{
    use ValidatorRequest;

    public function index()
    {
        $projectRooms = ProjectRoom::paginate(ProjectRoom::paginateNumber);

        return view('admin.project_rooms.index',compact('projectRooms'));
    }

    public function create()
    {
        $projects = Project::all();

        return view('admin.project_rooms.create',compact('projects'));
    }

    public function store(Request $request)
    {
        $roomValidate = new RoomRequest();
        $validate = $this->validateRules($roomValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($roomValidate->rules(), $request);
        $projectRoom = new ProjectRoom();
        $projectRoom->project_id = $request->project_id;
        $projectRoom->name = $request->name;
        $projectRoom->name_ru = $request->name_ru;
        $projectRoom->name_az = $request->name_az;
        $projectRoom->save();

        session()->flash('message', __('custom.room_message_create'));
        session()->flash('success', 1);
        return response()->json([],200);
    }

    public function edit($id)
    {
        $projectRoom = ProjectRoom::findOrFail($id);

        $projects = Project::all();

        return view('admin.project_rooms.edit',compact('projectRoom','projects'));
    }

    public function update(Request $request,$id)
    {
        $roomValidate = new RoomRequest();
        $validate = $this->validateRules($roomValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($roomValidate->rules(), $request);
        $projectRoom = ProjectRoom::find($id);
        $projectRoom->update([
            'project_id' => $request->project_id,
            'name' => $request->name,
            'name_ru' => $request->name_ru,
            'name_az' => $request->name_az,
        ]);

        session()->flash('message', __('custom.room_message_update'));
        session()->flash('success', 1);
        return response()->json([],200);
    }

    public function destroy($id)
    {
        $projectRoom = ProjectRoom::findOrFail($id);

        $projectRoom->delete();

        session()->flash('message', __('custom.room_message_delete'));
        session()->flash('success', 1);
        return back();
    }


}
