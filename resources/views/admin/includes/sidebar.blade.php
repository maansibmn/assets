<div class="menu-list">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav flex-column">
                <li class="nav-divider">
                    Menu
                </li>
{{--                <li class="nav-item ">--}}
{{--                    <a class="nav-link active" href="#"  aria-expanded="false" ><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>--}}

{{--                </li>--}}
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>Assets</a>
                    <div id="submenu-2" class="collapse submenu" style="">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.assets.add') }}">Add <span class="badge badge-secondary">Add</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.assets') }}">Show</a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
    </nav>
</div>
