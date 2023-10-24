@extends('layouts.app')

@section('page-title')
    Users
@endsection

@section('page-header')
    Users
@endsection

@section('content')
    <div class="row mb-3">
        <div class="col">
            <header>
                <h1 id="page-header">Users</h1>
            </header>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <button class="btn btn-success">Add user</button>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <table class="table table-bordered table-striped" aria-describedby="page-header">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>E-mail</th>
                    <th>Username</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Role</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>ROLA</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
