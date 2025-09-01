<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Perfil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <!-- Nombre del usuario -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <!-- Email del usuario -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $user->email)" required autocomplete="username" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>

                        <!-- Teléfono del usuario -->
                        <div class="mt-4">
                            <x-input-label for="phone" :value="__('Teléfono')" />
                            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone', $user->phone)" autocomplete="phone" />
                            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                        </div>

                        <!-- Enlace profesional -->
                        <div class="mt-4">
                            <x-input-label for="professional_url" :value="__('Enlace profesional')" />
                            <x-text-input id="professional_url" class="block mt-1 w-full" type="url" name="professional_url" :value="old('professional_url', $user->professional_url)" autocomplete="url" />
                            <x-input-error class="mt-2" :messages="$errors->get('professional_url')" />
                        </div>

                        <!-- Foto de perfil -->
                        <div class="mt-4">
                            <x-input-label for="photo" :value="__('Foto de perfil')" />
                            <input id="photo" class="block mt-1 w-full" type="file" name="photo" accept="image/*" />
                            <x-input-error class="mt-2" :messages="$errors->get('photo')" />
                            @if($user->photo_path)
                                <img src="{{ asset('storage/' . $user->photo_path) }}" alt="Foto de perfil actual" class="mt-4 rounded-full h-16 w-16 object-cover">
                            @endif
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Guardar Cambios') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

