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
class HomeController extends BaseController
{
   	public function bankFirstPage()
   	{
   		$bank = DB::table('bank_details')->select('bank_name')->distinct()->get();
   		return view('ifschome')->with([
   			"banks"=>$bank
   		]);
   	}
   	public function bank()
   	{

   		$bank = Input::get('bank', false);
   		$state = Input::get('state', false);
   		$district = Input::get('district', false);
   		$city = Input::get('city', false);
   		$branch = Input::get('branch', false);
   		if($bank != null){
   			if($state != null){
   				if($district != null){
   					if($city!=null){
   						if($branch != null){
   							return Redirect::to('banks/'.$bank.'/'.$state.'/'.$district.'/'.$city.'/'.$branch);	
   						}
   						return Redirect::to('banks/'.$bank.'/'.$state.'/'.$district.'/'.$city);	
   					}
   					return Redirect::to('banks/'.$bank.'/'.$state.'/'.$district);	
   				}
   				return Redirect::to('banks/'.$bank.'/'.$state);
   			}
   			return Redirect::to('banks/'.$bank);
   		}
   	
   		
   	}
   	public function bankLastPage($selectedbankname)
   	{
   		
  		   $bank = DB::table('bank_details')->select('bank_name')->distinct()->get();

        $states = DB::table('bank_details')->where('bank_name','=', str_replace('_', ' ', $selectedbankname))->select('bank_state')->distinct()->get();
   		return view('ifschome')->with([
   			"banks"=>$bank,
   			"states"=>$states,
   			"selectbank"=>$selectedbankname
   		]); 		
   	}
   	public function stateLastPage($selectedbank,$selectstate)
   	{	
   		  $bank = DB::table('bank_details')->select('bank_name')->distinct()->get();
        $states = DB::table('bank_details')->where('bank_name','=', str_replace('_', ' ', $selectedbank))->select('bank_state')->distinct()->get();
        $district = DB::table('bank_details')->where([['bank_name','=', str_replace('_', ' ', $selectedbank)],['bank_state','=', str_replace('_', ' ', $selectstate)]])->select('bank_district')->distinct()->get();

        return view('ifschome')->with([
        	"banks"=>$bank,
   			"states"=>$states,
   			"selectbank"=>$selectedbank,
   			"selectstate" => $selectstate,
        	"districts" => $district
        ]);
   		
   	}

