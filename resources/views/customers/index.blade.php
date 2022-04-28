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
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($customers as $customer)
                        <tr>
                            <td><a href="{{route('customers.edit', $customer->id)}}">{{$customer->id}}</a></td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td class="row text-center">
                                @if($customer->payments()->count())
                                    <div class="col-6">
                                        <a href="{{route('customers.show', $customer->id)}}">
                                            <button type="submit" class="btn btn-sm btn-info w-100">Payments</button>
                                        </a>
                                    </div>
                                @endif

                                <div class="col-6">
                                    <form method="POST" action="{{route('customers.destroy', $customer->id)}}">
                                        <input name="_method" type="hidden" value="DELETE">
                                        @csrf

                                        <button type="submit" class="btn btn-sm btn-danger w-100"
                                                onclick="return confirm('Are you sure to delete the record;')">
                                            Delete
                                        </button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>


                <div class="row mt-5 col-4 mx-auto">
                    <a href="{{route('importPayments')}}">
                        <button class="btn btn-warning w-100">Import CSV file</button>
                    </a>
                </div>
            @else
                <h4>Customers not found</h4>
            @endif
        </div>

    </div>

@endsection

