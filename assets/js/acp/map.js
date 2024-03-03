var Map = function() {

    var manageMapTypes = function() {
        $('body').off('click', '[name="google_map_type"]').on('click', '[name="google_map_type"]', function() {
            if ($('[name="google_map_type"]:checked').val() == 1) {
                $('.google_map_key_wrap').css('display', 'block');
                $('.google_map_embed_wrap').css('display', 'none');
                $('.google_map_share_wrap').css('display', 'none');
            } else if ($('[name="google_map_type"]:checked').val() == 0) {
                $('.google_map_embed_wrap').css('display', 'block');
                $('.google_map_key_wrap').css('display', 'none');
                $('.google_map_share_wrap').css('display', 'none');
            } else if ($('[name="google_map_type"]:checked').val() == 2) {
                $('.google_map_share_wrap').css('display', 'block');
                $('.google_map_key_wrap').css('display', 'none');
                $('.google_map_embed_wrap').css('display', 'none');
            }
        });

        $('body').on('click', '#saveMap', function(ev) {
            ev.preventDefault();
            var form = $('form#manageMap'),
                error = false,
                message = 'Oops! Something has went wrong!';

            if (form.find('#google_map_show:checked').length) {
                form.find('input:visible').each(function() {
                    var fieldVal = $.trim($(this).val());
                    if ((fieldVal == '') && ($(this).attr('required'))) {
                        var labelname = $(this).parent().find('label').text();
                        labelname = labelname.replace("*", "");
                        message = labelname + ' cannot be empty';
                        $(this).focus();
                        error = true;
                        return false;
                    }
                });
            }

            if (error) {
                CustomUtils.gritter({
                    'title': 'Error',
                    'text': message
                }, 'error');
            } else {
                $.ajax({
                    type: 'POST',
                    url: CustomUtils.siteUrl() + 'acp/Map/save',
                    data: {site_google_map_key: $('#google_map_key').val(), site_map_status: $('#google_map_show:checked').length, site_map_latitude: $('#google_map_latitude').val(), site_map_longitude: $('#google_map_longitude').val(), site_map_marker: $('#google_map_marker').val(), site_google_map_type: $('[name="google_map_type"]:checked').val(), site_google_map_embed: $('#google_map_embed').val(), site_map_share_code: $('#google_map_share_code').val()},
                    dataType: 'json',
                    async: false,
                    success: function(res) {
                        if (res.status == 'success') {
                            CustomUtils.gritter({
                                'title': res.title,
                                'text': res.message
                            }, res.status);
                            window.location = CustomUtils.siteUrl() + 'acp/Map';
                        } else {
                            CustomUtils.gritter({
                                'title': res.title,
                                'text': res.message
                            }, res.status);
                        }
                    }
                });
            }
        });
    }

    var dropzoneUpload = function() {
        // www.dropzonejs.com
        
        // Prevent Dropzone from auto discovering this element:
        Dropzone.options.fileDropZone1 = false;
        // This is useful when you want to create the
        // Dropzone programmatically later
        var fileDropZone1 = new Dropzone("#fileDropZone1", {
            url: CustomUtils.siteUrl() + 'acp/Uploads/doUpload/map',
            maxFiles: 1,
            acceptedFiles: ".png,.svg",
            addRemoveLinks: true,
            paramName: 'file',
            dictDefaultMessage: 'Drop Map marker here to upload(Allow only png)',
            init: function() {
                this.on('complete', function(file) {
                    var filename = $.trim($('.dz-preview.dz-success.dz-complete').find('.dz-filename').text());
                    filename = filename.replace(/[^A-Za-z0-9.]/gi, '_');
                    $('#google_map_show').val(filename);
                }),
                this.on('removedfile', function(file) {
                    if (((file.name).replace(/ /g, '_')) == $('#google_map_show').val()) {
                        $('#google_map_show').val('');
                    }
                }),
                this.on('error', function(file, errorMessage) {
                    fileDropZone1.removeFile(file);
                    CustomUtils.gritter({
                        'title': 'Error',
                        'text': errorMessage
                    }, 'error');
                });
            }
        });
    }

    return {
        init: function() {
            manageMapTypes();
            dropzoneUpload();
        },
    };

}(jQuery);