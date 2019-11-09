<!DOCTYPE html>
<html lang="en">

@include('layer.header',['title'=>'login'])

<body>
    @include('layer.toolbar')

    <body>
        <!--form dang nhap-->
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-7 col-md-4 loginform">
                    <h3>Đăng nhập</h3>
                    <form method="post" action='login' class="form-container">
                        @csrf
                        <div class="form-group">
                            <label for="userName">Tên đăng nhập</label>
                            <input name="userName" type="text" class="form-control" id="userName" placeholder="Nhập tên đăng nhập">
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input name="password" type="password" class="form-control" id="password" aria-errormessage="forgetPass" placeholder="Nhập mật khẩu">
                            <small id="forgetPass" class="form-text text-muted"><a href="#">Quên mật khẩu?</a></small>
                        </div>
                        <div class="form-group form-check">
                            <input name="remember" type="checkbox" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Đăng nhập <i class="fas fa-sign-in-alt" style="padding-left: 5px"></i></button>
                        <div class="container-fluid social">
                            <p>Hoặc đăng nhập bằng</p>
                            <ul class="list-group list-group-horizontal justify-content-center">
                                <li class="list-group-item"><a href="#"><img src={{asset("css/image/icons/facebook.svg")}} width="40px"></a></li>
                                <li class="list-group-item"><a href="#"><img src={{asset("css/image/icons/search.svg")}} width="40px"></a>
                                </li>
                                <li class="list-group-item"><a href="#"><img src={{asset("css/image/icons/twitter.svg")}} width="40px"></a>
                                </li>
                            </ul>
                        </div>
                    </form>
                    <div class="sign-up">
                        <p>Chưa có tài khoản? <a href="{{route("sign-up")}}">Đăng ký ngay.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </body>


</body>
@include('layer.footer')

</html>