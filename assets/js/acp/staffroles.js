var Staffroles = function() {

    var getStaffrolesTable = function() {
        var checkEL = setInterval(() => {
            if ($('.dataTable-Staffroles').length > 0) {
                clearInterval(checkEL);
                $.ajax({
                    type: 'POST',
                    url: CustomUtils.siteUrl() + 'acp/Roles/getStaffRolesTable',
                    success: function(res) {
                        $('.dataTable-Staffroles').html(res);
                        CustomUtils.initDataTable();
                    }
                });
            }
        }, 100);
    }

    var actions = function() {
        $('body').off('click', '.delete, .lock, .unlock').on('click', '.delete, .lock, .unlock', function() {
            var role = $(this).data('role'),
                action = $(this).data('action');

            if (action == '2') {
                $('.modal#confirm').off('click', '.btn-danger').on('click', '.btn-danger', function() {
                    doAction(action, role);
                });
            } else { 
                doAction(action, role);
            }
        });

        function doAction(action, role) {
            $.ajax({
                type: 'POST',
                url: CustomUtils.siteUrl() + 'acp/Roles/action',
                data: {'action': action, 'role': role},
                dataType: 'json',
                success: function(res) {
                    if (res.status == 'success') {
                        CustomUtils.gritter({
                            'title': res.title,
                            'text': res.message
                        }, res.status);
                        getStaffrolesTable();
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

    var addStaffRole = function() {
        $('body').on('click', '#saveRole', function(ev) {
            ev.preventDefault();
            var form = $('form#manageUserRole'),
                error = false,
                message = 'Oops! Something has went wrong!';

            permissions = [];
            $("input:checkbox:checked").each(function(){
                permissions.push($(this).val());
            });
            if (permissions.length == 0) {
                message = 'Allow access control cannot be empty';
                $("input:checkbox").focus();
                error = true;
                return false;
            }

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
                    url: CustomUtils.siteUrl() + 'acp/Roles/save',
                    data: form.serialize(),
                    dataType: 'json',
                    async: false,
                    success: function(res) {
                        if (res.status == 'success') {
                            CustomUtils.gritter({
                                'title': res.title,
                                'text': res.message
                            }, res.status);
                            window.location = CustomUtils.siteUrl() + 'acp/Roles';
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
            getStaffrolesTable();
            actions();
        },
        manageStaffRole: function() {
            addStaffRole();
        }
    };

}(jQuery);
