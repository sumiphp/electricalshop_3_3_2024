var Category = function() {

    var getCategoryTable = function() {
        var checkEL = setInterval(() => {
            if ($('.dataTable-ProductCategories').length > 0) {
                clearInterval(checkEL);
                $.ajax({
                    type: 'POST',
                    url: CustomUtils.siteUrl() + 'acp/ProductCategories/getCategoryTable',
                    success: function(res) {
                        $('.dataTable-ProductCategories').html(res);
                        CustomUtils.initDataTable();
                    }
                });
            }
        }, 100);
    }

    var actions = function() {
        $('body').off('click', '.delete, .lock, .unlock').on('click', '.delete, .lock, .unlock', function() {
            var catg = $(this).data('catgid'),
                action = $(this).data('action');

            if (action == 'delete') {
                $('.modal#confirm').off('click', '.btn-danger').on('click', '.btn-danger', function() {
                    doAction(action, catg);
                });
            } else { 
                doAction(action, catg);
            }

            $('.modal#confirm').off('click', '.btn-secondary. [data-dismiss="modal"]').on('click', '.btn-secondary, [data-dismiss="modal"]', function() {
                $('.modal-backdrop.fade').fadeOut("slow");
            });
        });

        function doAction(action, catg) {
            $.ajax({
                type: 'POST',
                url: CustomUtils.siteUrl() + 'acp/ProductCategories/action',
                data: {'action': action, 'catg': catg},
                dataType: 'json',
                success: function(res) {
                    if (res.status == 'success') {
                        CustomUtils.gritter({
                            'title': res.title,
                            'text': res.message
                        }, res.status);
                        getCategoryTable();
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
        $('body').on('keyup focus', '#cat_name', function() {
            var text = $(this).val();
            if (text.trim() != '') {
                $.ajax({
                    type: 'POST',
                    url: CustomUtils.siteUrl() + 'acp/ProductCategories/doSlugify',
                    data: {'text': text, 'except': $('#cat_id').val()},
                    dataType: 'json',
                    success: function(res) {
                        if (res.status == 'success') {
                            $('#cat_canonial_name').val(res.slugText);
                            $('#show_canonial_name').text(res.slugText);
                        }
                    }
                });
            } else {
                $('#cat_canonial_name').val(''); //Clear slug
            }
        });

        $('body').on('click', '#saveCatgSubmit', function(ev) {
            ev.preventDefault();
            var error = false,
                message = 'Oops! Something has went wrong!';

            $('form#manageCatg').find('input').each(function() {
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
                if ($('form#manageCatg').find('#cat_image').val() == '') {
                    message = 'Category image not set.';
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
                    url: CustomUtils.siteUrl() + 'acp/ProductCategories/save',
                    data: $('form#manageCatg').serialize(),
                    dataType: 'json',
                    async: false,
                    success: function(res) {
                        if (res.status == 'success') {
                            CustomUtils.gritter({
                                'title': res.title,
                                'text': res.message
                            }, res.status);
                            window.location = CustomUtils.siteUrl() + 'acp/Productcategories';
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
            url: CustomUtils.siteUrl() + 'acp/Uploads/doUpload/categories',
            maxFiles: 1,
            acceptedFiles: ".jpeg,.jpg,.png,.bmp,.webp,.svg",
            addRemoveLinks: true,
            paramName: 'file',
            dictDefaultMessage: 'Drop product category images here to upload',
            init: function() {
                this.on('complete', function(file) {
                    $('.dz-preview.dz-success.dz-complete').each(function() {
                        var filename = $.trim($(this).find('.dz-filename').text());
                        filename = filename.replace(/ /g, '_'); // replace all space
                        $('#cat_image').val(filename);
                        $('.dropzoneDetailed').find('.pimg img').attr('src', CustomUtils.siteUrl()+'assets/uploads/categories/'+filename);
                    });
                }),
                this.on('removedfile', function(file) {
                    if (((file.name).replace(/ /g, '_')) == $('#cat_image').val()) {
                        $('#cat_image').val('');
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
            $('#cat_image').val('');
        });
    }

    return {
        init: function() {
            getCategoryTable();
            actions();
        },
        add: function() {
            dataValidator();
            dropzoneUpload();
        },
    };

}(jQuery);
