<!-- <li class="index"><a href="<?=base_url();?>"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
<li class="blank"><a href="<?=base_url();?>blank"><em class="fa fa-hand-spock-o">&nbsp;</em> Blank Page</a></li> -->
<?php if($this->sg->checkAccess()): ?>
	<li class="batch"><a href="<?=base_url();?>batch"><em class="fa fa-window-restore">&nbsp;</em> Batch</a></li>
<?php endif; ?>

<?php if($this->sg->checkAccess()): ?>
	<li class="user"><a href="<?=base_url();?>User"><em class="fa fa-user-circle">&nbsp;</em> User</a></li>
<?php endif; ?>

<?php if($this->sg->checkAccess()): ?>
	<li class="test"><a href="<?=base_url();?>Test"><em class="fa fa-file">&nbsp;</em> Make Test</a></li>
<?php endif; ?>

<?php if($this->sg->checkAccess('1')): ?>
	<li class="index"><a href="<?=base_url();?>"><em class="fa fa-file">&nbsp;</em> Test Shedule</a></li>
<?php endif; ?>

<li><a href="<?=base_url();?>login/logout"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>