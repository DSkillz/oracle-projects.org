<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Welcome by wheelnav.js">
	<meta name="author" content="gabor.berkesi@softwaretailoring.net">
	<link rel="shortcut icon" href="http://wheelnavjs.softwaretailoring.net/wheelnav_favicon.png">

	<title>wheelnav.js - Welcome</title>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

	<script type="text/javascript" src="raphael.min.js"></script>
	<script type="text/javascript" src="raphael.icons.min.js"></script>
	<script src="raphael.icons.min.js.map"></script>
	<script type="text/javascript" src="wheelnav.min.js"></script>

	<style>
		body {
			background-color: #E7E7E7;
			font-family: Helvetica, Arial, sans-serif;
		}

		#wheelDiv {
			height: 600px;
			width: 600px;
			margin: auto;
			margin-top: 50vh; /* poussé de la moitié de hauteur de viewport */
			transform: translateY(-50%);
		}

		#wheelDiv>svg {
			height: 100%;
			width: 100%;
		}

		@media (max-width: 600px) {
			#wheelDiv {
				height: 350px;
				width: 350px;
			}
		}

		@media (max-width: 400px) {
			#wheelDiv {
				height: 300px;
				width: 300px;
			}
		}
	</style>

	<script type="text/javascript">

		window.onload = function () {
wheel = new wheelnav('wheelDiv');
wheel.wheelRadius = 200;
wheel.maxPercent = 1.3;
wheel.spreaderEnable = true;
wheel.spreaderPathFunction = spreaderPath().HolderSpreader;
wheel.colors = ['#0000ff','#1919ff','#3333ff','#4d4dff'];
wheel.slicePathFunction = slicePath().MenuSlice;
wheel.initWheel(["Robotic", "Space Odyssey", "Medicine", "Exobiology", "Computing"]);
wheel.createWheel();

wheel.navItems[0].navigateFunction = function () { alert('Hello Robotic!'); };
wheel.navItems[1].navigateFunction = function () { alert('Hello Space Odyssey!'); };
wheel.navItems[2].navigateFunction = function () { alert('Hello Medicine!'); };
wheel.navItems[3].navigateFunction = function () { alert('Hello Exobiology!'); };
		};

	</script>

</head>
<body>

	<div id="wheelDiv">

</div>

</body>
</html>
