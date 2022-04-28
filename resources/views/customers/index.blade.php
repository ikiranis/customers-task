@extends('layouts.app')

@section('content')

    <div class="container">


        <div class="row mt-5 col-4 mx-auto">
            <a href="{{route('customers.create')}}">
                <button class="btn btn-success w-100">Add Customer</button>
            </a>
        </div>

        <div>
            @if($customers->count())
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($customers as $customer)
                        <tr>
                            <td><a href="{{route('customers.edit', $customer->id)}}">{{$customer->id}}</a></td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>
                                <form method="POST" action="{{route('customers.destroy', $customer->id)}}">
                                    <input name="_method" type="hidden" value="DELETE">
                                    @csrf

                                    <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Είσαι σίγουρος για την διαγραφή;')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            @else
                <h4>Customers not found</h4>
            @endif
        </div>

    </div>

@endsection

