function startAdminLayer() {
		
	$('#controls form').submit(function(e) {
		var $this = $(this), 
		$submit = $('input[type="submit"]');
		
		e.preventDefault();
		
		$submit
			.blur()
			.attr('disabled', 'disabled');
		
		$.ajax({
			url: 'add.php',
			type: 'POST',
			dataType: 'json',
			data: $this.serialize(),
			success: function(data) {
				$submit.removeAttr('disabled');
				if (data.hasErrors) {
					alert('Error: '+data.error);
				}
				else {
					$this.find('input[type="text"]').val('');
					clearMarkers();
					drawMarkers();
				}
			}
		});
	});
	
	$('#deleteLast').click(function(e) {
		var $this = $(this);
		
		e.preventDefault();
		
		if (!confirm('Вы уверены, что хотите удалить последнюю точку?')) {
			return;
		}
		
		$this
			.blur()
			.attr('disabled', 'disabled');
		
		$.ajax({
			url: 'delete.php',
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				$this.removeAttr('disabled');
				if (data.hasErrors) {
					alert('Error: '+data.error);
				}
				else {
					clearMarkers();
					drawMarkers();
				}
			}
		});
	});
	
}