<!DOCTYPE html>
<html lang="en">

@include('layer.header',['title'=>'signup'])
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
            $('html, body').animate({ scrollTop: 0 }, '300');
        });
    </script>
        <!--thanh menu-->
        @include('layer.toolbar')

    <body>
        <!--form dang ky-->
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-7 col-md-5 signupform">
                    <h3>{{@trans('lang.signup')}}</h3>
                    <div class="sign-up">
                        <p>Đã có tài khoản? <a href="{{route('login')}}">Đăng nhập ngay.</a></p>
                    </div>
                    <form class="form-container">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Nhập địa chỉ Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" aria-errormessage="passHelp"
                                   placeholder="Nhập mật khẩu">
                            <small id="passHelp" class="form-text">Đảm bảo mật khẩu của bạn đủ mạnh</small>
                        </div>
                        <div class="form-group">
                            <label for="Repassword">Mật khẩu</label>
                            <input type="password" class="form-control" id="Repassword" aria-errormessage="RepassHelp"
                                   placeholder="Nhập lại mật khẩu">
                            <small id="RepassHelp" class="form-text">Cần trùng khớp với mật khẩu đã tạo bên
                                trên</small>
                        </div>
                        <div class="form-group">
                            <label for="userName">Tên đăng nhập</label>
                            <input type="text" class="form-control" id="userName" placeholder="Nhập tên đăng nhập">
                        </div>
                        <div class="form-group">
                            <label for="trueName">Họ và tên</label>
                            <input type="text" class="form-control" id="trueName" placeholder="Nhập họ tên">
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="birthDay">Ngày sinh</label>
                                <input type="date" class="form-control" id="birthDay" placeholder="Nhập ngày sinh">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="gender">Giới tính</label>
                                <select class="form-control">
                                    <option>Nam</option>
                                    <option>Nữ</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="agree">
                            <label class="form-check-label" for="agree">Chấp nhận tất cả các điều khoản</label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Tạo tài khoản</button>
                        <div class="container-fluid social">
                            <p>Hoặc đăng ký bằng</p>
                            <ul class="list-group list-group-horizontal justify-content-center">
                                <li class="list-group-item"><a href="#"><img src="{{asset('css/image/icons/facebook.svg')}}"
                                                                             width="40px"></a></li>
                                <li class="list-group-item"><a href="#"><img src="{{asset('css/image/icons/search.svg')}}"
                                                                             width="40px"></a>
                                </li>
                                <li class="list-group-item"><a href="#"><img src="{{asset('css/image/icons/twitter.svg')}}"
                                                                             width="40px"></a>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</body>
@include('layer.footer')
</html>