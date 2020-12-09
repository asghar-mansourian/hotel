<?php

namespace App\Http\Controllers\Member;

use App\CrawlerWebsite;
use App\Http\Controllers\Controller;
use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CrawlerWebsiteController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'link' => 'required|url'
        ]);
        $result = $this->checkExistLink($request->link);
        if($result)
            return response()->json(['price' => str_replace(' TL','',$result->price)]);
        return response()->json(['status' => 'error','message' => 'Check link!'],500);
    }

    public function checkExistLink($link)
    {
        $result = CrawlerWebsite::where('link',$link)->first();
        if($result)
            return $result;
        return $this->crawler($link);
    }

    public function crawler($link)
    {
        try {
            $client = new Client();
            $crawler = $client->request('GET', $link,['timeout' => 800]);
            if(strpos($link, 'www.boyner.com.tr')){
                $name = 'www.boyner.com.tr';
                $price = $crawler->filter('.price-payable')->first()->text();
                $image = $crawler->filter('.zoom')->first()->filter('img')->attr('data-lazy');
                $image = str_replace('"','',$image);
                $imageName = Str::random(40).'.jpg';
                copy($image,public_path('/images/'.$imageName));
            }
            else{
                $name = 'www.trendyol.com';
                $price = $crawler->filter('.prc-dsc')->first()->text();
                $image = $crawler->filter('.slick-current')->eq(1)->filter('img')->attr('src');
                $image = str_replace('"','',$image);
                $imageName = Str::random(40).'.jpg';
                copy($image,public_path('/images/'.$imageName));
                $price = str_replace(',','.',$price);
            }
            $crawlerWebsit = new CrawlerWebsite();
            $crawlerWebsit->link =$link;
            $crawlerWebsit->name =$name;
            $crawlerWebsit->price =$price;
            $crawlerWebsit->photo =$imageName;
            $crawlerWebsit->save();
            return  $crawlerWebsit;
        }
        catch (\Throwable  $e){
            return false;
        }
    }

}
