<div class="col-md leftBar">
    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#taophong"
            data-whatever="@mdo"><i class="fas fa-plus-circle"></i> Tạo
        phòng</button>
    <!--Khung tao phong-->
    <div class="modal fade" id="taophong" tabindex="-1" role="dialog" aria-labelledby="taophong"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="" method="" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="taophong">Tạo phòng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label class="col-form-label">Tên phòng:</label>
                                <input type="text" class="form-control" name="tenphong">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-form-label">Mật khẩu phòng:</label>
                                        <input type="text" class="form-control" name="matkhau"
                                               id="matkhau">
                                        <small id="matkhau" class="form-text"
                                               style="color: #007bff">Để trống nếu không
                                            đặt
                                            mật
                                            khẩu</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label">Chủ đề:</label>
                                        <select class="form-control">
                                            <option>Chủ đề 1</option>
                                            <option>Chủ đề 2</option>
                                            <option>Chủ đề 3</option>
                                        </select>
                                    </div>
                                </div>
                                <label class="col-form-label">Mô tả:</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">Hủy</button>
                        <input type="submit" class="btn btn-primary" id="taophong" name="tao"
                               value="Tạo phòng">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!---->
    <nav class="nav flex-column bigMenu">
        <a class="nav-link" href="#"><i class="fas fa-home"></i> Tất cả các phòng</a>
        <a class="nav-link" href="#"><i class="fas fa-bars"></i> Chủ đề</a>
        <div class="container">
            <nav class="nav flex-column subMenu">
                @foreach($cates as $cate)
                <a class="nav-link" href="http://forum.com.vn/uet-forum/dashboard-search?category_id={{$cate['id']}}">{{$cate['name']}}<span
                            class="badge badge-light float-right">4</span></a>
               @endforeach
            </nav>
        </div>
        <a class="nav-link" href="#"><i class="fas fa-heart"></i> Đánh dấu</a>
        <a class="nav-link" href="#"><i class="fas fa-question-circle"></i> Phòng của tôi</a>
    </nav>
</div>