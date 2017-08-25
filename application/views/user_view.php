<!DOCTYPE html>
<html>
<head>
	<title>User View</title>
</head>
<body>
<?php 
	foreach ($results as $object) {
		echo $object->id." ".$object->username."<br>";
	}
	//echo $results;
?>
</body>
</html>