@props(['id'=>'','class' => '','title'=>'','top_end'=>'',
     'share_links'=>\Share::page(URL::current().(!empty($id)?"#{$id}":""),'Checkout UNIRANKS')
     ->facebook()
     ->twitter()
     ->linkedin('Worlds Best University Ranking Site')
     ->telegram()
     ->whatsapp()->getRawLinks()
       ])
@if(!empty($title))
    <div class="d-flex justify-content-between">
        <div class="profile_tab_top  d-flex justify-content-between  py-2 px-3  primary-bg" style="color:white">
            <h4 class="mb-0 text-capitalize">{!! $title !!}</h4>
            <div>
                <div class="btn-group" style="width: 1%">

                <span class="badge rounded-pill bg-light text-dark fs-6 pointer" data-bs-toggle="dropdown"
                      data-bs-display="static">
                    <i class="fas fa-share-alt fa-lg fs-6"></i>
                    <span class="ms-1">Share</span>
                </span>
                    <ul class="dropdown-menu dropdown-menu-lg-start" style="top: 100%">
                        <li>
                            <button onclick="openShareWindow('{{$share_links['facebook']}}')" class="dropdown-item">
                                <i class="fa fa-facebook-official facebook-icon me-2" ></i>Facebook</button>
                        </li>
                        <li>
                            <button onclick="openShareWindow('{{$share_links['linkedin']}}')" class="dropdown-item">
                                <i class="fa fa-linkedin linkedin-icon me-2"></i>Linkedin</button>
                        </li>
                        <li>
                            <button onclick="openShareWindow('{{$share_links['twitter']}}')" class="dropdown-item">
                                <i class="fa fa-twitter twitter-icon me-2"></i>Twitter</button>
                        </li>
                        <li>
                            <button onclick="openShareWindow('{{$share_links['whatsapp']}}')" class="dropdown-item">
                                <i class="fa fa-whatsapp whatsapp-icon me-2"></i>Whatsapp</button>
                        </li>
                        <li>
                            <button onclick="openShareWindow('{{$share_links['telegram']}}')" class="dropdown-item">
                                <i class="fa fa-telegram telegram-icon me-2"></i>Telegram</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div>
            {{$top_end}}
        </div>
    </div>
@endif
<div id="{{$id}}" class="card {{ $class }} {{!empty($title)?'bss-radius-0':''}}">{{ $slot }}</div>
@once
    @push('below_script')
        <script>
            function openShareWindow(url){
                window.open(url,"popup","width=400,height=400")
            }
        </script>
    @endpush
@endonce
