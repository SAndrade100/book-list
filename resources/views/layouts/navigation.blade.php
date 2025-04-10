<!-- Na seção de navegação -->
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-nav-link>
    <x-nav-link :href="route('livros.index')" :active="request()->routeIs('livros.*')">
        {{ __('Meus Livros') }}
    </x-nav-link>
    <x-nav-link :href="route('profile.show')" :active="request()->routeIs('profile.*')">
        {{ __('Perfil') }}
    </x-nav-link>
</div>

<!-- E também no menu mobile -->
<div class="pt-2 pb-3 space-y-1">
    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-responsive-nav-link>
    <x-responsive-nav-link :href="route('livros.index')" :active="request()->routeIs('livros.*')">
        {{ __('Meus Livros') }}
    </x-responsive-nav-link>
    <x-responsive-nav-link :href="route('profile.show')" :active="request()->routeIs('profile.*')">
        {{ __('Perfil') }}
    </x-responsive-nav-link>
</div>