<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= base_url('index.php/webadmindo')?>"><img src="<?= $this->menu[3] ?>" /></a>
        </div>
        <!-- /.navbar-header -->
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?= base_url('index.php/webadmindo/logout')?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
        </ul>
        <!-- /.navbar-top-links -->
        <!-- /.dropdown -->
        <div class="sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <?= $this->menu[1] ?>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?= ($this->menu[6] != ''?$this->menu[6]:'Halaman Admin') ?></h1>
                    <div class="alert alert-info">
                     <strong>Welcome <?= $this->menu[4] ?> ! </strong> You Have No pending Task For Today.
                 </div>
             </div>
             <!-- /.col-lg-12 -->
         </div>
         <!-- /.row -->

         <div class="row" id="panel_content">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4><?= $this->judul ?></h4></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="content-content">
