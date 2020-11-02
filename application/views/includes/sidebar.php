<aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-dark-lightblue">
    <a href="#" class="brand-link brand-link navbar-cyan">
        <img src="<?php echo base_url(); ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Sistem Zonasi</span>
    </a>

    <div class="sidebar">
    
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>
        
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
               <li class="nav-header">Administrator</li>
                <li class="nav-item">
                    <a href="<?php echo base_url('dashboard'); ?>" class="nav-link">
                        <i class="nav-icon fa fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('siswa'); ?>" class="nav-link">
                        <i class="nav-icon fa fa-user-friends"></i>
                        <p>
                            Siswa
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        
    </div>
    
</aside>