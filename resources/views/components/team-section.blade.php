<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mt-12">
    @foreach ($teamMembers as $index => $member)
        @php
            $images = array_filter([

                $member['image_three'],
                 $member['image_two'],
            ]);
        @endphp

        <div class="flex flex-col items-center dark:bg-gray-900 rounded-lg overflow-hidden relative">
            <div>
                <img
                    id="photo-{{ $index }}"
                    src="{{ asset('storage/' . $member['image']) }}"
                    data-main="{{ asset('storage/' . $member['image']) }}"
                    data-images='@json(array_values($images))'
                    data-current="0"
                    class="w-[270px] h-[338px] object-cover rounded cursor-pointer transition-all duration-300"
                    onmouseenter="startRotation(this)"
                    onmouseleave="stopRotation(this)"
                />
            </div>

            <div class="p-6 text-center">
                <h3 class="text-xl font-semibold dark:text-white">{{ $member->user->name }}</h3>
                <p class="mt-2 text-base text-black dark:text-gray-400">{{ $member->position->name }}</p>
            </div>
        </div>
    @endforeach


    @push('scripts')
            <script>
                const intervals = {};

                function startRotation(img) {
                    const images = JSON.parse(img.dataset.images);
                    if (!images.length) return;

                    let i = 0;
                    intervals[img.id] = setInterval(() => {
                        i = (i + 1) % images.length;
                        img.src = `/storage/${images[i]}`;
                    }, 500);
                }

                function stopRotation(img) {
                    clearInterval(intervals[img.id]);
                    delete intervals[img.id];
                    // Restaurar imagen principal
                    img.src = img.dataset.main;
                }
            </script>
        @endpush
</div>
