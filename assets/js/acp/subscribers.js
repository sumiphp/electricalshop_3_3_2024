var Subscribers = function() {

    var getSubscribersTable = function() {
        var checkEL = setInterval(() => {
            if ($('.dataTable-Subscribers').length > 0) {
                clearInterval(checkEL);
                $.ajax({
                    type: 'POST',
                    url: CustomUtils.siteUrl() + 'acp/Subscribers/getSubscribersTable',
                    success: function(res) {
                        $('.dataTable-Subscribers').html(res);
                        CustomUtils.initDataTable();
                    }
                });
            }
        }, 100);
    }

    var actions = function() {
        $('body').off('click', '.unsubscribe').on('click', '.unsubscribe', function() {
            var cid = $(this).data('custid');

            $('.modal#confirm').off('click', '.btn-danger').on('click', '.btn-danger', function() {
                $.ajax({
                    type: 'POST',
                    url: CustomUtils.siteUrl() + 'acp/Subscribers/unsubscribe',
                    data: {'cid': cid},
                    dataType: 'json',
                    success: function(res) {
                        if (res.status == 'success') {
                            CustomUtils.gritter({
                                'title': res.title,
                                'text': res.message
                            }, res.status);
                            getSubscribersTable();
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
        });

        $('body').off('click', '[data-dismiss="modal"]').on('click', '[data-dismiss="modal"]', function() {
            $('.modal-backdrop.fade').fadeOut("slow");
        });
    }

    return {
        init: function() {
            getSubscribersTable();
            actions();
        },
    };

}(jQuery);