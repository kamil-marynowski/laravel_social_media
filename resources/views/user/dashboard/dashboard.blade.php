@extends('layouts.app')

@section('content')
    <div class="row mb-3">
        <div class="col">
            <a href="{{ route('posts.create') }}" class="btn btn-success">Add post</a>
            <a href="{{ route('users.index') }}" class="btn btn-success">Add friend</a>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <div class="card" style="height: 80vh;">
                <div class="card-header">Menu</div>
                <div class="card-body">
                    <ul>
                        <li>
                            <a href="{{ route('profile.edit') }}">Profile</a>
                        </li>
                        <li>
                            <a href="{{ route('friends.index') }}">Friends</a>
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
        <div class="col-8">
            <div class="card" style="height: 80vh;">
                <div class="card-header">Wall</div>
                <div class="card-body">
                    @foreach($posts as $post)
                        <div class="row mb-3">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        {{ $post->user->fullname }} - {{ $post->created_at }}
                                    </div>
                                    <div class="card-body">
                                        <p>{{ $post->text }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card" style="height: 80vh;">
                <div class="card-header">Chat</div>
                <div class="card-body"></div>
            </div>
        </div>
    </div>
@endsection
