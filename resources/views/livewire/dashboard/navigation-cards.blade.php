<div>
    @foreach($cards as $links)
    <div @class(['row g-2','mt-1'=>!$loop->first])>
        @foreach($links as $link)
        <!--to force new line-->
        <div class="col-md-3">
            <a href="{{$link['url']}}" class="card text-decoration-none">
                <div class="p-3 navigation-card-content">
                    <div class="row">
                        <h4 class="h5 blue">{{__($link['title'])}}</h4>
                    </div>
                    <div class="row mt-1">
                        <p class="blue paragraph-style2">{{__($link['description'])}}</p>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <img src="{{$link['icon']}}" width="30px">
                        </div>
                        <div class="col-6">
                            <h4 class="h4 light-blue text-end"><i class="fa-solid fa-angle-right"></i></h4>
                        </div>
                    </div>

                </div>
            </a>
        </div>
        @endforeach
    </div>
    @endforeach
</div>
