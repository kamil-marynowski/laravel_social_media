@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('posts.store') }}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label class="form-label" for="text">Text</label>
                    <textarea id="text" class="form-control" name="text"></textarea>
                </div>
                <div class="form-group mb-3">
                    <button class="btn btn-success" type="submit">Publish</button>
                </div>
            </form>
        </div>
    </div>
@endsection
