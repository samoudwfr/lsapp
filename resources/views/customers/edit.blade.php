@extends('layouts.app')

@section('title','Edit Details for ' .$customer->name)


@section('content')

<div class="row">
    <div class="col-md-12">
    <h1>Edit Details for {{$customer->name}}</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
    <form action="/customers/{{$customer->id}}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @include('/customers.form')
        <div>
            <button type="submit" class="btn btn-primary">Save Customer</button>
        </div>

        </form>
    </div>
</div>

@endsection
