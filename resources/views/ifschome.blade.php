@extends('master.layout') 
@section('title') 
    @if(!empty($selectbank)) 
        {{str_replace('_', ' ', $selectbank)}} 
    @else {{'IFSC'}} 
    @endif
@endsection 

@section('content')
<header class="special">
    <h2>IFSC Code Bank
  </h2>
    <p>Find IFSC Code for Banks in India
    </p>
</header>
{{ Form::open(['route' => 'banks', 'method' => 'GET'])}}

<center>
<select  id="selUser1" onchange="this.form.submit()" name="bank" style="width: 80%;margin-left:20%;">
    <option>Select Bank
    </option>
    @foreach($banks as $bank)
    <option value="{{ str_replace(' ', '_', $bank->bank_name) }}" @if(!empty($selectbank)) @if($selectbank==str_replace( ' ', '_', $bank->bank_name)) selected @endif @endif> {{ $bank->bank_name }}
    </option>
    @endforeach
</select>
<br>
<br>
<select  id="selUser2" onchange="this.form.submit()" name="state" style="width: 80%;margin: 0 auto;">
    <option value="">Select State
    </option>
    @if(!empty($states)) @foreach($states as $state)
    <option value="{{ str_replace(' ', '_', $state->bank_state) }}" @if(!empty($selectstate)) @if($selectstate==str_replace( ' ', '_', $state->bank_state)) selected @endif @endif>{{ $state->bank_state }}
    </option>
    @endforeach @endif
</select>
<br>
<br>
<center>
<select id="selUser3" onchange="this.form.submit()" name="district" style="width: 80%;margin: 0 auto;">
    <option value="">Select Distict
    </option>
    @if(!empty($districts)) @foreach($districts as $district)
    <option value="{{ str_replace(' ', '_', $district->bank_district) }}" @if(!empty($selectdistrict)) @if($selectdistrict==str_replace( ' ', '_', $district->bank_district)) selected @endif @endif>{{ $district->bank_district }}
    </option>
    @endforeach @endif
</select>

<br>
<br>
<select id="selUser4" onchange="this.form.submit()" name="city" style="width: 80%;margin: 0 auto;">
    <option value="">Select City
    </option>
    @if(!empty($cities)) @foreach($cities as $city)
    <option value="{{ str_replace(' ', '_', $city->bank_city) }}" @if(!empty($selectcity)) @if($selectcity==str_replace( ' ', '_', $city->bank_city)) selected @endif @endif>{{ $city->bank_city }}
    </option>
    @endforeach @endif
</select>
<br>
<br>
<select id="selUser5" onchange="this.form.submit()" name="branch" style="width: 80%;margin: 0 auto;">
    <option value="">Select Branch
    </option>
    @if(!empty($branchs)) @foreach($branchs as $branch)
    <option value="{{ str_replace(' ', '_', $branch->bank_branch) }}" @if(!empty($selectbranch)) @if($selectbranch==str_replace( ' ', '_', $branch->bank_branch)) selected @endif @endif>{{ $branch->bank_branch }}
    </option>
    @endforeach @endif
</select>
</center>
{{ Form::close() }}
<br>
<br>
@if(!empty($ifscdata))
<div class="table-wrapper">
    <table class="table" border="1" width: 100%;>
        <tbody>
            <tr>
                <td>IFSC Code
                    </th>
                    <td>
                        <b>{{ $ifscdata->bank_ifsc }}
        </b>
                    </td>
            </tr>
            <tr>
                <td>Bank
                    </th>
                    <td>{{ $ifscdata->bank_name }}
                    </td>
            </tr>
            <tr>
                <td>Branch
                    </th>
                    <td>{{ $ifscdata->bank_branch }}
                    </td>
            </tr>
            <tr>
                <td>Address
                    </th>
                    <td>{{ $ifscdata->bank_address }}
                    </td>
            </tr>
            <tr>
                <td>City
                    </th>
                    <td>{{ $ifscdata->bank_city }}
                    </td>
            </tr>
            <tr>
                <td>District
                    </th>
                    <td>{{ $ifscdata->bank_district }}
                    </td>
            </tr>
            <tr>
                <td>State
                    </th>
                    <td>{{ $ifscdata->bank_state }}
                    </td>
            </tr>
        </tbody>
    </table>
