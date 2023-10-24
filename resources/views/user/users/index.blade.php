@extends('layouts.app')

@section('content')
    <div class="row mb-3">
        <div class="col">
            <a href="{{ route('posts.create') }}" class="btn btn-success">Add post</a>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <div class="card" style="height: 80vh;">
                <div class="card-header">Menu</div>
                <div class="card-body">
                    <ul>
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
        <div class="col-6">
            <div class="card" style="height: 80vh;">
                <div class="card-header">Users</div>
                <div class="card-body">
                    @foreach($users as $user)
                        <div class="row mb-3">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        {{ $user->fullname }}
                                    </div>
                                    <div class="card-body">
                                        <button id="add-friend-btn" class="btn btn-success"
                                                data-friend-one-id="{{ auth()->user()->id }}"
                                                data-friend-two-id="{{ $user->id }}"
                                        >Add friend</button>
                                        <button id="cancel-friend-request" class="btn btn-danger d-none">
                                            Remove friend invitation
                                        </button>
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

@section('script')
    <script>
        const addFriendBtn = document.querySelector('#add-friend-btn');
        const cancelFriendRequest = document.querySelector('#cancel-friend-request');
        addFriendBtn.addEventListener('click', () => {
            let url = "{{ route('friendships.store') }}";
            let xhr = new XMLHttpRequest();
            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onreadystatechange = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) { //.DONE === 4
                    if (xhr.status === 200) {
                        const response = JSON.parse(xhr.response);
                        console.log(response);
                    } else {
                        alert('error');
                    }
                }
            }

            let data = {
                friend_one_id: addFriendBtn.dataset.friendOneId,
                friend_two_id: addFriendBtn.dataset.friendTwoId,
                status_id: '{{ \App\Models\Friendship::STATUS_PENDING }}'
            };
            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            xhr.send(JSON.stringify(data));


            addFriendBtn.classList.add('d-none');
            cancelFriendRequest.classList.remove('d-none');
        });

        cancelFriendRequest.addEventListener('click', () => {
            addFriendBtn.classList.remove('d-none');
            cancelFriendRequest.classList.add('d-none');
        });
    </script>
@endsection
