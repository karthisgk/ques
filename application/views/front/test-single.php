	
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
				<em class="fa fa-home"></em>
			</a></li>
			<li class="active"><?=isset($data->name) ? $data->name : '';?></li>
		</ol>
	</div><!--/.row-->
	
	<div class="row tab-content" id="make-test-header" style="padding: 0;">
		<div class="col-lg-12 tab-pane fade <?=$test;?>" content-id="tquest-content">
			<div class="float-left">
				<h1 class="page-header">Questions <a onclick="tquest.trigger();" class="btn btn-primary fix-float-btn"><i class="fa fa-plus"></i></a></h1>
			</div>
			<div class="float-right">
				
			</div>
		</div>
		<div class="col-lg-12 tab-pane fade <?=$assign;?>" content-id="assign-content">
			<div class="float-left">
				<h1 class="page-header">Assign <a onclick="assign.trigger();" class="btn btn-primary fix-float-btn"><i class="fa fa-plus"></i></a></h1>
			</div>
			<div class="float-right">
				
			</div>
		</div>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-xs-12">
			<div class="panel-body">
				<div class="panel panel-primary">
					<div class="panel-body tabs">
						<ul class="nav nav-tabs custom-tab" id="make-test-tabs">
							<li class="<?=$test;?>"><a href="#tquest-content" data-toggle="tab">Questions</a></li>
							<li class="<?=$assign;?>"><a href="#assign-content" data-toggle="tab">Assigned</a></li>
						</ul>
						<div class="tab-content make-test-contents scrolable-content scrolable-bar">
							<div class="tab-pane fade col-xs-12 <?=$test;?>" id="tquest-content">
								
							</div>
							<div class="tab-pane fade col-xs-12 <?=$assign;?>" id="assign-content">
								<table id="ajax-table" class="table table-bordered table-striped">
				                    <thead>
				                        <tr>
				                            <th>ID</th>
				                            <th>Test Name</th>
				                            <th>Assigned Batch</th>
				                            <th>Date</th>
				                            <th>Timing</th>
				                            <th>Option</th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                    </tbody>
				               </table>
							</div>

							<div class="text-center">
								<a id="t-load-more"><i class="fa fa-spinner fa-spin" style="font-size:24px;"></i></a>
							</div>
						</div>
					</div>
				</div><!--/.panel-->
            </div>
		</div>
	</div>
</div>	<!--/.main-->

<input type="hidden" id="test_name" value="<?=isset($data->name) ? $data->name : '';?>" />
<div id="test-panel" style="display: none;">
	<div class="panel-child col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading"><span ui-element="test-name"></span>
				<ul class="pull-right panel-settings panel-button-tab-right">
					<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
						<em class="fa fa-ellipsis-v"></em>
					</a>
						<ul class="dropdown-menu dropdown-menu-right">
							<li>
								<ul class="dropdown-settings">
									<li><a href="#" ui-element="test-rm-btn">
										<em class="fa fa-trash"></em> Remove
									</a></li>
								</ul>
							</li>
						</ul>
					</li>
				</ul>
				<span class="pull-right panel-toggle clickable panel-collapsed"><em class="fa fa-toggle-down"></em></span></div>
			<div class="panel-body" style="display: none;">
				<p ui-element="test-desb"></p>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
var testSingle = true;
var test_id = '<?=isset($data->enid) ? $data->enid : '';?>';
var testQuest = <?=isset($data->questions) ? $data->questions : '[]';?>;
</script>