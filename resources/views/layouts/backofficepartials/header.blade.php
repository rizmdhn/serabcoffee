    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-light " style="z-index: 10 ;font-size: 1.5rem;">
            <a class="navbar-brand ff-gothic p-0 m-0" style="font-size: 2.5rem;color:rgb(25, 52, 70); "
                href="/">Back<span style="font-size: 2.5rem;color:rgb(219, 172, 132);">Office</span></a>
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
        </nav>
    </div>
