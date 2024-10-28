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
                    <a href="javascript:history.back()" class="btn btn-secondary mb-3" rel="prev">Back</a>
                </div>
                
                <!-- Form for Category Information -->
                <div class="form-container">
                    <h2>Add Category</h2>
                    <form action="{{route('categories.store')}}"  method="post" class="blog-form">
                    @csrf
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Category Name</label>
                            <input name="name" type="text" class="form-control" id="categoryName" placeholder="Enter category name">
                        </div>
                        <button type="submit" class="btn btn-success">Save Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