</div>
@elseif(!empty($branchs)) 
@if(isset($paginatebranch)) 
@foreach($paginatebranch as $branch)
<div class="table-wrapper">
    <table class="alt" border="1">
        <tbody>
            <tr>
                <td>IFSC Code
                    </th>
                    <td>
                        <b>{{ $branch->bank_ifsc }}
        </b>
                    </td>
            </tr>
            <tr>
                <td>Bank
                    </th>
                    <td>{{ $branch->bank_name }}
                    </td>
            </tr>
            <tr>
                <td>Branch
                    </th>
                    <td>{{ $branch->bank_branch }}
                    </td>
            </tr>
            <tr>
                <td>Address
                    </th>
                    <td>{{ $branch->bank_address }}
                    </td>
            </tr>
            <tr>
                <td>City
                    </th>
                    <td>{{ $branch->bank_city }}
                    </td>
            </tr>
            <tr>
                <td>District
                    </th>
                    <td>{{ $branch->bank_district }}
                    </td>
            </tr>
            <tr>
                <td>State
                    </th>
                    <td>{{ $branch->bank_state }}
                    </td>
            </tr>
        </tbody>
    </table>
</div>
@endforeach
<div class="pages">
    <ul class="pagination justify-content-center" style="text-decoration: none">
        {{ $paginatebranch->links() }}
    </ul>
</div>
@endif
<header class="special">
    <h2>List of Branchs
  </h2>
</header>
<div class="row container-fluid" style="font-size: 20px;text-align:center">
    @foreach($branchs as $branch)
    <div class="col-4 col-12-small">
        <a style="text-decoration: none;" href="{{ $selectcity }}/{{ str_replace(' ','_',$branch->bank_branch) }}">{{ $branch->bank_branch }}
    </a>
    </div>
    @endforeach
</div>
@elseif(!empty($cities)) @foreach($paginatecity as $city)
<div class="table-wrapper">
    <table class="alt" border="1">
        <tbody>
            <tr>
                    <td>IFSC Code
                    </th>
                    <td>
                        <b>{{ $city->bank_ifsc }}</b>
                    </td>
            </tr>
            <tr>
                    <td>Bank</th>
                    <td>
                        {{ $city->bank_name }}
                    </td>
            </tr>
            <tr>
                    <td>Branch</th>
                    <td>
                        {{ $city->bank_branch }}
                    </td>
            </tr>
            <tr>
                    <td>Address</th>
                    <td>
                        {{ $city->bank_address }}
                    </td>
            </tr>
            <tr>
                    <td>City</th>
                    <td>
                        {{ $city->bank_city }}
                    </td>
            </tr>
            <tr>
                    <td>District</th>
                    <td>
                        {{ $city->bank_district }}
                    </td>
            </tr>
            <tr>
                <td>State</th> 
                <td>
                    {{ $city->bank_state }}
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endforeach
<div class="pages">
    <ul class="pagination justify-content-center" style="text-decoration: none">
        {{ $paginatecity->links() }}
    </ul>
</div>
<header class="special">
    <h2>List of Cities
  </h2>
</header>
<div class="row" style="font-size: 18px;text-align:center">
    @foreach($cities as $city)
    <div class="col-4 col-12-small">
        <a style="text-decoration: none;" href="{{ $selectdistrict }}/{{ str_replace(' ','_',$city->bank_city) }}">{{ $city->bank_city }}
    </a>
    </div>
    @endforeach
</div>
@elseif(!empty($districts)) @foreach($paginatedistrict as $district)
<div class="table-wrapper">
    <table class="alt" border="1">
        <tbody>
            <tr>
                <td>IFSC Code
                    </th>
                    <td>
                        <b>{{ $district->bank_ifsc }}
        </b>
                    </td>
            </tr>
            <tr>
                <td>Bank
                    </th>
                    <td>{{ $district->bank_name }}
                    </td>
            </tr>
            <tr>
                <td>Branch
                    </th>
                    <td>{{ $district->bank_branch }}
                    </td>
            </tr>
            <tr>
                <td>Address
                    </th>
                    <td>{{ $district->bank_address }}
                    </td>
            </tr>
            <tr>
                <td>City
                    </th>
                    <td>{{ $district->bank_city }}
                    </td>
            </tr>
            <tr>
                <td>District
                    </th>
                    <td>{{ $district->bank_district }}
                    </td>
            </tr>
            <tr>
                <td>State
                    </th>
                    <td>{{ $district->bank_state }}
                    </td>
            </tr>
        </tbody>
    </table>
</div>
@endforeach
<div class="pages">
    <ul class="pagination justify-content-center" style="text-decoration: none">
        {{ $paginatedistrict->links() }}
    </ul>
</div>
<header class="special">
    <h2>List of Districts
  </h2>
</header>
<div class="row" style="font-size: 15px;text-align:center">
    @foreach($districts as $district)
    <div class="col-4 col-12-small">
        <a style="text-decoration: none;" href="{{ $selectstate }}/{{ str_replace(' ','_',$district->bank_district) }}">{{ $district->bank_district }}
    </a>
    </div>
    @endforeach
