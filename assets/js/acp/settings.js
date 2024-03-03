var Settings = function() {

    var dataValidator = function() {
        $('body').on('click', '#saveSiteSubmit', function(ev) {
            ev.preventDefault();
            var error = false,
                message = 'Oops! Something has went wrong!';

            $('form#manageSettings').find('textarea').each(function() {
                var fieldVal = $.trim($(this).val());
                if ((fieldVal == '') && ($(this).attr('required'))) {
                    var labelname = $(this).parent().find('label').text();
                    labelname = labelname.replace("*", "");
                    message = labelname + ' cannot be empty';
                    if ($(this).closest('.card').find('.collapse.show').length == 0) {
                        $(this).closest('.card').find('.card-header a').trigger('click');
                    }
                    setTimeout(() => { $(this).focus(); }, 1000);
                    error = true;
                    return false;
                }
            });

            $('form#manageSettings').find('input.emailValidation').each(function() {
                var fieldVal = $.trim($(this).val());
                var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;

                if ((!pattern.test(fieldVal)) && ($(this).attr('required'))) {
                    var labelname = $(this).parent().find('label').text();
                    labelname = labelname.replace("*", "");
                    message = labelname + ' is not a valid email';
                    if ($(this).closest('.card').find('.collapse.show').length == 0) {
                        $(this).closest('.card').find('.card-header a').trigger('click');
                    }
                    setTimeout(() => { $(this).focus(); }, 1000);
                    error = true;
                    return false;
                }
            });

            $('form#manageSettings').find('input').each(function() {
                var fieldVal = $.trim($(this).val());
                if ((fieldVal == '') && ($(this).attr('required'))) {
                    var labelname = $(this).parent().find('label').text();
                    labelname = labelname.replace("*", "");
                    message = labelname + ' cannot be empty';
                    if ($(this).closest('.card').find('.collapse.show').length == 0) {
                        $(this).closest('.card').find('.card-header a').trigger('click');
                    }
                    setTimeout(() => { $(this).focus(); }, 1000);
                    error = true;
                    return false;
                }
            });

            if (!error) {
                var site_logo = $('form#manageSettings').find('#site_logo').val();
                if (site_logo == '') {
                    var thisEL = $('form#manageSettings').find('#site_logo');
                    message = 'Site Logo is not added.';
                    if (thisEL.closest('.card').find('.collapse.show').length == 0) {
                        thisEL.closest('.card').find('.card-header a').trigger('click');
                    }
                    setTimeout(() => { thisEL.focus(); }, 1000);
                    error = true;
                    return false;
                }
                var site_favicon = $('form#manageSettings').find('#site_favicon').val();
                if (site_favicon == '') {
                    var thisEL = $('form#manageSettings').find('#site_favicon');
                    message = 'Site Favicon is not added.';
                    if (thisEL.closest('.card').find('.collapse.show').length == 0) {
                        thisEL.closest('.card').find('.card-header a').trigger('click');
                    }
                    setTimeout(() => { thisEL.focus(); }, 1000);
                    error = true;
                    return false;
                }
            }

            if (error) {
                CustomUtils.gritter({
                    'title': 'Error',
                    'text': message
                }, 'error');
            } else {
                serialize = $('form#manageSettings').serialize()
                site_ga_code = $('#site_ga_code').val();
                site_ga_code = site_ga_code.replaceAll(/script/g, 'ssccrriipptt');
                serialize += "&site_ga_code=" + encodeURIComponent(site_ga_code);
                site_header_assets = $('#site_header_assets').val();
                site_header_assets = site_header_assets.replaceAll(/script/g, 'ssccrriipptt');
                serialize += "&site_header_assets=" + encodeURIComponent(site_header_assets);
                site_footer_assets = $('#site_footer_assets').val();
                site_footer_assets = site_footer_assets.replaceAll(/script/g, 'ssccrriipptt');
                serialize += "&site_footer_assets=" + encodeURIComponent(site_footer_assets);

                $.ajax({
                    type: 'POST',
                    url: CustomUtils.siteUrl() + 'acp/Settings/save',
                    data: serialize,
                    dataType: 'json',
                    async: false,
                    success: function(res) {
                        CustomUtils.gritter({
                            'title': res.title,
                            'text': res.message
                        }, res.status);
                        window.location = CustomUtils.siteUrl() + 'acp/Settings';
                    }
                });
            }
            
        });
    }

    var ajaxProviceLoader = function() {
        $('body').off('change', '#site_country').on('change', '#site_country', function() {
            var cid = $('select#site_country option:selected').val();
            if (cid > 0) {
                $.ajax({
                    type: 'POST',
                    url: CustomUtils.siteUrl() + 'acp/Settings/ajaxProvince',
                    data: {'cid': cid},
                    dataType: 'json',
                    async: false,
                    success: function(res) {
                        $('select#site_state').html(res.provinceList);
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
            url: CustomUtils.siteUrl() + 'acp/Uploads/doUpload/site',
            maxFiles: 1,
            acceptedFiles: ".jpeg,.jpg,.png,.bmp,.ico,.svg",
            addRemoveLinks: true,
            paramName: 'file',
            dictDefaultMessage: 'Drop Site Logo(360x160px) here to upload',
            init: function() {
                this.on('complete', function(file) {
                    $('.dz-preview.dz-success.dz-complete').each(function() {
                        var filename = $.trim($(this).find('.dz-filename').text());
                        filename = filename.replace(/ /g, '_'); // replace all space
                        $('#site_logo').val(filename);
                        $('.dropzoneDetailed1').find('.pimg img').attr('src', CustomUtils.siteUrl()+'assets/uploads/site/'+filename);
                    });
                }),
                this.on('removedfile', function(file) {
                    if (((file.name).replace(/ /g, '_')) == $('#site_logo').val()) {
                        $('#site_logo').val('');
                    }
                }),
                this.on('error', function(file, errorMessage) {
                    console.log(errorMessage)
                    console.log(file)
                    fileDropZone1.removeFile(file);
                    CustomUtils.gritter({
                        'title': 'Error',
                        'text': errorMessage
                    }, 'error');
                });
            }
        });

        // on removing primary image
        $('body').find('#fileDropZone1').off('click', '.dz-remove').on('click', '.dz-remove', function() {
            $('#site_logo').val('');
        });

        // Prevent Dropzone from auto discovering this element:
        Dropzone.options.fileDropZone2 = false;
        // This is useful when you want to create the
        // Dropzone programmatically later
        var fileDropZone2 = new Dropzone("#fileDropZone2", {
            url: CustomUtils.siteUrl() + 'acp/Uploads/doUpload/site',
            maxFiles: 1,
            acceptedFiles: 'image/*',
            addRemoveLinks: true,
            paramName: 'file',
            dictDefaultMessage: 'Drop Site Logo for browser tab(16x16px) here to upload',
            init: function() {
                this.on('complete', function(file) {
                    $('.dz-preview.dz-success.dz-complete').each(function() {
                        var filename = $.trim($(this).find('.dz-filename').text());
                        filename = filename.replace(/ /g, '_'); // replace all space
                        $('#site_favicon').val(filename);
                        $('.dropzoneDetailed2').find('.pimg img').attr('src', CustomUtils.siteUrl()+'assets/uploads/site/'+filename);
                    });
                }),
                this.on('removedfile', function(file) {
                    if (((file.name).replace(/ /g, '_')) == $('#site_favicon').val()) {
                        $('#site_favicon').val('');
                    }
                }),
                this.on('error', function(file, errorMessage) {
                    fileDropZone2.removeFile(file);
                    CustomUtils.gritter({
                        'title': 'Error',
                        'text': errorMessage
                    }, 'error');
                });
            }
        });

        // on removing primary image
        $('body').find('#fileDropZone2').off('click', '.dz-remove').on('click', '.dz-remove', function() {
            $('#site_favicon').val('');
        });

        // Prevent Dropzone from auto discovering this element:
        Dropzone.options.fileDropZone3 = false;
        // This is useful when you want to create the
        // Dropzone programmatically later
        var fileDropZone3 = new Dropzone("#fileDropZone3", {
            url: CustomUtils.siteUrl() + 'acp/Uploads/doUpload/site',
            maxFiles: 1,
            acceptedFiles: 'image/*',
            addRemoveLinks: true,
            paramName: 'file',
            dictDefaultMessage: 'Drop Site Logo for Mobile (200x60px) here to upload',
            init: function() {
                this.on('complete', function(file) {
                    $('.dz-preview.dz-success.dz-complete').each(function() {
                        var filename = $.trim($(this).find('.dz-filename').text());
                        filename = filename.replace(/ /g, '_'); // replace all space
                        $('#site_mobile_logo').val(filename);
                        $('.dropzoneDetailed3').find('.pimg img').attr('src', CustomUtils.siteUrl()+'assets/uploads/site/'+filename);
                    });
                }),
                this.on('removedfile', function(file) {
                    if (((file.name).replace(/ /g, '_')) == $('#site_mobile_logo').val()) {
                        $('#site_mobile_logo').val('');
                    }
                }),
                this.on('error', function(file, errorMessage) {
                    fileDropZone3.removeFile(file);
                    CustomUtils.gritter({
                        'title': 'Error',
                        'text': errorMessage
                    }, 'error');
                });
            }
        });

        // on removing primary image
        $('body').find('#fileDropZone3').off('click', '.dz-remove').on('click', '.dz-remove', function() {
            $('#site_mobile_logo').val('');
        });
    }

    return {
        init: function() {
            dataValidator();
            dropzoneUpload();
            ajaxProviceLoader();
        },
    };

}(jQuery);
