@session('success')
    <x-alert-success class="absolute sm:-top-20 -top-32">{{ $value }}</x-alert-success>
@endsession

@if ($errors->any())
    <x-alert-error class="absolute sm:-top-20 -top-32">Validation error!</x-alert-error>
@endif

@error('excel')
    <x-alert-error class="absolute sm:-top-20 -top-32">{{ $message }}</x-alert-error>
@enderror
