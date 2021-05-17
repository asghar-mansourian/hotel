<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ValidatorRequest;
use App\Http\Requests\Admin\ProjectCreateRequest;
use App\Http\Requests\Admin\ProjectUpdateRequest;
use App\Project;
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
           'up_indicator_picture' => $up_name
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
            'up_indicator_picture' => $up_name
        ]);
        session()->flash('message', __('custom.project_update_success'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }
}
