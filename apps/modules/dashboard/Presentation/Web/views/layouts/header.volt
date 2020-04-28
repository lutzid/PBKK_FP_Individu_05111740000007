<!-- Header -->
<header id="page-header">
    <!-- Header Content -->
    <div class="content-header">
        <!-- Left Section -->
        <div class="content-header-section">
            <a class="font-size-h3" style="color:#1f1f1f; background-color: transparent;border-color: transparent;" href="{{url()}}">
                Pijat.in
            </a>
        </div>
        <!-- END Left Section -->

        <!-- Right Section -->
        <div class="content-header-section">
            {% if session.get('auth') %}
            <!-- User Dropdown -->
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ session.get('auth').nama }}<i class="fa fa-angle-down ml-5"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right min-width-150" aria-labelledby="page-header-user-dropdown">
                    <a class="dropdown-item" href="{{url('profile')}}">
                        <i class="si si-user mr-5"></i> Profil
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{url('home')}}">
                        <span><i class="si si-envelope-open mr-5"></i> Home</span>
                    </a>
                    <a class="dropdown-item" href="{{url('riwayat')}}">
                        <i class="si si-note mr-5"></i> Riwayat
                    </a>

                    <div class="dropdown-divider"></div>
                    {% if session.get('role') === 'Pemijat' %}
                    <a class="dropdown-item" href="{{url('logout/pemijat')}}">
                        <i class="si si-logout mr-5"></i> Logout
                    </a>
                    {% elseif session.get('role') === 'Pelanggan' %}
                    <a class="dropdown-item" href="{{url('logout/pelanggan')}}">
                        <i class="si si-logout mr-5"></i> Logout
                    </a>
                    {% endif %}
                </div>
            </div>
            {% else %}
            <!-- END User Dropdown -->
            <div class="btn-group" role="group">
                <form action="{{url('register')}}" method="get">
                    <button type="submit" class="btn btn-dual-secondary" data-toggle="layout">
                        <span>Register</span>
                    </button>
                </form>
            </div>
            <div class="btn-group" role="group">
                <form action="{{url('login')}}" method="get">
                    <button type="submit" class="btn btn-dual-secondary" data-toggle="layout">
                        <span>Login</span>
                    </button>
                </form>
            </div>
            
            {% endif %}
        </div>
        <!-- END Right Section -->
    </div>
    <!-- END Header Content -->

    <!-- Header Loader -->
    <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
    <div id="page-header-loader" class="overlay-header bg-primary">
        <div class="content-header content-header-fullrow text-center">
            <div class="content-header-item">
                <i class="fa fa-sun-o fa-spin text-white"></i>
            </div>
        </div>
    </div>
    <!-- END Header Loader -->
</header>
<!-- END Header -->