<div id="wrapper">

    <!--Start sidebar-wrapper-->
    <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
        <div class="brand-logo">
            <a href="<?= base_url('admin'); ?>">
                <img src="<?= base_url('assets/'); ?>images/logo/bidan2.png" class="logo-icon" alt="logo icon">
                <h5 class="logo-text"> K . Katanya Sayang</h5>
            </a>
        </div>
        <ul class="sidebar-menu do-nicescrol">
            <li class="sidebar-header">MENU</li>
            <li>
                <a href="<?= base_url('admin'); ?>">
                    <i class="fas fa-columns"></i> <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="<?= base_url('admin/pasien_online'); ?>">
                    <i class="far fa-id-badge"></i> <span>Data Pasien Daftar Online</span>
                </a>
            </li>

            <li>
                <a href="<?= base_url('admin/pasien_offline'); ?>">
                    <i class="fas fa-id-badge"></i> <span>Data Pasien Daftar Offline</span>
                </a>
            </li>

            <li>
                <a href="<?= base_url('admin/pasienrujukan'); ?>">
                    <i class="fas fa-file-signature"></i> <span>Surat Rujuk</span>
                </a>
            </li>

            <li>
                <a href="<?= base_url('admin/databidan'); ?>">
                    <i class="fas fa-user-nurse"></i> <span>Data Bidan</span>
                </a>
            </li>

            <li>
                <a href="<?= base_url('admin/datars'); ?>">
                    <i class="fas fa-hospital-user"></i> <span>RS Rujukan</span>
                </a>
            </li>

            <li>
                <a href="" target="_blank" data-toggle="modal" data-target="#modalLogout">
                    <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
                </a>
            </li>

        </ul>

    </div>
    <!--End sidebar-wrapper-->


    <div class="modal" tabindex="-1" role="dialog" id="modalLogout">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-info text-light">
                <div class="modal-header">
                    <h4 class="modal-title text-dark">Logout</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="text-dark">Lanjutkan untuk keluar ?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('auth/logout'); ?>" type="button" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>