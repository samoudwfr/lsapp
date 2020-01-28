@extends('layouts.app')

@section('title','Contact Us')

@section('content')
<h1>Contact Us</h1>

@if(! session()->has('message'))
<form action="{{route('contact.store')}}" method="POST">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" placeholder="Customer Name" value="{{old('name') }}"
            class="form-control">
    </div>
    {{$errors->first('name')}}

    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="Customer Email" value="{{old('email') }}"
            class="form-control">
    </div>
    {{$errors->first('email')}}

    <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message" cols="30" rows="10" class="form-control">{{old('message')}}</textarea>
        </div>
        {{$errors->first('message')}}
        @csrf
        <div>
        <button type="submit" class="btn btn-primary">Send Message</button>
    </div>
</form>
@endif
@endsection
