<x-layout>
    <x-slot name="title">Code Livre</x-slot>

    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md bg-white p-6 rounded-xl shadow-md">

            @if ($errors->any())
                <div class="mt-2 p-3 bg-red-100 text-red-700 rounded-lg">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{route('code-livre.store')}}" method="POST" class="space-y-4">
                @csrf
                <input
                    type="hidden"
                    id="slug"
                    name="slug"
                    value="{{ old('slug', $slug ?? '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
           focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                <div>
                    <label for="code_livre" class="block text-sm font-medium text-gray-700">
                        Code du livre
                    </label>
                    <input type="text" name="code_livre" id="code_livre"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                           placeholder="Exemple : LIV12345">
                </div>

                <button type="submit"
                        class="w-full px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                    Enregistrer
                </button>
            </form>
        </div>
    </div>
</x-layout>
