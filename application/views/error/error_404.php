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
    <?php $this->load->view('includes/metatags'); ?>
    <?php $this->load->view('includes/header-assets'); ?>
    <?php $this->load->view('includes/more-header-assets'); ?>
</head>

<body>
	<!-- error area start -->
	<div class="error-area ptb--100 text-center">
		<div class="container">
			<div class="error-content">
				<h2>404</h2>
				<p>Oops! Something has went wrong.</p>
				<a href="<?=site_url()?>">Back to Home</a>
			</div>
		</div>
	</div>
	<!-- error area end -->
    <?php $this->load->view('includes/footer-assets'); ?>
    <?php $this->load->view('includes/more-footer-assets'); ?>
</body>

</html>