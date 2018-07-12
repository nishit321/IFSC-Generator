@extends('master.layout')
@section('content')
        <header class="special">
            <h2>IFSC Code Bank</h2>
            <p>Find IFSC Code for Banks in India</p>
        </header>
        {{ Form::open(['route' => 'ifsccode', 'method' => 'GET'])}}
            <input type="text" name="ifsccode" placeholder="IFSC Code" value=" @if(!empty($ifscdata)){{ $ifsc}} @endif" />
            <br>
            <center><input type="submit" name="submit" class="button primary"></center>
        {{ Form::close() }} 
        <br>
        
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
                            @endif
@endsection

