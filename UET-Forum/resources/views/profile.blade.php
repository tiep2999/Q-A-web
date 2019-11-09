<!DOCTYPE html>
<html lang="en">

@include('layer.header',['title'=>'profile'])

<body>
    <!--Back to top button-->
    <a id="BTTbutton"></a>
    <script>
        var btn = $('#BTTbutton');
        $(window).scroll(function() {
            if ($(window).scrollTop() > 300) {
                btn.addClass('show');
            } else {
                btn.removeClass('show');
            }
        });
        btn.on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: 0
            }, '300');
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
                            <div class="profileInfo row">
                                <div class="col-md-4 userInfo">
                                    <img src="{{asset('css/image/user/withBG.png')}}" width="100%">
                                    <h4>{{$cUser['fullName']}}</h4>
                                    <h5>{{$cUser['userName']}}</h5>
                                    <p><i class="fas fa-info-circle"></i> Nam</p>
                                    <p><i class="fas fa-birthday-cake"></i> {{$cUser['dateOfBirth']}}</p>
                                    <p><i class="fas fa-envelope"></i> {{$cUser['email']}}</p>
                                    <button type="button" class="btn btn-outline-dark btn-block" data-toggle="modal" data-target="#editprofile" data-whatever="@mdo"><i class="fas fa-pen"></i>
                                        Chỉnh sửa
                                    </button>
                                    <!--khung sua thong tin-->
                                    <div class="modal fade" id="editprofile" tabindex="-1" role="dialog" aria-labelledby="editprofile" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form action="" method="" enctype="multipart/form-data">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="taophong" style="color: black">Chỉnh
                                                            sửa thông tin</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                            <div class="form-group">
                                                                <label class="col-form-label">Họ tên:</label>
                                                                <input type="text" class="form-control" value="Nguyễn Tuấn Linh">
                                                                <label class="col-form-label">Ảnh đại diện:</label>
                                                                <input type="file" class="form-control-file">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label class="col-form-label">Giới tính:</label>
                                                                        <select class="form-control">
                                                                            <option>Nam</option>
                                                                            <option>Nữ</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="col-form-label">Ngày sinh:</label>
                                                                        <input type="date" class="form-control" value="1999-03-12">
                                                                    </div>
                                                                </div>
                                                                <label class="col-form-label">Email:</label>
                                                                <input type="email" class="form-control" value="thunderking9x@gmail.com">
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy
                                                        </button>
                                                        <input type="submit" class="btn btn-info" id="editprofile" name="sua" value="Cập nhật">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!---->
                                </div>
                                <div class="col-md-8 roomList">
                                    <div class="myRoom">
                                        <div class="title justify-content-between d-flex align-items-center">
                                            <div>
                                                <h4>Phòng của tôi</h4>
                                            </div>
                                            <div>
                                                <a href="#"><i class="fa fa-angle-double-right"></i>Xem tất cả</a>

                                            </div>
                                        </div>
                                        <div class="list-group">
                                            @foreach($rooms as $room)
                                            <a href="{{route('room',['id'=>encrypt($room['id'])])}}" class="list-group-item list-group-item-action">{{$room['name']}}</a>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="markedRoom">
                                        <div class="title justify-content-between d-flex align-items-center">
                                            <div>
                                                <h4>Phòng đánh dấu</h4>
                                            </div>
                                            <div>
                                                <a href="#" style="color: rgb(23, 129, 194)"><i></i>Xem tất cả</a>
                                            </div>
                                        </div>
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action">Phòng số 1</a>
                                            <a href="#" class="list-group-item list-group-item-action">Phòng số 2</a>
                                            <a href="#" class="list-group-item list-group-item-action">Phòng số 3</a>
                                            <a href="#" class="list-group-item list-group-item-action">Phòng số 4</a>
                                            <a href="#" class="list-group-item list-group-item-action">Phòng số 5</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--thanh ben phai-->
                    @include('layer.right',['search'=>'room'])
                </div>
            </div>
        </div>
    </section>

</body>

@include('layer.footer')

</html>