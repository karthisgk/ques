
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
				<em class="fa fa-home"></em>
			</a></li>
			<li>Settings</li>
			<li class="active">Site Settings</li>
		</ol>
	</div><!--/.row-->

	<div class="panel panel-default" style="margin-top: 10px;">
		<div class="panel-heading">
			Site Settings
			<span class="pull-right clickable panel-toggle panel-button-tab-left hide"><em class="fa fa-toggle-up"></em></span>
		</div>
		<form class="panel-body scrolable-content scrolable-bar" method="post" id="settings">
			<div class="col-md-6 col-sm-12">
				<div class="form-group">
	                <label>Site Title  <span class="text-danger">*</span></label>
	                <input type="text" data-type="text" value="<?=$settings->title;?>" name="title" maxlength="30" class="form-control" placeholder="Enter Site Title" />
	            </div>

				<div class="form-group">
	                <label>Site Name  <span class="text-danger">*</span></label>
	                <input type="text" data-type="text" value="<?=$settings->site_name;?>" name="site_name" maxlength="30" class="form-control" placeholder="Enter Site Name" />
	            </div>

	            <div class="row">
		            <div class="col-md-6 col-sm-12">	
			            <div class="form-group">
			                <label>Load More Count  <span class="text-danger">*</span></label>
			                <input type="text" data-type="number" value="<?=$settings->load_more_count;?>" name="load_more_count" maxlength="5" class="form-control" placeholder="Enter Load More Count" />
			            </div>
			        </div>
			        <div class="col-md-6 col-sm-12">
			        	<div class="form-group">
			                <label>No Of Neg..Quest.. to Minus  <span class="text-danger">*</span></label>
			                <input type="text" data-type="number" value="<?=$settings->no_of_negt_quest;?>" name="no_of_negt_quest" maxlength="2" class="form-control" placeholder="Enter Count" />
			            </div>
			        </div>
		        </div>

		        <div class="form-group text-center">
	                <button class="btn btn-success" id="save" type="button">Save Changes</button>
	            </div>
	        </div>
		</form>
	</div>
</div>