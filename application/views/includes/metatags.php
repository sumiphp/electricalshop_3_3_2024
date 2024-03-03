<?php 
$metatags = metatags();
if (isset($productMetaTags) && !empty($productMetaTags)) {
    echo html_entity_decode(trim($productMetaTags));
} else if (!empty($metatags)) {
    echo html_entity_decode(trim($metatags));
}
?>