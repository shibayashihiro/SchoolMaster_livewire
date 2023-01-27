@props(['class' => ''])
<div class="breadcrumb-bar {{$class}}">
    <x-shared.general.main>
        {{ $slot }}
    </x-shared.general.main>
</div>
