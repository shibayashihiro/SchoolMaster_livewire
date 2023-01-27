@props(['points'=>0,'totalPoints'=>1,'size'=>'20px','color'=>'#ffd644'])
@php
    $got = $totalPoints-$points;
    $half = (is_float($got)?1:0);
    $empty = floor($got);
    $full = $totalPoints-($half+$empty);
@endphp
<span class="d-inline-flex">
    @for ($i = 0; $i < $full; $i++)
        <i class="material-icons" style="font-size:{{$size}}; color:{{$color}};" >star</i>
    @endfor
    @for ($i = 0; $i < $half; $i++)
        <i class="material-icons" style="font-size:{{$size}}; color:{{$color}};" >star_half</i>
    @endfor
    @for ($i = 0; $i < $empty; $i++)
        <i class="material-icons" style="font-size:{{$size}}; color:{{$color}}; width: {{$size}}" >star_outlined</i>
    @endfor
</span>
