<!DOCTYPE html>
<html lang="en">
@include('layer.header',['title'=>'dashboard'])

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
        $('html, body').animate({
            scrollTop: 0
        }, '300');
    });
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
                    <div class="MainHeader clearfix">
                        <h3 class="float-left" style="margin-left: 10px">
                            Phiếu khảo sát
                        </h3>
                        <form action='{{route('dashboard-search')}}' method="get" class="form float-right">
                            <div class="input-group searchbox">
                                {{--                                <input type="search" class="form-control sinput" name="name" @if(isset($conditions['name'])) value="{{$conditions['name']}}"@endif placeholder="Tìm kiếm theo tên...">--}}
                                {{--                                <div class="input-group-append">--}}
                                {{--                                    <button class="btn searchbtn" type="submit"><i class="fas fa-search"></i></button>--}}
                                {{--                                </div>--}}
                            </div>
                        </form>
                    </div>
                    <div class="MainContent">
                        <div class="menu clearfix">
                            <ul class="nav nav-tabs float-left" id="myTab">
                                @if(!isset($admin))
                                    <li class="nav-item">
                                        <a class="nav-link active"
                                           href="#">Danh sách phiếu chưa làm</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link {{(!isset($cons['live'])&&!isset($cons['died']))?'active':''}}"
                                           href="{{route('my-survey')}}">Tất cả phiếu</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{(isset($cons['live']))?'active':''}}"
                                           href="{{route('my-survey',['live'=>1])}}">Đang mở</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link  {{(isset($cons['died']))?'active':''}}" href="{{route('my-survey',['died'=>1])}}">
                                            Đã đóng
                                        </a>
                                    </li>
                                @endif
                            </ul>
                            {{--                            <ul class="nav float-right">--}}
                            {{--                                <li class="nav-item">--}}
                            {{--                                    <label for="numP" style="color: black">Kết quả / Trang: </label>--}}
                            {{--                                    <select class="form-control-sm mx-3 my-2 numP" name="numP">--}}
                            {{--                                        <option>5</option>--}}
                            {{--                                        <option>10</option>--}}
                            {{--                                        <option>20</option>--}}
                            {{--                                        <option>50</option>--}}
                            {{--                                    </select>--}}
                            {{--                                </li>--}}
                            {{--                            </ul>--}}
                        </div>
                        <!--liet ke phieu-->
                        <div id="lietkephong">
                            <ul class="list-group">
                                @foreach($surveys as $key=>$survey)
                                    @if(!isset($admin)&&$survey['admin']['id']!=decrypt($_COOKIE['id']))
                                        <li>
                                            <div class="card room">
                                                <h5 class="card-header"><a
                                                            href="{{route('survey-join',['id'=>$survey['id']])}}">{{$survey['name']}}</a>
                                                </h5>
                                                <div class="card-body row">
                                                    <div class="col-sm-8">
                                                        <p>{{$survey['descibe']}}
                                                        </p>
                                                    </div>
                                                    <div class="col-sm">
                                                        <div class="float-right">
                                                            <ul class="list-group list-group-horizontal justify-content-center">
                                                                <li class="list-group-item"><i class="fas fa-user"></i>
                                                                </li>
                                                                <li class="list-group-item"><i class="fas fa-star"></i>
                                                                </li>
                                                                <li class="list-group-item"><i class="fas fa-lock"></i>
                                                                </li>
                                                                <li class="list-group-item marked"><i
                                                                            class="fas fa-heart"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer roomfoot clearfix">
                                                    <div class="roomDetail float-left">
                                                        <i class="text-muted">{{$survey['admin']['fullName']}}
                                                            - {{$survey['created']}} - <a
                                                                    href="#">Vui lòng hoàn thành</a></i>
                                                    </div>
                                                    <a href="{{route('survey-join',['id'=>$survey['id']])}}"
                                                       class="float-right">Chi tiết <i
                                                                class="fas fa-angle-right"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                    @elseif(isset($admin)&&$survey['admin']['id']==decrypt($_COOKIE['id']))
                                        <li>
                                            <div class="card room">
                                                <h5 class="card-header"><a
                                                            href="{{route('admin-survey',['id'=>$survey['id']])}}">{{$survey['name']}}</a>
                                                </h5>
                                                <div class="card-body row">
                                                    <div class="col-sm-8">
                                                        <p>{{$survey['descibe']}}
                                                        </p>
                                                    </div>
                                                    <div class="col-sm">
                                                        <div class="float-right">
                                                            <ul class="list-group list-group-horizontal justify-content-center">
                                                                <li class="list-group-item"><i class="fas fa-user"></i>
                                                                </li>
                                                                <li class="list-group-item"><i class="fas fa-star"></i>
                                                                </li>
                                                                <li class="list-group-item"><i class="fas fa-lock"></i>
                                                                </li>
                                                                <li class="list-group-item marked"><i
                                                                            class="fas fa-heart"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer roomfoot clearfix">
                                                    <div class="roomDetail float-left">
                                                        <i class="text-muted">{{$survey['admin']['fullName']}}
                                                            - {{$survey['created']}} - <a
                                                                    href="#">Có thể kiểm tra kết quả</a></i>
                                                    </div>
                                                    <a href="{{route('survey-join',['id'=>$survey['id']])}}"
                                                       class="float-right">Chi tiết <i
                                                                class="fas fa-angle-right"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            {{--                        <nav>--}}
                            {{--                            <ul class="pagination pagination-sm justify-content-center">--}}
                            {{--                                <li class="page-item">--}}
                            {{--                                    <a class="page-link" href="#" aria-label="Previous">--}}
                            {{--                                        <span aria-hidden="true">&laquo;</span>--}}
                            {{--                                    </a>--}}
                            {{--                                </li>--}}
                            {{--                                <li class="page-item active"><a class="page-link" href="#">1</a></li>--}}
                            {{--                                <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
                            {{--                                <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
                            {{--                                <li class="page-item">--}}
                            {{--                                    <a class="page-link" href="#" aria-label="Next">--}}
                            {{--                                        <span aria-hidden="true">&raquo;</span>--}}
                            {{--                                    </a>--}}
                            {{--                                </li>--}}
                            {{--                            </ul>--}}
                            {{--                        </nav>--}}
                        </div>
                    </div>
                </div>
                <!--thanh ben phai-->
                @include('layer.right')
            </div>
        </div>
    </div>
</section>


</body>
@include('layer.footer')

</html>