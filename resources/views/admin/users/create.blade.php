<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">Nuevo usuario</h2></x-slot>

    <div class="py-10 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow sm:rounded-lg p-6">
            <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div>
                    <x-input-label for="name" :value="__('Nombre')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="password" :value="__('Contraseña')" />
                    <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" required />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />
                    <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" required />
                </div>

                <div>
                    <x-input-label for="phone" :value="__('Teléfono (opcional)')" />
                    <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone')" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="professional_url" :value="__('Enlace profesional (opcional)')" />
                    <x-text-input id="professional_url" name="professional_url" type="url" class="mt-1 block w-full" :value="old('professional_url')" placeholder="https://..." />
                    <x-input-error :messages="$errors->get('professional_url')" class="mt-2" />
                </div>

                <div class="flex items-center gap-2">
                    <input id="is_admin" name="is_admin" type="checkbox" value="1" {{ old('is_admin') ? 'checked' : '' }}>
                    <label for="is_admin">Administrador</label>
                </div>

                <div>
                    <x-input-label for="photo" :value="__('Foto de perfil (opcional)')" />
                    <input id="photo" name="photo" type="file" accept="image/*" class="mt-1 block w-full">
                    <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                </div>

                <div class="flex gap-3">
                    <x-primary-button>Crear</x-primary-button>
                    <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-gray-200 rounded">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

