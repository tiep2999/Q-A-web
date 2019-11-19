<!DOCTYPE html>
<html lang="en">

@include('layer.header',['title'=>'survey-join'])
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
            document.getElementById("heart").style.color = "rgba(184, 206, 230, 0.5)";
        } else {
            document.getElementById("heart").style.color = "rgb(231, 7, 112)";
        }
    }

    var i = 2;

    function add(a) {
        if (a == i) {
            i++;
            $("#answerField").append('<div class="col-md-6"><label class= "col-form-label">Đáp án ' + i + ':</label ><input type="text" class="form-control form-control-sm" name="answer[]" id="answer" onfocus="add(' + i + ')"></div>')
        }
    }

    s
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
                        <div class="roomTitle">
                            <h3>{{$survey['name']}}</h3>
                            <div class="justify-content-between" style="display: flex">
                                <div class="justify-content-start" style="display: flex">
                                    <div style="margin-right: 15px">
                                        <i><i class="fas fa-star"></i> 4.5</i>
                                    </div>
                                    <div style="margin-right: 15px">
                                        <i><i class="fas fa-users"></i> 123</i>
                                    </div>
                                    <div style="margin-right: 15px">
                                        <i><i class="fas fa-question-circle"></i> 5</i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="roomDescribe">
                            <p>{{$survey['descibe']}}
                            </p>
                        </div>
                        <div class="roomFooter">
                            <div class="ratingBox clearfix">
                            </div>
                            <div class="userBox">
                                <div style="margin-right: 10px">
                                    <a href="#">{{$survey['admin']['fullName']}}</a>
                                    <p>Ngày tạo: {{$survey['created']}}</p>
                                </div>
                                <img src="{{asset($survey['admin']['avatar'])}}" width="35">
                            </div>
                        </div>
                        <div class="admin float-left" style="display: flex; margin-top: 1rem">
                            @if(decrypt($_COOKIE['id'])==$survey['admin']['id'])
                                <button class="btn btn-sm btn-primary" style="margin-right: 1rem;" type="button"
                                        data-toggle="collapse" data-target="#addquestion" aria-expanded="false"
                                        aria-controls="addquestion">Thêm câu hỏi <i class="fas fa-plus"></i></button>
                                <a href="{{route('show-result-survey',['id'=>$survey['id']])}}" role="button"
                                   class="btn btn-sm btn-success" style="margin-right: 1rem;">Xem
                                    kết quả <i class="fas fa-poll"></i></a>
                                {{--                                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit"--}}
                                {{--                                        data-whatever="@mdo" style="margin-right: 1rem">Chỉnh sửa <i--}}
                                {{--                                            class="fas fa-pen"></i></button>--}}
                                @if(!isset($survey['died']))
                                    <form action="{{route('delete-survey')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$survey['id']}}">
                                        <button type="submit" class="btn btn-sm btn-danger">Đóng khảo sát
                                            <i class="fas fa-door-closed"></i></button>
                                    </form>
                            @endif
                        @endif
                        <!--Khung sua phong-->
                            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content" style="color: black">
                                        <form action="" method="" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="taophong">Sửa</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Tên phiếu khảo
                                                            sát:</label>
                                                        <input type="text" class="form-control" name="tenphong"
                                                               value="Tên phòng">
                                                        <div class="row">
                                                            <div class="col-md">
                                                                <label class="col-form-label">Mật
                                                                    khẩu:</label>
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
                                                        </div>
                                                        <label class="col-form-label">Mô tả:</label>
                                                        <textarea class="form-control"
                                                                  rows="3">Mổ tả của phiên</textarea>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                {{--                                                <button type="button" class="btn btn-secondary"--}}
                                                {{--                                                        data-dismiss="modal">Hủy--}}
                                                {{--                                                </button>--}}
                                                <input type="submit" class="btn btn-info" id="edit" name="sua"
                                                       value="Cập nhật">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!---->
                        </div>
                        <div class="clearfix"></div>
                        <!--Khung them cau hoi-->
                        <div class="collapse" id="addquestion">
                            <div class="card card-body">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                           href="#pills-home" role="tab" aria-controls="pills-home"
                                           aria-selected="true">Nhiều đáp án</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                           href="#pills-profile" role="tab" aria-controls="pills-profile"
                                           aria-selected="false">Đúng sai</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill"
                                           href="#pills-contact" role="tab" aria-controls="pills-contact"
                                           aria-selected="false">Đáp án văn bản</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                         aria-labelledby="pills-home-tab">
                                        <form class="form-group" action="{{route('question-survey-post')}}"
                                              method="post">
                                            @csrf
                                            <input type="hidden" name="survey_id" value="{{$survey['id']}}">
                                            <input type="hidden" name="type_id" value="1">
                                            <div class="form-group">
                                                <label class="col-form-label">Câu hỏi:</label>
                                                <input type="text" class="form-control form-control-sm"
                                                       name="question">
                                                <div class="row" id="answerField">
                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Đáp án 1:</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                               name="answer[]" id="answer1">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Đáp án 2:</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                               name="answer[]" id="answer" onfocus="add(2)">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="buttons">
                                                <input type="submit" class="btn btn-primary" id="taopks" name="tao"
                                                       value="Tạo">
                                                {{--                                                <button type="button" class="btn btn-secondary">Hủy</button>--}}
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                         aria-labelledby="pills-profile-tab">
                                        <form class="form-group" action="{{route('question-survey-post')}}"
                                              method="post">
                                            @csrf
                                            <input type="hidden" name="survey_id" value="{{$survey['id']}}">
                                            <input type="hidden" name="type_id" value="2">
                                            <div class="form-group">
                                                <label class="col-form-label">Câu hỏi:</label>
                                                <input type="text" class="form-control form-control-sm"
                                                       name="question">
                                            </div>
                                            <input type="hidden" name="answer[]" value="YES">
                                            <input type="hidden" name="answer[]" value="NO">
                                            <div class="buttons">
                                                <input type="submit" class="btn btn-primary" id="taopks" name="tao"
                                                       value="Tạo">
                                                {{--                                                <button type="button" class="btn btn-secondary"--}}
                                                {{--                                                        data-dismiss="modal">Hủy--}}
                                                {{--                                                </button>--}}
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                         aria-labelledby="pills-contact-tab">
                                        <form class="form-group" action="{{route('question-survey-post')}}"
                                              method="post">
                                            @csrf
                                            <input type="hidden" name="survey_id" value="{{$survey['id']}}">
                                            <input type="hidden" name="type_id" value="3">
                                            <div class="form-group">
                                                <label class="col-form-label">Câu hỏi:</label>
                                                <input type="text" class="form-control form-control-sm"
                                                       name="question">
                                            </div>
                                            <div class="buttons">
                                                <input type="submit" class="btn btn-primary" id="taopks" name="tao"
                                                       value="Tạo">
                                                {{--                                                <button type="button" class="btn btn-secondary"--}}
                                                {{--                                                        data-dismiss="modal">Hủy--}}
                                                {{--                                                </button>--}}
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---->
                        <!---->
                    </div>
                    <div class="surveys">
                        <div class="title">
                            <h5>Danh sách câu hỏi</h5>
                        </div>
                        <form action="{{route('answer-post')}}" method="post" id="form-survey" class="surveysList">
                            @csrf
                            <input type="hidden" name="id" value="{{$survey['id']}}">
                            @foreach($survey['question'] as $key=>$question)
                                @if($question['type_id']==1)
                                    <div class="question">
                                        <div class="qTitle">{{$question['content']}}</div>
                                        <ul>
                                            @foreach($question['answer'] as $value)
                                                <li>
                                                    <input type="radio" name="{{$question['id']}}"
                                                           value="{{$value['id']}}">
                                                    <p>{{$value['content']}}</p>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @elseif($question['type_id']==2)
                                    <div class="question">
                                        <div class="qTitle">{{$question['content']}}</div>
                                        <ul>
                                            @foreach($question['answer'] as $value)
                                                <li>
                                                    <input type="radio" name="{{$question['id']}}"
                                                           value="{{$value['id']}}">
                                                    <p>@if($value['content']=='YES') {{'Đúng'}} @else {{'Sai'}} @endif</p>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @else
                                    <div class="question">
                                        <div class="qTitle">{{$question['content']}}</div>
                                        <textarea form="form-survey" name="{{$question['id']}}" class="form-control"
                                                  rows="3"></textarea>
                                    </div>
                                @endif
                            @endforeach
                            @if(decrypt($_COOKIE['id'])!=$survey['admin']['id'])
                                <div class="buttons">
                                    <input type="submit" class="btn btn-primary" id="taophong" name="accept"
                                           value="Xác nhận">
                                    {{--                                <button type="button" class="btn btn-secondary">Hủy</button>--}}
                                </div>
                            @endif
                        </form>
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