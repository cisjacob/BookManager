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

        <form action="{{route('sign-in')}}" method="post">

            @csrf

            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" placeholder="Email Address" name="email" value="{{old('email')}}">
                <label for="email">Email Address</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                <label for="password">Password</label>
            </div>

            <button class="btn btn-primary" type="submit">Sign In</button>

            @include('components.form_errors')
        </form>


        
    </div>
</div>

@endsection