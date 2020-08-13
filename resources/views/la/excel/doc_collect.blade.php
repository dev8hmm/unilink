<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document Collect</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Orginal</th>
                <th>Copy</th>
                <th>Received Date</th>
            </tr>
        </table>
        {{-- {{dd($data)}} --}}
        <tbody>
            @foreach ($data as $key=>$item)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$item['name']}}</td>
                <td>{{$item['original']}}</td>
                <td>{{$item['copy']}}</td>
                <td>{{$item['date']}}</td>
            </tr>
            @endforeach
        </tbody>
    </body>
    </html>