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
                <div class=" align-items-center mb-4">
                    <h1>Welcome, Admin!</h1>
                    <button class="btn btn-primary"><a href="{{ route('categories.create') }}" class="btn mb-2">Create New</a></button>
                    <a href="javascript:history.back()" class="btn btn-secondary mb-3" rel="prev">Back</a>
                </div>
                <div class="container">
        <div class="row row-sm mt-2">
            <div class="col-md-6 col-lg-6 col-xl-4 col-sm-6">
                <div class="card" style="margin-bottom: 20px">
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold">{{ $category->name }}</h5>
                        <ul>
                        @foreach($category->products as $product)
                           <li>{{ $product->name }}</li>
                            @endforeach
                           </ul>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
