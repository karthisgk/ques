
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
				<em class="fa fa-home"></em>
			</a></li>
			<li>Settings</li>
			<li class="active">Profile Settings</li>
		</ol>
	</div><!--/.row-->

	<div class="panel panel-default col-md-8 col-sm-12" style="margin-top: 10px;">
		<div class="panel-heading">
			Profile Settings
			<span class="pull-right clickable panel-toggle panel-button-tab-left hide"><em class="fa fa-toggle-up"></em></span>
		</div>
		<form class="panel-body scrolable-content scrolable-bar" method="post" id="settings">
			<div class="col-md-12 col-sm-12">

				<?php if($this->sg->checkAccess('1')): ?>
		        	<div class="form-group">
			        	<label>Roll No</label>
		                <input type="text" value="<?=$this->suser->uname;?>" disabled class="form-control not-req" placeholder="Enter Roll No" />
		            </div>
		        <?php endif; ?>

		        <?php if($this->sg->checkAccess('1')): ?>
		        	<div class="form-group">
			        	<label>Batch</label>
		                <input type="text" value="<?=$bname;?>" disabled class="form-control not-req" />
		            </div>
		        <?php endif; ?>

				<div class="row"  style="margin-bottom: 20px;">
		            <div class="col-md-6 col-sm-12">
		            	<label>First Name <span class="text-danger">*</span></label>
		                <input type="text" data-type="text" value="<?=$this->suser->name;?>" name="fname" maxlength="30" class="form-control" placeholder="Enter First Name" />
		            </div>
		            <div class="col-md-6 col-sm-12">
		            	<label>Last Name</label>
		                <input type="text" data-type="text" value="<?=$this->suser->lname;?>" name="lname" maxlength="30" class="form-control not-req" placeholder="Enter Last Name" />
		            </div>
		        </div>

		        <?php if($this->sg->checkAccess()): ?>
		        	<div class="form-group">
			        	<label>User Name  <span class="text-danger">*</span> (For Login)</label>
		                <input type="text" data-type="text" value="<?=$this->suser->uname;?>" name="uname" maxlength="50" minlength="5" class="form-control" placeholder="Enter User Name" />
		            </div>
		        <?php endif; ?>

		        <div class="form-group">
		        	<label>Email <span class="text-danger">*</span></label>
	                <input type="email" data-type="email" value="<?=$this->suser->email;?>" name="email" maxlength="70" class="form-control" placeholder="Enter Email Address" />
	            </div>

	            <div class="form-group">
	            	<label>Current Password</label>
	                <input type="password" data-type="text" name="password" maxlength="15" class="form-control not-req" placeholder="Enter Current Password" />
	            </div>

	            <div class="row"  style="margin-bottom: 20px;">
		            <div class="col-md-6 col-sm-12">
		            	<label>New Password</label>
		                <input type="password" data-type="text" name="npassword" maxlength="15" class="form-control not-req" id="pf-npassword" placeholder="Enter New Password" />
		            </div>
		            <div class="col-md-6 col-sm-12">
		            	<label>Confirm Password</label>
		                <input type="password" data-type="text" name="cf_password" maxlength="15" class="form-control not-req" placeholder="Enter Confirm Password" data-parsley-equalto="#pf-npassword" />
		            </div>
		        </div>

				<div class="form-group text-center">
	                <button class="btn btn-success" id="save" type="button">Save Changes</button>
	            </div>
			</div>
		</form>
	</div>
</div>