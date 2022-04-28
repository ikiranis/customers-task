@extends('layouts.app')

@section('content')

    <div class="container mt-5">

        <h1>{{ $customer->name }}</h1>

        <div>
            @if($payments->count())
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Customer Email</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Date</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($payments as $payment)
                        <tr>
                            <td>{{ $payment->customer_email }}</td>
                            <td>{{ $payment->amount }}</td>
                            <td>{{ $payment->date }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

                <div class="row">
                    <h4 class="text-end">Lifetime revenue: <strong>{{ $payments->sum('amount') }}</strong></h4>
                </div>

            @else
                <h4>Payments not found</h4>
            @endif
        </div>

    </div>

@endsection

