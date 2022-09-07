@extends( 'layout.app')

@section('content')

    <h3>{{ __('Person Create') }}</h3>

    <x-errors/>

    <form method="post" action="{{ route('person.store') }}">

        @include('forms.person', [
             'data' => $data,
       ])

        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

        @csrf

    </form>
@endsection
