	
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
				<em class="fa fa-home"></em>
			</a></li>
			<li class="active">Make Test</li>
		</ol>
	</div><!--/.row-->
	
	<div class="row tab-content" id="make-test-header" style="padding: 0;">
		<div class="col-lg-12 tab-pane fade in active" content-id="test-content">
			<div class="float-left">
				<h1 class="page-header">Test</h1>
			</div>
			<div class="float-right">
				<a onclick="test.trigger();" class="btn btn-primary fix-float-btn"><i class="fa fa-plus"></i> Add Test</a>
			</div>
		</div>
		<div class="col-lg-12 tab-pane fade" content-id="quest-content">
			<div class="float-left">
				<h1 class="page-header">Questions</h1>
			</div>
			<div class="float-right">
				<a onclick="quest.trigger();" class="btn btn-primary fix-float-btn"><i class="fa fa-plus"></i> Add Question</a>
			</div>
		</div>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-xs-12">
			<div class="panel-body">
				<div class="panel panel-primary">
					<div class="panel-body tabs">
						<ul class="nav nav-tabs custom-tab" id="make-test-tabs">
							<li class="active"><a href="#test-content" data-toggle="tab">Test</a></li>
							<li><a href="#quest-content" data-toggle="tab">Questions</a></li>
						</ul>
						<div class="tab-content make-test-contents">
							<div class="tab-pane fade in active col-xs-12" id="test-content">
								
							</div>
							<div class="tab-pane fade col-xs-12" id="quest-content">
								
							</div>

							<div class="text-center">
								<a class="btn btn-success" id="t-load-more">Load More</a>
							</div>
						</div>
					</div>
				</div><!--/.panel-->
            </div>
		</div>
	</div>
</div>	<!--/.main-->

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
									<li><a href="#" ui-element="test-edit-btn">
										<em class="fa fa-edit"></em> Edit
									</a></li>
									<li class="divider"></li>
									<li><a href="#" ui-element="test-delete-btn">
										<em class="fa fa-trash"></em> Delete
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
var testpage = true;
</script>