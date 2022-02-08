<?php require("week4functions.php"); ?>

<!DOCTYPE html>
<html>
	<head>
		<script src="./jquery/jquery-3.6.0.min.js"></script>
		<link rel="stylesheet" href="./foundation/css/foundation.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.6.3/js/foundation.min.js"></script>

		<title>Gaming Site</title>
		<style>
			.cell{
				border: 1px solid black;
			}
			.nav{
				margin: 10px;
			}
			#header{
				clear: both;
			}
			#heading{
				float: right;
				font-size: 14px;
			}
			#Leftsidebar{
				background: #3397FF;
				float: left;
				padding: 10px;
			}
			#body{
				float: left;
				font-size: 14px;
			}
			#footer{
				clear: both;
			}
			#img1{
				height: 175px;
				width: 100000px;
				<!--I wanted to stretch my image very far, even though it does not look the best that way.-->
			}
		</style>
		<script>
			$( document ).ready(function() {
				$("#alert").on("click", callAlert);
				$("#change").on("click", callChange);

				function callAlert() {
					alert("Uh oh you pressed the alert button.");
				}
				function callChange() {
					$("#Leftsidebar").html("The text has changed");
				}
			});
		</script>
	</head>
	<body>
		<div id="header" class="grid-x">
			<div class="cell small-12 medium-12 large-12 text-right">

				<button id=change class="button nav">Update Body</button>

				<button id=alert class="button nav">Alert</button>

				<img id=img1
				src="./julian-hochgesang-jtPSdmlEOjk-unsplash.jpg">
			</div>
		</div>
		<div class="grid-x">
			<div id="Leftsidebar" class = "cell small-12 medium-4 large-4">
				<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. </p>
			</div>
			<div id="body" class="cell small-12 medium-8 large-8">
				<p><h2>Content Page 1</h2></p>
				<p style="padding:10px"><?php printTime();?></p>
			</div>
		</div>
		<div id="footer" class= cell>
			<p style="float:left;"> &copy 2022 Daniel Baldwin, All Rights Reserved </p>
			<p style="float:right;"> Design by Daniel Baldwin </p>
		</div>
	</body>
</html>
