<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        @notifyCss
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{url('/css/frontend/css/style.css')}}" rel="stylesheet" />
    
    
    </head>
    <body>
       

@include('frontend.partials.header')


        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Search your product(s)</h1>
                    
                    <form action="{{route('product.search')}}" method="get">
                        <input type="text" class="form-control" placeholder="Search..." name="search">
                        <button type="submit" class="btn btn-success">Search</button>
                    </form>
                   
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                
            {{-- @include('notify::components.notify') --}}

            @yield('content')


            </div>
        </section>
        
        @include('frontend.partials.footer')

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

        @notifyJs

    </body>
</html>
