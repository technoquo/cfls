<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mt-12">
    @foreach ($teamMembers as $index => $member)
        @php


            $images = array_filter([
                $member['image_three'],
                $member['image_two'],
            ], fn($img) => $img && \Illuminate\Support\Facades\Storage::disk('public')->exists($img));
        @endphp

        <div class="flex flex-col items-center dark:bg-gray-900 rounded-lg overflow-hidden relative">
            <img
                x-data="{ rotate: null }"
                x-init="
                        let images = JSON.parse($el.dataset.images);
                        let index = 0;
                        $el.dataset.current = 0;

                        $el.addEventListener('mouseenter', () => {
                            if (!images.length) return;
                            rotate = setInterval(() => {
                                index = (index + 1) % images.length;
                                $el.src = `${window.location.origin}/storage/${images[index]}`;
                                $el.dataset.current = index;
                            }, 800);
                        });

                        $el.addEventListener('mouseleave', () => {
                            clearInterval(rotate);
                            $el.src = $el.dataset.main;
                        });
                    "
                src="{{ asset('storage/' . $member['image']) }}"
                data-main="{{ asset('storage/' . $member['image']) }}"
                data-images='@json(array_values($images))'
                onerror="this.onerror=null;this.src='/images/default.png';"
                referrerpolicy="no-referrer"
                crossorigin="anonymous"
                class="w-[270px] h-[338px] object-cover rounded cursor-pointer"
            />

            <div class="p-6 text-center">
                <h3 class="text-xl font-semibold dark:text-white">{{ $member->user->name }}</h3>
                <p class="mt-2 text-base text-black dark:text-gray-400">{{ $member->position->name }}</p>
            </div>
        </div>
    @endforeach
</div>
