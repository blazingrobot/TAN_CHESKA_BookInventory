@extends('books.layout')

@section('content')

<h2>{{ $book->title }}</h2>

<p><b>Author:</b> {{ $book->author }}</p>
<p><b>ISBN:</b> {{ $book->isbn }}</p>
<p><b>Genre:</b> {{ $book->genre }}</p>
<p><b>Year:</b> {{ $book->published_year }}</p>
<p><b>Status:</b> {{ ucfirst(str_replace('_', ' ', $book->status)) }}</p>

<p>
    <b>Created:</b>
    {{ $book->created_at->format('d M Y, h:i A') }}
</p>

<a href="{{ route('books.index') }}" class="btn btn-secondary">Back to List</a>
<a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>

@endsection