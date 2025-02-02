<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" >mojSajt</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Pocetna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/about">O nama</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/contact">Kontakt</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/shop">Shop</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('product.all') }}">Svi proizvodi</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('contact.all') }}">Svi kontakti</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('cart.all') }}">Korpa</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
