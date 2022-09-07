@extends( 'layout.app')

@section('content')

    <h3>{{ __('Person List') }}</h3>

    <x-errors/>

    @if( session()->has('message') )
        <div class="alert alert-success">
            {{session()->get('message') }}
        </div>
    @endif

    <a href="{{  route('person.create') }}" class="btn btn-primary">{{ __('New User') }}</a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{ __('Name') }}</th>
            <th scope="col">{{ __('Birthday') }}</th>
            <th scope="col">{{ __('Gender') }}</th>
            <th scope="col">{{ __('Update') }}</th>
            <th scope="col">{{ __('Add Address') }}</th>
            <th scope="col">{{ __('Address List') }}</th>
            <th scope="col">{{ __('Delete') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($personList as $person)
            <tr>
                <th scope="row">{{ $person->id }}</th>
                <td>{{ $person->name }}</td>
                <td>{{ $person->birthday }}</td>
                <td>{{ $person->gender }}</td>
                <td> <a href="{{  route('person.show', ['person' => $person->id]) }}" class="btn btn-success">{{ __('Update') }}</a></td>
                <td> <a href="{{  route('address.create', ['person_id' => $person->id]) }}" class="btn btn-primary">{{ __('New Address') }}</a></td>
                <td> <a href="{{  route('address.index', ['person_id' => $person->id]) }}" class="btn btn-info">{{ __('Address List') }}</a></td>
                <td>
                    <form action="{{  route('person.destroy', ['person' => $person->id]) }}" method="post">

                        <input type="hidden" name="_method" value="DELETE" />

                        @csrf

                        <button type="submit" class="btn btn-danger">
                        {{ __('Delete') }}
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="d-flex">
    {{ $personList->links() }}
    </div>
@endsection
