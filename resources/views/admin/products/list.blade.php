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
                    <h1>Welcome, Admin !</h1>
                    <a href="{{ route('products.create') }}" class="btn btn-danger"> Create product</a>
                    <a href="{{ route('products.trash') }}" class="btn btn-danger">View Trash</a>
                    <a href="javascript:history.back()" class="btn btn-secondary mb-3" rel="prev">Back</a>
                </div>

                <!-- Table for productss -->
                <h2>products List</h2>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>product name</th>
                            <th>Description</th>
                            <th>price</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    @foreach($products as $product)
                    <tbody>
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>  
                            <td>{{$product->price}}</td>
                            <td>
                            @foreach($product->categories as $category)
                            <p class="card-text"> {{$category->name}}</p>
                            @endforeach
                           </td>
                          <td>
                          <form action="{{ route('products.destroy',  $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Move To Trash</button>
                        </form>
                        <br>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn" style="background-color: aqua">edit</a>
                        <a href="{{ route('products.show', $product->id) }}" class="btn" style="background-color: aqua">show</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
