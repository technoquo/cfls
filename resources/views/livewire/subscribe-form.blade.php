<div class="flex-1">
    <form wire:submit.prevent="subscribe" class="flex-1">
        <label for="email-address" class="sr-only">Adresse e-mail</label>
        <input id="email-address" name="email" type="email" wire:model.defer="email" autocomplete="email" required
               class="min-w-0 flex-auto rounded-md bg-white px-3.5 py-2 text-base text-white outline outline-1 -outline-offset-1 outline-white/10 placeholder:text-black focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-red-500 sm:text-sm/6"
               placeholder="Saisissez votre e-mail">



        <button type="submit"
                class="flex-none rounded-md bg-blue-700 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-red-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-500">
            S'inscrire
        </button>
    </form>

    @error('email')
    <div
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 3000)"
        x-show="show"
        class="text-red-500 text-sm mt-1">{{ $message }}</div>
    @enderror

    @if ($successMessage)
        <div
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 3000)"
            x-show="show"
            class="p-4 mt-4 text-green-700 bg-green-100 rounded-lg"
        >
            {{ $successMessage }}
        </div>
    @endif
</div>
