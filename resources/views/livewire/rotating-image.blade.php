<div
    wire:mouseover="startRotating"
    wire:mouseleave="stopRotating"
    @if ($polling)
        wire:poll.500ms="nextImage"
    @endif
    class="w-[270px] h-[338px] overflow-hidden rounded relative cursor-pointer"
>

    @if (!$rotating && isset($images[0]))
        <img
            src="{{ asset('storage/' . $images[0]) }}"
            class="absolute inset-0 w-full h-full object-cover transition-opacity duration-300"
            alt="Imagen principal"
        />
    @elseif ($rotating && isset($images[$current]))
        <img
            src="{{ asset('storage/' . $images[$current]) }}"
            class="absolute inset-0 w-full h-full object-cover transition-opacity duration-300"
            alt="Imagen rotativa"
        />
    @endif
</div>
