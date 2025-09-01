<x-layouts.guest>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="block mt-1 w-full"
                          :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="block mt-1 w-full"
                          :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="phone" :value="__('Phone (optional)')" />
            <x-text-input id="phone" name="phone" type="text" class="block mt-1 w-full"
                          :value="old('phone')" placeholder="Ej: 3704123456" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="professional_url" :value="__('Professional link (optional)')" />
            <x-text-input id="professional_url" name="professional_url" type="url"
                          class="block mt-1 w-full" :value="old('professional_url')"
                          placeholder="https://www.linkedin.com/in/tu-usuario" />
            <x-input-error :messages="$errors->get('professional_url')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="photo" :value="__('Profile photo (required)')" />
            <input id="photo" name="photo" type="file" accept="image/*" required
                   class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" />
            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" name="password" type="password" class="block mt-1 w-full"
                          required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                          class="block mt-1 w-full" required autocomplete="new-password" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md
                      focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
               href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-3">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-layouts.guest>

