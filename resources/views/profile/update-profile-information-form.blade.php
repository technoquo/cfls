<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Informations du profil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Mettez à jour les informations de votre profil et votre adresse e-mail.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Photo de profil -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Input photo -->
                <input type="file" id="photo" class="hidden"
                       wire:model.live="photo"
                       x-ref="photo"
                       x-on:change="
                        photoName = $refs.photo.files[0].name;
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            photoPreview = e.target.result;
                        };
                        reader.readAsDataURL($refs.photo.files[0]);
                    " />

                <x-label for="photo" value="{{ __('Photo') }}" />

                <!-- Photo actuelle -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full size-20 object-cover">
                </div>

                <!-- Aperçu de la nouvelle photo -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full size-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Choisir une nouvelle photo') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Supprimer la photo') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Nom -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Nom') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" required autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Adresse e-mail') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model="state.email" required autocomplete="username" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Votre adresse e-mail n’est pas vérifiée.') }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:click.prevent="sendEmailVerification">
                        {{ __('Cliquez ici pour renvoyer l’e-mail de vérification.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
                    </p>
                @endif
            @endif
        </div>
        <!-- Téléphone -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="telephone" value="{{ __('Téléphone') }}" />
            <x-input id="telephone" type="text" class="mt-1 block w-full" wire:model.defer="state.telephone" />
            <x-input-error for="telephone" class="mt-2" />
        </div>

        <!-- Société -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="society" value="{{ __('Société') }}" />
            <x-input id="society" type="text" class="mt-1 block w-full" wire:model.defer="state.society" />
            <x-input-error for="society" class="mt-2" />
        </div>

        <!-- Adresse -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="address" value="{{ __('Adresse complète') }}" />
            <x-input id="address" type="text" class="mt-1 block w-full" wire:model.defer="state.address" />
            <x-input-error for="address" class="mt-2" />
        </div>

        <!-- Ville -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="ville" value="{{ __('Ville') }}" />
            <x-input id="ville" type="text" class="mt-1 block w-full" wire:model.defer="state.ville" />
            <x-input-error for="ville" class="mt-2" />
        </div>

        <!-- Code postal -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="postal_code" value="{{ __('Code postal') }}" />
            <x-input id="postal_code" type="text" class="mt-1 block w-full" wire:model.defer="state.postal_code" />
            <x-input-error for="postal_code" class="mt-2" />
        </div>

        <div
            x-data="{
        provinces: {
            'Bruxelles-Capitale': ['Bruxelles'],
            'Brabant wallon': ['Nivelles', 'Wavre'],
            'Hainaut': ['Mons', 'Charleroi', 'Tournai', 'Soignies', 'Ath'],
            'Liège': ['Liège', 'Verviers', 'Huy', 'Waremme'],
            'Luxembourg': ['Arlon', 'Marche-en-Famenne', 'Neufchâteau', 'Bastogne'],
            'Namur': ['Namur', 'Dinant', 'Philippeville'],
            'Flandre orientale': ['Gand', 'Alost', 'Eeklo', 'Dendermonde', 'Saint-Nicolas'],
            'Flandre occidentale': ['Bruges', 'Courtrai', 'Ypres', 'Furnes', 'Tielt'],
            'Anvers': ['Anvers', 'Malines', 'Turnhout'],
            'Limbourg': ['Hasselt', 'Tongres', 'Maaseik'],
            'Brabant flamand': ['Louvain', 'Hal-Vilvorde']
        },
        selectedProvince: {{ Js::from(old('province', Auth::user()->province)) }},
        selectedRegion: {{ Js::from(old('region', Auth::user()->region)) }},
        init() {

            if (!this.selectedProvince) {
                this.selectedProvince = Object.keys(this.provinces)[0];

            }
            if (!this.provinces[this.selectedProvince]?.includes(this.selectedRegion)) {
                this.selectedRegion = '';
            }
        }
    }"
            x-init="init(); console.log(' chargée:', selectedRegion);"
            class="col-span-6 sm:col-span-4 grid grid-cols-1 gap-4"
        >
            <!-- Province -->
            <div>
                <x-label for="province" value="Province" />
                <select
                    id="province"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                    x-model="selectedProvince"
                    wire:model.defer="state.province"
                >
                    <option value="">-- Sélectionner une province --</option>
                    <template x-for="(regions, prov) in provinces" :key="prov">
                        <option :value="prov" x-text="prov" :selected="prov === selectedProvince"></option>
                    </template>
                </select>
                <x-input-error for="province" class="mt-2" />
            </div>

            <!-- Région -->
            <div>
                <x-label for="region" value="Région" />
                <select
                    id="region"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                    x-model="selectedRegion"
                    wire:model.defer="state.region"
                >
                    <option value="">-- Sélectionner un arrondissement --</option>
                    <template x-for="region in provinces[selectedProvince] || []" :key="region">
                        <option :value="region" x-text="region" :selected="region === selectedRegion"></option>
                    </template>
                </select>
                <x-input-error for="region" class="mt-2" />
            </div>
            @php
                $user = \Illuminate\Support\Facades\Auth::user();
                $membership = $user->activeMembership;
            @endphp

            <div class="max-w-md rounded-xl border border-gray-200 bg-white p-5 shadow-sm">

                <!-- Titre -->
                <h3 class="mb-4 text-lg font-semibold text-gray-800">
                    🎫 Membre
                </h3>

                @if($user->isMember() && $membership)
                    <!-- Statut -->
                    <div class="mb-3 flex items-center gap-2">
                        <span class="inline-flex items-center rounded-full bg-green-100 px-3 py-1 text-sm font-medium text-green-700">
                            Active
                        </span>
                    </div>

                    <!-- Dates -->
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <p class="text-gray-500">Début</p>
                            <p class="font-medium text-gray-800">
                                {{ $membership->start_date->format('d/m/Y') }}
                            </p>
                        </div>

                        <div>
                            <p class="text-gray-500">Fin</p>
                            <p class="font-medium text-gray-800">
                                {{ $membership->end_date->format('d/m/Y') }}
                            </p>
                        </div>
                    </div>

                    <!-- Réduction -->
                    <div class="mt-4 rounded-lg bg-blue-50 p-3 text-sm text-blue-700">
                        🎁 Réduction membre :
                        <span class="font-semibold">
                            {{ $membership->discount_percentage }}%
                        </span>
                    </div>
                @else
                    <!-- Non membre -->
                    <div class="rounded-lg bg-gray-50 p-4 text-sm text-gray-600">
                        ❌ Vous n’avez actuellement aucune adhésion active.
                    </div>
                @endif

            </div>



        </div>

    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Enregistré.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Enregistrer') }}
        </x-button>
    </x-slot>
</x-form-section>
