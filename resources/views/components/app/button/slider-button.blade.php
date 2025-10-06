<button {{ $attributes->merge(["class" => "absolute p-3 bg-white/70 hover:bg-white rounded-full shadow-md z-10"]) }}>
    {{ $slot }}
</button>
