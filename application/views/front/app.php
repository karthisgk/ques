<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=$settings->title;?></title>
	<meta name="description" content="Student Online Exam Test Applicaton">
	<meta name="keywords" content="Student,Student Online Exam,Questionary,Online Exam, Online Test">
    <meta name="author" content="karthisgk">

	<!-- App Favicon -->
    <link rel="icon" href="<?=base_url()."media/fav_icon.png"; ?>" type="image/x-icon"/>

	<link href="<?=base_url(); ?>temp2/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=base_url(); ?>temp2/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?=base_url(); ?>temp2/css/styles.css" rel="stylesheet">
	<link href="<?=base_url(); ?>assets/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css" />


	<!-- rich text css -->
	<link type="text/css" rel="stylesheet" href="<?=base_url(); ?>assets/plugins/jQuery-rich-txt/jquery-te-1.4.0.css">

	<!-- data tables -->
    <link href="<?=base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url(); ?>assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="<?=base_url(); ?>assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Sweet Alert css -->
    <link href="<?=base_url(); ?>assets/plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css" />

    <!-- bootsrap datetime picker -->
    <link href="<?=base_url(); ?>temp2/datetime/bootstrap-datetimepicker.css" rel="stylesheet">

	<?=$appcss;?>
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<script type="text/javascript">
		var base_url = '<?=base_url();?>';
		var activeMenu = '<?=$actived?>';
	</script>
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="<?=base_url();?>"><span><?=$settings->site_name;?></span></a>
				<ul class="nav navbar-top-links navbar-right hide">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-envelope"></em><span class="label label-danger">15</span>
					</a>
						<ul class="dropdown-menu dropdown-messages">
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">3 mins ago</small>
										<a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
									<br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">1 hour ago</small>
										<a href="#">New message from <strong>Jane Doe</strong>.</a>
									<br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="all-button"><a href="#">
									<em class="fa fa-inbox"></em> <strong>All Messages</strong>
								</a></div>
							</li>
						</ul>
					</li>
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-bell"></em><span class="label label-info">5</span>
					</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="#">
								<div><em class="fa fa-envelope"></em> 1 New Message
									<span class="pull-right text-muted small">3 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-heart"></em> 12 New Likes
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-user"></em> 5 New Followers
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar scrolable-bar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="<?=base_url();?>assets/images/users/Avatar.jpg" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?=$this->suser->login ? $this->suser->uname : 'Admin';?></div>
				<!-- <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div> -->
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<!-- <form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form> -->
		<ul class="nav menu">
			<?=$menus;?>
		</ul>
	</div><!--/.sidebar-->

	<?=$main;?>

	<?=$popup;?>

	<div id="loading" style="display: none;">
	    <img class="image" src="<?=base_url();?>media/loading.png" alt="" height="50">
	</div>
	<!-- <script src="<?php //echo base_url('node_modules/socket.io/node_modules/socket.io-client/socket.io.js');?>"></script> -->
	<script type="text/javascript">
		/*var node = io.connect( 'http://'+window.location.hostname+':3000' );*/
		var sessionUserId = '<?=$this->sg->_en_urlid($this->suser->id);?>';
	</script>
	<script src="<?=base_url(); ?>temp2/js/jquery-1.11.1.min.js"></script>
	<script src="<?=base_url(); ?>temp2/js/bootstrap.min.js"></script>
	<script src="<?=base_url(); ?>temp2/js/chart.min.js"></script>
	<script src="<?=base_url(); ?>temp2/js/chart-data.js"></script>
	<script src="<?=base_url(); ?>temp2/js/easypiechart.js"></script>
	<script src="<?=base_url(); ?>temp2/js/easypiechart-data.js"></script>

	<!-- rich text js -->
	<script type="text/javascript" src="<?=base_url(); ?>assets/plugins/jQuery-rich-txt/jquery-te-1.4.0.min.js" charset="utf-8"></script>

	<!-- data tables -->
    <script src="<?=base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Responsive examples -->
	<script src="<?=base_url(); ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
	<script src="<?=base_url(); ?>assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

	<!-- Sweet Alert js -->
    <script src="<?=base_url(); ?>assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>

	<script src="<?=base_url(); ?>temp2/js/custom.js"></script>
	<script src="<?=base_url(); ?>assets/script.js"></script>
	<!-- toastr flash alert -->
    <script src="<?=base_url();?>assets/plugins/toastr/toastr.min.js"></script>
	<!-- Validation js (Parsleyjs) -->
    <script type="text/javascript" src="<?=base_url(); ?>assets/plugins/parsleyjs/parsley.min.js"></script>
	
	<!-- bootsrap datetime picker -->
	<script src="<?=base_url(); ?>temp2/datetime/moment.js"></script>
    <script src="<?=base_url(); ?>temp2/datetime/bootstrap-datetimepicker.js"></script>    

	<script>	

		toastr.options = {
            "closeButton": true,
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
    <?php if($this->session->flashdata('flash') != ''){
        $msg = $this->session->flashdata('flash');
    ?>
    <!-- Toastr js -->
    
    <script type="text/javascript">
        Command: toastr["<?=$this->session->flashdata('flashtype');?>"]("<?=$msg;?>");
    </script>
    <?php } ?>
		
</body>
</html>