<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Customers</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>

    <div class="container">

        <div class="row mt-5">

            <div class="mb-2 text-center">
                <h1 class="my-auto">Customers</h1>
            </div>

            <div class="row col-4 mx-auto">
                <button class="btn-lg btn-success">Add Customer</button>
            </div>


        </div>

        <div>
            @foreach($customers as $customer)
                <div>
                    <span>{{ $customer->name }}</span>
                    <span>{{ $customer->email }}</span>
                </div>
            @endforeach
        </div>

    </div>

</body>
</html>
