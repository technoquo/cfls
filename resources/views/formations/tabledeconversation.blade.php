<x-layout>
  <x-slot name="title">{{ $formation->bottom }}</x-slot>
  <x-menuformation :slug="$slug" />

  <h2 class="mb-8 text-7xl tracking-tight font-extrabold text-gray-900 dark:text-white text-center">{{ $formation->buttom }}</h2>


      @php
          $info_tables_conversations = \App\Models\TableConversation::where('formations_id', $formation->id)->get();

      @endphp

      @if (isset($info_tables_conversations) && count($info_tables_conversations) > 0)
          <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 px-4 py-8">
              @foreach ($info_tables_conversations as $info)
                  @if ($info->status)
                      <div x-data="{ isOpen: {{ $info->open ? 'true' : 'false' }} }">
                          <a x-bind:href="isOpen ? '{{ route('inscription', ['slug' => $slug, 'id'=> $info->id ]) }}' : false"
                             class="flex flex-col items-center rounded-lg border border-gray-200 bg-white px-4 py-2 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700"
                             :class="{ 'cursor-not-allowed opacity-50 pointer-events-none': !isOpen }">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                   stroke-width="1.5" stroke="currentColor"
                                   class="size-20 dark:text-gray-400 text-gray-600 mb-2">
                                  <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                              </svg>

                              <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                  @php
                                      $jours = ['dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'];
                                      $mois = [
                                          1 => 'janvier', 2 => 'février', 3 => 'mars', 4 => 'avril', 5 => 'mai', 6 => 'juin',
                                          7 => 'juillet', 8 => 'août', 9 => 'septembre', 10 => 'octobre', 11 => 'novembre', 12 => 'décembre'
                                      ];
                                      $date = \Carbon\Carbon::parse($info->date_start);
                                      $jourSemaine = $jours[$date->dayOfWeek];
                                      $moisFr = $mois[$date->month];
                                  @endphp
                                  {{ $jourSemaine . ', ' . $date->format('j') . ' ' . $moisFr . ' ' . $date->format('Y') }}
                              </h5>
                              <p class="font-normal text-gray-700 dark:text-gray-400 mb-3">{{ $info->hour_start }} - {{ $info->hour_end }}
                              </p>
                              <p class="font-normal text-gray-700 dark:text-gray-400 mb-3">Prix :
                                  {{ $info->price }}€/séance</p>
                              <div
                                  class="text-white {{ $info->open ? 'bg-csfl hover:bg-cyan-800' : ' bg-red-500' }} focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                  {{ $info->open ? 'Inscription' : 'fermé' }}
                              </div>
                          </a>
                      </div>
                  @endif
              @endforeach
          </div>
      @endif


</x-layout>
