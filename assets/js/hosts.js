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
			if(confirm("Are you sure you want to queue the task?")) {
				$.post(base_url+'index.php/action/enqueue', postData, function(data) {
					alert("Task has been queued.");
				});
			}
		})
	})();

	// this part of the code updates the status of the hosts
	(function() {
		function updateStatus() {
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
		updateStatus();
		setInterval(updateStatus, 10000);
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

	(function() {
		$('.select_all').click(function() {
			select_all = $(this);
			if(select_all.hasClass('active')) {
				select_all.html('Select All');
				$('.select_button').each(function() {
					button = $(this);
					button.removeClass('active');
					button.html('Select');
				});
			} else {
				select_all.html('Unselect All');
				$('.select_button').each(function() {
					button = $(this);
					button.addClass('active');
					button.html('Selected');
				});
			}
		});
	})();
});