@extends( 'layout.app')

@section('content')

    <h3>{{ __('Address Create') }}</h3>

    <x-errors/>

    <form method="post" action="{{ route('address.store') }}">

        @include('forms.address', [
            'data' => $data,
        ])

        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

        @csrf
    </form>

@endsection
