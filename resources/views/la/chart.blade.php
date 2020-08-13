<canvas id="myChart" width="100%" height="80"></canvas>
<link rel="stylesheet" href="{{asset('css/Chart.css')}}">
<script src="{{asset('js/Chart.js')}}"></script>
<script src="{{asset('js/jquery.js')}}"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var p1=0,p2=0,p3=0,p4=0,p5=0;
    var chart_data = $.parseJSON(  $.ajax({
            type:"get",
            url:'/admin/getjobs',
            dataType: "json", 
            async: false
        }).responseText);
p1=chart_data[0].length;
p2=chart_data[1].length;
p3=chart_data[2].length;
p4=chart_data[3].length;
p5=chart_data[4].length;
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['P-1', 'P-2', 'P-3', 'P-4', 'P-5'],
            datasets: [{
                label: 'In current processes',
                data: [p1,p2,p3,p4,p5],
                backgroundColor: [
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)'
                ],
                borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1,
                    }
                }]
            }
        }
    });
</script>