function storeValue() {
	const checkboxes = document.querySelectorAll('input[type="checkbox"]');
	let checkedValues = [];

	checkboxes.forEach(function(checkbox) {
	if (checkbox.checked) {
		checkedValues.push(checkbox.value);
	}
	});

	if (checkedValues.length > 0) {
	$.ajax({
		type: "POST",
		url: "store_checkbox_values.php",
		data: { values: checkedValues },
		success: function(response) {
		document.getElementById('result').textContent = "Values stored successfully!";
		}
	});
	} else {
		document.getElementById('result').textContent = "No checkboxes are checked.";
	}
}

