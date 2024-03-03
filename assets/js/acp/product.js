var Product = function() {

    var dataValidator = function() {
        $('body').on('keyup focus', '#prodname', function() {
            var text = $(this).val();
            if (text.trim() != '') {
                $.ajax({
                    type: 'POST',
                    url: CustomUtils.siteUrl() + 'acp/Products/doSlugify',
                    data: {'text': text, 'except': $('#pid').val()},
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
        
        $('body').on('click', '#saveProduct', function(ev) {
            ev.preventDefault();
            var error = false,
                message = 'Oops! Something has went wrong!';

            $('form#manageProduct').find('textarea').each(function() {
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

            $('form#manageProduct').find('input').each(function() {
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

            $('form#manageProduct').find('input[name="tech_sheet[]"]:visible').each(function() {
                if ($.trim($(this).val()) == '') {
                    if ($(this).closest('.card').find('.collapse.show').length == 0) {
                        $(this).closest('.card').find('.card-header a').trigger('click');
                    }
                    $(this).addClass('empty-field-error');
                    message = 'Technical data sheet field cannot be empty. Please remove the field if not required.';
                    error = true;
                    return false;
                } else {
                    $(this).removeClass('empty-field-error');
                }
            });

            if (!error) {
                var prodPrimaryImage = $('form#manageProduct').find('#prodPrimaryImage').val();
                if (prodPrimaryImage == '') {
                    var thisEL = $('form#manageProduct').find('#prodPrimaryImage');
                    message = 'Product image is not set, please add atleast 1 image.';
                    if (thisEL.closest('.card').find('.collapse.show').length == 0) {
                        thisEL.closest('.card').find('.card-header a').trigger('click');
                    }
                    CustomUtils.gritter({
                        'title': 'Error',
                        'text': 'Primary image is required'
                    }, 'error');
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

                generateTechnicalDataSheetHierarchy();


                for (instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }


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
                            window.location = CustomUtils.siteUrl() + 'acp/Products';
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

    var generateTechnicalDataSheetHierarchy = function() {
        var hierarchy = {};
        hierarchy['L'] = 0;
        hierarchy['M'] = 0;
        hierarchy['S'] = 0;
        $('input[name="tech_sheet[]"]').each(function() {
            if ($.trim($(this).val()) != '') {
                var index = 1;
                var dataHierarchy = $(this).data('hierarchy');
                if (dataHierarchy == 'L') {
                    hierarchy['L']++;
                    hierarchy['M'] = 0;
                    hierarchy['S'] = 0;
                } else if (dataHierarchy == 'M') {
                    hierarchy['M']++;
                    hierarchy['S'] = 0;
                } else if (dataHierarchy == 'S') {
                    hierarchy['S']++;
                }
                var denotation = 'TDS';
                for (level in hierarchy) {
                    if (hierarchy[level] > 0) {
                        denotation += '_';
                        denotation += level + hierarchy[level];
                    }
                }
                $(this).attr('name', denotation);
                index++;
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
            maxFiles: 10,
            acceptedFiles: ".jpeg,.jpg,.png,.bmp,.webp,.svg",
            addRemoveLinks: false,
            paramName: 'file',
            dictDefaultMessage: 'Drop product images here to upload',
            init: function() {
                this.on('complete', function(file) {
                    $('.dz-preview.dz-success.dz-complete').each(function() {
                        var filename = $.trim($(this).find('.dz-filename').text());
                        filename = filename.replace(/[^A-Za-z0-9.]/gi, '_');
                        if ($(this).find('.primBtn').length == 0) {
                            $(this).append('<button type="button" data-pimg="'+filename+'" class="btn btn-flat btn-success btn-xs ml-2 primBtn '+(($('#prodPrimaryImage').val() == '')? 'isPrimaryImage' : 'makePrimaryImage')+'">'+(($('#prodPrimaryImage').val() == '')? 'Primary Image' : 'Make Primary')+'</button>');
                            var prodImages = $('#prodImages').val();
                            if (prodImages.indexOf('~'+filename+'~,') < 0) {
                                prodImages += '~'+filename+'~,';
                                $('#prodImages').val(prodImages);
                            }
                        }
                        if ($('.dropzoneDetailed').find('#imageDesc_'+(filename.replace('.','_'))).length == 0) {
                            $('.dropzoneDetailed').append('<div id="imageDesc_'+(filename.replace('.','_'))+'" class="prodimagedetails row mt-3" data-filename="'+filename+'"><div class="col-1 pimg pl-4" style="border-radius: 50%;height: 50px;width: 50px;"><span class="removethisImage">x</span><img src="'+CustomUtils.siteUrl()+'assets/uploads/products/'+filename+'" style="border-radius: 50%;height: 50px;width: 50px;padding:2px;"></div><div class="col-11 pimgdesc"><div class="for"><div class="col-md-12 mt-s3 cdard-body"><textarea class="form-control" id="pimgdesc_'+filename.replace('.','_')+'" name="pimgdesc_'+filename.replace('.','_')+'" placeholder="Enter image description"></textarea></div></div></div></div>');
                        }
                        if ($('#prodPrimaryImage').val() == '') {
                            $('#prodPrimaryImage').val(filename);
                            $('.dropzoneDetailed').find('#imageDesc_'+($('#prodPrimaryImage').val().replace('.','_'))).find('img').addClass('btn-success');
                        }
                    });
                }),
                this.on('removedfile', function(file) {
                    filename = (file.name).replace(/ /g, '_');
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

        // remove saved images
        $('body').off('click', '.removethisImage').on('click', '.removethisImage', function() {
            var filename = $(this).closest('.prodimagedetails').data('filename');
            var prodImages = $('#prodImages').val();
            var prodPrimaryImage = $('#prodPrimaryImage').val();
            if (prodImages.indexOf('~'+filename+'~,') > -1) {
                prodImages = prodImages.replace('~'+filename+'~,', '');
                $('#prodImages').val(prodImages);
            }
            if (prodPrimaryImage === filename) $('#prodPrimaryImage').val('');
            $(this).closest('.prodimagedetails').remove();
        });
    }

    var getProductTable = function() {
        var checkEL = setInterval(() => {
            if ($('.dataTable-Products').length > 0) {
                clearInterval(checkEL);
                $.ajax({
                    type: 'POST',
                    url: CustomUtils.siteUrl() + 'acp/Products/getProductTable',
                    success: function(res) {
                        $('.dataTable-Products').html(res);
                        CustomUtils.initDataTable();
                    }
                });
            }
        }, 100);
    }

    var actions = function() {
        $('body').off('click', '.delete, .lock, .unlock').on('click', '.delete, .lock, .unlock', function() {
            var prod = $(this).data('prodid'),
                action = $(this).data('action');

            if (action == 'delete') {
                $('.modal#confirm').off('click', '.btn-danger').on('click', '.btn-danger', function() {
                    doAction(action, prod);
                });
            } else { 
                doAction(action, prod);
            }

            $('.modal#confirm').off('click', '.btn-secondary. [data-dismiss="modal"]').on('click', '.btn-secondary, [data-dismiss="modal"]', function() {
                $('.modal-backdrop.fade').fadeOut("slow");
            });
        });

        function doAction(action, prod) {
            $.ajax({
                type: 'POST',
                url: CustomUtils.siteUrl() + 'acp/Products/action',
                data: {'action': action, 'prod': prod},
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

        $('body').off('click', '[data-dismiss="modal"]').on('click', '[data-dismiss="modal"]', function() {
            $('.modal-backdrop.fade').fadeOut("slow");
        });
    }

    var handleAddMore = function() {
        $('body').off('click', '.add-one-more').on('click', '.add-one-more', function() {
            var type = $(this).parent().data('type');
            if (validateInputs($(this).closest('.parent-div.'+type))) {
                $(this).addClass('display-none');
                $(this).closest('.addmore-'+type+'-row').find('.remove-this').removeClass('display-none');
                clone = $('.structure').find('.addmore-'+type+'-row:first').clone();
                $(this).closest('.parent-div').append(clone);
                $(this).closest('.parent-div').find('.addmore-'+type+'-row:last').find('.remove-this:first').removeClass('display-none');
                $(this).closest('.parent-div').find('.addmore-'+type+'-row:last').find('.add-one-more').removeClass('display-none');
            } else {
                CustomUtils.gritter({
                    'title': 'Error',
                    'text': 'Sorry, Please fill the input field or remove it before trying to add new.'
                }, 'error');
            }
        });

        $('body').off('click', '.remove-this').on('click', '.remove-this', function() {
            $this = $(this).closest('.parent-div');
            var type = $(this).parent().data('type');
            if ($this.find('.addmore-'+type+'-row').length > 1) {
                $(this).closest('.addmore-'+type+'-row').remove();
                $this.find('.addmore-'+type+'-row:last').find('.add-one-more').removeClass('display-none');
                if ($this.find('.addmore-'+type+'-row').length == 1) {
                    $this.find('.addmore-'+type+'-row:last').find('.remove-this').addClass('display-none');
                }
            }
        });

        function validateInputs(ele) {
            error = 1;
            ele.find('input').each(function(){
                if ($.trim($(this).val()) == '') {
                    error = 0;
                    $(this).addClass('empty-field-error');
                } else {
                    $(this).removeClass('empty-field-error');
                }
            });
            return error;
        }
    }

    return {
        init: function() {
            getProductTable();
            actions();
        },
        add: function() {
            dataValidator();
            dropzoneUpload();
            handleAddMore();
        },
    };

}(jQuery);
