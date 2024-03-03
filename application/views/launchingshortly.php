<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="cache-control" content="no-cache">
        <meta http-equiv="expires" content="0">
        <meta http-equiv="pragma" content="no-cache">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?=sitename()?> | <?=$page_title?></title>
        <link rel="stylesheet" type="text/css" href="<?=site_url()?>assets/launchingshortly/css/normalize.css" />
        <link rel="stylesheet" type="text/css" href="<?=site_url()?>assets/launchingshortly/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="<?=site_url()?>assets/launchingshortly/css/component.css" />
        <link href='http://fonts.googleapis.com/css?family=Raleway:200,400,800' rel='stylesheet' type='text/css'>
        <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <?php echo htmlspecialchars_decode($getga->site_ga_code); ?>
    </head>
	<body>
		<div class="container demo-1">
			<div class="content">
				<div id="large-header" class="large-header">
					<canvas id="demo-canvas"></canvas>
					<h3 class="main-title"><?=sitename()?><br><span class="thin">LaunchingShotly</span></h3>
				</div>
			</div>
			<!-- Related demos -->
		</div><!-- /container -->
		<script src="<?=site_url()?>assets/launchingshortly/js/TweenLite.min.js"></script>
		<script src="<?=site_url()?>assets/launchingshortly/js/EasePack.min.js"></script>
		<script src="<?=site_url()?>assets/launchingshortly/js/rAF.js"></script>
		<script src="<?=site_url()?>assets/launchingshortly/js/demo-1.js"></script>
	</body>
</html>