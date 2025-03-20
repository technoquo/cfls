<section class="bg-white dark:bg-gray-900 py-12" 
    x-data="{
        active: 0,
        testimonials: [
            @foreach ($testimonials as $testimonial)
                { 
                    text: '{{ $testimonial->testimony }}', 
                    name: '{{ $testimonial->fullname }}', 
                    image: '{{ $testimonial->image }}'
                },
            @endforeach
        ]
    }" 
    x-init="setInterval(() => active = (active + 1) % testimonials.length, 5000)">

    <div class="max-w-screen-xl px-4 mx-auto overflow-hidden relative">
        <div class="flex transition-transform duration-700 ease-out"
            :style="'transform: translateX(-' + (active * 100) + '%)'">

            <!-- Testimonial Loop -->
            <template x-for="(testimonial, index) in testimonials" :key="index">
                <div class="flex-shrink-0 w-full text-center px-6">
                    <figure class="max-w-screen-md mx-auto">
                        <svg class="h-12 mx-auto mb-3 text-gray-400 dark:text-gray-600" viewBox="0 0 24 27" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z"
                                fill="currentColor" />
                        </svg>
                        <blockquote>
                            <p class="text-2xl font-medium text-gray-900 dark:text-white" x-text="testimonial.text"></p>
                        </blockquote>
                        <figcaption class="flex items-center justify-center mt-6 space-x-3">
                            <img 
                            x-bind:src="testimonial.image" 
                            x-bind:alt="testimonial.name" 
                            class="w-6 h-6 rounded-full" 
                            x-show="testimonial.image"
                            />
                            <div class="flex items-center divide-x-2 divide-gray-500 dark:divide-gray-700">
                                <div class="pr-3 font-medium text-gray-900 dark:text-white" x-text="testimonial.name">
                                </div>
                                
                            </div>
                        </figcaption>
                    </figure>
                </div>
            </template>
        </div>
    </div>
</section>
