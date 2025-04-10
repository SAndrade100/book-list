<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">Bem-vindo, {{ Auth::user()->name }}!</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                        <a href="{{ route('livros.index') }}" class="block p-6 bg-blue-50 hover:bg-blue-100 rounded-lg shadow-sm transition-colors">
                            <div class="flex items-center">
                                <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                                <div class="ml-4">
                                    <h4 class="text-lg font-semibold">Meus Livros</h4>
                                    <p class="text-sm text-gray-600">Gerenciar sua coleção de livros</p>
                                </div>
                            </div>
                        </a>
                        
                        <a href="{{ route('livros.create') }}" class="block p-6 bg-green-50 hover:bg-green-100 rounded-lg shadow-sm transition-colors">
                            <div class="flex items-center">
                                <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <div class="ml-4">
                                    <h4 class="text-lg font-semibold">Adicionar Livro</h4>
                                    <p class="text-sm text-gray-600">Cadastrar um novo livro</p>
                                </div>
                            </div>
                        </a>
                        
                        <a href="{{ route('profile.show') }}" class="block p-6 bg-purple-50 hover:bg-purple-100 rounded-lg shadow-sm transition-colors">
                            <div class="flex items-center">
                                <svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <div class="ml-4">
                                    <h4 class="text-lg font-semibold">Meu Perfil</h4>
                                    <p class="text-sm text-gray-600">Gerenciar suas informações pessoais</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    
                    <div class="mt-8">
                        <h3 class="text-lg font-semibold mb-4">Estatísticas</h3>
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="text-center">
                                    <p class="text-3xl font-bold text-blue-600">{{ auth()->user()->livros()->count() }}</p>
                                    <p class="text-gray-600">Livros cadastrados</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-3xl font-bold text-green-600">{{ auth()->user()->created_at->diffForHumans() }}</p>
                                    <p class="text-gray-600">Membro desde</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>