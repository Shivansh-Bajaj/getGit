<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Log;

class mainController extends Controller
{
    public function index() {
   		return view('home');
    }

    public function search(Request $request) {

    	error_log('Display this on the screen');
    	$base_url = "https://api.github.com/search/users?q=";
    	$client = new Client();
    	$name = $request->input('name');
    	$language = $request->input('language');
    	if($name != "") {
    		$base_url = $base_url.$name;
    	}
    	if($language != "" || $language != Null) {
    		$base_url = $base_url."language:".$name;
    	}
		$res = $client->get($base_url);
		$data = null;
		$error = null;
		Log::info("this is log");
		if($res->getStatusCode() != '200'){
			$error = "sorry no data found";
        	return response()->json(array('error'=>$error, 'message'=>'error with api','success'=>false), 201);

		} else {
			$data = $res->getBody()->getContents();
			$error = null;
			$data = (array) json_decode($data);
			$message = "";
			if($data['total_count']<1) {
				$message = 'no result found';
			}
			return response()->json(array('data'=>$data['items'], 'message'=>$message,'success'=>true), 201);
		}
	}
}
