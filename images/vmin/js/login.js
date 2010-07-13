$(function() {
		$("#tabs").tabs({
		fx: { opacity: 'toggle' },
		width: 500
		});
		
		$("#user_profile").dialog({
			autoOpen: false,
			height: 300,
			width: 500,
			show: 'puff',
			hide: 'explode',
			draggable: false,
			resizable: false,
			modal: true
		});
		
		$("#user_delete").dialog({
			autoOpen: false,
			height: 450,
			width: 500,
			show: 'puff',
			hide: 'explode',
			draggable: false,
			resizable: false,
			modal: true
		});
              
                $("#user_pass").dialog({
			autoOpen: false,
			height: 200,
			width: 450,
			show: 'puff',
			hide: 'explode',
			draggable: false,
			resizable: false,
			modal: true
		});
		
		$("#vps").dialog({
			autoOpen: false,
			height: 500,
			width: 500,
			show: 'puff',
			hide: 'explode',
			draggable: false,
			resizable: false,
			modal: true
		});
		
		 $("#support").dialog({
			height: 300,
			autoOpen: false,	      
			width: 500,
			show: 'puff',
			hide: 'explode',
			draggable: false,
			resizable: false,
			modal: true
		});
		
	        $('#edit-delete')
			.button()
			.click(function() {
				$('#user_delete').dialog('open');
			});
		$('#edit-user')
			.button()
			.click(function() {
				$('#user_profile').dialog('open');
			});
	        $('#edit-pass')
			.button()
			.click(function() {
				$('#user_pass').dialog('open');
			});
		$('#order-vps')
			.button()
			.click(function() {
				$('#vps').dialog('open');
			});
		
	
	});
function support(){
          $('#support').dialog('open');
};	
