var Staffs = function() {

    var getStaffsTable = function() {
        var checkEL = setInterval(() => {
            if ($('.dataTable-Staffs').length > 0) {
                clearInterval(checkEL);
                $.ajax({
                    type: 'POST',
                    url: CustomUtils.siteUrl() + 'acp/Staffs/getStaffsTable',
                    success: function(res) {
                        $('.dataTable-Staffs').html(res);
                        CustomUtils.initDataTable();
                    }
                });
            }
        }, 100);
    }

    var actions = function() {
        $('body').off('click', '.delete, .lock, .unlock').on('click', '.delete, .lock, .unlock', function() {
            var staff = $(this).data('userid'),
                action = $(this).data('action');

            if (action == '2') {
                $('.modal#confirm').off('click', '.btn-danger').on('click', '.btn-danger', function() {
                    doAction(action, staff);
                });
            } else { 
                doAction(action, staff);
            }
        });

        function doAction(action, staff) {
            $.ajax({
                type: 'POST',
                url: CustomUtils.siteUrl() + 'acp/Staffs/action',
                data: {'action': action, 'staff': staff},
                dataType: 'json',
                success: function(res) {
                    if (res.status == 'success') {
                        CustomUtils.gritter({
                            'title': res.title,
                            'text': res.message
                        }, res.status);
                        getStaffsTable();
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

    var addStaff = function() {
        $('body').on('change', '#country', function(ev) {
            var country = $(this).find('option:selected').val();
            if (country > 0) {
                $.ajax({
                    type: 'POST',
                    url: CustomUtils.siteUrl() + 'acp/Staffs/getStates',
                    data: {'country': country},
                    dataType: 'json',
                    async: false,
                    success: function(res) {
                        $('select#state').find('option').remove();
                        $('select#state').html('<option value="0">Select State</option>');
                        $.each(res, function( index, value ) {
                            $('select#state').append('<option value="'+value.province_id+'">'+value.province_name+' ('+value.province_code+')'+'</option>');
                        });
                    }
                });
            } else {
                $('select#state').find('option').remove();
                $('select#state').html('<option value="0">Select State</option>');
            }
        });

        $('body').on('click', '#saveUserSubmit', function(ev) {
            ev.preventDefault();
            var form = $('form#manageUser'),
                error = false,
                message = 'Oops! Something has went wrong!';

            form.find('textarea').each(function() {
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

            form.find('select').each(function() {
                var fieldVal = $.trim($(this).find('option:selected').val());
                if ((fieldVal == '0') && ($(this).attr('required'))) {
                    var labelname = $(this).parent().find('label').text();
                    labelname = labelname.replace("*", "");
                    message = labelname + ' cannot be empty';
                    $(this).focus();
                    error = true;
                    return false;
                }
            });

            form.find('input.emailValidation').each(function() {
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

            form.find('input.phoneValidation').each(function() {
                var fieldVal = $.trim($(this).val());
                var pattern = /^[0-9\s-+\(\)]{10,15}$/;

                if ((!pattern.test(fieldVal)) && ($(this).attr('required'))) {
                    var labelname = $(this).parent().find('label').text();
                    labelname = labelname.replace("*", "");
                    message = labelname + ' is not a valid phone number';
                    if ($(this).closest('.card').find('.collapse.show').length == 0) {
                        $(this).closest('.card').find('.card-header a').trigger('click');
                    }
                    setTimeout(() => { $(this).focus(); }, 1000);
                    error = true;
                    return false;
                }
            });

            form.find('input').each(function() {
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

            var newpswrd = form.find('#newpswrd.passwordValidation').val();
            if (newpswrd.trim() != '') {
                if (newpswrd.length < 8) {
                    message = 'Password must contain minimum 8 characters(Allowed: A-Z, a-z, 0-9 & special characters)';
                    $('#newpswrd').focus();
                    CustomUtils.gritter({
                        'title': 'Error',
                        'text': message
                    }, 'error');
                    error = true;
                    return false;
                } else {
                    if (!(/^[a-zA-Z0-9\~\!\@\#\$\%\^\&\*\'\"\[\]\{\}\(\)\-\_\+\=\;\:\?\<\>]+$/i.test(newpswrd))) {
                        message = 'Allowed characters in Password: A-Z, a-z, 0-9 & special characters';
                        $('#newpswrd').focus();
                        CustomUtils.gritter({
                            'title': 'Error',
                            'text': message
                        }, 'error');
                        error = true;
                        return false;
                    }
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
                    url: CustomUtils.siteUrl() + 'acp/Staffs/save',
                    data: form.serialize(),
                    dataType: 'json',
                    async: false,
                    success: function(res) {
                        if (res.status == 'success') {
                            CustomUtils.gritter({
                                'title': res.title,
                                'text': res.message
                            }, res.status);
                            window.location = CustomUtils.siteUrl() + 'acp/Staffs';
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
            url: CustomUtils.siteUrl() + 'acp/Uploads/doUpload/staffs',
            maxFiles: 1,
            acceptedFiles: ".jpeg,.jpg,.png,.bmp,.webp",
            addRemoveLinks: true,
            paramName: 'file',
            dictDefaultMessage: 'Drop staff image here to upload',
            init: function() {
                this.on('complete', function(file) {
                    var filename = $.trim($('.dz-preview.dz-success.dz-complete').find('.dz-filename').text());
                    filename = filename.replace(/ /g, '_'); // replace all space
                    $('#staffImg').val(filename);
                }),
                this.on('removedfile', function(file) {
                    if (((file.name).replace(/ /g, '_')) == $('#staffImg').val()) {
                        $('#staffImg').val('');
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

    var change_password = function() {
        $('body').off('click', '#docp').on('click', '#docp', function(e) {
            e.preventDefault();
            var error = 0,
                validMsg = 'Oops! Something has went wrong.',
                validate = $(this).data('validOldPwd'),
                newpswrd = $('#new').val(),
                confirmpswrd = $('#confirmnew').val();

            if (newpswrd.trim() == '') {
                validMsg = 'Please enter new password';
                $('#new').focus();
                error = 1;
            } else if (confirmpswrd.trim() == '') {
                validMsg = 'Please confirm new password';
                $('#confirmnew').focus();
                error = 1;
            } else if (newpswrd.length < 8) {
                validMsg = 'Password must contain minimum 8 characters(Allowed: A-Z, a-z, 0-9 & special characters)';
                $('#new').focus();
                error = 1;
            } else if (!(/^[a-zA-Z0-9\~\!\@\#\$\%\^\&\*\'\"\[\]\{\}\(\)\-\_\+\=\;\:\?\<\>]+$/i.test(newpswrd))) {
                validMsg = 'Allowed characters in Password: A-Z, a-z, 0-9 & special characters';
                $('#new').focus();
                error = 1;
            } else if (newpswrd != confirmpswrd) {
                validMsg = 'New password & Confirm does not match';
                $('#confirmnew').val('').focus();
                error = 1;
            }

            if (error == 0) {
                if (validate == '1') {
                    // Do validate old paswrd
                    var oldpaswrd = $('#old').val();
                    if (oldpaswrd.trim() == '') {
                        validMsg = 'Please enter current password';
                        $('#old').focus();
                    } else {
                        $.ajax({
                            type: 'POST',
                            url: CustomUtils.siteUrl() + 'acp/Staffs/validate_password',
                            data: {'old': $('#old').val()},
                            dataType: 'json',
                            async: false,
                            success: function(res) {
                                if (res.status) {
                                    doChangePswrd(newpswrd);
                                } else {
                                    // Wrong old paswrd
                                    CustomUtils.gritter({
                                        'title': 'Error',
                                        'text': 'Current password is wrong'
                                    }, 'error');
                                }
                            }
                        });
                    }
                } else { 
                    // No validation for old paswrd > While pswrd reseting by the admin
                    doChangePswrd(newpswrd, 1);
                }
            } else {
                CustomUtils.gritter({
                    'title': 'Error',
                    'text': validMsg
                }, 'error');
            }
        });

        function doChangePswrd(newpswrd = '', redirect = 0) {
            $.ajax({
                type: 'POST',
                url: CustomUtils.siteUrl() + 'acp/Staffs/change_password',
                data: {'new': newpswrd, 'uid': $('#uid').val()},
                dataType: 'json',
                async: false,
                success: function(res) {
                    CustomUtils.gritter({
                        'title': res.title,
                        'text': res.message
                    }, res.status);
                    if (res.status == 'success') {
                        if (redirect == 1) {
                            setTimeout(() => {
                                window.location.replace(CustomUtils.siteUrl() + 'acp/Staffs');
                            }, 2000);
                        }
                    }
                }
            });
        }
    }

    return {
        init: function() {
            getStaffsTable();
            actions();
        },
        manageStaff: function() {
            addStaff();
            dropzoneUpload();
        },
        change_password: function() {
            change_password();
        }
    };

}(jQuery);
