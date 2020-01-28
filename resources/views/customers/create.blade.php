@extends('layouts.app')

@section('title','Add New Customer')


@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Add new customer</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <form action="/customers" method="POST" enctype="multipart/form-data">
            @include('/customers.form')
            <div>
                <button type="submit" class="btn btn-primary">Add Customer</button></div>

        </form>
    </div>
</div>

@endsection
