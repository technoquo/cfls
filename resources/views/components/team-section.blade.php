<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mt-12">
    @foreach ($teamMembers as $member)
        <div
            x-data="{
                overlayImages: [
                    '{{ asset('storage/' . $member['image_two']) }}',
                    '{{ asset('storage/' . $member['image_three']) }}'
                ],
                current: null,
                interval: null,
                startRotating() {
                    this.current = 0;
                    this.interval = setInterval(() => {
                        this.current = (this.current + 1) % this.overlayImages.length;
                    }, 500);
                },
                stopRotating() {
                    clearInterval(this.interval);
                    this.current = null;
                }
            }"
            class="flex flex-col items-center dark:bg-gray-900 rounded-lg overflow-hidden relative"
        >
            <div
                class="relative flex justify-center overflow-hidden mt-4"
                @mouseenter="startRotating()"
                @mouseleave="stopRotating()"
            >
                <!-- Imagen principal -->
                <img
                    :style="current === null ? 'display: block' : 'display: none'"
                    src="{{ asset('storage/' . $member['image']) }}"
                    alt="{{ $member->user->name }}"
                    width="270"
                    height="338"
                    class=" object-cover rounded  top-0 left-0"
                >

                <!-- Imagen rotativa -->
                <img
                    x-show="current !== null"
                    x-bind:src="overlayImages[current]"
                    :style="current !== null ? 'display: block' : 'display: none'"
                    width="270"
                    height="338"
                    class="object-cover rounded  top-0 left-0"
                    alt="{{ $member->user->name }}"
                >
            </div>

            <div class="p-6 text-center">
                <h3 class="text-xl font-semibold dark:text-white">{{ $member->user->name }}</h3>
                <p class="mt-2 text-base text-black dark:text-gray-400">{{ $member->position->name }}</p>
            </div>
        </div>
    @endforeach
</div>
