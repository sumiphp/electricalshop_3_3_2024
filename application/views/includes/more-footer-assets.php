<!-- Custom footer assets from DB starts -->
<?php 
$googleAnalytics = googleAnalytics();
if (!empty($googleAnalytics)) {
    echo html_entity_decode(trim($googleAnalytics));
}

$footerAssets = footerAssets();
if (!empty($footerAssets)) {
    echo html_entity_decode(trim($footerAssets));
}
?>
<!-- Custom footer assets from DB ends -->