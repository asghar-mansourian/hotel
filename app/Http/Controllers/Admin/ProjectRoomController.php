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

        Image::where('imageable_id',0)->update(['imageable_id'=>$projectRoom->id]);

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

        foreach ($projectRoom->image as $image)
            if(file_exists(public_path("/images/projects/$image->file_name")))
                unlink(public_path("/images/projects/$image->file_name"));

        $projectRoom->image->delete();
        $projectRoom->delete();
        session()->flash('message', __('custom.room_message_delete'));
        session()->flash('success', 1);
        return back();
    }

    public function addPicture(Request $request)
    {
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $format = $image->getClientOriginalExtension();

            $fileName = $image->getClientOriginalName();
            $fileName = substr($fileName, 0, strrpos($fileName, '.'));
            $fileName = str_replace(' ', '', $fileName);
            $Random_Number = rand(0, 9999);
            $name = $fileName . '-' . $Random_Number . '.' . $format;

            $destinationPath = public_path('/images/projects');
            $image->move($destinationPath, $name);
        }
        //store room pic name and edit imageable_id after save room by room id
        $image = new Image();
        $image->file_name = $name;
        $image->imageable_id = 0;//this id Temporary and change after save room
        $image->imageable_type = 'App\ProjectRoom';
        $image->save();

        return response()->json(['id',$image->id],200);
    }

}
