/**
 * 
 */

$('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
  e.target // activated tab
  e.relatedTarget // previous tab
  
  switchTemporadaShowTabs(e.target, e.relatedTarget);
})

function switchTemporadaShowTabs(nuevo, anterior)
{
	var _url = $(nuevo).data('link');
	var id_tab_contenedor = $(nuevo).attr('href').replace(/^#/, '');
	var id_tab_anterior = $(anterior).attr('href').replace(/^#/, '');

	$('#' + id_tab_anterior).html(''); 
	$('#' + id_tab_contenedor).load(_url);
}