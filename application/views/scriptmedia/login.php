<div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="page">
                <?php echo (isset($error))?$error:'';?>
                <h3>LOGIN <?php echo strtoupper($penggunalogin);?></h3>
                <div class="content">
                    <div class="group bottom-margin">
                        <form action="<?php echo base_url();?>index.php/ctrview/login<?php echo $penggunalogin;?>" method="POST">
                        <input type="text" class="form-control" placeholder="User *" name="eduser_<?php echo $penggunalogin;?>" id="eduser_<?php echo $penggunalogin;?>">
                        <input type="password" class="form-control" placeholder="Password *" name="edpassword_<?php echo $penggunalogin;?>" id="edpassword_<?php echo $penggunalogin;?>">
                        <br /><input type="submit" class="btn btn-primary" name="submit" value="Login">
                        </form>
                    </div>
                    
                </div>
            </div>

        </div>
    </div>
