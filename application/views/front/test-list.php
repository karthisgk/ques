	
<style type="text/css">
.panel-body.timeline-container {
	padding: 15px 0px 15px 15px;
}
</style>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
				<em class="fa fa-home"></em>
			</a></li>
			<li class="active">Test Schedule</li>
		</ol>
	</div><!--/.row-->

	<div class="panel panel-default" style="margin-top: 10px;">
		<div class="panel-heading">
			Test Schedule
			<span class="pull-right clickable panel-toggle panel-button-tab-left hide"><em class="fa fa-toggle-up"></em></span>
		</div>
		<div class="panel-body timeline-container">
			<ul class="timeline scrolable-content scrolable-bar test-timeline" id="test-content">

			</ul>
		</div>
	</div>
	
</div>	<!--/.main-->

<ul class="hide" id="test-panel">
	<li>
		<div class="timeline-badge"><em class="glyphicon glyphicon-pushpin"></em></div>
		<div class="timeline-panel">
			<div class="col-sm-5">
				<div class="timeline-heading">
					<h4 class="timeline-title" ui-element="test-name"></h4>
				</div>
				<div class="timeline-body">
					<div class="sub">
						<label class="timeline-sub-head">Date: </label>
						<span ui-element="test-date"></span>
					</div>
					<div class="sub">
						<label class="timeline-sub-head">Time: </label>
						<span ui-element="test-time"></span>
					</div>
				</div>
			</div>
			<div class="col-sm-7">
				<div class="timeline-body">
					<label class="timeline-sub-head">Note: </label>
					<span ui-element="test-desb"></span>
				</div>
			</div>
		</div>

	</li>
</ul>

<script type="text/javascript">
var testSchedlue = true;
</script>