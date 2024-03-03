var Menudt = function() {

    var getBrandTable = function() {
        var checkEL = setInterval(() => {
            if ($('.dataTable-Menu').length > 0) {
                clearInterval(checkEL);
                $.ajax({
                    type: 'POST',
                    //url: CustomUtils.siteUrl() + 'acp/ProductBrands/getBrandTable',
                    url: CustomUtils.siteUrl() + 'acp/Settings/getMenuTable',
                    success: function(res) {
                        $('.dataTable-Menu').html(res);
                        CustomUtils.initDataTable();
                    }
                });
            }
        }, 100);
    }

    var actions = function() {
        $('body').off('click', '.delete, .lock, .unlock').on('click', '.delete, .lock, .unlock', function() {
            var brand = $(this).data('menuid'),
                action = $(this).data('action');

            if (action == 'delete') {
                $('.modal#confirm').off('click', '.btn-danger').on('click', '.btn-danger', function() {
                    doAction(action, brand);
                });
            } else { 
                doAction(action, brand);
            }

            $('.modal#confirm').off('click', '.btn-secondary. [data-dismiss="modal"]').on('click', '.btn-secondary, [data-dismiss="modal"]', function() {
                $('.modal-backdrop.fade').fadeOut("slow");
            });
        });

        function doAction(action, brand) {
            //alert(brand);
            $.ajax({
                type: 'POST',
                url: CustomUtils.siteUrl() + 'acp/Settings/action',
                data: {'action': action, 'brand': brand},
                dataType: 'json',
                success: function(res) {
                    if (res.status == 'success') {
                        CustomUtils.gritter({
                            'title': res.title,
                            'text': res.message
                        }, res.status);
                        getBrandTable();
                        $('[data-dismiss="modal"]').trigger('click');
                    } else {
                        CustomUtils.gritter({
                            'title': res.title,
                            'text': res.message
                        }, res.status);
                    }
                }
            });
        }

        $('body').off('click', '[data-dismiss="modal"]').on('click', '[data-dismiss="modal"]', function() {
            $('.modal-backdrop.fade').fadeOut("slow");
        });
    }

    var dataValidator = function() {
        $('body').on('keyup focus', '#brand_name', function() {
            var text = $(this).val();
            if (text.trim() != '') {
                $.ajax({
                    type: 'POST',
                    url: CustomUtils.siteUrl() + 'acp/ProductBrands/doSlugify',
                    data: {'text': text, 'except': $('#brand_id').val()},
                    dataType: 'json',
                    success: function(res) {
                        if (res.status == 'success') {
                            $('#brand_canonial_name').val(res.slugText);
                            $('#show_canonial_name').text(res.slugText);
                        }
                    }
                });
            } else {
                $('#brand_canonial_name').val(''); //Clear slug
            }
        });

        $('body').on('click', '#saveBrandSubmit', function(ev) {
            ev.preventDefault();
            var error = false,
                message = 'Oops! Something has went wrong!';

            $('form#manageBrand').find('input').each(function() {
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
                if ($('form#manageBrand').find('#brand_image').val() == '') {
                    message = 'Brand image not set.';
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
                $.ajax({
                    type: 'POST',
                    url: CustomUtils.siteUrl() + 'acp/Settings/savemenu',
                    data: $('form#manageBrand').serialize(),
                    dataType: 'json',
                    async: false,
                    success: function(res) {
                        if (res.status == 'success') {
                            CustomUtils.gritter({
                                'title': res.title,
                                'text': res.message
                            }, res.status);
                            window.location = CustomUtils.siteUrl() + 'acp/Productbrands';
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
            url: CustomUtils.siteUrl() + 'acp/Uploads/doUpload/brands',
            maxFiles: 1,
            acceptedFiles: ".jpeg,.jpg,.png,.bmp,.webp,.svg",
            addRemoveLinks: true,
            paramName: 'file',
            dictDefaultMessage: 'Drop product brand image here to upload',
            init: function() {
                this.on('complete', function(file) {
                    $('.dz-preview.dz-success.dz-complete').each(function() {
                        var filename = $.trim($(this).find('.dz-filename').text());
                        filename = filename.replace(/ /g, '_'); // replace all space
                        $('#brand_image').val(filename);
                        $('.dropzoneDetailed').find('.pimg img').attr('src', CustomUtils.siteUrl()+'assets/uploads/brands/'+filename);
                    });
                }),
                this.on('removedfile', function(file) {
                    if (((file.name).replace(/ /g, '_')) == $('#brand_image').val()) {
                        $('#brand_image').val('');
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

        // on removing primary image
        $('body').off('click', '.dz-remove').on('click', '.dz-remove', function() {
            $('#brand_image').val('');
        });
    }

    return {
        init: function() {
            getBrandTable();
            actions();
        },
        add: function() {
            dataValidator();
            dropzoneUpload();
        },
    };

}(jQuery);
