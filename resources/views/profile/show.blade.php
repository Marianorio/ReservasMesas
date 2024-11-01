<x-app-layout>
    <x-slot name="header">
        <div class="text-center mt-3 mb-3">
            <h2 class="font-weight-bold">
                {{ __('Perfil de Usuario') }}
            </h2>
        </div>
    </x-slot>

    <div class="container my-5">
        <div class="card shadow-lg p-4 mx-auto w-75">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                <div class="mb-4">
                    @livewire('profile.update-profile-information-form')
                </div>
                <hr>
            @endif
        
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-4">
                    @livewire('profile.update-password-form')
                </div>
                <hr>
            @endif
        
            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-4">
                    @livewire('profile.two-factor-authentication-form')
                </div>
                <hr>
            @endif
        
            <div class="mt-4">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>
        
            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <hr>
                <div class="mt-4">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>        
    </div>
</x-app-layout>
