$(document).ready(function() {
	(function() {
		var selected = new Array();
		$('form').submit(function(e) {
			e.preventDefault();
			selected.length = 0;
			$('.add_button.active').each(function() {
				selected.push($(this).val());
			});
			$('.selection_list').val(selected);
			var postData = $(this).serializeArray();
			$.post(base_url+'index.php/action/enqueue', postData, function(data) {
				alert("Task has been queued.");
			});
		})
	})();
	/*
	(function() {
		$('.add_button').click(function() {
			var select_flag = $(this).next('.select_flag');
			if(select_flag.val() == "false") {
				$(this).html('Selected');
				select_flag.val("true");
				alert($(this).val());
			} else {
				$(this).html('Not Selected');
				select_flag.val("false");
				alert($(this).val());
			}
		});
		
	})();
*/
	/*
	(function() {
		function updateHosts() {
			var host_list = new Array();
			$('input:checkbox[name=selection]').each(function() {
				host_list.push($(this).val());
			});
			$.post(base_url+'index.php/hosts/refreshList', {'host_list' : host_list}, function(data) {
				alert(data);
			});
		}
		updateHosts();
		setInterval(loadHosts, 1000);
	})();
*/
});