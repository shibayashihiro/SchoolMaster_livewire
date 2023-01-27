@props(['value'])

<label {{ $attributes->merge(['class' => 'd-block blue']) }}>
    {{ $value ?? $slot }}
</label>
