<div class="col rightBar">
    @if(!empty($search)&&$search=='room')
    <form class="form-inline">
        <div class="input-group mb-3 searchbox">
            <input type="search" class="form-control sinput" placeholder="Tìm kiếm...">
            <div class="input-group-append">
                <button class="btn searchbtn" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>
    @endif
    <div class="slides">
        <div class="carousel slide carousel-fade" data-ride="carousel" id="carouselExampleInterval">
            <div class="carousel-inner">
                <div class="carousel-item active" data-interval="10000">
                    <img src="{{asset("css/image/slides/ad1.png ")}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-interval="2000">
                    <img src="{{asset("css/image/slides/ad2.png ")}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{asset("css/image/slides/ad3.png ")}}" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="{{asset("#carouselExampleInterval")}}" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="extraInformation">
        <ul class="list-group">
            <li class="list-group-item onlineRoom">Phiên đang mở: {{$count['room']}}</li>
            <li class="list-group-item onlineMy">Phiên đang mở của tôi: {{$count['myRoom']}}</li>
            <li class="list-group-item onlineMy">Khảo sát chưa làm: {{$count['survey']}}</li>
        </ul>
    </div>
</div>