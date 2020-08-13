<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UNILINK DOCUMENT COLLECT</title>
    <style>
        h3{
            text-align: center;
        }
        
        hr{
            width: 60%;
            border: 1px solid;
        }
        table{
            margin-left: auto;
            margin-right: auto;
            width: 100%;
            border: 1px solid gray;
            border-collapse: collapse;
        }
        
        th,td{
            text-align: center;
            padding: 9px;
            margin-left: auto;
            margin-right: auto;
            border: 1px solid gray;
            border-collapse: collapse;
        }
        p{
            margin-left: 70%;
        }
        .footer{
            position: absolute;
            left: 200px;
            bottom:40px;
            text-align:center;
        }
    </style>
</head>
<body>
    <h3>UNILINK CUSTOMER SERVICES AGENCY</h3><hr><br><br>
    <table>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Orginal</th>
            <th>Copy</th>
            <th>Received Date</th>
        </tr>
       @foreach ($data as $key=>$item)
           <tr>
               <td>{{$key+1}}</td>
               <td>{{$item['name']}}</td>
               <td>{{$item['original']}}</td>
               <td>{{$item['copy']}}</td>
               <td>{{$item['date']}}</td>
           </tr>
       @endforeach
       
    </table><br><br>
    <p>Sign &nbsp;.....................................</p>
    <p>Name &nbsp;...................................</p>
    <p>Date &nbsp;.....................................</p><br><br>
    <div class="footer">
        <span>No.62,Mahabandoola Housing, Complex (B),Room No.501 ,5th Floor</span><br>
        <span style="left:500px;padding-top: 10px;padding-bottom: 10px;">Tel : (951) 203008, (959) 964686887</span>
    </div>
</body>
</html>