   	public function districtLastPage($selectbank,$selectstate,$selectdistrict)
   	{
   		   $bank = DB::table('bank_details')->select('bank_name')->distinct()->get();
        $states = DB::table('bank_details')->where('bank_name','=', str_replace('_', ' ', $selectbank))->select('bank_state')->distinct()->get();
        $district = DB::table('bank_details')->where([['bank_name','=', str_replace('_', ' ', $selectbank)],['bank_state','=', str_replace('_', ' ', $selectstate)]])->select('bank_district')->distinct()->get();
        $district = DB::table('bank_details')->where([['bank_name','=', str_replace('_', ' ', $selectbank)],['bank_state','=', str_replace('_', ' ', $selectstate)]])->select('bank_district')->distinct()->get();
        $cities = DB::table('bank_details')->where([['bank_name','=', str_replace('_', ' ', $selectbank)],['bank_state','=', str_replace('_', ' ', $selectstate)],['bank_district','=', str_replace('_', ' ', $selectdistrict)]])->select('bank_city')->distinct()->get();

      //  dd($cities);
        return view('ifschome')->with([
        	"banks"=>$bank,
   			"states"=>$states,
   			"selectbank"=>$selectbank,
   			"selectstate" => $selectstate,
        	"districts" => $district,
        	"selectdistrict" => $selectdistrict,
        	"cities" => $cities
        ]);				
   	}
   	public function cityLastPage($selectbank,$selectstate,$selectdistrict,$selectcity)
   	{
   		  $bank = DB::table('bank_details')->select('bank_name')->distinct()->get();
        $states = DB::table('bank_details')->where('bank_name','=', str_replace('_', ' ', $selectbank))->select('bank_state')->distinct()->get();
        $district = DB::table('bank_details')->where([['bank_name','=', str_replace('_', ' ', $selectbank)],['bank_state','=', str_replace('_', ' ', $selectstate)]])->select('bank_district')->distinct()->get();
        $district = DB::table('bank_details')->where([['bank_name','=', str_replace('_', ' ', $selectbank)],['bank_state','=', str_replace('_', ' ', $selectstate)]])->select('bank_district')->distinct()->get();
        $cities = DB::table('bank_details')->where([['bank_name','=', str_replace('_', ' ', $selectbank)],['bank_state','=', str_replace('_', ' ', $selectstate)],['bank_district','=', str_replace('_', ' ', $selectdistrict)]])->select('bank_city')->distinct()->get();
        $branchs = DB::table('bank_details')->where([['bank_name','=', str_replace('_', ' ', $selectbank)],['bank_state','=', str_replace('_', ' ', $selectstate)],['bank_district','=', str_replace('_', ' ', $selectdistrict)],['bank_city','=', str_replace('_', ' ', $selectcity)]])->select('bank_branch')->distinct()->get();
        return view('ifschome')->with([
        	"banks"=>$bank,
     			"states"=>$states,
     			"selectbank"=>$selectbank,
     			"selectstate" => $selectstate,
        	"districts" => $district,
        	"selectdistrict" => $selectdistrict,
        	"cities" => $cities,
        	"selectcity" => $selectcity,
        	"branchs" => $branchs,
        ]);				
   	}
   	public function branchLastPage($selectbank,$selectstate,$selectdistrict,$selectcity,$selectbranch)
   	{
   		  $bank = DB::table('bank_details')->select('bank_name')->distinct()->get();
       // $bank = $bankresponse->data;
        $states = DB::table('bank_details')->where('bank_name','=', str_replace('_', ' ', $selectbank))->select('bank_state')->distinct()->get();
        $district = DB::table('bank_details')->where([['bank_name','=', str_replace('_', ' ', $selectbank)],['bank_state','=', str_replace('_', ' ', $selectstate)]])->select('bank_district')->distinct()->get();
        $district = DB::table('bank_details')->where([['bank_name','=', str_replace('_', ' ', $selectbank)],['bank_state','=', str_replace('_', ' ', $selectstate)]])->select('bank_district')->distinct()->get();
        $cities = DB::table('bank_details')->where([['bank_name','=', str_replace('_', ' ', $selectbank)],['bank_state','=', str_replace('_', ' ', $selectstate)],['bank_district','=', str_replace('_', ' ', $selectdistrict)]])->select('bank_city')->distinct()->get();
        $branchs = DB::table('bank_details')->where([['bank_name','=', str_replace('_', ' ', $selectbank)],['bank_state','=', str_replace('_', ' ', $selectstate)],['bank_district','=', str_replace('_', ' ', $selectdistrict)],['bank_city','=', str_replace('_', ' ', $selectcity)]])->select('bank_branch')->distinct()->get();
      	$ifscresponse = Curl::to('https://api.techm.co.in/api/getbank/'.str_replace('_', '%20', $selectbank).'/'.str_replace('_', '%20', $selectbranch))
   		 	->asJson()
        	->get();
        $ifscdata = $ifscresponse->data;
       
        return view('ifschome')->with([
        	"banks"=>$bank,
     			"states"=>$states,
     			"selectbank"=>$selectbank,
     			"selectstate" => $selectstate,
        	"districts" => $district,
        	"selectdistrict" => $selectdistrict,
        	"cities" => $cities,
        	"selectcity" => $selectcity,
        	"branchs" => $branchs,
        	"selectbranch" => $selectbranch,
          "ifscdata" => $ifscdata
        ]);				
   	}

    public function getbanks()
    {
      return DB::table('bank_details')->select('bank_name')->distinct()->get();
    }
}
