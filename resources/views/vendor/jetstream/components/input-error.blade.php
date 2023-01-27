@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'red mb-0']) }}>{{ $message }}</p>
@enderror
