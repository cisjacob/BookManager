@extends('layouts.app')
 
@section('contents')

<div class="container">

    <div class="mt-5">
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @elseif(session('error'))
        <div class="alert alert-success" role="alert">
            {{ session('error') }}
        </div>
        @endif

        <form action="{{route('sign-up')}}" method="post">

            @csrf

            <select class="form-select mb-3" aria-label="Type" name="type" value="{{old('type')}}">
                <option value="Reader">Reader</option>
                <option value="Author">Author</option>
            </select>
        
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="fullname" placeholder="fullname" name="name" value="{{old('name')}}">
                <label for="fullname">Full Name<span class="text-danger">*</span></label>
            </div>

            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" placeholder="Email Address" name="email" value="{{old('email')}}">
                <label for="email">Email Address</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                <label for="password">Password</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password_confirmation" placeholder="Password Confirmation" name="password_confirmation">
                <label for="password_confirmation">Confirm Password</label>
            </div>

            <button class="btn btn-primary" type="submit">Sign Up</button>
            @include('components.form_errors')
        </form>


        
    </div>
</div>

@endsection