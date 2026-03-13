@extends('books.layout')

@section('content')

<h2>Edit Book</h2>

<form action="{{ route('books.update', $book) }}" method="POST">

@csrf
@method('PUT')

<input type="text" name="title" placeholder="Title" class="form-control mb-2" value="{{ old('title', $book->title) }}">

<input type="text" name="author" placeholder="Author" class="form-control mb-2" value="{{ old('author', $book->author) }}">

<input type="text" name="isbn" placeholder="ISBN" class="form-control mb-2" value="{{ old('isbn', $book->isbn) }}">

<input type="text" name="genre" placeholder="Genre" class="form-control mb-2" value="{{ old('genre', $book->genre) }}">

<input type="number" name="published_year" placeholder="Published Year" class="form-control mb-2" value="{{ old('published_year', $book->published_year) }}">

<select name="status" class="form-control mb-2">
    <option value="available" {{ (old('status', $book->status) == 'available') ? 'selected' : '' }}>Available</option>
    <option value="checked_out" {{ (old('status', $book->status) == 'checked_out') ? 'selected' : '' }}>Checked Out</option>
    <option value="archived" {{ (old('status', $book->status) == 'archived') ? 'selected' : '' }}>Archived</option>
</select>

<button class="btn btn-primary">Update</button>
<a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>

</form>

@endsection