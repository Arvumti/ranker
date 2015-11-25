$(document).on('ready', inicio_ma);

function inicio_ma () {
	
}

function typeahead(options) {
	var _elem = options.elem,
		_dKey = options.dKey,
		_modulo = options.modulo;

	options.elem = _elem.typeahead({
		hint: true,
		highlight: true,
		minLength: 1
	},
	{
		name: 'states',
		displayKey: _dKey,
		source: function(busqueda, proccess) {
			$.get(url + _modulo + '/' + busqueda).done(done);
			function done (data) {
				proccess(data);
			}
		}
	});
}