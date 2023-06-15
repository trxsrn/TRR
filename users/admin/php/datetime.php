<!DOCTYPE html>
<html>
<head>
	<title>Current Time and Date</title>
</head>
<body>
	<p id="datetime"></p>

	<script>
		var today = new Date();
		var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
		var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
		var dateTime = date+' '+time;
		document.getElementById("datetime").innerHTML = dateTime;
	</script>
</body>
</html>
