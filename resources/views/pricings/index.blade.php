<!-- resources/views/pricings/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pricings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 text-start">
                <a href="{{ route('admin') }}"><h1>Admin Panel</h1></a>
            </div>
                <div class="col-md-4 text-center">
                <a href="{{ route('pricings.index') }}" ><h1>Pricing</h1></a>
            </div>
            <div class="col-md-4 text-end">
                    <a href="{{ route('pricings.create') }}" class="btn btn-primary mb-3">Add Pricing</a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Package</th>
                    <th>Price</th>
                    <th>Features</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pricings as $pricing)
                    <tr>
                        <td>{{ $pricing->id }}</td>
                        <td>{{ $pricing->package }}</td>
                        <td>{{ $pricing->price }}</td>
                        <td>{{ $pricing->features }}</td>
                        <td>
                            <a href="{{ route('pricings.edit', $pricing->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('pricings.destroy', $pricing->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this pricing?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
