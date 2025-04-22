<section class=" bg-white dark:bg-gray-900 mb-4">
    <div class="py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <h2 class="text-center  font-semibold dark:text-white text-xl sm:text-2xl md:text-3xl lg:text-5xl xl:text-6xl 2xl:text-7xl uppercase">Avec le soutien de</h2>
          <div class="mx-auto mt-10 grid max-w-lg md:grid-cols-2 lg:grid-cols-3 grid-col-1 items-center gap-x-8 gap-y-10 sm:max-w-xl sm:grid-cols-1 sm:gap-x-10 lg:mx-0 lg:max-w-none">
            @foreach ($soutens as $souten)
            <a href="{{ $souten->url }}" target="_blank">
              <img class="col-span-2 col-start-2  w-full object-contain sm:col-start-auto lg:col-span-1" src="{{ asset('storage/'. $souten->image) }}" alt="{{ $souten->name }}">
              </a>
            @endforeach

          </div>
        </div>
      </div>
</section>
