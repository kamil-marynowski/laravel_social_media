@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('roles.store') }}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label class="form-label" for="name">Name</label>
                    <input id="name" class="form-control" type="text" name="name" required>
                </div>
                <div class="form-group mb-3">
                    <button class="btn btn-success" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
