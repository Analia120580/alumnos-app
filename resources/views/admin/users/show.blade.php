<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles de Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex items-center space-x-4">
                        @if($user->photo_path)
                            <img src="{{ asset('storage/' . $user->photo_path) }}" alt="Foto de perfil" class="rounded-full h-16 w-16 object-cover">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&color=7F9CF5&background=EBF4FF" alt="Avatar por defecto" class="rounded-full h-16 w-16 object-cover">
                        @endif
                        <div>
                            <h3 class="text-xl font-bold">{{ $user->name }}</h3>
                            <p class="text-sm text-gray-600">{{ $user->email }}</p>
                            <p class="text-sm text-gray-600">Rol: {{ $user->is_admin ? 'Docente' : 'Alumno' }}</p>
                        </div>
                    </div>

                    <div class="mt-6">
                        @if($user->phone)
                            <p><strong>Teléfono:</strong> <a href="https://wa.me/{{ $user->phone }}" target="_blank" class="text-blue-500 hover:underline">{{ $user->phone }}</a></p>
                        @endif
                        @if($user->professional_url)
                            <p><strong>Enlace profesional:</strong> <a href="{{ $user->professional_url }}" target="_blank" class="text-blue-500 hover:underline">{{ $user->professional_url }}</a></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

