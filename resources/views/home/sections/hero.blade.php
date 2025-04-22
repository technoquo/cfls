
<section class=" bg-white dark:bg-gray-900 mb-4" {{ $history->status ? '' : 'hidden' }}>
    <div class="max-w-screen-2xl px-4 py-8 mx-auto space-y-12">
        <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-5xl xl:text-6xl 2xl:text-7xl font-extrabold tracking-tight text-gray-900 dark:text-white text-center mb-4">
            {{ $data->name }}
        </h2>

        <p class="mb-8 lg:text-2xl font-normal text-gray-500  dark:text-gray-400">
            {!! $data->description !!}
        </p>
        <!-- Row -->
        <div class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16">
            <div class="text-gray-700 sm:text-lg dark:text-gray-400">
                <hr class="border-b border-gray-200  dark:border-gray-700 my-5"/>
                <p class="mb-8 font-medium lg:text-2xl">{!! $history->description !!}</p>
                <!-- List -->

            </div>
            <div>
                <h2 class="mb-4  sm:text-2xl md:text-3xl lg:text-5xl xl:text-6xl 2xl:text-7xl font-extrabold tracking-tight text-gray-900 dark:text-white text-center uppercase">{{ $history->title }}</h2>
            <iframe
            src="https://player.vimeo.com/video/{{ $history->video }}"
            width="640"
            height="360"
            allow="autoplay; fullscreen; picture-in-picture"
            allowfullscreen>
           </iframe>
           </div>

        </div>

    </div>
  </section>
{{-- <section class="bg-center bg-no-repeat bg-[url('http://cfls.test/img/course_2.jpg')] bg-gray-700 bg-blend-multiply mb-20">
    <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">CFLS </h1>
        <p class="mb-8 text-lg font-normal text-gray-300 lg:text-3xl sm:px-16 lg:px-48">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui numquam, incidunt delectus, nisi beatae hic modi repellendus ipsum distinctio consectetur corrupti, veritatis architecto ratione sed quae minus dolor autem alias?</p>

    </div>
</section> --}}
