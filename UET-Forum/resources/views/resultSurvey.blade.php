<!DOCTYPE html>
<html lang="en">

@include('layer.header',['title'=>'roomjoin'])
<body>
<!--Back to top button-->
<a id="BTTbutton"></a>
<script>
    var btn = $('#BTTbutton');
    $(window).scroll(function () {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });
    btn.on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({scrollTop: 0}, '300');
    });

    function marked() {
        if (document.getElementById("heart").style.color == "rgb(231, 7, 112)") {
            document.getElementById("heart").style.color = "white";
        } else {
            document.getElementById("heart").style.color = "rgb(231, 7, 112)";
        }
    }
</script>
@include('layer.nav')
<section class="homeContent">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <!--thanh menu trai-->
            @include('layer.left')
            <!--phan noi dung giua-->
                <div class="col-md-8 centerBar">
                    <div class="MainContent">
                        <div class="roomTitle" style="border: none">
                            <h4>{{$data['name']}}</h4>
                        </div>
                        <div class="roomFooter">
                            <div class="clearfix">
                                <div class="float-left">
                                    <form method="get"  action="{{route('survey-join',['id'=>$data['id'],'admin'=>1])}}">
                                        <button type="submit" class="btn btn-sm btn-outline-dark float-left"
                                                style="margin-right: 1rem"><i class="fas fa-arrow-left"></i> Trở về
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="userBox">
                                <div style="margin-right: 10px">
                                    <a href="#">{{$data['admin']['fullName']}}</a>
                                    <p>Ngày tạo: {{$data['created']}}</p>
                                </div>
                                <img src="{{asset($data['admin']['avatar'])}}" width="35">
                            </div>
                        </div>
                        <div class="results">
                            <div class="title">
                                <h5>Kết quả khảo sát</h5>
                            </div>
                            @foreach($data['question'] as $key=>$value)
                                @if($value['type_id']==1)
                                    <div class="result">
                                        <p>Câu {{$key+1}}: {{$value['content']}}</p>
                                        <div id="{{$key}}" align='center'></div>
                                        <script type="text/javascript">
                                            // Load google charts
                                            google.charts.load('current', {'packages': ['corechart']});
                                            google.charts.setOnLoadCallback(drawChart);

                                            // Draw the chart and set the chart values
                                            function drawChart() {
                                                var data = google.visualization.arrayToDataTable([
                                                    ['question', 'answer']
                                                    @foreach($value['answer'] as $k=>$v)
                                                    , ['{{$v['content']}}',{{$v['amount']}}]
                                                    @endforeach
                                                ]);

                                                // Optional; add a title and set the width and height of the chart
                                                var options = {
                                                    'width': 550,
                                                    'height': 400,
                                                    'chartArea': {'width': '100%', 'height': '85%'},
                                                    'legend': {'position': 'bottom'}
                                                };

                                                var chart = new google.visualization.PieChart(document.getElementById('{{$key}}'));
                                                chart.draw(data, options);
                                            }
                                        </script>
                                    </div>
                                @elseif($value['type_id']==2)
                                    <div class="result">
                                        <p>Câu {{$key+1}}: {{$value['content']}}</p>
                                        <div id="{{$key}}" align='center'></div>
                                        <script type="text/javascript">
                                            // Load google charts
                                            google.charts.load('current', {'packages': ['corechart']});
                                            google.charts.setOnLoadCallback(drawChart);

                                            // Draw the chart and set the chart values
                                            function drawChart() {
                                                var data = google.visualization.arrayToDataTable([
                                                    ['question', 'answer', {role: 'style'}],
                                                    ['Đúng', {{$value['answer']['0']['amount']}}, '#0df509'],
                                                    ['Sai', {{$value['answer']['1']['amount']}}, 'red']
                                                ]);

                                                // Optional; add a title and set the width and height of the chart
                                                var options = {
                                                    'width': 550,
                                                    'height': 100,
                                                    'chartArea': {'width': '80%', 'height': '100%'},
                                                    'legend': {'position': 'bottom'}
                                                };

                                                var chart = new google.visualization.BarChart(document.getElementById('{{$key}}'));
                                                chart.draw(data, options);
                                            }
                                        </script>
                                    </div>
                                @elseif($value['type_id']==3)
                                    <div class="result">
                                        <p>Câu {{$key+1}}: {{$value['content']}}</p>
                                        <ul>
                                            @foreach($value['answer'] as $v)
                                                <li>{{$v['content']}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            @endforeach


                        </div>
                    </div>
                </div>
                <!--thanh ben phai-->
                @include('layer.right',['title'=>'room'])
            </div>
        </div>
    </div>
</section>


</body>
@include('layer.footer')

</html>