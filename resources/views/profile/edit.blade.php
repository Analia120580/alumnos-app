<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar perfil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Mensaje de estado --}}
            @if (session('status') === 'profile-updated')
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    ✅ Perfil actualizado correctamente.
                </div>
            @endif

            {{-- Formulario de edición de perfil --}}
            <div class="p-6 bg-white shadow sm:rounded-lg">
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    {{-- Foto de perfil --}}
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Foto de perfil</label>
                        <div class="flex items-center space-x-4 mt-2">
                            @if(Auth::user()->photo_path)
                                <img src="{{ asset('storage/' . Auth::user()->photo_path) }}" 
                                     alt="Foto de perfil" 
                                     class="w-16 h-16 rounded-full shadow-md border">
                            @else
                                <span class="w-16 h-16 flex items-center justify-center bg-gray-200 text-gray-600 rounded-full text-2xl">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </span>
                            @endif
                            <input type="file" name="photo" class="block w-full text-sm text-gray-500">
                        </div>
                        @error('photo')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Nombre --}}
                    <div class="mb-4">
                        <label for="name" class="block font-medium text-sm text-gray-700">Nombre</label>
                        <input id="name" name="name" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                               value="{{ old('name', Auth::user()->name) }}" required autofocus autocomplete="name">
                        @error('name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="mb-4">
                        <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                        <input id="email" name="email" type="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                               value="{{ old('email', Auth::user()->email) }}" required autocomplete="username">
                        @error('email')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Teléfono --}}
                    <div class="mb-4">
                        <label for="phone" class="block font-medium text-sm text-gray-700">Teléfono</label>
                        <input id="phone" name="phone" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                               value="{{ old('phone', Auth::user()->phone) }}">
                        @error('phone')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- URL profesional --}}
                    <div class="mb-4">
                        <label for="professional_url" class="block font-medium text-sm text-gray-700">URL Profesional</label>
                        <input id="professional_url" name="professional_url" type="url" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                               value="{{ old('professional_url', Auth::user()->professional_url) }}">
                        @error('professional_url')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>Guardar cambios</x-primary-button>
                        @if (session('status') === 'profile-updated')
                            <p class="text-sm text-gray-600">Guardado.</p>
                        @endif
                    </div>
                </form>
            </div>

            {{-- Sección eliminar cuenta --}}
            <div class="p-6 bg-white shadow sm:rounded-lg">
                <h3 class="text-lg font-medium text-red-600">Eliminar cuenta</h3>
                <p class="mt-1 text-sm text-gray-600">
                    Una vez que elimines tu cuenta, todos tus datos se borrarán permanentemente.
                </p>

                <form method="POST" action="{{ route('profile.destroy') }}" class="mt-4">
                    @csrf
                    @method('delete')

                    <div class="mb-4">
                        <label for="password" class="block font-medium text-sm text-gray-700">Contraseña</label>
                        <input id="password" name="password" type="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        @error('password')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <x-danger-button>Eliminar cuenta</x-danger-button>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>

