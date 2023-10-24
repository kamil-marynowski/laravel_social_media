@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <a class="btn btn-success" href="{{ route('users.index') }}">Add friend</a>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <div class="card" style="height: 80vh;">
                <div class="card-header">Menu</div>
                <div class="card-body">
                    <ul>
                        <li>
                            <a href="">Friends</a>
                        </li>
                        <li>
                            <a href="">Groups</a>
                        </li>
                        <li>
                            <a href="">Pages</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card" style="height: 80vh;">
                <div class="card-header">Friends</div>
                <div class="card-body">
                    @foreach($friends as $friend)
                        <div class="row mb-3">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        {{ $friend->friendUser->fullname }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-3 ">
            <div class="card" style="height: 80vh;">
                <div class="card-header">Chat</div>
                <div class="card-body"></div>
            </div>
        </div>
    </div>
@endsection
