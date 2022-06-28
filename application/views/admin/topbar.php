<!--Start topbar header-->
<header class="topbar-nav">
    <nav class="navbar navbar-expand fixed-top">
        <ul class="navbar-nav mr-auto align-items-center">
            <li class="nav-item">
                <a class="nav-link toggle-menu" href="javascript:void();">
                    <i class="icon-menu menu-icon"></i>
                </a>
            </li>
        </ul>

        <?php
        $username = $this->session->userdata('username');
        $admin = $this->db->query("SELECT * FROM admin WHERE username = '$username' ");
        $admin = $admin->row_array();
        ?>

        <ul class="navbar-nav align-items-center right-nav-link">
            <li class="nav-item">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
                    <span class="user-profile"><img src="<?= base_url('assets/images/admin.png'); ?>" class="img-thumbnail" alt=""></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="dropdown-item user-details">
                        <a href="javaScript:void();">
                            <div class="media">
                                <div class="media-body">
                                    <div class="mt-2 user-title"><i class="icon-user mr-2"></i> <?= $admin['username']; ?></div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li class="dropdown-item"><a href="<?= base_url('auth/logout'); ?>"><i class="icon-power mr-2"></i> Logout </a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
<!--End topbar header-->