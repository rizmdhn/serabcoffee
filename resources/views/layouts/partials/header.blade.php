    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-light " style="z-index: 10 ;font-size: 1.5rem;">
            <a class="navbar-brand ff-gothic p-0 m-0" style="font-size: 2.5rem;color:rgb(25, 52, 70); "
                href="/">Nahini<span style="font-size: 2.5rem;color:rgb(219, 172, 132);"> coffee</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ml-2">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{ route('home.about') }}>About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{ route('home.products') }}>Product</a>
                    </li>
                </ul>
            </div>
                <a href="{{ route('cart.list') }}" class="float-right pr-5 text-black-50">
                    <svg style="width: 30px" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="black">
                        <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    {{ Cart::getTotalQuantity()}}
                </a>

        </nav>
    </div>
