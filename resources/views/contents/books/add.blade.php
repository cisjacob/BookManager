 @extends('layouts.app')

@section('contents')

<div class="container">
    <div class="mt-5">
        <form action="{{ route('books.store') }}" method="POST"> 
            <!-- For token -->
            @csrf

            @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>

            @elseif(session('error'))
            <div class="alert alert-success" role="alert">
                {{ session('error') }}
            </div>

            @endif
            
            <div class="form-floating mb-3">
                <input type="title" class="form-control" name="title" id="title" placeholder="Title" required>
                <label for="title">Title</label>
            </div>

            <div class="form-floating mb-3">
                <input type="content" class="form-control" name="content" id="content" placeholder="Content" required>
                <label for="content">Content</label>
            </div>

            @include('components.form_errors')

            <input type="submit" value="Publish" class="btn btn-success">

        </form>
    </div>
</div>

@endsection