/**
 * 
 */

$(document).ready(function () {

	$('.add_cancha_btn').on('click', function() {

			var location = $(this).parent().parent();
			var prototype = $('.canchas_container').data('prototype');
			var index = $(this).parent().parent().find('.form-group').length;

			addCanchaForm(location, prototype, index);
		});

	function addCanchaForm(location, prototype, index)
	{
		var newForm = prototype.replace(/__name__label__/g, 'Cancha ' + (index + 1)).replace(/__name__/g, index);
		
		location.before(newForm);
		
	}
});