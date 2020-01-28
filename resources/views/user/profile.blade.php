@extends('layouts.app')

@section('title','User Profile')


@section('content')
    <img src="/uploads/avatars/{{$user->avatar}}" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px">
    <h2> {{$user->name}} Profile Page</h2>
    <form enctype="multipart/form-data" action="{{route('profile')}}" method="POST">
        <div class="form-group d-flex flex-column py-2">
        <label>Upload profile image</label>
        <input type="file" name="avatar">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        </div>
        <input type="submit" class="pull-right btn btn-sm btn-primary">
    </form>
@endsection
