<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="{{Route('users.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Users
                </a>
                <a class="nav-link" href="{{Route('phones.index')}}" >
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Product
                </a>

                <a class="nav-link collapsed" href="{{Route('providers.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Provider
                </a>

                <a class="nav-link collapsed" href="{{Route('orders.index')}}":>
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Order
                </a>


            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>
