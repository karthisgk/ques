<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="<?=base_url(); ?>temp2/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url(); ?>temp2/css/datepicker3.css" rel="stylesheet">
    <link href="<?=base_url(); ?>temp2/css/styles.css" rel="stylesheet">
    <link href="<?=base_url(); ?>assets/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css" />
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        var activeMenu = '';
        var base_url = '<?=base_url();?>';
    </script>
    <?php require_once('appcss.php');?>
</head>
<?php 
    $u_name = '';
    if(isset($_SESSION['front_username']))
        $u_name = $_SESSION['front_username'];
?>
<body class="col-xs-12">
    <div class="row">
        <div class="col-xs-12">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">Log in</div>
                <div class="panel-body">
                    <form role="form" id="login_form" method="POST" action="<?=$this->url;?>checklogin/">
                        <fieldset>
                            <div class="form-group">
                                <input name="email" class="form-control" type="text" maxlength="50" required="" placeholder="Enter Roll Number" value="<?=$u_name;?>">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="password"  type="password" maxlength="15" required="" placeholder="Password">
                            </div>
                            <div class="text-center">
                                <span>New User? <a href="<?=base_url();?>signup">Create Account</a></span>
                            </div>
                            <button class="btn btn-primary" type="submit" onclick="return login_valid();">Log In</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->    
    

<script src="<?=base_url(); ?>temp2/js/jquery-1.11.1.min.js"></script>
<script src="<?=base_url(); ?>temp2/js/bootstrap.min.js"></script>
<script src="<?=base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
<!-- Validation js (Parsleyjs) -->
        <script type="text/javascript" src="<?=base_url(); ?>assets/plugins/parsleyjs/parsley.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#login_form').parsley();
});

function login(){

    $('#login_form').submit();
}

function login_valid(){
    $('#login_form').parsley().validate();

    if($('#login_form').parsley().validate()){
        login();
    }
}

toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}
</script>
<?php if($this->session->flashdata('flash') != '') { ?>
<!-- Toastr js -->

<script type="text/javascript">
    Command: toastr["<?=$this->session->flashdata('flashtype'); ?>"]("<?=$this->session->flashdata('flash'); ?>");
</script>
<?php } ?>
</body>
</html>
