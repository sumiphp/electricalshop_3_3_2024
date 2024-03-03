<meta charset="utf-8">
<meta http-equiv='cache-control' content='no-cache'>
<meta http-equiv='expires' content='0'>
<meta http-equiv='pragma' content='no-cache'>
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php $sitedetails = sitedetails(); ?>
<link rel="shortcut icon" type="image/png" href="<?=$sitedetails['favicon']?>">
<link rel="stylesheet" href="<?=site_url()?>assets/theme/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=site_url()?>assets/theme/css/font-awesome.min.css">
<link rel="stylesheet" href="<?=site_url()?>assets/theme/css/themify-icons.css">
<link rel="stylesheet" href="<?=site_url()?>assets/theme/css/metisMenu.css">
<link rel="stylesheet" href="<?=site_url()?>assets/theme/css/owl.carousel.min.css">
<link rel="stylesheet" href="<?=site_url()?>assets/theme/css/slicknav.min.css">

<?php if ($page_title == 'Dashboard') { ?>
<!-- amchart css -->
<!-- https://www.amcharts.com/lib/3/plugins/export/export.css -->
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<?php } ?>

<?php if ($page_title == 'Listing') { ?>
<!-- Start datatable css -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
<?php } ?>

<!-- others css -->
<link rel="stylesheet" href="<?=site_url()?>assets/theme/css/typography.css">
<link rel="stylesheet" href="<?=site_url()?>assets/theme/css/default-css.css">
<link rel="stylesheet" href="<?=site_url()?>assets/theme/css/styles.css">
<link rel="stylesheet" href="<?=site_url()?>assets/theme/css/responsive.css">

<!-- select2 css -->
<link rel="stylesheet" href="<?=site_url()?>assets/plugins/select2/select2_metro.css"/>

<?php if (($page_title == 'Dropzone') || ($page_title == 'Editor & Dropzone')) { ?>
<link rel="stylesheet" href="<?=site_url()?>assets/plugins/dropzone-5.7.0/dropzone.min.css">
<?php } ?>

<?php if (($page_title == 'Editor') || ($page_title == 'Editor & Dropzone')) { ?>
<!-- Start Froala editor css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/css/froala_editor.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/css/froala_editor.pkgd.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/css/froala_style.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/css/plugins.pkgd.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/css/plugins/char_counter.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/css/plugins/code_view.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/css/plugins/colors.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/css/plugins/draggable.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/css/plugins/emoticons.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/css/plugins/file.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/css/plugins/files_manager.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/css/plugins/fullscreen.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/css/plugins/help.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/css/plugins/image.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/css/plugins/image_manager.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/css/plugins/line_breaker.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/css/plugins/markdown.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/css/plugins/quick_insert.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/css/plugins/special_characters.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/css/plugins/trim_video.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/css/themes/dark.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/css/third_party/embedly.min.css"/>

<!-- Include TUI CSS. -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tui-image-editor@3.2.2/dist/tui-image-editor.css">
<link rel="stylesheet" href="https://uicdn.toast.com/tui-color-picker/latest/tui-color-picker.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/css/third_party/image_tui.min.css"/>
<?php } ?>
