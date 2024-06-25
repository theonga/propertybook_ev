<!-- resources/views/admin.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 mb-5">
         <a clas="center" href="{{ route('welcome') }}">View Site</a>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-4 text-start">
                    <a href="{{ route('admin') }}"><h1>Admin Panel</h1></a>
                </div>
                 <div class="col-md-4 text-center">
                    <a href="{{ route('pricings.index') }}" ><h1>Pricing</h1></a>
                </div>
                <div class="col-md-4 text-end">
                    <a href="{{ route('sections.add') }}" class="btn btn-primary">Add New Section</a>
                </div>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sections as $section)
                    <tr class="parent">
                        <td>{{ $section->id }}</td>
                        <td>{{ $section->name }}</td>
                        <td>{{ $section->title }}</td>
                        <td>
                            <a href="{{ route('sections.edit', $section->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('sections.destroy', $section->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this section?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @foreach($section->subSections as $subSection)
                        <tr>
                            <td>{{ $subSection->id }}</td>
                             <td>{{ $subSection->name }}</td>
                            <td>{{ $subSection->title }}</td>
                            <td>
                                <a href="{{ route('sections.edit', $subSection->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('sections.destroy', $subSection->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this sub-section?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
