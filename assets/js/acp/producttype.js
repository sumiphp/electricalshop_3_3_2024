var Producttype = function() {

    var getProducttypeTable = function() {
        var checkEL = setInterval(() => {
            if ($('.dataTable-ProductTypes').length > 0) {
                clearInterval(checkEL);
                $.ajax({
                    type: 'POST',
                    url: CustomUtils.siteUrl() + 'acp/ProductDetailTypes/getProductTypesTable',
                    success: function(res) {
                        $('.dataTable-ProductTypes').html(res);
                        CustomUtils.initDataTable();
                    }
                });
            }
        }, 100);
    }

    var actions = function() {
        $('body').off('click', '.deleteProdType').on('click', '.deleteProdType', function() {
            var prodtype = $(this).data('prodtypeid'),
                action = $(this).data('action');

            $('.modal#confirm').off('click', '.btn-danger').on('click', '.btn-danger', function() {
                $.ajax({
                    type: 'POST',
                    url: CustomUtils.siteUrl() + 'acp/ProductDetailTypes/action',
                    data: {'action': action, 'prodtype': prodtype},
                    dataType: 'json',
                    success: function(res) {
                        if (res.status == 'success') {
                            CustomUtils.gritter({
                                'title': res.title,
                                'text': res.message
                            }, res.status);
                            getProducttypeTable();
                            $('[data-dismiss="modal"]').trigger('click');
                        } else {
                            CustomUtils.gritter({
                                'title': res.title,
                                'text': res.message
                            }, res.status);
                        }
                    }
                });
            });

            $('body').off('click', '[data-dismiss="modal"]').on('click', '[data-dismiss="modal"]', function() {
                $('.modal-backdrop.fade').fadeOut("slow");
            });
        });
    }

    var dataValidator = function() {
        $('body').on('click', '#saveTypeSubmit', function(ev) {
            ev.preventDefault();
            var mandatory = $('form#manageType').find('[name="mandatory"]:checked').val(),
                fieldtype = $('form#manageType').find('[name="fieldtype"]:checked').val(),
                error = false,
                message = 'Oops! Something has went wrong!';

            $('form#manageType').find('input').each(function() {
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

            if (error) {
                CustomUtils.gritter({
                    'title': 'Error',
                    'text': message
                }, 'error');
            } else {
                $.ajax({
                    type: 'POST',
                    url: CustomUtils.siteUrl() + 'acp/ProductDetailTypes/save',
                    data: $('form#manageType').serialize(),
                    dataType: 'json',
                    async: false,
                    success: function(res) {
                        if (res.status == 'success') {
                            CustomUtils.gritter({
                                'title': res.title,
                                'text': res.message
                            }, res.status);
                            window.location = CustomUtils.siteUrl() + 'acp/Productypes';
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
            getProducttypeTable();
            actions();
        },
        add: function() {
            dataValidator();
        },
    };

}(jQuery);
