@props(['on'])

<div x-data="{ showMessage: false, timeout: null }"
    x-init="() => { clearTimeout(timeout); showMessage = true; timeout = setTimeout(() => { showMessage = false }, 2000);  }"
    x-show.transition.out.opacity.duration.1500ms="shown"
    x-transition:leave.opacity.duration.1500ms
    style="display: none;"
    {{ $attributes->merge(['class' => 'text-sm text-gray-600']) }}>
    {{ $slot->isEmpty() ? 'Saved.' : $slot }}
</div>
