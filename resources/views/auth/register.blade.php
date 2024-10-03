<x-guest-layout>
    <div class="bg-cover bg-center min-vh-100 d-flex justify-content-center align-items-center" style="background-image: url('{{ asset('images/restaurant_fondo.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
        <div class="bg-light p-4 rounded shadow col-md-4">
            <!-- Muestra el logo directamente aquí -->
            <div class="d-flex justify-content-center mb-3">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-50 h-50"> 
            </div>

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label text-dark">{{ __('Name') }}</label>
                    <input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label text-dark">{{ __('Email') }}</label>
                    <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label text-dark">{{ __('Password') }}</label>
                    <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label text-dark">{{ __('Confirm Password') }}</label>
                    <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mb-3">
                        <x-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" required />

                                <div class="ms-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                @endif

                <div class="d-flex justify-content-between align-items-center mt-4">
                    @if (Route::has('password.request'))
                        <a class="text-decoration-none text-dark" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="btn btn-outline-primary">
                            Atras
                        </a>
                    @endif

                    <button type="submit" class="btn btn-primary ms-3">
                        {{ __('Registrar') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
