    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-light " style="z-index: 10 ;font-size: 1.5rem;">
            <a class="navbar-brand ff-gothic p-0 m-0" style="font-size: 2.5rem;color:rgb(25, 52, 70); "
                href={{ route('backoffice.index') }}>Back<span
                    style="font-size: 2.5rem;color:rgb(219, 172, 132);">Office</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ml-2">
                    <li class="nav-item">
                        <a class="nav-link" href={{ route('backofficeproducts.index') }}>Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{ route('backoffice.table.index') }}>Table</a>
                    </li>
                </ul>
            </div>
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
    </div>
    </li>
    </nav>
    </div>
