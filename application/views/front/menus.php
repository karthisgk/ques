<!-- <li class="index"><a href="<?=base_url();?>"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
<li class="blank"><a href="<?=base_url();?>blank"><em class="fa fa-hand-spock-o">&nbsp;</em> Blank Page</a></li> -->
<?php if($this->sg->checkAccess()): ?>
	<li class="batch"><a href="<?=base_url();?>batch"><em class="fa fa-window-restore">&nbsp;</em> Batch</a></li>
<?php endif; ?>

<?php if($this->sg->checkAccess()): ?>
	<li class="user"><a href="<?=base_url();?>User"><em class="fa fa-user-circle">&nbsp;</em> Student</a></li>
<?php endif; ?>

<?php if($this->sg->checkAccess()): ?>
	<li class="test"><a href="<?=base_url();?>Test"><em class="fa fa-file">&nbsp;</em> Make Test</a></li>
<?php endif; ?>

<?php if($this->sg->checkAccess('1')): ?>
	<li class="index"><a href="<?=base_url();?>"><em class="fa fa-file">&nbsp;</em> Test Shedule</a></li>
<?php endif; ?>

<li class="parent <?=isset($isSettings) ? 'active' : '';?>"><a data-toggle="collapse" href="#sub-item-1">
	<em class="fa fa-cogs">&nbsp;</em> Settings <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="<?=isset($isSettings) ? 'fa fa-minus' : 'fa fa-plus';?>"></em></span>
	</a>
	<ul class="children collapse <?=isset($isSettings) ? 'in' : '';?>" id="sub-item-1">
		<?php if($this->sg->checkAccess()): ?>
		<li><a class="site_settings" href="<?=base_url();?>site_settings">
			<span class="fa fa-arrow-right">&nbsp;</span> Site Settings
		</a></li>
		<?php endif; ?>

		<li><a class="profile" href="<?=base_url();?>profile">
			<span class="fa fa-arrow-right">&nbsp;</span> Profile Settings
		</a></li>
	</ul>
</li>

<li><a href="<?=base_url();?>login/logout"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>