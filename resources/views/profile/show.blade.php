<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Mi Perfil</h2>
    </x-slot>

    @php
        $user   = auth()->user();
        $prefix = config('services.whatsapp.prefix','54'); // prefijo por defecto Argentina
        $digits = preg_replace('/\D+/', '', (string) $user->phone);
    @endphp

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                {{-- Foto de perfil --}}
                @if($user->photo_path)
                    <div class="mb-4">
                        <img src="{{ asset('storage/'.$user->photo_path) }}" alt="Foto de perfil"
                             class="w-24 h-24 rounded-full object-cover">
                    </div>
                @endif

                {{-- Datos básicos --}}
                <p class="mb-1"><strong>Nombre:</strong> {{ $user->name }}</p>
                <p class="mb-1"><strong>Email:</strong> {{ $user->email }}</p>

                {{-- Teléfono con link a WhatsApp --}}
                <p class="mb-1"><strong>Teléfono:</strong>
                    @if($digits)
                        <a class="text-blue-600 underline"
                           href="https://wa.me/{{ $prefix.$digits }}"
                           target="_blank" rel="noopener">
                            {{ $user->phone }} (WhatsApp)
                        </a>
                    @else
                        -
                    @endif
                </p>

                {{-- Enlace profesional --}}
                <p class="mb-1"><strong>Enlace profesional:</strong>
                    @if($user->professional_url)
                        <a class="text-blue-600 underline"
                           href="{{ $user->professional_url }}"
                           target="_blank" rel="noopener">
                            Abrir perfil
                        </a>
                    @else
                        No cargado
                    @endif
                </p>

                {{-- Botón para editar --}}
                <div class="mt-6">
                    <a href="{{ route('profile.edit') }}"
                       class="inline-block px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                        Editar Perfil
                    </a>
                </div>

                {{-- Mensaje de éxito --}}
                @if (session('status'))
                    <div class="mt-4 p-3 bg-green-50 text-green-700 rounded">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

