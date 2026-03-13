@extends('books.layout')

@section('content')

<h2>Add Book</h2>

<form action="{{ route('books.store') }}" method="POST">

@csrf

<input type="text" name="title" placeholder="Title" class="form-control mb-2" value="{{ old('title') }}">

<input type="text" name="author" placeholder="Author" class="form-control mb-2" value="{{ old('author') }}">

<input type="text" name="isbn" placeholder="ISBN" class="form-control mb-2" value="{{ old('isbn') }}">

<input type="text" name="genre" placeholder="Genre" class="form-control mb-2" value="{{ old('genre') }}">

<input type="number" name="published_year" placeholder="Published Year" class="form-control mb-2" value="{{ old('published_year') }}">

<select name="status" class="form-control mb-2">
    <option value="available">Available</option>
    <option value="checked_out">Checked Out</option>
    <option value="archived">Archived</option>
</select>

<button class="btn btn-success">Save</button>

</form>

@endsection