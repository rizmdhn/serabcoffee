<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Scripts -->
    <script src="js/app.js"></script>

    <!-- Styles -->
    <link href="css/app.css" rel="stylesheet">
    <title>{{ $title }}</title>
</head>

<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light  bg-light " style="z-index: 10 ;font-size: 1.5rem;">
            <a class="navbar-brand text-hide" href="/">
                <img src="assets/{{ $logo }}" width="45" height="45" style="object-fit: fill" alt="logo serabcoffee">
                Serab Coffee
              </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ml-2">
                    <li class="nav-item  ">
                        <a class="nav-link" href="">Home</a>
                    </li>
                    <li class="nav-item  ">
                        <a class="nav-link" href={{ route('home.about') }}>About Us</a>
                    </li>
                    <li class="nav-item  ">
                        <a class="nav-link" href="/product">Product</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <h1 class="text-center" style="position: absolute; width: 100%; z-index: 100; top: 50%; left: 50%; transform: translate(-50%, -50%)">
        <a class="ff-gothic p-0 m-0" style="font-size: 2.5rem;color: rgb(219, 172, 132);"
        href="/">serab<span style="font-size: 2.5rem;color:rgb(25, 52, 70);"> coffee</span></a>    </h1>

    <div class="home" style="width: 100vw; height: 100vh; position: absolute; top: 0; z-index: 2">
        <img src="assets/{{ $image }}" style="object-fit: cover; width: 100%; height:100%;"
            alt="SerabSurrounding">

        </div>


</body>

</html>
