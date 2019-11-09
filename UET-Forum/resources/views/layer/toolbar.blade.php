<header>
    <!--thanh menu-->
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="#">UET-Q&A</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    {{--                        <li class="nav-item active">--}}
                    {{--                            <a class="nav-link" href="#">Trang chủ <span class="sr-only">(current)</span></a>--}}
                    {{--                        </li>--}}
                    <li class="nav-item">
                        <a class="nav-link" href="#">Giới thiệu</a>
                    </li>
                </ul>
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Đăng nhập</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('sign-up')}}" class="btn btn-outline-light">Đăng ký</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
