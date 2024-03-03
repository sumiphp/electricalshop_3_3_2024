var Products = function() {

    var getProductTable = function() {
        var checkEL = setInterval(() => {
            if ($('.dataTable-products').length > 0) {
                clearInterval(checkEL);
                $.ajax({
                    type: 'POST',
                    url: CustomUtils.siteUrl() + 'acp/Products/getProductTable',
                    success: function(res) {
                        $('.dataTable-products').html(res);
                        CustomUtils.initDataTable();
                    }
                });
            }
        }, 100);
    }

    var actions = function() {
        $('body').off('click', '.delete, .lock, .unlock').on('click', '.delete, .lock, .unlock', function() {
            var id = $(this).data('id'),
                action = $(this).data('action');

            if (action == 'delete') {
                $('.modal#confirm').off('click', '.btn-danger').on('click', '.btn-danger', function() {
                    doAction(action, id);
                });
            } else { 
                doAction(action, id);
            }

            $('.modal#confirm').off('click', '.btn-secondary. [data-dismiss="modal"]').on('click', '.btn-secondary, [data-dismiss="modal"]', function() {
                $('.modal-backdrop.fade').fadeOut("slow");
            });
        });

        function doAction(action, id) {
            $.ajax({
                type: 'POST',
                url: CustomUtils.siteUrl() + 'acp/Products/action',
                data: {'action': action, 'id': id},
                dataType: 'json',
                success: function(res) {
                    if (res.status == 'success') {
                        CustomUtils.gritter({
                            'title': res.title,
                            'text': res.message
                        }, res.status);
                        getProductTable();
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
    }

    var dataValidator = function() {
        $('body').on('keyup focus', '#prod_name', function() {
            var text = $(this).val();
            if (text.trim() != '') {
                $.ajax({
                    type: 'POST',
                    url: CustomUtils.siteUrl() + 'acp/Products/doSlugify',
                    data: {'text': text, 'except': $('#prod_id').val()},
                    dataType: 'json',
                    success: function(res) {
                        if (res.status == 'success') {
                            $('#prod_canonial_name').val(res.slugText);
                            $('#show_canonial_name').text(res.slugText);
                        }
                    }
                });
            } else {
                $('#prod_canonial_name').val(''); //Clear slug
            }
        });
        
        $('body').on('click', '#saveProductSubmit', function(ev) {
            ev.preventDefault();
            var error = false,
                message = 'Oops! Something has went wrong!';

            $('form#manageProduct').find('input:visible').each(function() {
                var fieldVal = $.trim($(this).val());
                if ((fieldVal == '') && ($(this).attr('required'))) {
                    var labelname = $(this).closest('.field-wrapper').find('label:first').text();
                    labelname = labelname.replace("*", "");
                    message = labelname + ' cannot be empty';
                    setTimeout(() => { $(this).focus(); }, 1000);
                    error = true;
                    return false;
                }
            });

            if (!error) {
                // Product availability section validation(atleast one checkbox should be checked)
                var checked = 0;
                $('form#manageProduct .checkbox-list').find('input[type="checkbox"]:visible:checked').each(function() {
                    checked++;
                });
                if (checked == 0) {
                    var labelname =  $('form#manageProduct .checkbox-list').find('label:first').text();
                    labelname = labelname.replace("*", "");
                    message = labelname + ' cannot be empty';
                    setTimeout(() => { $('form#manageProduct .checkbox-list').focus(); }, 1000);
                    error = true;
                }
            }

            if (!error) {
                if ($('form#manageProduct').find('#prodImages').val() == '') {
                    message = 'Product image not set.';
                    error = true;
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
                    url: CustomUtils.siteUrl() + 'acp/Products/save',
                    data: $('form#manageProduct').serialize(),
                    dataType: 'json',
                    async: false,
                    success: function(res) {
                        if (res.status == 'success') {
                            CustomUtils.gritter({
                                'title': res.title,
                                'text': res.message
                            }, res.status);
                            setTimeout(() => {
                                window.location = CustomUtils.siteUrl() + 'acp/Products';
                            }, 3000);
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
            url: CustomUtils.siteUrl() + 'acp/Uploads/doUpload/products',
            maxFiles: 6,
            acceptedFiles: 'image/*',
            addRemoveLinks: true,
            paramName: 'file',
            dictDefaultMessage: 'Drop products images here to upload',
            init: function() {
                this.on('complete', function(file) {
                    $('.dz-preview.dz-success.dz-complete').each(function() {
                        var filename = $.trim($(this).find('.dz-filename').text());
                        filename = filename.replace(/ /g, "_");

                        if ($(this).find('.primBtn').length == 0) {
                            $(this).append('<button type="button" data-pimg="'+filename+'" class="btn btn-flat btn-success btn-xs ml-2 primBtn '+(($('#prodPrimaryImage').val() == '')? 'isPrimaryImage' : 'makePrimaryImage')+'">'+(($('#prodPrimaryImage').val() == '')? 'Primary Image' : 'Make Primary')+'</button>');
                            var prodImages = $('#prodImages').val();
                            if (prodImages.indexOf('~'+filename+'~,') < 0) {
                                prodImages += '~'+filename+'~,';
                                $('#prodImages').val(prodImages);
                            }
                        }
                        if ($('.dropzoneDetailed').find('#imageDesc_'+(filename.replace('.','_'))).length == 0) {
                            $('.dropzoneDetailed').append('<div id="imageDesc_'+(filename.replace('.','_'))+'" class="prodimagedetails row mt-3"><div class="col-1 pimg pl-4" style="border-radius: 50%;height: 50px;width: 50px;"><img src="'+CustomUtils.siteUrl()+'assets/uploads/products/'+filename+'" data-pimg="'+filename+'" class="makePrimaryImage" style="border-radius: 50%;height: 50px;width: 50px;padding:2px;"></div><div class="col-11 pimgdesc"><div class="for"><div class="col-md-12 mt-s3 cdard-body"><textarea class="form-control" id="pimgdesc_'+filename.replace('.','_')+'" name="pimgdesc_'+filename.replace('.','_')+'" placeholder="Enter image description"></textarea></div></div></div></div>');
                        }
                        if ($('#prodPrimaryImage').val() == '') {
                            $('#prodPrimaryImage').val(filename);
                            $('.dropzoneDetailed').find('#imageDesc_'+($('#prodPrimaryImage').val().replace('.','_'))).find('img').addClass('btn-success');
                        }
                    });
                }),
                this.on('removedfile', function(file) {
                    filename = file.name.replace(/ /g, "_");
                    if (filename == $('#prodPrimaryImage').val()) {
                        if ($('.dropzone').find('[data-pimg="'+filename+'"]').length == 0) {
                            $('#prodPrimaryImage').val('');
                            var prodImages = $('#prodImages').val();
                            if (prodImages.indexOf('~'+filename+'~,') > -1) {
                                prodImages = prodImages.replace('~'+filename+'~,', '');
                                $('#prodImages').val(prodImages);
                            }
                        }
                        if ($('.dropzoneDetailed').find('#imageDesc_'+((filename).replace('.','_'))).length > 0) {
                            $('.dropzoneDetailed').find('#imageDesc_'+((filename).replace('.','_'))).remove();
                        }
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

        // making product image as primary
        $('body').off('click', '.makePrimaryImage').on('click', '.makePrimaryImage', function() {
            console.log('Make primary: '+$(this).data('pimg'))
            $('.dropzone').find('.isPrimaryImage').removeClass('isPrimaryImage').addClass('makePrimaryImage').text('Make Primary');
            $('#prodPrimaryImage').val($(this).data('pimg'));
            $(this).removeClass('makePrimaryImage').addClass('isPrimaryImage').text('Primary Image');
            if ($('.dropzoneDetailed').find('#imageDesc_'+(($(this).data('pimg')).replace('.','_'))).length > 0) {
                $('.dropzoneDetailed').find('.pimg').find('img').removeClass('btn-success');
                $('.dropzoneDetailed').find('#imageDesc_'+(($(this).data('pimg')).replace('.','_'))).find('img').addClass('btn-success');
            }
            CustomUtils.gritter({
                'title': 'Success',
                'text': $(this).data('pimg')+' set as Primary image for this product.'
            }, 'success');
        });

        // on removing primary image
        $('body').off('click', '.dz-remove').on('click', '.dz-remove', function() {
            if ($(this).closest('div').find('.isPrimaryImage').length > 0) {
                console.log('Removed primary image: '+$('#prodPrimaryImage').val());
                var prodImages = $('#prodImages').val();
                if (prodImages.indexOf('~'+$('#prodPrimaryImage').val()+'~,') > -1) {
                    prodImages = prodImages.replace('~'+$('#prodPrimaryImage').val()+'~,', '');
                    $('#prodImages').val(prodImages);
                }
                $('#prodPrimaryImage').val('');                
            }
        });
    }

    var handleFeatures = function() {
        $('body').off('click', '.add-one-more').on('click', '.add-one-more', function() {
            // Return 0 if the required fields in validating container has empty data, otherwise 1.
            var validateThisContainer = 0;
            $(this).closest('.validate-container').find('input:visible').each(function() {
                var fieldVal = $.trim($(this).val());
                if ((fieldVal == '') && ($(this).attr('required'))) {
                    $(this).addClass('error-field')
                    $(this).css('border-color', '#f40505');
                    $(this).focus();
                    validateThisContainer = 0;
                } else {
                    $(this).removeClass('error-field')
                    $(this).css('border-color', '#aaaaaa4d');
                    validateThisContainer = 1;
                }
            });

            if (validateThisContainer) {
                var html = $(this).closest('.repeater-container').find('.form-group:last').html();
                $(this).hide();
                $(this).closest('.repeater-container').append('<div class="form-group row">' + html + '</div>');
                if ($(this).closest('.repeater-container').find('.form-group:last:visible').find('input[name="free_ride[]"]').length) {
                    $(this).closest('.repeater-container').find('.form-group:last:visible').find('.free-wrapper').hide();
                }
                $(this).closest('.repeater-container').find('.form-group:last:visible').find('input').val('');
            } else {
                CustomUtils.gritter({
                    'title': 'Warning',
                    'text': 'Please enter a valid service.'
                }, 'warning');
            }
            
        });

        $('body').off('click', '.remove-one').on('click', '.remove-one', function() {
            if ($(this).closest('.repeater-container').find('.remove-one').length > 1) {
                if ($(this).closest('.validate-container').find('.add-one-more:visible').length == 1) {
                    $(this).closest('.validate-container').addClass('process-this');
                    setTimeout(() => {
                        $('.process-this.validate-container').find('.form-group:last:visible').find('.add-one-more').show();
                        $('.process-this.validate-container').removeClass('process-this');
                    }, 250);
                }
                $(this).closest('.form-group').remove();
            } else {
                CustomUtils.gritter({
                    'title': 'Warning',
                    'text': 'Atleast one record is required.'
                }, 'warning');
            }
        });

        $('body').off('click', '#has_promotions').on('click', '#has_promotions', function() {
            if ($(this).is(':checked')) {
                $('.add-promotion-section').show();
            } else {
                $('.add-promotion-section').hide();
            }
        });

        $('body').off('click', 'input[name="free_ride[]"]').on('click', 'input[name="free_ride[]"]', function() {
            if ($(this).is(':checked')) {
                $(this).closest('.form-group').find('.free-wrapper').show();
            } else {
                $(this).closest('.form-group').find('.free-wrapper').hide();
            }
        });
    }

    return {
        init: function() {
            getProductTable();
            actions();
        },
        add: function() {
            dataValidator();
            dropzoneUpload();
            handleFeatures();
        },
    };

}(jQuery);
