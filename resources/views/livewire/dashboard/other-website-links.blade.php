<div class="mt-4">
    @foreach($websites as $website)
    <a href="{{$website['url']}}" target="_blank" @class(['card text-decoration-none','mt-2'=>!$loop->first])>
        <div class="p-2">
            <div class="d-flex align-items-center">
                <div class="col-sm-2 col-md-1">
                    <img src="{{$website['icon']}}" width="70" alt="icon">
                </div>
                <div class="ms-1 col-sm-9 col-md-10 row">
                    <div><img src="{{$website['logo']}}" width="110" alt="logo"><span
                            class="blue ms-1 fw-bold">{{$website['title']}}</span></div>
                    <p class="paragraph-style2 blue mt-2">{{$website['description']}}</p>
                </div>
                <div class="col-sm-1 light-blue text-end align-self-center"><i
                        class="fa-solid fa-angle-right"></i></div>
            </div>
        </div>
    </a>
    @endforeach
</div>
