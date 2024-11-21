@include('layouts.includes.head')
@include('layouts.includes.navbar')

<div class="container my-5">
    <livewire:feedback-component :es-vista-cliente="true" />
</div>

@include('layouts.includes.footer')

