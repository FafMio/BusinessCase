$(function() {
	$("#year-range").slider({
		range: true,
		min: 1990,
		max: 2020,
		values: [1990, 2020],
		slide: function(event, ui) {
			$("#year").val(ui.values[0] + " - " + ui.values[1]);
		}
	});
	$("#year").val($("#year-range").slider("values", 0) +
		" - " + $("#year-range").slider("values", 1));
});

$(function() {
	$("#km-range").slider({
		range: true,
		min: 0,
		max: 150000,
		values: [50000, 100000],
		slide: function(event, ui) {
			$("#km").val(ui.values[0] + "km - " + ui.values[1] + "km");
		}
	});
	$("#km").val($("#km-range").slider("values", 0) +
		"km - " + $("#km-range").slider("values", 1) + "km");
});

$(function() {
	$("#price-range").slider({
		range: true,
		min: 0,
		max: 50000,
		values: [0, 50000],
		slide: function(event, ui) {
			$("#price").val(ui.values[0] + "€ - " + ui.values[1] + "€");
		}
	});
	$("#price").val($("#price-range").slider("values", 0) +
		"€ - " + $("#price-range").slider("values", 1) + "€");
});