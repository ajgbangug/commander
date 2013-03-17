$(document).ready(function() {
	(function() {
		var selected = new Array();
		$('.operation').submit(function(e) {
			e.preventDefault();
			selected.length = 0;
			$('.select_button.active').each(function() {
				selected.push($(this).val());
			});
			$('.selection_list').val(selected);
			var postData = $(this).serializeArray();
			$.post(base_url+'index.php/action/enqueue', postData, function(data) {
				alert("Task has been queued.");
			});
		})
	})();

	// this part of the code updates the status of the hosts
	(function() {
		function updateHosts() {
			var host_list = new Array();
			$.post(base_url+'index.php/hosts/refreshList', null, function(data) {
				status_list = $.parseJSON(data);
				$('.status_indicator').each(function(i, obj){
					if(status_list[obj.id])
						$(this).html('<span class="label label-success">Available</span>');
					else
						$(this).html('<span class="label label-important">Unavailable</span>');
				});
			});	
		}
		updateHosts();
		setInterval(updateHosts, 10000);
	})();

	(function() {
		$('.select_button').click(function() {
			button = $(this);
			if(button.hasClass('active'))
				button.html('Select');
			else
				button.html('Selected');
		});
	})();
});