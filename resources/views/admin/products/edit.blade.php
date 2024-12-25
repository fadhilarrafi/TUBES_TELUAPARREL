<!-- resources/views/admin/products/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <h1 class="my-4">Edit Product</h1>

        <!-- Form for Editing Product -->
        <form method="POST" action= "{{ route('products.update', $product->id) }}" >
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" required>{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $product->price) }}" required>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" name="category" id="category" class="form-control" value="{{ old('category', $product->category) }}" required>
            </div>


            <div class="mb-3">
                <label for="image" class="form-label">Image URL</label>
                <input type="text" name="image" id="image" class="form-control" value="{{ old('image', $product->image) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>

        <!-- Link to go back to product list -->
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary mt-3">Back to Product List</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
