<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Digital Perpustakaan | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<style>
    .main {
        height: 100vh;

    }
    .sidebar {
        color: wheat;
        background-color: rgb(65, 61, 61);
    }
    .sidebar ul {
        list-style: none;
    }
    .sidebar li {
        padding: 15px;
    }
    .sidebar a{
        color: #fff;
        text-decoration: none;
        display: block;
        padding: 15px 10px;
    }
    .sidebar a:hover{
        background:#000;
        
    }
</style>
<body>

    <div class="main d-flex flex-column justify-content-between">
        <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Digital Perpustakaan</a>            
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                 data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" 
                 aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <div class="body-content h-100">
            <div class="row g-0 h-100">
                <div class="sidebar col-lg-2 collapse d-lg-block " id="navbarTogglerDemo02">
                    
                  
                    @if (Auth::user()->role_id == 1)
                        

                    <a href="dashboard">Dashboard</a>
                    <a href="boks">Books</a>
                    <a href="#">Categoriy</a>
                    <a href="#">User</a>
                    <a href="#">Rent Log</a>
                    <a href="logout">Logout</a>
                    @elseif(Auth::user()->role_id == 2)
                    
                    <a href="profile">Profile</a>
                    <a href="logout">Logout</a>
                   
                    @endif
                   
                </div>
                <div class="content p-5 col-lg-10">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <div>
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
