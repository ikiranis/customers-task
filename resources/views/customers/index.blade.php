<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Customers</title>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>

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

</body>
</html>
