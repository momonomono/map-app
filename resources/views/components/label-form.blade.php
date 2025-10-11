<div {{ $attributes->merge([ 'class' => 'block grid gap-4 py-4' ]) }}>
    @isset($title)
        <p>{{ $title }}</p>
    @endisset
    {{ $slot }}
    @error($name)
        <p class="text-red-500 text-sm mt-1 font-bold">{{ $message }}</p>
    @enderror
</div>