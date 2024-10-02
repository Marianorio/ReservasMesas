<x-guest-layout>
    <div class="bg-cover bg-center min-vh-100 d-flex justify-content-center align-items-center" style="background-image: url('{{ asset('images/restaurant_fondo.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
        <div class="bg-light p-4 rounded shadow col-md-4">
            <!-- Muestra el logo directamente aquí -->
            <div class="d-flex justify-content-center mb-3">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-50 h-50"> 
            </div>

            <x-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="alert alert-success mb-4">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label text-dark">{{ __('Email') }}</label>
                    <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label text-dark">{{ __('Password') }}</label>
                    <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password">
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                    <label class="form-check-label text-dark" for="remember_me">{{ __('Remember me') }}</label>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    @if (Route::has('password.request'))
                        <a class="text-decoration-none text-dark" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-outline-primary">
                            Register
                        </a>
                    @endif

                    <button type="submit" class="btn btn-primary ms-3">
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
