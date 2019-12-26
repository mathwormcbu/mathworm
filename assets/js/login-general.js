$("#mw_signin_button").click(function(n) {
	n.preventDefault();
	var btn = $(this);
	var form = btn.closest("form");

	btn.attr("disabled",true);
	var formData = form.serialize();
	$.ajax({
		type: 'POST',
		url: ajaxUrl,
		data: formData,
		success: function(result) {
			setTimeout(function() {
				btn.attr("disabled",false);
			},2000)
			if(result.status === 'warning') {
				toastr.warning(result.message);
			} else if(result.status === 'success') {
				toastr.success(result.message);
				setTimeout(function() {
					location.href = result.link;
				},3000)
			} else if(result.status === 'error') {
				toastr.error(result.message);
			}
		},
		error: function (request, error) {
			console.log(arguments);
			toastr.error(error);
		}
	});
});
