<?php

namespace App\Http\Controllers\Api\V1;

use App\Basket;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Member\CrawlerWebsiteController;
use App\Http\Resources\V1\Crawler as CrawlerResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrawlerController extends Controller
{
    public function get(Request $request)
    {

        $crawel_model = new CrawlerWebsiteController();
        $product = $crawel_model->getAll($request->link);
        if (!$product)
            return response()->json([
                'message' => 'the product not found'
            ] , 404);
        return CrawlerResource::make($product);
    }
}

