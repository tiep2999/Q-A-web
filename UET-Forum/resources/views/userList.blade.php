<!DOCTYPE html>
<html lang="en">

@include('layer.header',['title'=>'user-list'])

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
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Full name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $k=>$value)
                            <tr>
                                <th scope="row">{{$k+1}}</th>
                                <td><img width="40px" height="40px"
                                         src="{{asset($value['avatar'])}}">{{$value['fullName']}}</td>
                                <td>{{$value['email']}}</td>
                                <td>{{($value['role_id']==1)?'Admin':'User'}}</td>
                                @if(decrypt($_COOKIE['id'])!=$value['id'])
                                    <td><a href="{{route('delete-user',['id'=>$value['id']])}}">Xóa</a></td>
                                @else
                                    <td><i class="fa fa-address-card"> </i></td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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