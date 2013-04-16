$(document).ready(function() {
	(function() {
		var selected = new Array();
		$('.operation').submit(function(e) {
			selected.length = 0;
			$('.select_button.active').each(function() {
				selected.push($(this).val());
			});
			$('.selection_list').val(selected);
			
			if(!confirm("Are you sure you want to delete the selected users?")) {
				e.preventDefault();
			}
		})
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
		$('#select_all').click(function() {
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