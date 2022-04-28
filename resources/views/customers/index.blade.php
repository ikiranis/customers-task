<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Customers</title>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

    <div class="container">

        <div class="row mt-5">

            <div class="mb-2 text-center">
                <h1 class="my-auto">Customers</h1>
            </div>

            <div class="row col-4 mx-auto">
                <a href="{{route('customers.create')}}">
                    <button class="btn btn-success w-100">Add Customer</button>
                </a>
            </div>
        </div>

        <div>
            @if(count($customers)>0)
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($customers as $customer)
                        <tr>
                            <td><a href="{{route('customers.edit', $customer->id)}}">{{$customer->id}}</a></td>
                            <td>{{ $customer->name }}</td>
                            <td>
                                <form method="POST" action="{{route('customers.destroy', $category->id)}}">
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
