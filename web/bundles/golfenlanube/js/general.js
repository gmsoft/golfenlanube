$('button[data-button-link]').on('click', function () { 
	document.location.href=$(this).attr('data-button-link');
});

$('[data-toggle=tooltip]').tooltip();

$('[data-item-menu-sin-link] > a').on('click', function (e) {
	e.preventDefault();
});