<div {{ $attributes->merge([ 'class' => 'block grid gap-4 py-4' ]) }}>
    @if($title)
        <p>{{ $title }}</p>
    @endif
    {{ $slot }}
    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>