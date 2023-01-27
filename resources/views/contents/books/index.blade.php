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
        <a class="btn btn-success mb-2" href="{{ route('books.create') }}">Book +</a>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->content }}</td>
                    <td>
                        <a class="btn btn-primary m-2" href="{{ route('books.edit', ['book' => $book])}}">Edit</a>
                        <form action="{{ route('books.destroy', ['book' => $book]) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <p>There is no data..</p>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection