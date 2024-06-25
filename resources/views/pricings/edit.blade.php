<!-- resources/views/pricings/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pricing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Pricing</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('pricings.update', $pricing->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="package" class="form-label">Package</label>
                <input type="text" class="form-control" id="package" name="package" value="{{ $pricing->package }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" required>{{ $pricing->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $pricing->price }}" required>
            </div>
            <div class="mb-3">
                <label for="features" class="form-label">Features (comma-separated)</label>
                <input type="text" class="form-control" id="features" name="features" value="{{ $pricing->features }}">
            </div>
            <button type="submit" class="btn btn-primary">Update Pricing</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
