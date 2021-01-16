<?php

namespace App\Http\Controllers\Web;

use App\HowWeWork;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HowWorkController extends Controller
{
    public function index()
    {
        $howWorks = HowWeWork::query()
            ->select($this->customSelectedFields())
            ->get();
        return view('web.how',compact('howWorks'));
    }

    public function customSelectedFields()
    {
        $locale = app()->getLocale();

        $description = app()->getLocale() !== 'en' ? "description_{$locale} as description" : 'description';
        $title = app()->getLocale() !== 'en' ? "title_{$locale} as title" : 'title';

        return [$title, $description, 'id'];
    }
}
