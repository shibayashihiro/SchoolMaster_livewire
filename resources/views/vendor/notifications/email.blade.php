@component('mail::message',['app_name'=>'SCHOOLSMASTER.COM','mail_title'=>$subject??''])
{{-- Greeting --}}
@if (! empty($greeting))
 {{ $greeting }}
@else
@if ($level === 'error')
 @lang('Whoops!')
@else
 @lang('Hello!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{!! $line !!}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
    <p> Or use this link: <a href="{{$actionUrl}}">{{$actionUrl}}</a></p>
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Thank Your'),<br>
@lang(config('app.name'))
@endif
<tr>
    <td>
        <table class="footer" width="570" cellpadding="0" cellspacing="0" role="presentation">
            <tr>
                <td class="content-cell">
                    <div style="background: #1C345AFF; color: white !important; padding: 1rem;">
                        <h2 style="text-align: left">@lang('Get in Touch')</h2>
                        <p style="text-align: left; color: white; font-weight: bold">@lang('USA, New York')</p>
                        <p style="text-align: left; color: white">@lang('1330 Avenue of the Americas,23rd Floor New York,Ny 10019')</p>
                        <p style="text-align: left; color: white">+1 212 653 0628</p>
                        <p style="text-align: left; color: white; font-weight: bold">@lang('UAE, Dubai')</p>
                        <p style="text-align: left; color: white">@lang('Level 23, Boulevard Plaza 2 Sheikh Mohammad bin Rashid Boulevard-Dubai')</p>
                        <p style="text-align: left; color: white">+971 4 319 7626</p>
                    </div>
                    <div  style="background: #039be5; color: white !important; padding: 1rem;">
                        <p style="color: white; margin: 0;">@lang('Copyrights SCHOOLSMASTER All Rights Reserved')</p>
                    </div>
                </td>
            </tr>
        </table>
    </td>
</tr>
{{-- Subcopy --}}
{{--@isset($actionText)--}}
{{--@slot('subcopy')--}}
{{--@lang(--}}
{{--    "If you're having trouble clicking the \":actionText\" button, copy and paste the URL below\n".--}}
{{--    'into your web browser:',--}}
{{--    [--}}
{{--        'actionText' => $actionText,--}}
{{--    ]--}}
{{--) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>--}}
{{--@endslot--}}
{{--@endisset--}}
@endcomponent
