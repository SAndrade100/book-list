<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $livro->titulo }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('livros.edit', $livro) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                    Editar
                </a>
                <form action="{{ route('livros.destroy', $livro) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Tem certeza que deseja excluir este livro?')">
                        Excluir
                    </button>
                </form>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="mb-4">
                    <h3 class="text-lg font-semibold">Detalhes do Livro</h3>
                    <p><strong>Autor:</strong> {{ $livro->autor }}</p>
                    <p><strong>Editora:</strong> {{ $livro->editora }}</p>
                    <p><strong>Ano de Publicação:</strong> {{ $livro->ano_publicacao }}</p>
                </div>

                @if($livro->disponivel)
                    <p class="text-green-500">Disponível</p>
                @else
                    <p class="text-red-500">Indisponível</p>
                @endif

                <div class="mt-4">
                    <a href="{{ route('livros.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>