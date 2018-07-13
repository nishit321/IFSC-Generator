@extends('master.layout')
@section('content')
        <header class="special">
            <h2>IFSC Code Bank</h2>
            <p>Find IFSC Code for Banks in India</p>
        </header>
        {{ Form::open(['route' => 'banks', 'method' => 'GET'])}}
            <select onchange="this.form.submit()" name="bank">
                <option>Select Bank</option>
                @foreach($banks as $bank)
                    <option value="{{ str_replace(' ', '_', $bank->bank_name) }}" @if(!empty($selectbank)) @if($selectbank == str_replace(' ', '_', $bank->bank_name)) selected @endif @endif>  {{ $bank->bank_name }}</option>
                @endforeach
            </select>
            <br>
            <select onchange="this.form.submit()" name="state">
                <option value="">Select State</option>
                @if(!empty($states))
                    @foreach($states as $state)
                        <option value="{{ str_replace(' ', '_', $state->bank_state) }}"  @if(!empty($selectstate)) @if($selectstate == str_replace(' ', '_', $state->bank_state)) selected @endif @endif>{{ $state->bank_state }}</option>
                    @endforeach
                @endif
            </select>
             <br>
            <select onchange="this.form.submit()" name="district">
                <option value="">Select Distict</option>
                @if(!empty($districts))
                    @foreach($districts as $district)
                        <option value="{{ str_replace(' ', '_', $district->bank_district) }}"  @if(!empty($selectdistrict)) @if($selectdistrict == str_replace(' ', '_', $district->bank_district)) selected @endif @endif>{{ $district->bank_district }}</option>
                    @endforeach
                @endif
            </select>
             <br>
            <select onchange="this.form.submit()" name="city">
                <option value="">Select City</option>
                @if(!empty($cities))
                    @foreach($cities as $city)
                        <option value="{{ str_replace(' ', '_', $city->bank_city) }}"  @if(!empty($selectcity)) @if($selectcity == str_replace(' ', '_', $city->bank_city)) selected @endif @endif>{{ $city->bank_city }}</option>
                    @endforeach
                @endif
            </select>
             <br>
            <select onchange="this.form.submit()" name="branch">
                <option value="">Select Branch</option>
                @if(!empty($branchs))
                    @foreach($branchs as $branch)
                        <option value="{{ str_replace(' ', '_', $branch->bank_branch) }}"  @if(!empty($selectbranch)) @if($selectbranch == str_replace(' ', '_', $branch->bank_branch)) selected @endif @endif>{{ $branch->bank_branch }}</option>
                    @endforeach
                @endif
            </select>

        {{ Form::close() }} 
        <br>
        <header class="special">
            <h2>List of IFSC Codes</h2>
        </header>
                    @if(!empty($ifscdata))
                                    <div class="table-wrapper" >
                                        <table class="alt" border="1">
                                            <tbody>
                                                <tr>
                                                    <td>IFSC Code</th>
                                                    <td><b>{{ $ifscdata->IFSC }}</b></td>
                                                </tr>
                                                <tr>
                                                    <td>Bank</th>
                                                    <td>{{ $ifscdata->BANK }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Branch</th>
                                                    <td>{{ $ifscdata->BRANCH }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Contact</th>
                                                    <td>{{ $ifscdata->CONTACT }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Address</th>
                                                    <td>{{ $ifscdata->ADDRESS }}</td>
                                                </tr>
                                                <tr>
                                                    <td>City</th>
                                                    <td>{{ $ifscdata->CITY }}</td>
                                                </tr>
                                                <tr>
                                                    <td>District</th>
                                                    <td>{{ $ifscdata->DISTRICT }}</td>
                                                </tr>
                                                <tr>
                                                    <td>State</th>
                                                    <td>{{ $ifscdata->STATE }}</td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>   

        
         
            @elseif(!empty($branchs))   
                <div class="row container-fluid" style="font-size: 20px;text-align:center">                         
                @foreach($branchs as $branch)
                    <div class="col-4 col-12-small">
                        <a style="text-decoration: none;" href="{{ $selectcity }}/{{ str_replace(' ','_',$branch->bank_branch) }}">{{ $branch->bank_branch }}</a>
                    </div>
                @endforeach
                </div>
            @elseif(!empty($cities))                            
                <div class="row" style="font-size: 18px;text-align:center">
                @foreach($cities as $city)
                    <div class="col-4 col-12-small">
                        <a style="text-decoration: none;" href="{{ $selectdistrict }}/{{ str_replace(' ','_',$city->bank_city) }}">{{ $city->bank_city }}</a>
                    </div>
                @endforeach
                </div>
            @elseif(!empty($districts))  
                <div class="row" style="font-size: 15px;text-align:center">                               
                @foreach($districts as $district)
                    <div class="col-4 col-12-small">
                        <a style="text-decoration: none;" href="{{ $selectstate }}/{{ str_replace(' ','_',$district->bank_district) }}">{{ $district->bank_district }}</a>
                    </div>
                @endforeach
                </div>
            @elseif(!empty($states))     
                <div class="row " style="font-size: 13px;text-align:center">                       
                @foreach($states as $state)
                    <div class="col-4 col-12-small">
                        <a style="text-decoration: none;" href="{{ $selectbank }}/{{ str_replace(' ','_',$state->bank_state) }}">{{ $state->bank_state }}</a>
                    </div>    
                @endforeach
                </div>
            @elseif(!empty($banks))         
                <div class="row" style="font-size: 10px;text-align:center">                   
                @foreach($banks as $bank)
                    <div class="col-4 col-12-small">
                        <a style="text-decoration: none;" href="banks/{{ str_replace(' ','_',$bank->bank_name) }}">{{ $bank->bank_name }}</a>
                    </div>
                @endforeach    
                </div>
            @endif
        </div>

@endsection

