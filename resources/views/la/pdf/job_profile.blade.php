<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8"> 

    <title>JOB | {{$job->job_no}}</title>

    <style>

  @font-face {font-family: 'Myanmar3'; font-style: normal; font-weight: normal; }

body{

    font-family: 'Myanmar3';

}

        .container{

            justify-content: center;

            align-content: center;

            padding:10px;

        }

        .center{

            text-align: center;

        }

        .center-h3{

            margin-bottom: 5px;

        }

        .center-h4{

            margin-top: 2px;

        }

        table{

            width:100%;

            border-collapse: collapse;

        }

        table, td, th {

            border: 1px solid black;

            font-size: 12px;

            padding:10px;

        }

       

    </style>

</head>

<body>

    <div class="container">

        <h3 class="center center-h3"> UNI-LINK LOGISTICS CO.,LTD</h3>

        <h4 class="center center-h4">WAREHOUSING , DISTRIBUTION & TRANSPORTATION</h4>

        <h4 class="center center-h4">Job Number :<span style="color:brown;">{{$job->job_no}}</span></h4>

        <table>

            <caption style="text-align: right;padding-right:10px;">Job Date : {{$job->date}}</caption>

            <tr>

                <th width="15%">

                    Cargo <br> Detail

                </th>

                <td>

                    <ul style="list-style: none; padding:5px;">

                        <li>Customer : {{$job->customer<>null?$job->customer->name:"~"}}</li>

                        <li>Importer/Exporter : {{$job->impexp<>null?$job->impexp->name:"~"}}</li>

                        <br>

                        <li>Tel : {{$job->customer<>null?$job->customer->phone:"~"}} </li>

                        <li>Email :{{$job->customer<>null?$job->customer->email:"~"}} </li>

                    </ul>

                </td>

                <td>

                    <ul style=" list-style:none; padding:5px;">

                        <li> Transport : {{$job->shipment<>null?$job->shipment->transport:"~"}}</li>

                        <li> Type : {{$job->shipment<>null?$job->shipment->type:"~"}}</li>

                        <li> PKGS : {{$job->shipment<>null?$job->shipment->pkgs:"~"}} </li>

                        <li> KGS : {{$job->shipment<>null?$job->shipment->kgs:"~"}}</li>

                        <li>Air Line : {{$job->shipment<>null&&$job->shipment->lines($job->shipment->type)->first()<>null?$job->shipment->lines($job->shipment->type)->first()->name:"~"}}</li>

                    </ul>

                </td>

            </tr>

        </table>

        <br>

        <table>

            <tr>

                <th width="15%">

                    Shipment <br> Detail

                </th>

                <td >

                    <table >

                        <tr>

                            <td> POL </td>

                            <td> 

                                {{$job->shipment<>null&&$job->shipment->pols?$job->shipment->pols->name:"~"}} ,

                                {{$job->shipment<>null&&$job->shipment->pols?$job->shipment->pols->country:"~"}}

                            </td>

                        </tr>

                        <tr>

                            <td> POD </td>

                            <td> 

                                {{$job->shipment<>null&&$job->shipment->pods?$job->shipment->pods->name:"~"}} ,

                                {{$job->shipment<>null&&$job->shipment->pods?$job->shipment->pods->country:"~"}}

                            </td>

                        </tr>

                        <tr>

                            <td> ETA </td>

                            <td> {{$job->shipment<>null? $job->shipment->eta:"~"}}</td>

                        </tr>

                        <tr>

                            <td> ETD </td>

                            <td> {{$job->shipment<>null? $job->shipment->etd:"~"}}9</td>

                        </tr>

                    </table>

                </td>

                <td width="50%">

                    <p>MAWB No.  : {{$job->compulsory<>null?$job->compulsory->reference_no:"~"}}</p>

                </td>

            </tr>

        </table><br>

      

        <table>

            <tr>

                <th width="15%">Services</th>

                <td>

                    <span>Clearance &nbsp;&nbsp; &emsp;&emsp; : {{$job->custom_clearance_service<>null?$job->custom_clearance_service->name:"~"}}</span><br>

                    <span>Trucking &nbsp; &nbsp;&nbsp; &emsp;&emsp; : {{$job->trucking_service<>null?$job->trucking_service->name:"~"}}</span><br>

                    <span>Supplement &emsp;&emsp; : 

                         {{-- {{$job->supplement_service<>null?$job->supplement_service->name:"~"}} --}}
                         @if ($job->supplement_service<>null && $job->supplement_service->services()<>null && count($job->supplement_service->services())>0)

                            @foreach ($job->supplement_service->services() as $service)

                                {{$service->name}}, &nbsp; 

                            @endforeach

                         @else

                             ~

                         @endif

                         

                    </span>

                </td>

            </tr>

        </table>

        <br>

        <div style="font-size:12px;">

           <div style="display:inline;">

               <b> CUSTOMER</b>

                <br><br>

                <span >  NAME &emsp;&emsp;&nbsp;&nbsp; : ...................</span>

                <br><br>

                <span >  SIGNATURE : .....................</span>

           </div>

           <div style="display:inline;text-align:right;margin-top:-80px;">

               <b> APPROVED BY</b>

                <br> <br>

                <span >  NAME &emsp;&emsp; : ...................</span>

                 <br><br>

                 <span >  SIGNATURE : .....................</span>

           </div>

        </div>



    </div>

    <div style="position:absolute;bottom:30px;left:180px;text-align:center;">

            <p>No.62,Mahabandoola Housing, Complex (B),Room No.501 ,5th Floor </p>

            <p>Tel : (951) 203008, (959) 964686887</p>

    </div>

</body>

</html>