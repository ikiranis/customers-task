@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row mt-5 col-4 mx-auto">
            <a href="{{route('customers.create')}}">
                <button class="btn btn-success w-100">Add Customer</button>
            </a>
        </div>

        <div class="row mt-5 text-end ">
            <a href="{{route('index', $filter == 1 ? 0 : 1)}}">
                <button class="btn btn-sm btn-light">Filter customers</button>
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
                        <th scope="col" class="text-center">Lifetime revenue</th>
                        <th scope="col" class="text-center">Total transactions</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($customers as $customer)
                        @if($customer->payments()->count() || $filter)
                        <tr>
                            <td><a href="{{route('customers.edit', $customer->id)}}">{{$customer->id}}</a></td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td class="text-center">{{ $customer->payments()->sum('amount') }}</td>
                            <td class="text-center">{{ $customer->payments()->count() }}</td>
                            <td class="row text-center">
                                @if($customer->payments()->count())
                                    <div class="col">
                                        <a href="{{route('customers.show', $customer->id)}}">
                                            <button type="submit" class="btn btn-sm btn-info w-100">Payments</button>
                                        </a>
                                    </div>
                                @endif

                                <div class="col">
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
                        @endif
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

