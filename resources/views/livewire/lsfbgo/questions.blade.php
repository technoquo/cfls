<div class="p-6 max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">📘 Gestionar Preguntas</h1>

    @if(session()->has('message'))
        <div class="p-3 bg-green-100 text-green-700 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="bg-white rounded shadow p-4 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label>Texto de la pregunta</label>
                <input type="text" wire:model="question_text" class="w-full border rounded px-3 py-2">
                @error('question_text') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label>Tipo</label>
                <select wire:model="type" class="w-full border rounded px-3 py-2">
                    <option value="choice">Choice</option>
                    <option value="text">Text</option>
                    <option value="video-choice">Video Choice</option>
                    <option value="yes-no">Yes / No</option>
                </select>
            </div>

            <div>
                <label>Video</label>
                <select wire:model="video_id" class="w-full border rounded px-3 py-2">
                    <option value="">-- Ninguno --</option>
                    @foreach($videos as $video)
                        <option value="{{ $video->id }}">{{ $video->title ?? 'Video '.$video->id }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>Syllabus</label>
                <select wire:model="syllabu_id" class="w-full border rounded px-3 py-2">
                    <option value="">-- Ninguno --</option>
                    @foreach($syllabus as $s)
                        <option value="{{ $s->id }}">{{ $s->title ?? $s->slug }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Opciones dinámicas --}}
        @if(in_array($type, ['choice', 'video-choice', 'yes-no']))
            <div class="mt-4">
                <label>Opciones</label>
                <div class="space-y-2">
                    @foreach($options as $index => $option)
                        <div class="flex gap-2">
                            <input type="text" wire:model="options.{{ $index }}" class="border rounded px-3 py-2 w-full">
                            <button type="button" wire:click="unset($options[{{ $index }}])" class="text-red-500 font-bold">×</button>
                        </div>
                    @endforeach
                </div>
                <button type="button" class="mt-2 px-3 py-1 bg-blue-500 text-white rounded"
                        wire:click="$push('options', '')">
                    ➕ Agregar opción
                </button>
            </div>
        @endif

        <div class="mt-4">
            <label>Respuesta correcta</label>
            <input type="text" wire:model="answer" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mt-4 flex justify-end gap-2">
            <button type="submit" class="bg-green-600 text-black px-4 py-2 rounded">
                {{ $isEdit ? 'Actualizar' : 'Guardar' }}
            </button>
            <button type="button" class="bg-gray-400 text-white px-4 py-2 rounded" wire:click="resetForm">
                Cancelar
            </button>
        </div>
    </form>

    {{-- Tabla --}}
    <table class="w-full border-collapse border border-gray-300 text-sm">
        <thead>
        <tr class="bg-gray-100">
            <th class="border p-2">ID</th>
            <th class="border p-2">Pregunta</th>
            <th class="border p-2">Tipo</th>
            <th class="border p-2">Respuesta</th>
            <th class="border p-2">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($questions as $q)
            <tr>
                <td class="border p-2 text-center">{{ $q->id }}</td>
                <td class="border p-2">{{ $q->question_text }}</td>
                <td class="border p-2">{{ $q->type }}</td>
                <td class="border p-2">{{ $q->answer }}</td>
                <td class="border p-2 text-center">
                    <button wire:click="edit({{ $q->id }})" class="text-blue-600 font-bold">✏️</button>
                    <button wire:click="delete({{ $q->id }})" class="text-red-600 font-bold ml-2">🗑️</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

