var Contactus = function() {
	
    var getContactusTable = function() {
        var checkEL = setInterval(() => {
            if ($('.dataTable-Contactus').length > 0) {
                clearInterval(checkEL);
                $.ajax({
                    type: 'POST',
                    url: CustomUtils.siteUrl() + 'acp/Contactus/getContactusTable',
                    success: function(res) {
                        $('.dataTable-Contactus').html(res);
                        CustomUtils.initDataTable();
                    }
                });
            }
        }, 100);
    }

    var actions = function() {
        $('body').off('click', '.delete').on('click', '.delete', function() {
            var qaid = $(this).data('qaid'),
                action = $(this).data('action');

            $('.modal#confirm').off('click', '.btn-danger').on('click', '.btn-danger', function() {
                $.ajax({
                    type: 'POST',
                    url: CustomUtils.siteUrl() + 'acp/Contactus/action',
                    data: {'action': action, 'qaid': qaid},
                    dataType: 'json',
                    success: function(res) {
                        if (res.status == 'success') {
                            CustomUtils.gritter({
                                'title': res.title,
                                'text': res.message
                            }, res.status);
                            getContactusTable();
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

    return {
        init: function() {
            getContactusTable();
            actions();
        },
    };

}(jQuery);