@extends('books.layout')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Trashed Books</h2>
    <div>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">
            Back to Books
        </a>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<table class="table table-bordered table-striped">

<thead class="table-dark">
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>ISBN</th>
        <th>Genre</th>
        <th>Year</th>
        <th>Status</th>
        <th>Deleted At</th>
        <th width="200">Actions</th>
    </tr>
</thead>

<tbody>

@forelse($books as $book)
    <tr>
        <td>{{ $book->title }}</td>
        <td>{{ $book->author }}</td>
        <td>{{ $book->isbn }}</td>
        <td>{{ $book->genre }}</td>
        <td>{{ $book->published_year }}</td>
        <td>
            @if($book->status == 'available')
                <span class="badge bg-success">Available</span>
            @elseif($book->status == 'checked_out')
                <span class="badge bg-warning text-dark">Checked Out</span>
            @else
                <span class="badge bg-danger">Archived</span>
            @endif
        </td>
        <td>{{ $book->deleted_at->format('d M Y, h:i A') }}</td>
        <td>
            <form action="{{ route('books.restore', $book->id) }}" method="POST" style="display:inline">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Restore this book?')">
                    Restore
                </button>
            </form>

            <form action="{{ route('books.forceDelete', $book->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Permanently delete this book? This action cannot be undone!')">
                    Delete Permanently
                </button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="8" class="text-center">
            No trashed books found.
        </td>
    </tr>
@endforelse

</tbody>

</table>

<div class="mt-3">
    {{ $books->withQueryString()->links() }}
</div>

@endsection