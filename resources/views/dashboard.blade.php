<x-app-layout>
    <div class="max-w-4xl mx-auto mt-10 bg-white rounded-2xl shadow-lg p-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">
            ¡Bienvenido/a, {{ Auth::user()->name }}!
        </h1>

        @if(Auth::user()->role == 'Administrador')
            {{-- Listado de todos los usuarios para Administrador --}}
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Listado de Usuarios</h2>
            <div class="space-y-4">
                @foreach($users as $user)
                    <div class="flex items-center p-4 bg-gray-100 rounded-lg shadow-sm">
                        {{-- Foto --}}
                        @if($user->photo_path)
                            <img src="{{ asset('storage/' . $user->photo_path) }}" 
                                 alt="Foto de perfil" 
                                 class="w-16 h-16 rounded-full object-cover border-2 border-blue-500 mr-4">
                        @else
                            <div class="w-16 h-16 flex items-center justify-center rounded-full bg-gray-300 text-gray-700 mr-4">
                                Sin foto
                            </div>
                        @endif

                        {{-- Información del usuario --}}
                        <div class="text-gray-700">
                            <p><strong>Nombre:</strong> {{ $user->name }}</p>
                            <p>
                                <strong>Correo:</strong> 
                                <a href="mailto:{{ $user->email }}" class="text-blue-600 hover:underline">
                                    {{ $user->email }}
                                </a>
                            </p>

                            <p>
                                <strong>WhatsApp:</strong>
                                @if($user->whatsapp)
                                    <a href="https://wa.me/{{ $user->whatsapp }}" 
                                       target="_blank" 
                                       class="text-green-600 hover:underline">
                                        {{ $user->whatsapp }}
                                    </a>
                                @else
                                    No disponible
                                @endif
                            </p>

                            <p>
                                <strong>Profesional:</strong>
                                @if($user->professional_url)
                                    <a href="{{ $user->professional_url }}" 
                                       target="_blank" 
                                       class="text-blue-600 hover:underline">
                                        Ver perfil
                                    </a>
                                @else
                                    No disponible
                                @endif
                            </p>

                            <p><strong>Rol:</strong> {{ $user->role }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            {{-- Perfil propio para Alumno --}}
            <div class="flex items-center mb-6">
                @if(Auth::user()->photo_path)
                    <img src="{{ asset('storage/' . Auth::user()->photo_path) }}" 
                         alt="Foto de perfil" 
                         class="w-24 h-24 rounded-full object-cover border-2 border-blue-500 shadow-md mr-6">
                @else
                    <div class="w-24 h-24 flex items-center justify-center rounded-full bg-gray-300 text-gray-700 mr-6">
                        Sin foto
                    </div>
                @endif

                <div class="text-gray-700 space-y-2">
                    <p><strong>Nombre:</strong> {{ Auth::user()->name }}</p>
                    <p>
                        <strong>Correo:</strong> 
                        <a href="mailto:{{ Auth::user()->email }}" class="text-blue-600 hover:underline">
                            {{ Auth::user()->email }}
                        </a>
                    </p>

                    <p>
                        <strong>WhatsApp:</strong>
                        @if(Auth::user()->whatsapp)
                            <a href="https://wa.me/{{ Auth::user()->whatsapp }}" 
                               target="_blank" 
                               class="text-green-600 hover:underline">
                                {{ Auth::user()->whatsapp }}
                            </a>
                        @else
                            No disponible
                        @endif
                    </p>

                    <p>
                        <strong>Profesional:</strong>
                        @if(Auth::user()->professional_url)
                            <a href="{{ Auth::user()->professional_url }}" 
                               target="_blank" 
                               class="text-blue-600 hover:underline">
                                Ver perfil
                            </a>
                        @else
                            No disponible
                        @endif
                    </p>

                    <p><strong>Rol:</strong> {{ Auth::user()->role }}</p>
                </div>
            </div>
        @endif

        {{-- Botón de cerrar sesión --}}
        <div class="mt-8">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" 
                        class="w-full bg-red-600 text-white py-2 px-4 rounded-lg shadow-md hover:bg-red-700 transition">
                    Cerrar sesión
                </button>
            </form>
        </div>
    </div>
</x-app-layout>


