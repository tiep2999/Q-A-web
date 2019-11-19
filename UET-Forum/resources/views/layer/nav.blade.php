<header>
    <!--thanh menu-->
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark">

            <a class="navbar-brand" href="#">UET-Q&A</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('dashboard')}}">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Giới thiệu</a>
                    </li>
                </ul>
                <ul class="nav justify-content-end">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Thông báo <span class="badge badge-danger">new</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg-right notification" aria-labelledby="navbarDropdown">
                            @if($cUser['role_id']==1)
                                @foreach($users as $k=>$vUser)
                                    <a class="dropdown-item" href="#">
                                        <div class="card">
                                            <div class="row no-gutters">
                                                <div class="col-md">
                                                    <img src="{{asset($vUser['avatar'])}}"
                                                         class="card-img rounded-circle"
                                                         width="auto">
                                                </div>
                                                <div class="col-md-11">
                                                    <div class="card-body">
                                                        <p>{{$vUser['fullName']}} : Xin chào admin, tôi mới tham gia vào
                                                            trang web của bạn!</p>
                                                        <p class="card-text">
                                                            <small class="text-muted">Thông báo
                                                                lúc: {{$vUser['update_date']}}</small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                                <a class="dropdown-item viewAll" href="{{route('user-list')}}"
                                   style="text-align: center">Xem
                                    tất cả</a>
                            @else
                                @foreach($notify as $k=>$v)
                                    <a class="dropdown-item" href="#">
                                        <div class="card">
                                            <div class="row no-gutters">
                                                <div class="col-md">
                                                    <img src="{{asset('css/image/user/withBG.png')}}"
                                                         class="card-img rounded-circle"
                                                         width="auto">
                                                </div>
                                                <div class="col-md-11">
                                                    <div class="card-body">
                                                        <p>Admin: {{$v['content']}}</p>
                                                        <p class="card-text">
                                                            <small class="text-muted">Thông báo
                                                                lúc: {{$v['created']}}</small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            @endif

                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <button type="button" class="btn btn-outline-light" data-toggle="dropdown"><img
                                    src="{{asset($cUser['avatar'])}}" class="rounded-circle"
                                    width="25px"> {{$_COOKIE['fullName']}}</button>
                        <div class="dropdown-menu dropdown-menu-lg-right userMenu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('profile')}}"><i class="fas fa-user"></i> Thông tin
                                cá nhân</a>
                            <a class="dropdown-item" href="{{route('room',['id'=>encrypt($cUser['remember_token'])])}}"><i
                                        class="fas fa-question-circle"></i>Phiên gần nhất
                            </a>
                            {{--                            <a class="dropdown-item" href="#"><i class="fas fa-heart"></i> Đánh dấu</a>--}}
                            <a class="dropdown-item" href={{route('logout')}}><i class="fas fa-sign-out-alt"></i> Đăng
                                xuất</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>