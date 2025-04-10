<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Bem-vindo ao Sistema de Livros</h1>
                    
                    @auth
                        <p>Acesse seu <a href="{{ route('dashboard') }}" class="text-blue-600 hover:underline">Dashboard</a></p>
                    @else
                        <p>Por favor, faça <a href="{{ route('login') }}" class="text-blue-600 hover:underline">login</a> 
                           ou <a href="{{ route('register') }}" class="text-blue-600 hover:underline">registre-se</a></p>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>