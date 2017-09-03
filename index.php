<!DOCTYPE html>
<html>

<head>
    <title>The Oracle Projects</title>

	<link rel="stylesheet" href="style.css" />
	<link rel="icon" href="http://www.oracle-projects.org/pythie.png" type="image/png">
	<link title="timeline-styles" rel="stylesheet" href="timeline.css">
</head>

<body>
    <div id="HomePage">
		<div class="conteneur">
			<div id="WebGLCanvas"></div>
			<div id="title">The Oracle Projects</div>
		</div>
		<div class="img"><img src="tiresias.jpg" title="Tiresias, blind greek Oracle" alt="Tiresias, blind greek Oracle"/></div>
		<div class="GoToMainPage"><a>Technological, Scientific Monitoring<br>& Prospective</a></div>
	</div>

	<div id="Intro">
		Science and Technology Monitoring is the best way to anticipate the future through prospective foresight. In effect,
		scientific progress is determined by the amount of research that is investigated trhough its pursuit in reference
		to scientific history and its precedent discoveries. Furthermore, it could also emerge from a spontaneous idea that
		suddenly seizes us at our most unsuspecting moments (i.e Einstein and the theories he established on special and general
		relativity, based on his ingenuous intuition in which quanta energy is constituted as photons, or Newton and his theory on
		gravity after having had an apple drop on his head). Finally, we can conclude that chance is capable of great things. The
		proof is that when Alexander Fleming returned from vacation, he didn't doubt that he would discover penicilin accidentally
		( see also https://en.wikipedia.org/wiki/Alexander_Fleming )




	</div>

	<div id="MainPage">
		<div id="wheelDiv"></div>
	</div>

	<div id="Robotic">
		<div id="ReturnFromRobotic"><h1>BACK</h1></div>
		<div id="timeline-robotic"></div>
	</div>

	<div id="Space">
		<div id="ReturnFromSpace"><h1>BACK</h1></div>
		<div id="timeline-space"></div>
	</div>

    <script type="text/javascript" src="three.min.js"></script>
	<!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>-->
	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
	<script src="timeline-min.js"></script>
	<script type="text/javascript" src="raphael.min.js"></script>
	<script type="text/javascript" src="raphael.icons.min.js"></script>
	<script src="raphael.icons.min.js.map"></script>
	<script type="text/javascript" src="wheelnav.js"></script>

    <script type="text/javascript">
        var scene = new THREE.Scene();

        camera = new THREE.OrthographicCamera(250 / -2, 250 / 2, 250 / 2, 250 / -2, 0, 1600);
        scene.add(camera);
        camera.position.z = 1500;

        var renderer = new THREE.WebGLRenderer();
        renderer.setSize(200, 200);
        document.getElementById("WebGLCanvas").appendChild(renderer.domElement);

        // add hemisphere light
        var hemiLight = new THREE.HemisphereLight(0xffffff, 0xffffff, 0.6);
        hemiLight.color.setHSL(0.6, 1, 0.6);
        hemiLight.groundColor.setHSL(0.095, 1, 0.75);
        hemiLight.position.set(200, 400, -200);
        this.scene.add(hemiLight);

        //

        dirLight = new THREE.DirectionalLight(0xffffff, 1);
        dirLight.color.setHSL(0.1, 1, 0.95);
        dirLight.position.set(-1, 1.75, 1);
        dirLight.position.multiplyScalar(50);
        scene.add(dirLight);

        dirLight.castShadow = true;

        dirLight.shadowMapWidth = 2048;
        dirLight.shadowMapHeight = 2048;

        var d = 50;

        dirLight.shadowCameraLeft = -d;
        dirLight.shadowCameraRight = d;
        dirLight.shadowCameraTop = d;
        dirLight.shadowCameraBottom = -d;

        dirLight.shadowCameraFar = 3500;
        dirLight.shadowBias = -0.0001;
        dirLight.shadowDarkness = 0.35;
        //dirLight.shadowCameraVisible = true;


        var geometry = new THREE.BoxGeometry(150, 150, 150, 10, 10, 10);

        // material
        var material = new THREE.MeshLambertMaterial({
            map: THREE.ImageUtils.loadTexture('pythie.png')
        });

        //window.addEventListener('resize', onWindowResize, false);

        var cube = new THREE.Mesh(geometry, material);
        scene.add(cube);

			function getRandomInt(min, max) {

				min = Math.ceil(min);
				max = Math.floor(max);
				return Math.floor(Math.random() * (max - min)) + min;

			}

			cube.rotation.x = getRandomInt(300, 600);
			cube.rotation.y = getRandomInt(300, 600);
			fakeEvPageX = getRandomInt(0, 1000);
			fakeEvPageY = getRandomInt(0, 1000);

        function render() {
            requestAnimationFrame(render);

			renderer.render(scene, camera);

            window.onmousemove = function (event) {
                ev = event || window.event;
            }

			ooffsetWidth = document.getElementById("WebGLCanvas").offsetWidth /2;
			ooffsetHeight = document.getElementById("WebGLCanvas").offsetHeight /2;

			try {
				cube.rotation.x -= ( ooffsetWidth - ev.pageX ) / 4000;
				cube.rotation.y -= ( ooffsetHeight - ev.pageY ) / 3000;
			}
			catch(err) {

				cube.rotation.x -= ( ooffsetWidth - fakeEvPageX ) / 4000;
				cube.rotation.y -= ( ooffsetHeight - fakeEvPageY ) / 3000;
			}

            renderer.render(scene, camera);
        };
        render();

        /*function onWindowResize() {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(200, 200);
            render();
        }*/
    </script>
	<script type="text/javascript">

		function doWheel() {

			wheel = new wheelnav('wheelDiv');
			wheel.wheelRadius = 200;
			wheel.hoverPercent = 1.08;
			wheel.maxPercent = 1.6;
			wheel.markerEnable = true;
			wheel.markerAttr = { fill: '#0000ff', stroke: 'none' };
			wheel.spreaderEnable = true;
			wheel.spreaderPathFunction = spreaderPath().HolderSpreader;
			wheel.titleFont = '16px aeroliteregular';
			wheel.colors = ['#0000ff','#1919ff','#3333ff','#4d4dff'];
			wheel.slicePathFunction = slicePath().MenuSlice;
			wheel.initWheel(["Homepage","Robotic", "Space Odyssey", "Medicine", "Physics", "Computing"]);
			wheel.navItems[0].navigateFunction = function () {
				setTimeout( function() {
					$('#MainPage').fadeOut(500);
					wheel.removeWheel();
					$('#HomePage').fadeIn(500);
				}, 1400);
			};
			wheel.navItems[1].navigateFunction = function () {
				setTimeout( function() {
					$('#MainPage').fadeOut(500);
					wheel.removeWheel();
					$('#Robotic').show().css({"display": "-webkit-flex", "display": "-ms-flexbox", "display": "flex", "-webkit-flex-direction": "row", "-ms-flex-direction": "row", "flex-direction": "row", "height": "100%"});
          var additionalOptions = {
              timenav_position: "bottom",
              timenav_height_percentage: 20           }
					timeline = new TL.Timeline('timeline-robotic', 'https://docs.google.com/spreadsheets/d/1OIY5pjfJXKKNp4L1Z7qurGLnpThbfC7igMhRxNVwKwY/pubhtml', additionalOptions);
				}, 1500);
			};
			wheel.navItems[2].navigateFunction = function () {
			setTimeout( function() {
					$('#MainPage').fadeOut(500);
					wheel.removeWheel();
					$('#Space').show().css({"display": "-webkit-flex", "display": "-ms-flexbox", "display": "flex", "-webkit-flex-direction": "row", "-ms-flex-direction": "row", "flex-direction": "row", "height": "100%"});
					timeline = new TL.Timeline('timeline-space', 'https://docs.google.com/spreadsheets/d/1ClJczjXKxUUvYP1X_b9v4qEeAgOShKDSfakm6dEN_rM/pubhtml');
				}, 1500);
			};
			wheel.navItems[3].navigateFunction = function () { };
			wheel.navItems[4].navigateFunction = function () { };

		};

		$('#Intro').hide();
		$('#MainPage').hide();
		$('#Robotic').hide();
		$('#Space').hide();

		$('.GoToMainPage').click(function () {
			$('#HomePage').fadeOut(500);
			$('#MainPage').fadeIn(500);
			doWheel();
			wheel.createWheel();
		});

		$('#ReturnFromRobotic').click(function () {
			$('#Robotic').fadeOut(500);
			$('#MainPage').fadeIn(500);
			doWheel();
			wheel.createWheel();
		});

		$('#ReturnFromSpace').click(function () {
			$('#Space').fadeOut(500);
			$('#MainPage').fadeIn(500);
			doWheel();
			wheel.createWheel();
		});


	</script>

</body>
</html>
