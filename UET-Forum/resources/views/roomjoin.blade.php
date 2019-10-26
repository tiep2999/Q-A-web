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
            $('html, body').animate({ scrollTop: 0 }, '300');
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
                    <div class="col-7 centerBar">
                        <div class="MainContent">
                            <div class="roomTitle">
                                <h3>Ứng dụng của machine learning vào việc phát triển xe tự hành hiện nay</h3>
                                <div class="justify-content-between" style="display: flex">
                                    <div class="justify-content-start" style="display: flex">
                                        <div style="margin-right: 15px">
                                            <i><i class="fas fa-star"></i> 4.5</i>
                                        </div>
                                        <div style="margin-right: 15px">
                                            <i><i class="fas fa-users"></i> 123</i>
                                        </div>
                                        <div style="margin-right: 15px">
                                            <i><i class="fas fa-comments"></i> 30</i>
                                        </div>
                                    </div>
                                    <div><a href="#">Chủ đề</a></div>
                                </div>
                            </div>
                            <div class="roomDescribe">
                                <p>gbjbuibgbuifubibkbuhiuighibhuihbuihghbihg bifbigbihbi gbigbhib bigfbi b gbi brgbib b
                                    igbbrgihbi gifbhibkg bib bkfibibk fb ifhb fdsb dbibk bidfbi bkdfbib jfbi db jdbfibv
                                </p>
                            </div>
                            <div class="roomFooter roomJoin">
                                <div class="form-group clearfix" style="color: white">
                                    <div class="float-left">
                                        <input type="password" class="form-control form-control-sm" id="password"
                                            aria-errormessage="passHelp" placeholder="Nhập mật khẩu">
                                        <small id="passHelp" class="form-text">Để trống nếu không có mật khẩu</small>
                                    </div>
                                    <button class="btn btn-sm btn-primary float-left" type="submit">Tham gia</button>
                                </div>
                                <div class="userBox">
                                    <div style="margin-right: 10px">
                                        <a href="#">Nguyễn Tuấn Linh</a>
                                        <p>Ngày tạo: 19:31 22/08/2019</p>
                                    </div>
                                    <img src="{{asset('css/image/user/withBG.png')}}" width="35">
                                </div>
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