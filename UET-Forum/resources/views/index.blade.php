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
        $('html, body').animate({scrollTop: 0}, '300');
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
                <div class="col-md-7 centerBar">
                    <div class="MainHeader clearfix">
                        <h3 class="float-left" style="margin-left: 10px">Tất cả các phòng</h3>
                        <form action='{{route('dashboard-search')}}' method="get" class="form float-right">
                            <div class="input-group searchbox">
                                <input type="search" class="form-control" name="code" placeholder="Tìm kiếm...">
                                <div class="input-group-append">
                                    <button class="btn searchbtn" type="submit"><i
                                                class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="MainContent">
                        <div class="menu clearfix">
                            <ul class="nav nav-tabs float-left" id="myTab">
                                <li class="nav-item">
                                    <a class="nav-link active" href="http://forum.com.vn/uet-forum/dashboard-search?new=1">Mới nhất</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="http://forum.com.vn/uet-forum/dashboard-search?voted=3">Nổi bật</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Đã
                                        tham gia</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="http://forum.com.vn/uet-forum/dashboard-search?deleted=1">Đã
                                        đóng</a>
                                </li>
                            </ul>
                            <ul class="nav float-right">
                                <li class="nav-item">
                                    <label for="numP" style="color: #bcd">Kết quả / Trang: </label>
                                    <select class="form-control-sm mx-3 my-2" name="numP">
                                        <option>5</option>
                                        <option>10</option>
                                        <option>20</option>
                                        <option>50</option>
                                    </select>
                                </li>
                            </ul>
                        </div>
                        <!--liet ke phong-->
                        <div id="lietkephong">
                            <ul class="list-group">
                                @foreach($rooms as $key=>$room)
                                <li>
                                    <div class="card room">
                                        <h5 class="card-header"><a href="{{route('room',['id'=>encrypt($room['id'])])}}">{{$room['code']}}</a></h5>
                                        <div class="card-body row">
                                            <div class="col-sm-8">
                                                <p>{{$room['name']}}
                                                </p>
                                            </div>
                                            <div class="col-sm">
                                                <div class="float-right">
                                                    <ul
                                                            class="list-group list-group-horizontal justify-content-center">
                                                        <li class="list-group-item"><i class="fas fa-user"></i>
                                                            123
                                                        </li>
                                                        <li class="list-group-item"><i class="fas fa-star"></i>
                                                            4.5
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
                                                <i class="text-muted"> -{{$room['admin']['fullName']}} - {{$room['created']}} <a href="#">{{$room['category_id']['name']}}</a></i>
                                            </div>
                                            <a class="float-right" href="{{route('room',['id'=>encrypt($room['id'])])}}">Chi tiết <i
                                                        class="fas fa-angle-right"></i></a>
                                        </div>
                                    </div>
                                </li>
                                    @endforeach

                            </ul>
                            <nav>
                                <ul class="pagination pagination-sm justify-content-center">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
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