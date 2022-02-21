<!DOCTYPE html>
<html>
<head>
	<script src="./jquery/jquery-3.6.0.min.js"></script>
</head>
<body>
	This is an ajax example.<p>
	<form onsubmit="return(InsertInfo())">

  	First Name: <input type="text" id=fn><br>

  	Last Name: <input type="text" id=ln><br>

  	Phone Number: <input type="text" id=num><br>

 	<input type="submit" value="Submit">

	</form>

	<div id=showpeople></div>
	<script>
		function InsertInfo(){
			val1 = $("#fn").val();
			val2 = $("#ln").val();
			val3 = $("#num").val();
			$.get("./week8ajax.php",{"cmd": "create", "fn" : val1, "ln" : val2, "num" : val3}, function(data){
				$("#showpeople").html(data);
			});
		}

		function DeletePersonEntry(id){
			$.get("./week8ajax.php",{"cmd": "delete", "id" : id}, function(data){
				$("#showpeople").html(data);
			});
		}

		function showpeople(){
			$.get("./week8ajax.php",{"cmd": ""}, function(data){
				$("#showpeople").html(data);
			});
			return(false);
		}
		showpeople();

	</script>
</body>
</html>