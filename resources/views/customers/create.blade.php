<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add Customer</title>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container">

        <x-error :errors="$errors" />

        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Add Customer</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('customers.store') }}" enctype="multipart/form-data" autocomplete="off">
                            @csrf

                            <div class="input-group mb-3 no-gutters">
                                <div class="row col-12">
                                    <label class="sr-only" for= "name">Name</label>
                                </div>

                                <div class="row col-12">
                                    <input type="text" maxlength="30" class="form-control" id="name" name="name"
                                           value="{{ old('name') }}">
                                </div>
                            </div>

                            <div class="input-group mb-3 no-gutters">
                                <div class="row col-12">
                                    <label class="sr-only" for= "email">email</label>
                                </div>

                                <div class="row col-12">
                                    <input type="text" maxlength="30" class="form-control" id="email" name="email"
                                           value="{{ old('email') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <button type="submit" class="btn btn-primary col-md-6 col-12 mx-auto">Add</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
