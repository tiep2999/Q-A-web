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

    function showComment(id) {
        var content = document.getElementById(id).textContent;
        document.getElementById("commentForm").innerText = content;
        document.getElementById("commentId").value = id;
        // document.getElementById('reject').style.visibility = 'hidden';
        document.getElementById('reject').style.visibility = 'visible';

    }

    function reject() {
        alert('aassa');
        document.getElementById("commentForm").innerText = '';
        document.getElementById("commentId").value = '';
        document.getElementById('reject').style.visibility = 'hidden';
        return 0;
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
                        <div class="roomTitle" style="border: none">
                            <h4>{{$question['content']}}</h4>
                        </div>
                        <div class="roomFooter">
                            <div class="clearfix">
                                <div class="float-left">
                                    <a href="{{route('room',['id'=>encrypt($question['room_id']['id'])])}}">
                                        <button type="button" class="btn btn-sm btn-outline-dark float-left"
                                                style="margin-right: 1rem"><i class="fas fa-arrow-left"></i> Trở về
                                        </button>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-outline-dark float-left"
                                            style="margin-right: 1rem"><i class="far fa-caret-square-up"></i> Upvote
                                        (123)
                                    </button>
                                </div>
                                <!--Cho chu cau hoi-->
                                <div class="float-left" style="display: flex">
                                {{-- <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit"--}}
                                {{-- data-whatever="@mdo" style="margin-right: 1rem">Chỉnh sửa <i--}}
                                {{-- class="fas fa-pen"></i></button>--}}
                                <!--Khung sua cau hoi-->
                                {{-- <div class="modal fade" id="edit" tabindex="-1" role="dialog"--}}
                                {{-- aria-labelledby="edit" aria-hidden="true">--}}
                                {{-- <div class="modal-dialog" role="document">--}}
                                {{-- <div class="modal-content" style="color: black">--}}
                                {{-- <form action="" method="" enctype="multipart/form-data">--}}
                                {{-- <div class="modal-header">--}}
                                {{-- <h5 class="modal-title" id="taophong">Sửa câu hỏi</h5>--}}
                                {{-- <button type="button" class="close" data-dismiss="modal"--}}
                                {{-- aria-label="Close">--}}
                                {{-- <span aria-hidden="true">&times;</span>--}}
                                {{-- </button>--}}
                                {{-- </div>--}}
                                {{-- <div class="modal-body">--}}
                                {{-- <form>--}}
                                {{-- <textarea class="form-control"--}}
                                {{-- rows="4">Nội dung câu hỏi</textarea>--}}
                                {{-- </form>--}}
                                {{-- </div>--}}
                                {{-- <div class="modal-footer">--}}
                                {{-- <button type="button" class="btn btn-secondary"--}}
                                {{-- data-dismiss="modal">Hủy--}}
                                {{-- </button>--}}
                                {{-- <input type="submit" class="btn btn-info" id="edit"--}}
                                {{-- name="sua" value="Cập nhật">--}}
                                {{-- </div>--}}
                                {{-- </form>--}}
                                {{-- </div>--}}
                                {{-- </div>--}}
                                {{-- </div>--}}
                                <!---->
                                    @if(decrypt($_COOKIE['id'])==$question['user_id']['id'])
                                        <form method="post"
                                              action="{{route('delete-question',['id'=>$question['id']])}}">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                    style="margin-right: 1rem">Xóa câu hỏi <i
                                                        class="fas fa-trash"></i></button>
                                        </form>
                                    @endif
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
                                    <textarea name="comment" form="post-comment" class="form-control" id="commentForm"
                                              rows="3" placeholder="Trả lời câu hỏi..."></textarea>
                                    <form method="post" id="post-comment" action="{{route('post-comment')}}">
                                        @csrf
                                        <input type="hidden" value="" name="commentId" id="commentId">
                                        <input type="hidden" name="user_id" value="{{$curUser['id']}}">
                                        <input type="hidden" name="question_id" value="{{$question['id']}}">
                                        <button type="submit" class="btn btn-sm btn-primary">Đăng<i
                                                    class=" far fa-comment"></i></button>
                                        <button style="visibility: hidden" id="reject" onclick="return reject()"
                                                class="btn btn-sm btn-danger">
                                            Hủy<i class="fa fa-window-close"></i></button>
                                    </form>
                                </div>
                                <div class="commentShow">
                                    <ul class="list-group">
                                        <!-- list comment -->
                                        @foreach($comments as $comment)
                                            <li class="list-group-item">
                                                <div class="userAvatar">
                                                    <img src="{{asset('css/image/user/withBG.png')}}"
                                                         class="rounded-circle" width="35">
                                                </div>
                                                <div class="commentText">
                                                    <div class="userName justify-content-between">
                                                        <div>
                                                            <div class="name"><a
                                                                        href="#">{{$comment['user_id']['fullName']}}</a>
                                                            </div>
                                                            <div class="small text-muted">{{$comment['lastUpdated']}}</div>
                                                        </div>
                                                        @if($comment['up']==1)
                                                            <div class="commentPin">
                                                                <i class="fas fa-thumbtack"></i> Bình
                                                                luận được ghim
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="userComment">
                                                        <p id="{{$comment['id']}}">{{$comment['content']}}</p>
                                                    </div>
                                                    <div class="extraButtons clearfix">
                                                        <!--Cho admin phong-->
                                                        @if(decrypt($_COOKIE['id'])==$question['user_id']['id']&&$comment['up']==1)
                                                            <form method="post"
                                                                  action="{{route('down',['id'=>$comment['id']])}}">
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm btn-danger">Bỏ
                                                                    ghim
                                                                </button>
                                                            </form>
                                                        @endif
                                                        @if(decrypt($_COOKIE['id'])==$question['user_id']['id']&&$comment['up']==0)
                                                            <form method="post"
                                                                  action="{{route('up',['id'=>$comment['id']])}}">
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm btn-success">
                                                                    ghim
                                                                </button>
                                                            </form>
                                                        @endif
                                                    <!--Cho chu comment-->
                                                        @if(decrypt($_COOKIE['id'])==$comment['user_id']['id'])
                                                            <form method="post" action="{{route('delete-comment')}}">
                                                                @csrf
                                                                <input name="id" value="{{$comment['id']}}"
                                                                       type="hidden">
                                                                <button type="submit"
                                                                        class="btn btn-sm btn-danger float-right"
                                                                        style="margin-right: 0">Xóa
                                                                </button>
                                                            </form>
                                                            <button type="submit"
                                                                    onclick="showComment({{$comment['id']}})"
                                                                    class="btn btn-sm btn-success float-right">Chỉnh
                                                                sửa
                                                            </button>
                                                        @endif
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