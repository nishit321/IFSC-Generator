@extends('master.layout')
@section('content')
        <header class="special">
            <h2>Find Bank By IFSC</h2>
            <p>Find IFSC Code for Banks in India</p>
        </header>
        {{ Form::open(['route' => 'ifsccode', 'method' => 'GET'])}}
            <input type="text" name="ifsccode" style="width: 50%; margin:0 auto;" placeholder="IFSC Code" value=" @if(!empty($ifscdata)){{ $ifsc}} @endif" />
            <br>
            <center><input type="submit" name="submit" class="button primary"></center>
        {{ Form::close() }} 
        <br>
        
                    @if(!empty($ifscdata))
                    <div class="table-wrapper row">
                    <div class="col-md-6">
                    <table class="alt" style="float: left" border="1">
                        <tbody>
                            <tr>
                                <td><b>IFSC Code</b>
                                    </td>
                                    <td>
                                        <b><a href=""></a> {{ $ifscdata->IFSC }}</b>
                                        <button type="button" class="btn" data-clipboard-text="{{ $ifscdata->IFSC }}">
                                            Copy to clipboard
                                        </button>
                                    </td>
                            </tr>
                            <tr>
                                <td><b>Bank</b>
                                    </td>
                                    <td>{{ $ifscdata->BANK }}
                                    </td>
                            </tr>
                            <tr>
                                <td><b>Branch</b>
                                    </td>
                                    <td>{{ $ifscdata->BRANCH }}
                                    </td>
                            </tr>
                            <tr>
                                <td><b>Open Hours:</b></td>
                                <td>Monday to Saturday 10 am to 4 pm</td>
                            </tr>
                            
                            <tr>
                                <td><b>City</b>
                                    </td>
                                    <td>{{ $ifscdata->CITY }}
                                    </td>
                            </tr>
                            <tr>
                                <td><b>District
                                    </td>
                                    <td>{{ $ifscdata->DISTRICT }}
                                    </td>
                            </tr>
                            <tr>
                                <td><b>State</b>
                                    </td>
                                    <td>{{ $ifscdata->STATE }}
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
                    <table class="alt" style="float: left;" border="1">
                        
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
                                    <td>{{ $ifscdata->ADDRESS }}
                                    </td>
                            </tr>
                        
                    </table>
                    </div>
                </div>
                                    
                            @endif
@endsection

@section('footer')
            <header class="special">
                <h2>Banks Customer Care Number</h2>
            </header>
            <div class="row" style="font-size: 10px;text-align:left">   
                @foreach($banks as $bank)
                    <div class="col-4 col-12-small">
                        <a href="/banks/{{ str_replace(' ','_',$bank->bank_name) }}">{{ $bank->bank_name }} Customer Care</a>
                    </div>
                @endforeach 
            </div>
            <br>
            <br>
            
@endsection 