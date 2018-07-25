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
@if(!empty($paginateTables))

@foreach($paginateTables as $bank)
<div class="table-wrapper row">
    <div class="col-md-6">
    <table class="alt" style="float: left" border="1">
        <tbody>
            <tr>
                <td><b>IFSC Code</b>
                    </td>
                    <td>
                        <b><a href="/banks/{{ str_replace(' ','_',$bank->bank_name) }}/{{ str_replace(' ','_',$bank->bank_state) }}/{{ str_replace(' ','_',$bank->bank_district) }}/{{ str_replace(' ','_',$bank->bank_city) }}/{{ str_replace(' ','_',$bank->bank_branch) }}">{{ $bank->bank_ifsc }}</a></b>
                        <button type="button" class="btn" data-clipboard-text="{{ $bank->bank_ifsc }}">
                            Copy to clipboard
                        </button>
                    </td>
            </tr>
            <tr>
                <td><b>Bank</b>
                    </td>
                    <td>{{ $bank->bank_name }}
                    </td>
            </tr>
            <tr>
                <td><b>Branch</b>
                    </td>
                    <td><a href="/banks/{{ str_replace(' ','_',$bank->bank_name) }}/{{ str_replace(' ','_',$bank->bank_state) }}/{{ str_replace(' ','_',$bank->bank_district) }}/{{ str_replace(' ','_',$bank->bank_city) }}/{{ str_replace(' ','_',$bank->bank_branch) }}">{{ $bank->bank_branch }}</a>
                    </td>
            </tr>
            <tr>
                <td><b>Open Hours:</b></td>
                <td>Monday to Saturday 10 am to 4 pm</td>
            </tr>
            
            <tr>
                <td><b>City</b>
                    </td>
                    <td><a href="/banks/{{ str_replace(' ','_',$bank->bank_name) }}/{{ str_replace(' ','_',$bank->bank_state) }}/{{ str_replace(' ','_',$bank->bank_district) }}/{{ str_replace(' ','_',$bank->bank_city) }}" >{{ $bank->bank_city }}</a>
                    </td>
            </tr>
            <tr>
                <td><b>District
                    </td>
                    <td><a href="/banks/{{ str_replace(' ','_',$bank->bank_name) }}/{{ str_replace(' ','_',$bank->bank_state) }}/{{ str_replace(' ','_',$bank->bank_district) }}">{{ $bank->bank_district }}</a>
                    </td>
            </tr>
            <tr>
                <td><b>State</b>
                    </td>
                    <td><a href="/banks/{{ str_replace(' ','_',$bank->bank_name) }}/{{ str_replace(' ','_',$bank->bank_state) }}">{{ $bank->bank_state }}</a>
                    </td>
            </tr>
            <tr>
                <td><b>Country:</td>
                <td>IN</td>
            </tr>
        </tbody>
    </table>
    </div>
    <div class="col-md-6">
    <table class="alt"  style="float: left"  border="1">
        
            <tr>
                <td><b>Remittance Services:</b></td>
                <td>NEFT</td>
            </tr>
            <tr>
                <td><b>Mode Of Payment:</b></td>
                <td>Cash,Cheque,Demand Draft and Net banking</td>
            </tr>
            <tr>
                <td><b>ATM:</b></td>
                <td>24X7</td>
            </tr>
            <tr>
                <td><b>Debit Services:</b></td>
                <td>YES</td>
            </tr>
            <tr>
                <td><b>Credit Services:</b></td>
                <td>YES</td>
            </tr>
            <tr>
                <td><b>Address</b>
                    </td>
                    <td>{{ $bank->bank_address }}
                    </td>
            </tr>
        
    </table>
    </div>
</div>
<hr> 
@endforeach
<div class="pages">
    <ul class="pagination justify-content-center" style="text-decoration: none">
        {{ $paginateTables->links() }}
    </ul>
</div>
@endif

@if(!empty($ifscdata))
<div class="table-wrapper row">
    <div class="col-md-6">
    <table class="alt" style="float: left" border="1">
        <tbody>
            <tr>
                <td><b>IFSC Code</b>
                    </td>
                    <td>
                        <b><a href=""></a> {{ $ifscdata->bank_ifsc }}</b>
                        <button type="button" class="btn" data-clipboard-text="{{ $ifscdata->bank_ifsc }}">
                            Copy to clipboard
                        </button>
                    </td>
            </tr>
            <tr>
                <td><b>Bank</b>
                    </td>
                    <td>{{ $ifscdata->bank_name }}
                    </td>
            </tr>
            <tr>
                <td><b>Branch</b>
                    </td>
                    <td>{{ $ifscdata->bank_branch }}
                    </td>
            </tr>
            <tr>
                <td><b>Open Hours:</b></td>
                <td>Monday to Saturday 10 am to 4 pm</td>
            </tr>
            
            <tr>
                <td><b>City</b>
                    </td>
                    <td>{{ $ifscdata->bank_city }}
                    </td>
            </tr>
            <tr>
                <td><b>District
                    </td>
                    <td>{{ $ifscdata->bank_district }}
                    </td>
            </tr>
            <tr>
                <td><b>State</b>
                    </td>
                    <td>{{ $ifscdata->bank_state }}
                    </td>
            </tr>
            <tr>
                <td><b>Country:</td>
                <td>IN</td>
            </tr>
        </tbody>
    </table>
    </div>
    <div class="col-md-6">
    <table class="alt"  style="float: left"  border="1">
        
            <tr>
                <td><b>Remittance Services:</b></td>
                <td>NEFT</td>
            </tr>
            <tr>
                <td><b>Mode Of Payment:</b></td>
                <td>Cash,Cheque,Demand Draft and Net banking</td>
            </tr>
            <tr>
                <td><b>ATM:</b></td>
                <td>24X7</td>
            </tr>
            <tr>
                <td><b>Debit Services:</b></td>
                <td>YES</td>
            </tr>
            <tr>
                <td><b>Credit Services:</b></td>
                <td>YES</td>
            </tr>
            <tr>
                <td><b>Address</b>
                    </td>
                    <td>{{ $ifscdata->bank_address }}
                    </td>
            </tr>
        
    </table>
    </div>
</div>

@elseif(!empty($branchs)) 
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
@elseif(!empty($cities)) 
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
@elseif(!empty($districts)) 

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
@elseif(!empty($states)) 

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
        <h2>How can I find IFSC Code for a  @if(!empty($selectbank)){{str_replace('_',' ',$selectbank)}} @else Bank @endif?</h2>
    </header>
    <p>
       The easiest way to Find IFSC Code for @if(!empty($selectbank)){{str_replace('_',' ',$selectbank)}} @else Banks in India @endif  is to start by the Bank you are looking for. You can further filter List of IFSC Codes by State, District and City. Or you may directly key in first few characters of Branch Name, Locality or address. You can also try our FAST search to find Codes by Branch, Address or Locality. You can also Search by IFSC Code.
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
        var clip = new Clipboard('.btn');
        clip.on("success", function() {
         
        });
        clip.on("error", function() {
         
        }); 
     
</script>
@endsection

@section('footer')
            <header class="special">
                <h2>List of Banks NearBy You</h2>
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