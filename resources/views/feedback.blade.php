@include('layouts.includes.head')
@include('layouts.includes.navbar')

<div class="container my-5">
    <livewire:feedback-component :es-vista-cliente="false" />
</div>

@include('layouts.includes.footer')
