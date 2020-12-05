<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Ltm_Translation;

class TranslateController extends Controller
{
    public function getTranslate($locale)
    {
        $collections = collect([]);
        $translates = Ltm_Translation::query()
            ->where('locale',$locale)
            ->select('key','value')
            ->get();
        foreach ($translates as $translate){
            $collections->put($translate['key'],$translate['value']);
        }
        return response()
            ->json(['data' => $collections]);
    }
}
