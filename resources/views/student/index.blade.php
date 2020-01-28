@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <br>
        <h3 aling="center">Student Data</h3>
        <br>
        <table class="table table-bordered">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach ($students as $row)
                <tr>
                    <td>{{$row['first_name']}}</td>
                    <td>{{$row['last_name']}}</td>
                    <td></td>
                    <td></td>
                </tr>

            @endforeach

        </table>
    </div>
</div>

@endsection
