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
   		$bank = DB::table('bank_details')->select('bank_name')->distinct()->orderBy('bank_name', 'ASC')->get();
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
  		  $bank = DB::table('bank_details')->select('bank_name')->orderBy('bank_name', 'ASC')->distinct()->get();
        $states = DB::table('bank_details')->where('bank_name','=', str_replace('_', ' ', $selectedbankname))->select('bank_state')->orderBy('bank_state', 'ASC')->distinct()->get();
        $paginationstate = DB::table('bank_details')->where('bank_name','=',str_replace('_', ' ', $selectedbankname))->paginate(4);
   		return view('ifschome')->with([
   			"banks"=>$bank,
   			"states"=>$states,
   			"selectbank"=>$selectedbankname,
        "paginateTables" => $paginationstate,
   		]); 		
   	}
   	public function stateLastPage($selectedbank,$selectstate)
   	{	
   		  $bank = DB::table('bank_details')->select('bank_name')->orderBy('bank_name', 'ASC')->distinct()->get();

        $states = DB::table('bank_details')->where('bank_name','=', str_replace('_', ' ', $selectedbank))->select('bank_state')->distinct()->orderBy('bank_state', 'ASC')->get();

        $district = DB::table('bank_details')->where([['bank_name','=', str_replace('_', ' ', $selectedbank)],['bank_state','=', str_replace('_', ' ', $selectstate)]])->select('bank_district')->distinct()->orderBy('bank_district', 'ASC')->get();

       $paginatedistrict = DB::table('bank_details')->where([['bank_name','=', str_replace('_', ' ', $selectedbank)],['bank_state','=', str_replace('_', ' ', $selectstate)]])->paginate(4);
        return view('ifschome')->with([
        	"banks"=>$bank,
   			  "states"=>$states,
   			  "selectbank"=>$selectedbank,
   			  "selectstate" => $selectstate,
        	"districts" => $district,
          "paginateTables" => $paginatedistrict,
        ]);
   		
   	}

   	public function districtLastPage($selectbank,$selectstate,$selectdistrict)
   	{
   		   $bank = DB::table('bank_details')->select('bank_name')->orderBy('bank_name', 'ASC')->distinct()->get();

        $states = DB::table('bank_details')->where('bank_name','=', str_replace('_', ' ', $selectbank))->select('bank_state')->distinct()->get();

        $district = DB::table('bank_details')->where([['bank_name','=', str_replace('_', ' ', $selectbank)],['bank_state','=', str_replace('_', ' ', $selectstate)]])->select('bank_district')->distinct()->orderBy('bank_district', 'ASC')->get();

        $cities = DB::table('bank_details')->where([['bank_name','=', str_replace('_', ' ', $selectbank)],['bank_state','=', str_replace('_', ' ', $selectstate)],['bank_district','=', str_replace('_', ' ', $selectdistrict)]])->select('bank_city')->orderBy('bank_city', 'ASC')->distinct()->get();

        $paginatecity = DB::table('bank_details')->where([['bank_name','=', str_replace('_', ' ', $selectbank)],['bank_state','=', str_replace('_', ' ', $selectstate)],['bank_district','=', str_replace('_', ' ', $selectdistrict)]])->paginate(4);
        return view('ifschome')->with([
        	"banks"=>$bank,
     			"states"=>$states,
     			"selectbank"=>$selectbank,
     			"selectstate" => $selectstate,
        	"districts" => $district,
        	"selectdistrict" => $selectdistrict,
        	"cities" => $cities,
          "paginateTables"=>$paginatecity
        ]);				
   	}
   	public function cityLastPage($selectbank,$selectstate,$selectdistrict,$selectcity)
   	{
   		  $bank = DB::table('bank_details')->select('bank_name')->orderBy('bank_name', 'ASC')->distinct()->get();

        $states = DB::table('bank_details')->where('bank_name','=', str_replace('_', ' ', $selectbank))->select('bank_state')->distinct()->get();

        $district = DB::table('bank_details')->where([['bank_name','=', str_replace('_', ' ', $selectbank)],['bank_state','=', str_replace('_', ' ', $selectstate)]])->select('bank_district')->distinct()->orderBy('bank_district', 'ASC')->get();

        $cities = DB::table('bank_details')->where([['bank_name','=', str_replace('_', ' ', $selectbank)],['bank_state','=', str_replace('_', ' ', $selectstate)],['bank_district','=', str_replace('_', ' ', $selectdistrict)]])->select('bank_city')->orderBy('bank_city', 'ASC')->distinct()->get();

        $branchs = DB::table('bank_details')->where([['bank_name','=', str_replace('_', ' ', $selectbank)],['bank_state','=', str_replace('_', ' ', $selectstate)],['bank_district','=', str_replace('_', ' ', $selectdistrict)],['bank_city','=', str_replace('_', ' ', $selectcity)]])->select('bank_branch')->orderBy('bank_branch', 'ASC')->distinct()->get();

        $paginatebranch = DB::table('bank_details')->where([['bank_name','=', str_replace('_', ' ', $selectbank)],['bank_state','=', str_replace('_', ' ', $selectstate)],['bank_district','=', str_replace('_', ' ', $selectdistrict)],['bank_city','=', str_replace('_', ' ', $selectcity)]])->paginate(4);
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
          "paginateTables" => $paginatebranch
        ]);				
   	}
   	public function branchLastPage($selectbank,$selectstate,$selectdistrict,$selectcity,$selectbranch)
   	{
   		  $bank = DB::table('bank_details')->select('bank_name')->orderBy('bank_name', 'ASC')->distinct()->get();

        $states = DB::table('bank_details')->where('bank_name','=', str_replace('_', ' ', $selectbank))->select('bank_state')->distinct()->get();

        $district = DB::table('bank_details')->where([['bank_name','=', str_replace('_', ' ', $selectbank)],['bank_state','=', str_replace('_', ' ', $selectstate)]])->select('bank_district')->distinct()->orderBy('bank_district', 'ASC')->get();
       
        $cities = DB::table('bank_details')->where([['bank_name','=', str_replace('_', ' ', $selectbank)],['bank_state','=', str_replace('_', ' ', $selectstate)],['bank_district','=', str_replace('_', ' ', $selectdistrict)]])->select('bank_city')->orderBy('bank_city', 'ASC')->distinct()->get();

        $branchs = DB::table('bank_details')->where([['bank_name','=', str_replace('_', ' ', $selectbank)],['bank_state','=', str_replace('_', ' ', $selectstate)],['bank_district','=', str_replace('_', ' ', $selectdistrict)],['bank_city','=', str_replace('_', ' ', $selectcity)]])->select('bank_branch')->orderBy('bank_branch', 'ASC')->distinct()->get();

      	$ifscresponse = DB::table('bank_details')->where([['bank_name','=', str_replace('_', ' ', $selectbank)],['bank_state','=', str_replace('_', ' ', $selectstate)],['bank_district','=', str_replace('_', ' ', $selectdistrict)],['bank_city','=', str_replace('_', ' ', $selectcity)]])->distinct()->first();
       
       
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
          "ifscdata" => $ifscresponse
        ]);				
   	}

    public function getbanks()
    {
      return DB::table('bank_details')->select('bank_name')->distinct()->orderBy('bank_name', 'ASC')->get();
    }
}
