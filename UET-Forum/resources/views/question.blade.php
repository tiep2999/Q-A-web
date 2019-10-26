<!DOCTYPE html>
<html lang="en">

@include('layer.header',['title'=>'question'])
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
                <div class="col-md-7 centerBar">
                    <div class="MainContent">
                        <div class="roomTitle" style="border: none">
                            <h4>{{$question['content']}}</h4>
                        </div>
                        <div class="roomFooter">
                            <div class="clearfix">
                                <div class="float-left">
                                    <a href="{{route('room',['id'=>encrypt($question['room_id']['id'])])}}">
                                        <button type="button" class="btn btn-sm btn-outline-light float-left"
                                                style="margin-right: 1rem"><i class="fas fa-arrow-left"></i> Trở về
                                        </button>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-outline-light float-left"
                                            style="margin-right: 1rem"><i class="far fa-caret-square-up"></i> Upvote
                                        (123)
                                    </button>
                                </div>
                                <!--Cho chu cau hoi-->
                                <div class="float-left" style="display: flex">
                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit"
                                            data-whatever="@mdo" style="margin-right: 1rem">Chỉnh sửa <i
                                                class="fas fa-pen"></i></button>
                                    <!--Khung sua cau hoi-->
                                    <div class="modal fade" id="edit" tabindex="-1" role="dialog"
                                         aria-labelledby="edit" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content" style="color: black">
                                                <form action="" method="" enctype="multipart/form-data">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="taophong">Sửa câu hỏi</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                                <textarea class="form-control"
                                                                          rows="4">Nội dung câu hỏi</textarea>
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
                                    <button class="btn btn-sm btn-danger" style="margin-right: 1rem">Xóa câu hỏi <i
                                                class="fas fa-trash"></i></button>
                                </div>
                                <!---->
                            </div>
                            <div class="userBox">
                                <div style="margin-right: 10px">
                                    <a href="#">{{$question['user_id']['fullName']}}</a>
                                    <p>Ngày tạo: {{$question['created']}}</p>
                                </div>
                                <img src="{{asset('css/image/user/withBG.png')}}" width="35">
                            </div>
                        </div>
                        <div class="comment">
                            <div class="commentHead justify-content-between">
                                <div>
                                    <h5>Trả lời</h5>
                                </div>
                            </div>
                            <div class="commentBody">
                                <div class="form-group postComment">
                                        <textarea class="form-control" id="commentForm" rows="3"
                                                  placeholder="Trả lời câu hỏi..."></textarea>
                                    <button type="submit" class="btn btn-sm btn-primary">Đăng <i
                                                class="far fa-comment"></i></button>
                                </div>
                                <div class="commentShow">
                                    <ul class="list-group">
                                        <!-- list comment -->
                                        @foreach($comments as $comment)
                                            <li class="list-group-item">
                                                <div class="userAvatar">
                                                    <img src="{{asset('css/image/user/withBG.png')}}" class="rounded-circle" width="35">
                                                </div>
                                                <div class="commentText">
                                                    <div class="userName justify-content-between">
                                                        <div>
                                                            <div class="name"><a href="#">{{$comment['user_id']['fullName']}}</a></div>
                                                            <div class="small text-muted">{{$comment['lastUpdated']}}</div>
                                                        </div>
                                                        <div class="commentPin">
                                                            <i class="fas fa-thumbtack"></i> Bình
                                                            luận được ghim
                                                        </div>
                                                    </div>
                                                    <div class="userComment">
                                                        {{$comment['content']}}

                                                    </div>
                                                    <div class="extraButtons clearfix">
                                                        <!--Cho admin phong-->
                                                        <button type="button" class="btn btn-sm btn-info">Bỏ
                                                            ghim
                                                        </button>
                                                        <!--Cho chu comment-->
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