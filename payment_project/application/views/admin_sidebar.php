<div class="sidebar-scroll">
    <div id="sidebar" class="nav-collapse collapse">

        <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
        <div class="navbar-inverse">
            <form class="navbar-search visible-phone">
                <input type="text" class="search-query" placeholder="Search" />
            </form>
        </div>
        <!-- END RESPONSIVE QUICK SEARCH FORM -->
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="sidebar-menu">
            <li class="sub-menu active">
                <a class="" href="<?php echo BASE_URL; ?>admin_controller/manage_member">
                    <i class="icon-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon-book"></i>
                    <span>Member</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="<?php echo BASE_URL; ?>admin_controller/add_member">Add Member</a></li>
                    <li><a class="" href="<?php echo BASE_URL; ?>admin_controller/manage_member">Manage Member</a></li>

                </ul>
            </li>
            <li class="sub-menu">
                <a href="<?php echo BASE_URL; ?>admin_controller/settings" class="">
                    <i class="icon-cogs"></i>
                    <span>Settings</span>
                </a>
            </li>
            <li>
                <a class="" href="login.html">
                    <i class="icon-user"></i>
                    <span>Login Page</span>
                </a>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>

