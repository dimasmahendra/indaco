<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>JUAL CEPAT PROPERTY</title>

        <!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>resource/scriptmedia/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>resource/scriptmedia/css/font-awesome.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>resource/scriptmedia/css/style.css" rel="stylesheet">
        <script type="text/javascript">
                 function getBaseURL() {
                          return "<?php echo base_url(); ?>";
                        }
                </script>
                <!--// script header//-->
        <?php echo $headscript; ?>
         <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>resource/ajax/ajaxhomepage.js"></script>
        
    </head>
    <body>
        <div class="container">
            <div class="header">
                <div class="logo col-md-4">
                    <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>resource/scriptmedia/images/logo.png" alt="Mitraku sistem member" class="img img-fluid"/></a>
                </div>
                
            </div>
            <!--// main menu -->
            <div class="primary-nav">
                
                <nav class="navbar navbar-expand-lg ">
                    <h5 class="title-nav">Cari Properti</h5>
<!--                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>-->
                    <div class="navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item active"><div class="form-inline">
                               <?php echo $kabupaten; ?>
                            <button class="btn btn-info" style="color:" onclick="dosearchproduk('0');">Cari</button> 
                        </div>
                        <li>
                        </ul>
                    </div>
                </nav>
            </div>