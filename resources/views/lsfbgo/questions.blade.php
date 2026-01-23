<x-layout>
    <x-slot name="title">Questions</x-slot>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Questions</h1>

        {{-- Filtros --}}
        <form method="GET" id="filterForm" class="bg-white p-4 rounded shadow mb-6">
            <div class="flex gap-4 mb-4">
                <div class="flex-1">
                    <label class="font-bold">Syllabus:</label>
                    <select name="syllabu_id" id="syllabu_id" class="w-full border p-2 rounded mt-1" onchange="this.form.submit()">
                        @foreach($syllabus as $s)
                            <option value="{{ $s->id }}" {{ $s->id == $syllabuId ? 'selected' : '' }}>
                                {{ $s->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex-1">
                    <label class="font-bold">Thème:</label>
                    <select name="theme_id" id="theme_id" class="w-full border p-2 rounded mt-1">
                        @foreach($themes as $t)
                            <option value="{{ $t->id }}" {{ $t->id == $themeId ? 'selected' : '' }}>
                                {{ $t->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
                Filtrer
            </button>
        </form>

        {{-- Resultados --}}
        <p class="mb-4 font-semibold">{{ $questions->count() }} question(s) trouvée(s)</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($questions as $question)
                <div class="bg-white p-4 rounded shadow">
                    @if($question->video)
                        <video src="{{ $question->video->url }}" controls class="w-full mb-3"></video>
                    @endif

                    {{-- Modo visualización --}}
                    <div id="view-{{ $question->id }}">
                        <div class="font-bold text-lg mb-2">{{ $question->answer }}</div>

                        <button
                                onclick="enableEdit({{ $question->id }}, '{{ $question->answer }}')"
                                class="bg-yellow-500 text-white px-4 py-2 rounded text-sm hover:bg-yellow-600 w-full">
                            ✏️ Modifier
                        </button>
                    </div>

                    {{-- Modo edición --}}
                    <div id="edit-{{ $question->id }}" class="hidden">
                        <input
                                type="text"
                                id="input-{{ $question->id }}"
                                value="{{ $question->answer }}"
                                class="w-full border-2 p-2 rounded mb-2 focus:border-blue-500"
                                required>

                        <div class="flex gap-2">
                            <button
                                    onclick="saveAnswer({{ $question->id }})"
                                    class="bg-green-500 text-white px-4 py-2 rounded text-sm hover:bg-green-600 flex-1">
                                💾 Sauvegarder
                            </button>
                            <button
                                    onclick="cancelEdit({{ $question->id }})"
                                    class="bg-gray-500 text-white px-4 py-2 rounded text-sm hover:bg-gray-600">
                                ❌
                            </button>
                        </div>

                        <div id="message-{{ $question->id }}" class="mt-2 text-sm"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        function enableEdit(id, currentAnswer) {
            document.getElementById(`view-${id}`).classList.add('hidden');
            document.getElementById(`edit-${id}`).classList.remove('hidden');
            document.getElementById(`input-${id}`).focus();
        }

        function cancelEdit(id) {
            document.getElementById(`edit-${id}`).classList.add('hidden');
            document.getElementById(`view-${id}`).classList.remove('hidden');
        }

        async function saveAnswer(id) {
            const answer = document.getElementById(`input-${id}`).value.trim();
            const messageDiv = document.getElementById(`message-${id}`);

            if (!answer) {
                messageDiv.innerHTML = '<span class="text-red-500">❌ La réponse ne peut pas être vide</span>';
                return;
            }

            // Mostrar loading
            messageDiv.innerHTML = '<span class="text-blue-500">⏳ Sauvegarde...</span>';

            try {
                const response = await fetch(`/questions/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ answer: answer })
                });

                const data = await response.json();

                if (response.ok) {
                    messageDiv.innerHTML = '<span class="text-green-600">✅ Sauvegardé!</span>';

                    // Actualizar el texto en vista
                    setTimeout(() => {
                        document.querySelector(`#view-${id} .font-bold`).textContent = answer;
                        cancelEdit(id);
                        messageDiv.innerHTML = '';
                    }, 1000);
                } else {
                    throw new Error(data.message || 'Erreur');
                }
            } catch (error) {
                messageDiv.innerHTML = `<span class="text-red-500">❌ ${error.message}</span>`;
            }
        }

        // Permitir guardar con Enter
        document.addEventListener('keypress', function(e) {
            if (e.key === 'Enter' && e.target.id.startsWith('input-')) {
                const id = e.target.id.replace('input-', '');
                saveAnswer(id);
            }
        });
    </script>
</x-layout>