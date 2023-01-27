@props(['tag', 'class' => ''])

<{{ $tag }} class="card-title mb-3 pb-3 border-bottom {{ $class }}">{{ $slot }}</{{ $tag }}>
