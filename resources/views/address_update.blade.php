@extends( 'layout.app')

@section('content')

    <h3>{{ __('Address Update') }}</h3>

    <x-errors/>

    <form method="post" action="{{ route('address.update', ['address' =>$address->id]) }}">

        <input type="hidden" name="_method" value="PUT" />

        @include('forms.address', [
            'data' => $address,
        ])

        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>

        @csrf
    </form>

@endsection
