var customers = function() {

    alert("en");
    var getCustomersTable = function() {
        var checkEL = setInterval(() => {
            if ($('.dataTable-Customers').length > 0) {
                clearInterval(checkEL);
                $.ajax({
                    type: 'POST',
                    //url: CustomUtils.siteUrl() + 'acp/Customers/getCustomersTable',
                    url: CustomUtils.siteUrl() + 'acp/Settings/getcustomersTable',
                    success: function(res) {
                       alert("en---");
                        $('.dataTable-Customers').html(res);
                        CustomUtils.initDataTable();
                    }
                });
            }
        }, 100);
    }

    var actions = function() {
        $('body').off('click', '.delete, .lock, .unlock').on('click', '.delete, .lock, .unlock', function() {
            var customer = $(this).data('custid'),
                action = $(this).data('action');

            if (action == '2') {
                $('.modal#confirm').off('click', '.btn-danger').on('click', '.btn-danger', function() {
                    doAction(action, customer);
                });
            } else { 
                doAction(action, customer);
            }
        });

        function doAction(action, customer) {
            $.ajax({
                type: 'POST',
                url: CustomUtils.siteUrl() + 'acp/Customers/action',
                data: {'action': action, 'customer': customer},
                dataType: 'json',
                success: function(res) {
                    if (res.status == 'success') {
                        CustomUtils.gritter({
                            'title': res.title,
                            'text': res.message
                        }, res.status);
                        getCustomersTable();
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

    var addCustomer = function() {
        $('body').on('click', '#saveCustomerSubmit', function(ev) {
            ev.preventDefault();
            var form = $('form#manageCustomers'),
                error = false,
                message = 'Oops! Something has went wrong!';

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

            if (error) {
                CustomUtils.gritter({
                    'title': 'Error',
                    'text': message
                }, 'error');
            } else {
                $.ajax({
                    type: 'POST',
                    url: CustomUtils.siteUrl() + 'acp/Customers/save',
                    data: form.serialize(),
                    dataType: 'json',
                    async: false,
                    success: function(res) {
                        if (res.status == 'success') {
                            CustomUtils.gritter({
                                'title': res.title,
                                'text': res.message
                            }, res.status);
                            window.location = CustomUtils.siteUrl() + 'acp/Customers';
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

    return {
        init: function() {
            getCustomersTable();
            actions();
        },
        manageCustomer: function() {
            addCustomer();
        },
    };

}(jQuery);
