@extends('layouts.app')

@section('content')
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
                <h2 class="text-center">E-commerce</h2>
                
                <!-- تحقق من دور المستخدم -->
                @if(auth()->user()->isAdmin())
                    <!-- عناصر خاصة بالمشرف -->
                    <a href="#">Home</a>
                    <a href="admin/categories">Categories</a>
                    <a href="admin/products">Products</a>
                    <a href="admin/orders">Orders</a>
                    <a href="#">Logout</a>
                @else
                    <!-- عناصر خاصة بالعميل (التسجيل أو تسجيل الخروج فقط) -->
                    <a href="#">Login</a>
                @endif
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Welcome, {{ auth()->user()->isAdmin() ? 'Admin' : 'Customer' }}!</h1>
                </div>
                
                <!-- المحتوى بناءً على دور المستخدم -->
                @if(auth()->user()->isAdmin())
                    <p>This is the admin dashboard where you can manage categories, products, and orders.</p>
                @else
                    <p>You only have access to the login page. Please contact support if you need further assistance.</p>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
@endsection
