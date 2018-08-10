<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
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
<body class="col-xs-12">
    <div class="row">
        <div class="col-xs-12">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">Registration</div>
                <div class="panel-body">
                    <form role="form" id="s-form" method="POST" action="<?=$this->url;?>signup/">
                        <fieldset>
                            <div class="form-group">
                                <input name="fname" class="form-control" type="text" maxlength="30" required placeholder="First Name" />
                            </div>
                            <div class="form-group">
                                <input name="lname" class="form-control" type="text" maxlength="30" required placeholder="Last Name" />
                            </div>
                            <div class="form-group">
                                <input name="uname" class="form-control" type="text" maxlength="20" required placeholder="Roll Number" />
                            </div>
                            <div class="form-group">
                                <input name="email" class="form-control" type="email" maxlength="60" required placeholder="Email Address" />
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="password" id="password"  type="password" maxlength="15" required placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="cpassword" id="cpassword"  type="password" maxlength="15" required placeholder="Confirm Password" data-parsley-equalto="#password" />
                            </div>
                            <div class="form-group">
                                <select class="form-control" required name="batch">
                                    <option value="" hidden="">Select Batch</option>
                                    <?php foreach ($batchs as $b): ?>
                                        <option value="<?=$b->id;?>"><?=$b->from;?> - <?=$b->to;?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="text-center">
                                <span>Aready a User? <a href="<?=base_url();?>login">Back to Login</a></span>
                            </div>

                            <button class="btn btn-primary" type="button" id="sign-up-submit">Sign Up</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->    
    

<script src="<?=base_url(); ?>temp2/js/jquery-1.11.1.min.js"></script>
<script src="<?=base_url(); ?>temp2/js/bootstrap.min.js"></script>
<script src="<?=base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
<script src="<?=base_url(); ?>assets/script.js"></script>
<!-- Validation js (Parsleyjs) -->
<script type="text/javascript" src="<?=base_url(); ?>assets/plugins/parsleyjs/parsley.min.js"></script>
<script type="text/javascript">
signup.trigger = true;
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
