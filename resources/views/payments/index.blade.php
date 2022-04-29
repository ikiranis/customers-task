@extends('layouts.app')

@section('content')

    <div class="container mt-5">

        <h1>{{ $customer->name }}</h1>

        <div>
            @if($customer->payments()->count())
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Customer Email</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Date</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($customer->payments()->get() as $payment)
                        <tr>
                            <td>{{ $payment->customer_email }}</td>
                            <td>{{ $payment->amount }}</td>
                            <td>{{ $payment->date }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

                <div class="row">
                    <h4 class="text-end">Lifetime revenue: <strong>{{ $customer->payments()->sum('amount') }}</strong></h4>
                </div>

                <div class="row mt-5 col-4 mx-auto">
                    <a href="{{route('index')}}">
                        <button class="btn btn-info w-100">Return to customers index</button>
                    </a>
                </div>

            @else
                <h4>Payments not found</h4>
            @endif
        </div>

    </div>

@endsection

