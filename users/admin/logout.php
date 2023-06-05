<?php

echo "<script>
	if (confirm('Are you sure you want to logout?')) { 
   	window.location='../../admin-login.php'; 
	}else{
 	  window.location='dashboard.php';
	}
	</script>"; 

?>