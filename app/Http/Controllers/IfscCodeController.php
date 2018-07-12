<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Guzzle\Http\Client;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use DB;
class IfscCodeController extends BaseController
{
   public function index()
   {
   	return view('ifsccode');
   }

   public function findifsc()
   {
   		$ifsc = Input::get('ifsccode', false);
   		$response = Curl::to('https://api.techm.co.in/api/v1/ifsc/'.$ifsc)
   		->asJson()
        ->get();
        $ifscdata = $response->data;
        return view('ifsccode')->with([
        	"ifsc" => $ifsc,
        	"ifscdata" => $ifscdata,
        ]);
        
   }
}