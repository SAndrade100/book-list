<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Meu Perfil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif
                    
                    <div class="flex flex-col md:flex-row">
                        <div class="md:w-1/3 mb-6 md:mb-0">
                            <div class="flex flex-col items-center">
                                @if (auth()->user()->avatar)
                                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="{{ auth()->user()->name }}" class="w-32 h-32 rounded-full object-cover border-4 border-gray-200">
                                @else
                                    <div class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                @endif
                                <div class="mt-4 space-y-2">
                                    <a href="{{ route('profile.edit') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:border-blue-800 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                        Editar Perfil
                                    </a>
                                    <a href="{{ route('profile.edit-password') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-800 focus:outline-none focus:border-gray-800 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                        Alterar Senha
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="md:w-2/3">
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h3 class="text-lg font-semibold mb-4">Informações do Perfil</h3>
                                
                                <div class="mb-4">
                                    <h4 class="text-sm font-medium text-gray-500">Nome</h4>
                                    <p class="text-lg">{{ auth()->user()->name }}</p>
                                </div>
                                
                                <div class="mb-4">
                                    <h4 class="text-sm font-medium text-gray-500">Email</h4>
                                    <p class="text-lg">{{ auth()->user()->email }}</p>
                                </div>
                                
                                <div>
                                    <h4 class="text-sm font-medium text-gray-500">Biografia</h4>
                                    <p class="text-lg">{{ auth()->user()->bio ?? 'Nenhuma biografia adicionada.' }}</p>
                                </div>
                            </div>
                            
                            <div class="mt-6">
                                <h3 class="text-lg font-semibold mb-4">Estatísticas</h3>
                                
                                <div class="bg-gray-50 p-6 rounded-lg">
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="text-center">
                                            <p class="text-3xl font-bold text-blue-600">{{ auth()->user()->livros()->count() }}</p>
                                            <p class="text-gray-500">Livros cadastrados</p>
                                        </div>
                                        <div class="text-center">
                                            <p class="text-3xl font-bold text-blue-600">{{ auth()->user()->created_at->diffForHumans() }}</p>
                                            <p class="text-gray-500">Membro desde</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>