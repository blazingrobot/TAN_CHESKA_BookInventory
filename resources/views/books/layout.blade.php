<!DOCTYPE html>
<html>
<head>
<title>Book Inventory</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<nav class="navbar navbar-dark bg-dark">
<div class="container">
<a class="navbar-brand" href="{{ route('books.index') }}">Book Inventory</a>
</div>
</nav>

<div class="container mt-4">
@yield('content')
</div>

</body>
</html>