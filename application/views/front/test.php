	
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
						<div class="tab-content">
							<div class="tab-pane fade in active col-xs-12" id="test-content">
								<div class="col-md-6">
									<div class="panel panel-primary">
										<div class="panel-heading">Primary Panel
											<ul class="pull-right panel-settings panel-button-tab-right">
												<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
													<em class="fa fa-cogs"></em>
												</a>
													<ul class="dropdown-menu dropdown-menu-right">
														<li>
															<ul class="dropdown-settings">
																<li><a href="#">
																	<em class="fa fa-cog"></em>Settings 1
																</a></li>
																<li class="divider"></li>
																<li><a href="#">
																	<em class="fa fa-cog"></em> Settings 2
																</a></li>
																<li class="divider"></li>
																<li><a href="#">
																	<em class="fa fa-cog"></em> Settings 3
																</a></li>
															</ul>
														</li>
													</ul>
												</li>
											</ul>
											<span class="pull-right panel-toggle clickable"><em class="fa fa-toggle-up"></em></span></div>
										<div class="panel-body">
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut ante in sapien blandit luctus sed ut lacus. Phasellus urna est, faucibus nec ultrices placerat, feugiat et ligula. Donec vestibulum magna a dui pharetra molestie. Fusce et dui urna.</p>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="quest-content">
								<h4>Tab 2</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget rutrum purus. Donec hendrerit ante ac metus sagittis elementum. Mauris feugiat nisl sit amet neque luctus, a tincidunt odio auctor.</p>
							</div>
						</div>
					</div>
				</div><!--/.panel-->
            </div>
		</div>
	</div>
</div>	<!--/.main-->

<script type="text/javascript">
var testpage = true;
</script>