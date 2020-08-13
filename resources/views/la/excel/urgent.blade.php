<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Urgent List</title>
</head>
<body>
    <table>
            <thead >
                    <tr>
                      <th >No.</th>
                      <th>Job No.</th>
                      <th>Job Date</th>
                      <th>ETA</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $key => $job)
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$job->job_no}}</td>
                          <td>{{$job->date}}</td>
                          <td>{{$job->shipment->eta}}</td>
                        </tr>
                    @endforeach
                  </tbody>
    </table>
</body>
</html>