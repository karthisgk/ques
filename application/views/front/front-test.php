
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main <?=$assign->negative == 0 ? 'isNegative' : '';?>">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
				<em class="fa fa-home"></em>
			</a></li>
			<li class="active"><?=$assign->name;?></li>
		</ol>
	</div><!--/.row-->

	<div class="col-sm-9">
		<div class="panel panel-default" style="margin-top: 10px;">
			<div class="panel-heading">
				<?=$assign->name;?>
				<span class="pull-right clickable panel-toggle panel-button-tab-left hide"><em class="fa fa-toggle-up"></em></span>
				<span class="pull-right" id="test-timer"></span>
			</div>
			<div class="panel-body scrolable-content scrolable-bar tab-content" id="stud-quest">
				<?php foreach ($questions as $kq => $q): $dataid = $this->sg->_en_urlid($q->id, '0'); ?>
					<div class="tab-pane fade <?=$kq == 0  ? 'active in' : '';?>" data-id="<?=$dataid;?>" id="stud-q-<?=$dataid;?>">
						<div class="action-btns">
							<div class="prev">
								<a class="btn btn-warning"><i class="fa fa-angle-double-left"></i> Prev</a>
							</div>
							<div class="next">
								<a class="btn btn-success">Next <i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
				<span id="questions-content-loading" class="hide"><i class="fa fa-spinner fa-spin"></i></span>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="panel panel-default" style="margin-top: 10px;">
			<div class="panel-heading">
				Question No:
				<span class="pull-right clickable panel-toggle panel-button-tab-left hide"><em class="fa fa-toggle-up"></em></span>
			</div>
			<div class="panel-body ques-btn scrolable-content scrolable-bar">
				<ul class="row">
					<?php foreach ($questions as $kq => $q): $dataid = $this->sg->_en_urlid($q->id, '0'); ?>
						<li class="col-sm-3 <?=$kq == 0  ? 'active' : '';?>"><a class="select-quest-no" data-id="<?=$dataid;?>" href="#stud-q-<?=$dataid;?>" data-toggle="tab"><?=$kq + 1;?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
	
</div>	<!--/.main-->

<script type="text/javascript">
	var studTestPage = true;
	var negative = <?=$assign->negative;?>;
	var testFrom = '<?=$data->from;?>';
	var testTo = '<?=$data->to;?>';
</script>