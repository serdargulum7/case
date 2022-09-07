@extends( 'layout.app')

@section('content')

    <h3>{{ __('Address List') }}</h3>

    <x-errors/>

    @if( session()->has('message') )
        <div class="alert alert-success">
            {{session()->get('message') }}
        </div>
    @endif

    <a href="{{  route('address.create', ['person_id' => $personId]) }}" class="btn btn-primary">{{ __('New Address') }}</a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{ __('Address') }}</th>
            <th scope="col">{{ __('Country') }}</th>
            <th scope="col">{{ __('City') }}</th>
            <th scope="col">{{ __('Update') }}</th>
            <th scope="col">{{ __('Delete') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($addressList as $address)
            <tr>
                <th scope="row">{{ $address->id }}</th>
                <td>{{ $address->address }}</td>
                <td>{{ $address->country_name }}</td>
                <td>{{ $address->city_name }}</td>
                <td> <a href="{{  route('address.show', ['address' => $address->id]) }}" class="btn btn-success">{{ __('Update') }}</a></td>
                <td>
                    <form action="{{  route('address.destroy', ['address' => $address->id]) }}" method="post">

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
        {{ $addressList->links() }}
    </div>
@endsection
