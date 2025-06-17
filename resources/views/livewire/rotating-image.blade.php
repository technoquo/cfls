<div
    wire:mouseover="startRotating"
    wire:mouseleave="stopRotating"
    @if ($polling)
        wire:poll.500ms="nextImage"
    @endif
    class="w-[270px] h-[338px] overflow-hidden rounded relative cursor-pointer"
>
    @if (isset($images[$current]))
        <img
            src="{{ asset('storage/' . $images[$current]) }}"
            class="object-cover w-full h-full transition-opacity duration-300"
            alt="Imagen rotativa"
        />
    @endif
</div>
