    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Simple Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        @vite('resources/css/app.css')
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-3 col-lg-2 sidebar">
                <h2 class="text-center">e-commerce</h2>
                <a href="/home">Home</a>
                <a href="{{ route('categories.index') }}">Categories</a>
                <a href="{{ route('products.index') }}">Products</a>
                <a href="{{ route('orders.index') }}">Orders</a>
                <div>
                <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
               </a>

               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
              </form>
            </div>
            </div>
                <!-- Main Content -->
                <div class="col-md-9 col-lg-10 content">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h1>Welcome, Admin!</h1>
                        <a href="javascript:history.back()" class="btn btn-secondary mb-3" rel="prev">Back</a>
                    </div>
                    
                    <!-- Form for products Information -->
                    <div class="form-container">
                        <h2>Edit product</h2>
                        <form action="{{ route('products.update', $product->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="productname" class="form-label">product name</label>
                                <input value="{{$product->name}}" name="name" type="name" class="form-control" id="productname">
                            </div>
                            <div class="mb-3">
                                <label for="productDescription" class="form-label">product Description</label>
                                <textarea name="description" class="form-control" id="productDescription" rows="4" >{{$product->description}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="productsCategories" class="form-label">Categories</label>
                                <select id="category"class="form-control" name="category_id">
                                 @foreach($categories as $category)
                               <option value="{{$category->id}}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{$category->name}}</option>
                                 @endforeach
                                </select>
                                <small class="form-text text-muted">Select one or more categories for the product.</small>
                            </div>
                            <button type="submit" class="btn btn-success">Save product</button>
                        </form>
                    </div
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
