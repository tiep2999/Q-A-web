<!DOCTYPE html>
<html lang="en">

@include('layer.header',['title'=>'room'])
<body>
<!--Back to top button-->
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


<!--thanh menu-->
@include('layer.nav')
<section class="homeContent">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <!--thanh menu trai-->
            @include('layer.left')
            <!--phan noi dung giua-->
                <div class="col-md-7 centerBar">
                    <div class="MainContent">
                        <div class="roomTitle">
                            <h3>{{$room['name']}}</h3>
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
                                <div><a href="#">{{$room['category_id']['name']}}</a></div>
                            </div>
                        </div>
                        <div class="roomDescribe">
                            <p>{{$room['describe']}}
                            </p>
                        </div>
                        <div class="roomFooter">
                            <div class="ratingBox clearfix">
                                <!--Cho admin phong-->
                                <div class="float-left" style="display: inherit">
                                    <button class="btn btn-sm btn-danger" style="margin-right: 1rem">Đóng phòng <i
                                                class="fas fa-door-closed"></i></button>
                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit"
                                            data-whatever="@mdo" style="margin-right: 1rem">Chỉnh sửa <i
                                                class="fas fa-pen"></i></button>
                                    <!--Khung sua phong-->
                                    <div class="modal fade" id="edit" tabindex="-1" role="dialog"
                                         aria-labelledby="edit" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content" style="color: black">
                                                <form action="" method="" enctype="multipart/form-data">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="taophong">Sửa phòng</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                            <div class="form-group">
                                                                <label class="col-form-label">Tên phòng:</label>
                                                                <input type="text" class="form-control"
                                                                       name="tenphong" value="Tên phòng">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label class="col-form-label">Mật khẩu
                                                                            phòng:</label>
                                                                        <input type="text" class="form-control"
                                                                               name="matkhau" id="matkhau"
                                                                               value="matkhaucu">
                                                                        <small id="matkhau" class="form-text"
                                                                               style="color: #007bff">Để trống nếu
                                                                            không
                                                                            đặt
                                                                            mật
                                                                            khẩu
                                                                        </small>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="col-form-label">Chủ
                                                                            đề:</label>
                                                                        <select class="form-control">
                                                                            <option>Chủ đề 1</option>
                                                                            <option>Chủ đề 2</option>
                                                                            <option>Chủ đề 3</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <label class="col-form-label">Mô tả:</label>
                                                                <textarea class="form-control"
                                                                          rows="3">Mổ tả của phòng</textarea>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Hủy
                                                        </button>
                                                        <input type="submit" class="btn btn-info" id="edit"
                                                               name="sua" value="Cập nhật">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!---->
                                </div>
                                <!---->
                                <div class="float-left">
                                    <button class="btn btn-sm btn-outline-light" onclick="marked()">Đánh dấu<i
                                                class="fas fa-heart" id="heart" style="margin-left: 5px"></i></button>
                                </div>
                                <div class="starrating risingstar flex-row-reverse">
                                    <input type="radio" id="star5" name="rating" value="5"/><label for="star5"
                                                                                                   title="5 star"></label>
                                    <input type="radio" id="star4" name="rating" value="4"/><label for="star4"
                                                                                                   title="4 star"></label>
                                    <input type="radio" id="star3" name="rating" value="3"/><label for="star3"
                                                                                                   title="3 star"></label>
                                    <input type="radio" id="star2" name="rating" value="2"/><label for="star2"
                                                                                                   title="2 star"></label>
                                    <input type="radio" id="star1" name="rating" value="1"/><label for="star1"
                                                                                                   title="1 star"></label>
                                    <p>Đánh giá</p>
                                </div>
                            </div>
                            <div class="userBox">
                                <div style="margin-right: 10px">
                                    <a href="#">{{$room['admin']['fullName']}}</a>
                                    <p>Ngày tạo: 19:31 22/08/2019</p>
                                </div>
                                <img src="{{asset('css/image/user/withBG.png')}}" width="35">
                            </div>
                        </div>
                        <div class="comment">
                            <div class="commentHead justify-content-between">
                                <div>
                                    <h5>Đặt Câu hỏi</h5>
                                </div>
                            </div>
                            <div class="commentBody">
                                <div class="form-group postComment clearfix">
                                        <textarea name="question" class="form-control" form="post-question" id="commentForm" rows="3"
                                                  placeholder="Viết câu hỏi..."></textarea>
                                    <a role="button" href="#" class="btn btn-sm btn-outline-light float-left"
                                       style="margin-right: 10px"><i class="fab fa-facebook-square"></i> Chia
                                        sẻ</a>
                                    <a role="button" href="#" class="btn btn-sm btn-outline-light float-left"><i
                                                class="far fa-envelope"></i> Chia sẻ</a>
                                    <form id="post-question" method="post" action="{{route('post-question')}}">
                                        @csrf
                                        <input name="user_id" value="{{$curUser['id']}}" type="hidden">
                                        <input type="hidden" name="room_id" value="{{$room['id']}}">
                                        <button type="submit" class="btn btn-sm btn-primary float-right">Đăng <i
                                                    class="far fa-comment"></i></button>
                                    </form>
                                </div>
                                <div class="commentOptions justify-content-between">
                                    <div class="commentSearch">
                                        <form class="form-inline">
                                            <div class="input-group searchbox">
                                                <input type="search" class="form-control form-control-sm"
                                                       placeholder="Tìm kiếm...">
                                                <div class="input-group-append">
                                                    <button class="btn btn-sm searchbtn" type="button">Tìm câu
                                                        hỏi
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div>
                                        <label for="sort" style="color: #bcd">Sắp xếp theo: </label>
                                        <select class="form-control-sm" name="sort">
                                            <option>Nổi bật nhất</option>
                                            <option>Mới nhất</option>
                                            <option>Cũ nhất</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="commentShow">
                                    <ul class="list-group">
                                        <!-- list comment -->
                                        @foreach($question as $que)
                                            <li class="list-group-item">
                                                <div class="userAvatar">
                                                    <img src="{{asset('css/image/user/withBG.png')}}"
                                                         class="rounded-circle" width="35">
                                                </div>
                                                <div class="commentText">
                                                    <div class="commentWrapper">
                                                        <div class="userName justify-content-between">
                                                            <div>
                                                                <div class="name"><a
                                                                            href="#">{{$que['user_id']['fullName']}}</a>
                                                                </div>
                                                                <div class="small text-muted">{{$que['created']}}</div>
                                                            </div>
                                                        </div>
                                                        <div class="userComment">
                                                            {{$que['content']}}
                                                        </div>
                                                    </div>
                                                    <div class="extraButtons clearfix">
                                                        @if($que['id']==session('cId'))
                                                            <button type="button"
                                                                    class="btn btn-sm btn-outline-light float-left"><i
                                                                        class="far fa-caret-square-up"></i> Upvote
                                                                (123)
                                                            </button>
                                                        @endif
                                                        <a role="button" href="{{route('question',['id'=>$que['id']])}}"
                                                           class="btn btn-sm btn-outline-light float-left"><i
                                                                    class="fas fa-comment"></i> Trả lời (5)</a>
                                                        <!--Cho chu cau hoi-->
                                                        <button type="button" class="btn btn-sm btn-danger float-right"
                                                                style="margin-right: 0">Xóa
                                                        </button>
                                                        <button type="button"
                                                                class="btn btn-sm btn-success float-right">Chỉnh
                                                            sửa
                                                        </button>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach

                                    </ul>
                                    <nav style="margin-top: 15px">
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