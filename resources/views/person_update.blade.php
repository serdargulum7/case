@extends( 'layout.app')

@section('content')

    <h3>{{ __('Person Update') }}</h3>

    <x-errors/>

    <form method="post" action="{{ route('person.update', ['person' => $person->id]) }}">

        <input type="hidden" name="_method" value="PUT" />

        @include('forms.person', [
           'data' => $person,
       ])

        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>

        @csrf

    </form>
@endsection
