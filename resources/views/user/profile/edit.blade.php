@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('profile.update') }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label class="form-label" for="first-name">First name</label>
                    <input id="first-name" class="form-control" type="text" name="first_name"
                           value="{{ $user->profile->first_name }}" minlength="0" maxlength="255" required
                    >
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="last-name">Last name</label>
                    <input id="last-name" class="form-control" type="text" name="last_name"
                           value="{{ $user->profile->last_name }}" minlength="0" maxlength="255" required
                    >
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="birth-date">Birth date</label>
                    <input id="birth-date" class="form-control" type="date" name="birth_date"
                           value="{{ $user->profile->birth_date }}" required
                    >
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="sex">Sex</label>
                    <select id="sex" class="form-select" name="sex" required>
                        <option value="0" @if((int)$user->profile->sex == 0) selected @endif>Female</option>
                        <option value="1" @if((int)$user->profile->sex == 1) selected @endif>Male</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="city">City</label>
                    <input id="city" class="form-control" type="text" name="city" minlength="0" maxlength="255"
                           value="{{ $user->profile->city }}" required
                    >
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="address">Address</label>
                    <input id="address" class="form-control" type="text" name="address" minlength="0" maxlength="255"
                           value="{{ $user->profile->address }}" required
                    >
                </div>
                <div class="form-group mb-3">
                    <button class="btn btn-success float-end" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
