<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Jenssegers\Agent\Facades\Agent;
use Stevebauman\Location\Facades\Location;
use Symfony\Component\HttpFoundation\Response;
use App\Models\TrackingData;

class TrackingController extends Controller
{
    public function track(Request $request) {
        $url = $request->input("url");
        if(empty($url)) {
            return response()->json(["error" => "Need 'url' query Parameter"], Response::HTTP_BAD_REQUEST);
        }
        $data = new TrackingData();
        $data->timestamp = now()->setTimezone('Europe/Berlin');
        $data->ipAddress = $request->ip();
        $location = Location::get($request->ip());
        if($location) {
            $data->location = $location->cityName;
        }
        $data->os = Agent::platform();
        $data->device = Agent::device();
        $data->url = $url;
        $data->referrer = $request->header('referer');
        $data->language = $request->getPreferredLanguage();
        $data->save();
        return Redirect::away($url);
    }
}
