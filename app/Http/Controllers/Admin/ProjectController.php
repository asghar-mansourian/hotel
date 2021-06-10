<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Member\ImageController;
use App\Http\Controllers\Traits\ValidatorRequest;
use App\Http\Requests\Admin\ProjectCreateRequest;
use App\Http\Requests\Admin\ProjectUpdateRequest;
use App\Image;
use App\Project;
use App\ProjectRoom;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    use ValidatorRequest;

    public function index()
    {
        $projects = Project::paginate(Project::paginateNumber);

        return view('admin.projects.index',compact('projects'));

    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $projectValidate = new ProjectCreateRequest();
        $validate = $this->validateRules($projectValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($projectValidate->rules(), $request);
        if ($request->hasFile('indicator_picture')) {
            $image = $request->file('indicator_picture');
            $format = $image->getClientOriginalExtension();

            $fileName = $image->getClientOriginalName();
            $fileName = substr($fileName, 0, strrpos($fileName, '.'));
            $fileName = str_replace(' ', '', $fileName);
            $Random_Number = rand(0, 9999);
            $name = $fileName . '-' . $Random_Number . '.' . $format;

            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
        }
        if ($request->hasFile('indicator_picture')) {
            $image = $request->file('up_indicator_picture');
            $format = $image->getClientOriginalExtension();

            $fileName = $image->getClientOriginalName();
            $fileName = substr($fileName, 0, strrpos($fileName, '.'));
            $fileName = str_replace(' ', '', $fileName);
            $Random_Number = rand(0, 9999);
            $up_name = $fileName . '-' . $Random_Number . '.' . $format;

            $destinationPath = public_path('/images');
            $image->move($destinationPath, $up_name);
        }
        if ($request->hasFile('small_index_picture')) {
            $image = $request->file('small_index_picture');
            $format = $image->getClientOriginalExtension();

            $fileName = $image->getClientOriginalName();
            $fileName = substr($fileName, 0, strrpos($fileName, '.'));
            $fileName = str_replace(' ', '', $fileName);
            $Random_Number = rand(0, 9999);
            $smallIndexImage = $fileName . '-' . $Random_Number . '.' . $format;

            $destinationPath = public_path('/images');
            $image->move($destinationPath, $smallIndexImage);
        }
        Project::create([
            'name' => $request->name,
            'name_ru' => $request->name_ru,
            'name_az' => $request->name_az,
            'title' => $request->title,
            'title_ru' => $request->title_ru,
            'title_az' => $request->title_az,
            'description' => $request->description,
            'description_ru' => $request->description_ru,
            'description_az' => $request->description_az,
            'telephone' => $request->telephone,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'address_ru' => $request->address_ru,
            'address_az' => $request->address_az,
            'status' => $request->status,
            'google_map_address' => $request->google_map_address,
            'indicator_picture' => $name,
            'up_indicator_picture' => $up_name,
            'small_index_image ' => $smallIndexImage,
            'min_address' => $request->min_address,
            'min_address_ru' => $request->min_address_ru,
            'min_address_az' => $request->min_address_az,
            'walk' => $request->walk,
            'walk_ru' => $request->walk_ru,
            'walk_az' => $request->walk_az,
            'empty_room' => $request->empty_room,
            'empty_room_ru' => $request->empty_room_ru,
            'empty_room_az' => $request->empty_room_az,
        ]);
        session()->flash('message', __('custom.project.message.create'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);

        return view('admin.projects.edit',compact('project'));
    }

    public function update($id,Request $request)
    {
        $project = Project::findOrFail($id);
        $projectValidate = new ProjectUpdateRequest();
        $validate = $this->validateRules($projectValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($projectValidate->rules(), $request);
        if ($request->hasFile('new_indicator_picture')) {
            $image = $request->file('new_indicator_picture');
            $format = $image->getClientOriginalExtension();

            $fileName = $image->getClientOriginalName();
            $fileName = substr($fileName, 0, strrpos($fileName, '.'));
            $fileName = str_replace(' ', '', $fileName);
            $Random_Number = rand(0, 9999);
            $name = $fileName . '-' . $Random_Number . '.' . $format;

            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
        }
        else{
            $name = $request->indicator_picture;
        }
        if ($request->hasFile('new_up_indicator_picture')) {
            $image = $request->file('new_up_indicator_picture');
            $format = $image->getClientOriginalExtension();

            $fileName = $image->getClientOriginalName();
            $fileName = substr($fileName, 0, strrpos($fileName, '.'));
            $fileName = str_replace(' ', '', $fileName);
            $Random_Number = rand(0, 9999);
            $up_name = $fileName . '-' . $Random_Number . '.' . $format;

            $destinationPath = public_path('/images');
            $image->move($destinationPath, $up_name);
        }
        else{
            $up_name = $request->up_indicator_picture;
        }
        if ($request->hasFile('new_small_index_picture')) {
            $image = $request->file('new_small_index_picture');
            $format = $image->getClientOriginalExtension();

            $fileName = $image->getClientOriginalName();
            $fileName = substr($fileName, 0, strrpos($fileName, '.'));
            $fileName = str_replace(' ', '', $fileName);
            $Random_Number = rand(0, 9999);
            $smallIndexPicture = $fileName . '-' . $Random_Number . '.' . $format;

            $destinationPath = public_path('/images');
            $image->move($destinationPath, $smallIndexPicture);
        }
        else{
            $smallIndexPicture = $request->small_index_picture;
        }
        $project->update([
            'name' => $request->name,
            'name_ru' => $request->name_ru,
            'name_az' => $request->name_az,
            'title' => $request->title,
            'title_ru' => $request->title_ru,
            'title_az' => $request->title_az,
            'description' => $request->description,
            'description_ru' => $request->description_ru,
            'description_az' => $request->description_az,
            'telephone' => $request->telephone,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'address_ru' => $request->address_ru,
            'address_az' => $request->address_az,
            'status' => $request->status,
            'google_map_address' => $request->google_map_address,
            'indicator_picture' => $name,
            'up_indicator_picture' => $up_name,
            'small_index_image' => $smallIndexPicture,
            'min_address' => $request->min_address,
            'min_address_ru' => $request->min_address_ru,
            'min_address_az' => $request->min_address_az,
            'walk' => $request->walk,
            'walk_ru' => $request->walk_ru,
            'walk_az' => $request->walk_az,
            'empty_room' => $request->empty_room,
            'empty_room_ru' => $request->empty_room_ru,
            'empty_room_az' => $request->empty_room_az,
        ]);
        session()->flash('message', __('custom.project_update_success'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function editPicture()
    {
        $projects = Project::all();

        $selectedProject = Project::findOrFail(\request()->get('id'));

        return view('admin.projects.add_picture',compact('projects','selectedProject'));
    }

    public function storeProjectSlider(Request $request)
    {
        if($request->project_id)
            $relation = Project::findOrFail($request->project_id);
        else
            $relation = ProjectRoom::findOrFail($request->room_id);
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
        //store project address in image morph table
        $image = (new ImageController())->store($name,$relation);
        return response()->json(['id',$image->id],200);
    }

    public function destroyProjectSlider(Request $request)
    {
        $image = Image::findOrFail($request->id);

        if(file_exists(public_path("/images/projects/$image->file_name")))
            unlink(public_path("/images/projects/$image->file_name"));
        $image->delete();
        return response()->json([],200);
    }
}
