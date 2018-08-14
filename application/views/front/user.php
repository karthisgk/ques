	
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
				<em class="fa fa-home"></em>
			</a></li>
			<li class="active">Manage Users</li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<div class="float-left">
				<h1 class="page-header">Users <a id="change-batch" style="font-size: 18px; cursor: pointer;">(Change Batch)</a></h1>
			</div>
			<div class="float-right">
				<a onclick="user.trigger();" class="btn btn-primary fix-float-btn"><i class="fa fa-plus"></i> Add User</a>
			</div>
		</div>
	</div><!--/.row-->
	
	<div class="panel panel-container">
		<div class="row">
			<div class="col-xs-12 table-responsive" style="min-height: 300px;">
				<div class="panel-body">
					<table id="ajax-table" class="table table-bordered table-striped">
	                    <thead>
	                        <tr>
	                            <th>ID</th>
	                            <th>Roll No</th>
	                            <th>Name</th>
	                            <th>Email</th>
	                            <th>Created At</th>
	                            <th>Option</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    </tbody>
	               </table>
	            </div>
			</div>
		</div><!--/.row-->
	</div>
</div>	<!--/.main-->

<script type="text/javascript">
	var mu_batch_id = '<?=isset($_GET['bid']) ? $_GET['bid'] : 0;?>';
</script>	