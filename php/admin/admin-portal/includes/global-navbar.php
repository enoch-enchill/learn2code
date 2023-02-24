<nav id="me-navbar" class="white">
    <div class="nav-wrapper">
        <a id="logo-container" href="/admin/home" class="brand-logo">APSU USA</a>
        <div class="row m-l-sidbar m-b-t-no">
            <div class="col l3 m6 s6" id="me-left-navbar">
                <ul class="left">
                    <li><a href="#" data-activates="left-sidebar" class="waves-effect waves-default sidebar-collapse hide-on-large-only"><i class="material-icons">menu</i></a></li>
                    <li id="notifications-box"><a class='dropdown-button waves-effect waves-default' href='#' data-activates='notifications-dropdown'><i class="material-icons">notifications</i><span id="notification-cout">3</span></a></li>
                </ul>
                <ul id='notifications-dropdown' class='dropdown-content'>
                    <li>
                        <a href="#!">
                            <i class="material-icons">email</i>
                            <p class="noti-message">New mail from jhon<span>15 minutes ago</span></p>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#!">
                            <i class="material-icons">chat</i>
                            <p class="noti-message">New member John joined<span>1 hour ago</span></p>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#!">
                            <i class="material-icons">perm_identity</i>
                            <p class="noti-message">New mail from jhon<span>15 minutes ago</span></p>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col l6 hide-on-med-and-down" id="me-desktop-search">
                <div class="col l12">
                    <form class="desktop-search-box">
                        <div class="input-field desktop-search-div">
                            <input id="desktop-search" type="search" placeholder="Search What You Want?" required>
                            <label for="desktop-search"><i class="material-icons">search</i></label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col m12 s12 hide-on-large-only" id="me-mobile-search">
                <div class="col m12 s12">
                    <form class="mobile-search-box">
                        <div class="input-field mobile-search-div">
                            <input id="mobile-search" type="search" placeholder="Search What You Want?" required>
                            <label for="mobile-search"><i class="material-icons  waves-effect waves-default" id="me-hide-mobile-search">keyboard_backspace</i></label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col l3 m6 s6" id="me-right-navbar">
                <ul class="right">
                    <li class="hide-on-large-only"><a id="me-show-mobile-search" class="waves-effect waves-default"><i class="material-icons">search</i></a></li>
                    <li id="user-account-box"><a class='dropdown-button waves-effect waves-default' href='#' data-activates='user-account-dropdown'><i class="material-icons">account_circle</i></a></li>
                    <li class="hide-on-small-only"><a id="me-pageRefresh" class="waves-effect waves-default"><i class="material-icons">refresh</i></a></li>
                    <li class="hide-on-small-only"><a id="me-fullscreen" class="waves-effect waves-default"><i class="material-icons">fullscreen</i></a></li>
                </ul>
                <ul id='user-account-dropdown' class='dropdown-content'>
                    <li><a href="#!"><i class="material-icons">perm_identity</i>Profile</a></li>
                    <li><a href="#!"><i class="material-icons">settings</i>Settings</a></li>
                    <li><a href="/admin/logout"><i class="material-icons">power_settings_new</i>Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>