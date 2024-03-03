<!-- Custom header assets from DB starts -->
<?php 
$headerAssets = headerAssets();
if (!empty($headerAssets)) {
    echo html_entity_decode(trim($headerAssets));
}
?>
<!-- Custom header assets from DB ends -->