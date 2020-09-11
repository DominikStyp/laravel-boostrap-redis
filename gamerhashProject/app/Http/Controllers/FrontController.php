<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class FrontController extends Controller
{
    public function sectionOne(Request $request)
    {
        return view('sectionOne');
    }

    public function sectionTwo(Request $request)
    {
        return view('sectionTwo');
    }

    public function redis(Request $request)
    {
        if($request->has("clear")) {
            Redis::set("text_key", "");
        }
        if($request->has("text_key")) {
            $text = $request->get("text_key");
            $json = Redis::get("text_key");
            $decoded = json_decode($json);
            if(!is_array($decoded)){
                $encodedAgain =  json_encode([$text]);
                Redis::set("text_key", $encodedAgain);
            } else {
                $decoded[] = $text;
                $encodedAgain = json_encode($decoded);
                Redis::set("text_key", $encodedAgain);
            }
            return response( $encodedAgain );
        }
        return response( Redis::get("text_key") );
    }
}
