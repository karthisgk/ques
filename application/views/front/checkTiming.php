<script type="text/javascript">

	window.onload = function(){
		function crtt(t) {
		  	var t = typeof t === 'undefined' ? '' : t;
			  if(t != '')
			    t = typeof t !== 'object' ? new Date( t ) : t;
			  var time = t == '' ? new Date() : t;
			  var date = 
			    time.getFullYear() +'-'+ 
			    ('0' + (time.getMonth() + 1)).slice(-2) +'-'+
			    ('0' + time.getDate()).slice(-2);
			  var format = 
			    ("0" + time.getHours()).slice(-2)   + ":" + 
			    ("0" + time.getMinutes()).slice(-2) + ":" + 
			    ("0" + time.getSeconds()).slice(-2);
			return date+' '+format;
		};
		if(crtt() < '<?=$data->from;?>' || crtt() > '<?=$data->to;?>')
			window.location.href = '<?=base_url();?>';
	}	
</script>