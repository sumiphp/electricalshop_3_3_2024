
var Login = function () {

    var loginValidator = function() {
        $('body').on('click', '#form_submit', function(ev){
            ev.preventDefault();
            var uname = $.trim($('#username').val()),
                upass = $.trim($('#userpswrd').val()),
                error = true,
                message = 'Something has went wrong!';
            if (uname == '') {
                message = 'Username cannot be empty';
                error = false;
            } else if (upass == '') {
                message = 'Password cannot be empty';
                error = false;
            }
            
            if (!error) {
                CustomUtils.gritter({
                    'title': 'Error',
                    'text': message
                }, 'error');
            } else {
                $.ajax({
                    type: 'POST',
                    url: CustomUtils.siteUrl() + 'acp/Login/check_access',
                    data: {'uname':uname,'upass':upass},
                    dataType: 'json',
                    async:false,
                    success: function(res){
                        if (res.status == 'success') {
                            CustomUtils.gritter({
                                'title': res.title,
                                'text': res.message
                            }, res.status);
                            window.location = CustomUtils.siteUrl() + res.redirect;
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
        	loginValidator();
        }
    };

}(jQuery);