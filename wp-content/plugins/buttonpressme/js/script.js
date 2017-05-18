jQuery(document).ready(function($){
	$("#mybtn").click(function(){
		if ( typeof( send_pid_view ) === 'undefined' ) {
			return;
		}
	 
		$.ajax({
			url: PJS.ajax_url,
			type: 'POST', 
			data: {
				action: 'post_view_set',
				pid: send_pid_view
			},
			success: function(e) { $('#show').html('<button style="width:300px; height:150px; background:green; font-color:white; font-size:30px;">Успех!!!</button>'); $('#usrInfo').html(e); },
			error: function(e) { $('#usrInfo').html(e); }
		});
	});
});