</div>
@elseif(!empty($states)) @foreach($paginatestate as $state)
<div class="table-wrapper">
    <table class="alt" border="1">
        <tbody>
            <tr>
                <td>IFSC Code
                    </th>
                    <td>
                        <b>{{ $state->bank_ifsc }}</b>

                    </td>
            </tr>
            <tr>
                <td>Bank
                    </th>
                    <td>{{ $state->bank_name }}
                    </td>
            </tr>
            <tr>
                <td>Branch
                    </th>
                    <td>{{ $state->bank_branch }}
                    </td>
            </tr>
            <tr>
                <td>Address
                    </th>
                    <td>{{ $state->bank_address }}
                    </td>
            </tr>
            <tr>
                <td>City
                    </th>
                    <td>{{ $state->bank_city }}
                    </td>
            </tr>
            <tr>
                <td>District
                    </th>
                    <td>{{ $state->bank_district }}
                    </td>
            </tr>
            <tr>
                <td>State
                    </th>
                    <td>{{ $state->bank_state }}
                    </td>
            </tr>
        </tbody>
    </table>
</div>
@endforeach
<div class="pages">
    <ul class="pagination justify-content-center" style="text-decoration: none">
        {{ $paginatestate->links() }}
    </ul>
</div>
<header class="special">
    <h2>List of States
  </h2>
</header>
<div class="row " style="font-size: 13px;text-align:center">
    @foreach($states as $state)
    <div class="col-4 col-12-small">
        <a style="text-decoration: none;" href="{{ $selectbank }}/{{ str_replace(' ','_',$state->bank_state) }}">{{ $state->bank_state }}
    </a>
    </div>
    @endforeach
</div>
@elseif(!empty($banks))
    <header class="special">
        <h2>List of Banks
    </h2>
    </header>
<div class="row" style="font-size: 10px;text-align:center">
   
    <br>
    @foreach($banks as $bank)
    <div class="col-4 col-12-small">
        <a style="text-decoration: none;" href="banks/{{ str_replace(' ','_',$bank->bank_name) }}">{{ $bank->bank_name }}
    </a>
    </div>
    @endforeach
</div>
@endif
    <br>
    <br>
    <br>
    <div class="content"> 
    <header class="special">
        <h2>Search IFSC Codes of major Banks in India</h2>
    </header>
    <p>
        You can search through 90,000+ IFSC Codes of 125+ Banks in India! We are making earnest efforts in keeping the information updated by adding IFSC codes of banks as they get available on RBI website.
    </p>
    <header class="special">
        <h2>How can I find IFSC Code for a Bank?</h2>
    </header>
    <p>
       The easiest way to Find IFSC Code for Banks in India is to start by the Bank you are looking for. You can further filter List of IFSC Codes by State, District and City. Or you may directly key in first few characters of Branch Name, Locality or address. You can also try our FAST search to find Codes by Branch, Address or Locality. You can also Search by IFSC Code.
    </p>
    <header class="special">
        <h2>What is IFSC code?</h2>
    </header>
    <p>
      The Indian Financial System Code (also known as IFSC) is a 11 character code for identifying the bank and branch which an account is held. The IFSC code is used both by the NEFT, RTGS and IMPS finance transfer systems.
    </p>
    
    </div>
    <script>

     // Initialize select2
    $("#selUser1").select2();

    // Read selected option
    $('#but_read').click(function(){
      var username = $('#selUser1 option:selected').text();
      var userid = $('#selUser1').val();

      $('#result').html("id : " + userid + ", name : " + username);
      });

    // Initialize select2
    $("#selUser2").select2();

    // Read selected option
    $('#but_read').click(function(){
      var username = $('#selUser2 option:selected').text();
      var userid = $('#selUser2').val();

      $('#result').html("id : " + userid + ", name : " + username);
      });
     

     // Initialize select2
     $("#selUser3").select2();

     // Read selected option
     $('#but_read').click(function(){
      var username = $('#selUser3 option:selected').text();
      var userid = $('#selUser3').val();

      $('#result').html("id : " + userid + ", name : " + username);
      });

        // Initialize select2
     $("#selUser4").select2();

     // Read selected option
     $('#but_read').click(function(){
      var username = $('#selUser4 option:selected').text();
      var userid = $('#selUser4').val();

      $('#result').html("id : " + userid + ", name : " + username);
      });
     
        // Initialize select2
      $("#selUser5").select2();

     // Read selected option
     $('#but_read').click(function(){
      var username = $('#selUser5 option:selected').text();
      var userid = $('#selUser5').val();

      $('#result').html("id : " + userid + ", name : " + username);
      });
     
     
</script>
@endsection

@section('footer')
            <header class="special">
                <h2>List of Banks</h2>
            </header>
            <div class="row" style="font-size: 10px;text-align:left">   
                @foreach($banks as $bank)
                    <div class="col-4 col-12-small">
                        <a href="/banks/{{ str_replace(' ','_',$bank->bank_name) }}">{{ $bank->bank_name }} Near Me</a>
                    </div>
                @endforeach 
            </div>
            <br>
            <br>
            
@endsection 