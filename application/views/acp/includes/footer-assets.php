<!-- jquery latest version -->
<script src="<?=site_url()?>assets/theme/js/vendor/jquery-2.2.4.min.js"></script>
<!-- bootstrap 4 js -->
<script src="<?=site_url()?>assets/theme/js/popper.min.js"></script>
<script src="<?=site_url()?>assets/theme/js/bootstrap.min.js"></script>
<script src="<?=site_url()?>assets/theme/js/owl.carousel.min.js"></script>
<script src="<?=site_url()?>assets/theme/js/metisMenu.min.js"></script>
<script src="<?=site_url()?>assets/theme/js/jquery.slimscroll.min.js"></script>
<script src="<?=site_url()?>assets/theme/js/jquery.slicknav.min.js"></script>

<?php if ($page_title == 'Dashboard') $this->load->view('acp/includes/chart-assets'); ?>

<?php if ($page_title == 'Listing') { ?>
<!-- Start datatable js -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
<?php } ?>

<!-- others plugins -->
<script src="<?=site_url()?>assets/theme/js/plugins.js"></script>
<script src="<?=site_url()?>assets/theme/js/scripts.js"></script>

<script src="<?=site_url()?>assets/plugins/fused-plugins.js"></script>

<!-- modernizr -->
<script src="<?=site_url()?>assets/theme/js/vendor/modernizr-2.8.3.min.js"></script>
<!-- select2 -->
<script src="<?=site_url()?>assets/plugins/select2/select2.min.js"></script>

<?php if (($page_title == 'Dropzone') || ($page_title == 'Editor & Dropzone')) { ?>
<script src="<?=site_url()?>assets/plugins/dropzone-5.7.0/dropzone.min.js"></script>
<?php } ?>

<?php if (($page_title == 'Editor') || ($page_title == 'Editor & Dropzone')) { ?>
<!-- Start Froala editor js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/froala_editor.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/froala_editor.pkgd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins.pkgd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/languages/ar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/languages/en_gb.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/align.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/char_counter.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/code_beautifier.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/code_view.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/colors.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/cryptojs.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/draggable.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/edit_in_popup.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/emoticons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/entities.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/image.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/file.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/files_manager.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/font_size.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/forms.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/fullscreen.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/help.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/image_manager.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/inline_class.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/inline_style.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/line_breaker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/line_height.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/link.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/lists.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/markdown.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/paragraph_format.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/paragraph_style.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/quick_insert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/quote.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/save.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/special_characters.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/table.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/track_changes.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/trim_video.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/url.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/video.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/plugins/word_paste.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/third_party/embedly.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/third_party/font_awesome.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/third_party/showdown.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/third_party/spell_checker.min.js"></script>

<!-- Include TUI JS. -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.6.7/fabric.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/tui-code-snippet@1.4.0/dist/tui-code-snippet.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/tui-image-editor@3.2.2/dist/tui-image-editor.min.js"></script>

<!-- Include TUI plugin. -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/third_party/image_tui.min.js"></script>
<?php } ?>

<!-- custom js files -->
<script src="<?=site_url()?>assets/js/acp/custom_utils.js?c=<?=date('siHYmd')?>"></script>
<script type="text/javascript">
	$(function() {
		CustomUtils.init({ site_url: "<?=site_url()?>" });

		var chk = setInterval(() => {
			if ($('.listingPage').length > 0) {
				clearInterval(chk);
				$('.dataTables_filter').find('[type="search"]').closest('div').hide();
			}
			if ($('.formArea form').length > 0) {
				$('.topMenuBarSearch').closest('div').hide();
				clearInterval(chk);
			}
		}, 100);

		$('body').on('keyup', '.topMenuBarSearch', function() {
			if ($('.dataTables_filter').find('[type="search"]').length > 0) {
				$('.dataTables_filter').find('[type="search"]').val($(this).val()).trigger('keyup');
			}
		})
	});
</script>