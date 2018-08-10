	
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
				<em class="fa fa-home"></em>
			</a></li>
			<li class="active">Manage Batch</li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<div class="float-left">
				<h1 class="page-header">Batch</h1>
			</div>
			<div class="float-right">
				<a onclick="batch.trigger();" class="btn btn-primary fix-float-btn"><i class="fa fa-plus"></i> Add Batch</a>
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
	                            <th>Name</th>
	                            <th>From</th>
	                            <th>To</th>
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