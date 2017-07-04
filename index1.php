<!DOCTYPE html>
<html lang="en">
	<head>
		<title>threejs webgl - materials - transparency</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
		<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>

        <link rel="stylesheet" href="new/css/font-awesome.min.css">

        <link rel="stylesheet" href="new/css/jquery.fancybox.css">
        <link rel="stylesheet" href="new/css/owl.carousel.css">
        <link rel="stylesheet" href="new/css/animate.css">

        <link rel="stylesheet" href="new/css/main.css">
        <link rel="stylesheet" href="new/css/responsive.css">

  <script src="js/bootstrap.min.js"  type="text/javascript"></script>

<?php if(@$_GET['w'])
{echo'<script>alert("'.@$_GET['w'].'");</script>';}
?>
		<style>
		
			body {

				overflow: hidden;
			}
			#info {
				position: absolute;
				top: 0px; width: 100%;
				padding: 5px;
			}
			#logo{
			float:left;
			width=60px;
			height:30px;
			}
		</style>
	</head>
	
	<body>
	
<div id="info">

    <div class="header" id="head">
<div class="row">
<div class="col-lg-6">
<span class="logo"><img src="image/a1.jpg" width="300px" height="80px"></span>
</div>
<div class="col-md-2 col-md-offset-4">
<a href="#" class="pull-right btn sub1" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in" aria-hidden="true">
</span>&nbsp;<span class="title1"><b>Signin</b></span></a></div>
<!--sign in modal start-->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content title1">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title title1"><span style="color:pink">Log In</span></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="login.php?q=index.php" method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="email"></label>
  <div class="col-md-6">
  <div class="input-group">
<span class="input-group-addon">@</span>
  <input id="email" name="email" placeholder="Enter your email-id" class="form-control input-md" type="email">
    </div>
  </div>
</div>


<!-- Password input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="password"></label>
  <div class="col-md-6">
    <input id="password" name="password" placeholder="Enter your Password" class="form-control input-md" type="password">

  </div>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Log in</button>
		</fieldset>
</form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--sign in modal closed-->

</div><!--header row closed-->
<div class="row">

<ul class="nav nav-pills tit">
<li class="active tit1"><a href="#">Home</a></li>
<li class="tit1"><a href="#">About Us</a></li>
<li class="dropdown">
<a class="dropdown-toggle tit1" data-toggle="dropdown" href="#">
Tutorials <span class="caret"></span>
</a>
<ul class="dropdown-menu">
<li><a href="#">Php</a></li>
<li><a href="#">C</a></li>
<li><a href="#">C++</a></li>
<li><a href="#">Java</a></li>
<li class="divider"></li>
<li class="tit1"><a href="#">Networking</a></li>
<li class="divider"></li>
<li><a href="#">Linux</a></li>
</ul>
</li>
<li class="tit1"><a href="#">Developers</a></li>
</ul>

</div>

   </div>

	
	
		<script src="build/three.js"></script>
		<script src="js/controls/OrbitControls.js"></script>

		<script src="js/Detector.js"></script>
		<script src="js/libs/stats.min.js"></script>

		<script src="js/libs/dat.gui.min.js"></script>

		<script src="js/postprocessing/EffectComposer.js"></script>
		<script src="js/postprocessing/RenderPass.js"></script>
		<script src="js/postprocessing/MaskPass.js"></script>
		<script src="js/postprocessing/ShaderPass.js"></script>
		<script src="js/shaders/CopyShader.js"></script>
		<script src="js/shaders/FXAAShader.js"></script>
		<script src="js/postprocessing/BloomPass.js"></script>
		<script src="js/shaders/ConvolutionShader.js"></script>

		<script>

			if ( ! Detector.webgl ) Detector.addGetWebGLMessage();

			var params = { opacity: 0.50 };

			var container1, stats;
			var camera, scene, renderer, controls;

			init();
			animate();

			function init() {

				container1 = document.createElement( 'div' );
				document.body.appendChild( container1 );

				camera = new THREE.PerspectiveCamera( 40, window.innerWidth / window.innerHeight, 1, 2000 );
				camera.position.set( 0.0, 80, 40 * 3.5 );

				scene = new THREE.Scene();

				//

				var geometry = new THREE.SphereGeometry( 18, 30, 30 );

				var material1 = new THREE.MeshStandardMaterial( {
					opacity: params.opacity,
					transparent: true
				} );

				var material2 = new THREE.MeshStandardMaterial( {
					opacity: params.opacity,
					premultipliedAlpha: true,
					transparent: true
				} );

				var textureLoader = new THREE.TextureLoader();
				textureLoader.load( "textures/cc3.jpg", function ( map ) {

					map.anisotropy = 8;

					material1.map = map;
					material1.needsUpdate = true;
					material2.map = map;
					material2.needsUpdate = true;

				} );

			

				var mesh = new THREE.Mesh( geometry, material1 );
				mesh.position.x = - 25.0;
				scene.add( mesh );

				var mesh = new THREE.Mesh( geometry, material2 );
				mesh.position.x = 25.0;
				scene.add( mesh );

				//

				var geometry = new THREE.PlaneBufferGeometry( 800, 800 );
				var material = new THREE.MeshStandardMaterial( { color: 0xF599D7 } );
				var mesh = new THREE.Mesh( geometry, material );
				mesh.position.y = - 50;
				mesh.rotation.x = - Math.PI * 0.5;
				scene.add( mesh );

				// Lights

				var spotLight = new THREE.SpotLight( 0xAD829F );
				spotLight.position.set( 100, 200, 100 );
				spotLight.angle = Math.PI / 6;
				spotLight.penumbra = 0.9;
				scene.add( spotLight );

				var spotLight = new THREE.SpotLight( 0xAD829F );
				spotLight.position.set( - 100, - 200, - 100 );
				spotLight.angle = Math.PI / 6;
				spotLight.penumbra = 0.9;
				scene.add( spotLight );

				//

				renderer = new THREE.WebGLRenderer();
				renderer.setPixelRatio( window.devicePixelRatio );
				renderer.setSize( window.innerWidth, window.innerHeight );
				renderer.shadowMap.enabled = true;
				container1.appendChild( renderer.domElement );

				renderer.gammaInput = true;
				renderer.gammaOutput = true;

				stats = new Stats();
				container1.appendChild( stats.dom );

				controls = new THREE.OrbitControls( camera, renderer.domElement );
				controls.target.set( 0, 0, 0 );
				controls.update();

				window.addEventListener( 'resize', onWindowResize, false );


			}

			function onWindowResize() {

				var width = window.innerWidth;
				var height = window.innerHeight;

				camera.aspect = width / height;
				camera.updateProjectionMatrix();

				renderer.setSize( width, height );

			}

			//

			function animate() {

				requestAnimationFrame( animate );

				stats.begin();
				render();
				stats.end();

			}

			function render() {

				for ( var i = 0, l = scene.children.length; i < l; i ++ ) {

					var object = scene.children[ i ];

					if ( object.geometry instanceof THREE.SphereGeometry ) {

						object.rotation.x = performance.now() * 0.0002;
						object.rotation.y = - performance.now() * 0.0002;

					}

				}

				renderer.render( scene, camera );

			}

		</script>
	
	</body>
</html>
