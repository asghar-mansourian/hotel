<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        if(\request()->get('status')=='finished')
            $projects = Project::select($this->customSelectedFields())->where('status',Project::STATUS_FINISHED)->get();
        else
            $projects = Project::select($this->customSelectedFields())->where('status',Project::STATUS_UNFINISHED)->get();

        return view('web.projects',compact('projects'));
    }
    public function customSelectedFields()
    {
        $locale = app()->getLocale();

        $name = app()->getLocale() !== 'en' ? "name_{$locale} as name" : 'name';

        $title = app()->getLocale() !== 'en' ? "title_{$locale} as title" : 'title';

        $address = app()->getLocale() !== 'en' ? "address_{$locale} as address" : 'address';

        $description = app()->getLocale() !== 'en' ? "description_{$locale} as description" : 'description';

        return [$name,$title,$address,$description,'id','up_indicator_picture','indicator_picture','google_map_address','telephone','mobile'];
    }

    public function single($id)
    {
        $project = Project::select($this->customSelectedFields())->where('id',$id)->first();

        if($project)
            return view('web.single_project',compact('project'));
        else
            abort(404);

    }
}
