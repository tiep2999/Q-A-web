<div class="col-md leftBar">
    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#taophong" data-whatever="@mdo"><i class="fas fa-plus-circle"></i> Tạo mới
    </button>
    <!--Khung tao phong-->
    <div class="modal fade" id="taophong" tabindex="-1" role="dialog" aria-labelledby="taophong" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-question-tab" data-toggle="tab" href="#nav-question" role="tab" aria-controls="nav-question" aria-selected="true">Phiên hỏi đáp</a>
                            <a class="nav-item nav-link" id="nav-form-tab" data-toggle="tab" href="#nav-form" role="tab" aria-controls="nav-form" aria-selected="false">Phiếu khảo sát</a>
                        </div>
                    </nav>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-question" role="tabpanel" aria-labelledby="nav-question-tab">
                        <form method="post" id="post-room" action="{{route('post-room')}}">
                            @csrf
                            <div class="modal-body">

                                <div class="form-group">
                                    <input type="hidden" name="user_id" value="{{$curUser['id']}}">
                                    <label class="col-form-label">Tên phiên hỏi đáp:</label>
                                    <input type="text" class="form-control" name="name">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="col-form-label">Mật khẩu:</label>
                                            <input type="text" class="form-control" name="password" id="matkhau">
                                            <small id="matkhau" class="form-text" style="color: #007bff">Để trống nếu không
                                                đặt
                                                mật
                                                khẩu
                                            </small>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label">Chủ đề:</label>

                                            <select name="cate" class="form-control">

                                                @foreach($cates as $cate)

                                                <option value="{{$cate['id']}}">{{$cate['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <label class="col-form-label">Mô tả:</label>
                                    <textarea name="describe" form="post-room" class="form-control" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy
                                </button>
                                <input type="submit" class="btn btn-primary" id="taophong" name="createdRoom" value="Tạo">
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="nav-form" role="tabpanel" aria-labelledby="nav-from-tab">
                        <form action="" method="" enctype="multipart/form-data">
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label class="col-form-label">Tên phiếu khảo sát:</label>
                                        <input type="text" class="form-control" name="tenphong">
                                        <div class="row">
                                            <div class="col-md">
                                                <label class="col-form-label">Mật khẩu:</label>
                                                <input type="text" class="form-control" name="matkhau" id="matkhau">
                                                <small id="matkhau" class="form-text" style="color: #007bff">Để trống nếu không
                                                    đặt
                                                    mật
                                                    khẩu</small>
                                            </div>
                                        </div>
                                        <label class="col-form-label">Mô tả:</label>
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                <input type="submit" class="btn btn-primary" id="taopks" name="tao" value="Tạo">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---->
    <nav class="nav flex-column bigMenu">
        <a class="nav-link" href="{{route('dashboard')}}"><i class="fas fa-home"></i> Phiên hỏi đáp</a>
        <div class="container">
            <nav class="nav flex-column subMenu">
                @foreach($cates as $cate)
                <a class="nav-link {{(isset($conditions['category_id']))?(($conditions['category_id']==$cate['id'])?'active':''):''}}" href="{{route('dashboard-search',
                    ['admin'=>(!empty($conditions['admin']))?decrypt($_COOKIE['id']):null
                    ,'category_id'=>$cate['id']])}}">{{$cate['name']}}
                    <span class="badge badge-light float-right">4</span></a>
                @endforeach
            </nav>
        </div>
        <a class="nav-link" href="#"><i class="fas fa-poll-h"></i> Phiếu khảo sát</a>
        {{-- <a class="nav-link" href="#"><i class="fas fa-heart"></i> Đánh dấu</a>--}}
        <a class="nav-link" href="{{route('dashboard-search',['admin'=>decrypt($_COOKIE['id']),'category_id'=>(!empty($conditions['category_id']))?$conditions['category_id']:null])}}"><i class="fas fa-question-circle"></i> Phiên của tôi</a>
        <a class="nav-link" href="#"><i class="fas fa-check-square"></i> Phiếu khảo sát của tôi</a>
    </nav>
</div>