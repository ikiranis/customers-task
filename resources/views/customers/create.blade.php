@extends('layouts.app')

@section('content')

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

@endsection
