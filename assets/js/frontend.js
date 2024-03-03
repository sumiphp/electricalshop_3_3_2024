var Frontend = function() {

    var addEnquiry = function() {
        $('body').on('click', '[name="submit"].contactusformbtn', function(ev) {
            ev.preventDefault();
            var form = $('form#contactusform'),
                error = false,
                message = 'Oops! Something has went wrong! Please try again after some time.';

            form.find('textarea:visible').each(function() {
                var fieldVal = $.trim($(this).val());
                if ((fieldVal == '') && ($(this).attr('required'))) {
                    var labelname = $(this).attr('placeholder');
                    labelname = labelname.replace("*", "");
                    message = labelname + ' cannot be empty';
                    $(this).focus();
                    error = true;
                    return false;
                }
            });

            form.find('select:visible').each(function() {
                var fieldVal = $.trim($(this).val());
                if ((fieldVal == '') && ($(this).attr('required'))) {
                    var labelname = $(this).attr('placeholder');
                    labelname = labelname.replace("*", "");
                    message = labelname + ' cannot be empty';
                    $(this).focus();
                    error = true;
                    return false;
                }
            });

            form.find('input.phoneValidation').each(function() {
                var fieldVal = $.trim($(this).val());
                var pattern = /^[0-9\s-+\(\)]{10,15}$/;

                if ((!pattern.test(fieldVal)) && ($(this).attr('required'))) {
                    var labelname = $(this).attr('placeholder');
                    labelname = labelname.replace("*", "");
                    message = labelname + ' is not valid';
                    setTimeout(() => { $(this).focus(); }, 7);
                    error = true;
                    return false;
                }
            });

            form.find('input.emailValidation').each(function() {
                var fieldVal = $.trim($(this).val());
                var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;

                if ((!pattern.test(fieldVal)) && ($(this).attr('required'))) {
                    var labelname = $(this).attr('placeholder');
                    labelname = labelname.replace("*", "");
                    message = labelname + ' is not valid';
                    setTimeout(() => { $(this).focus(); }, 5);
                    error = true;
                    return false;
                }
            });

            form.find('input:visible').each(function() {
                if (!$(this).hasClass('phoneValidation') && !$(this).hasClass('emailValidation')) {
                    var fieldVal = $.trim($(this).val());
                    if ((fieldVal == '') && ($(this).attr('required'))) {
                        var labelname = $(this).attr('placeholder');
                        labelname = labelname.replace("*", "");
                        message = labelname + ' cannot be empty';
                        setTimeout(() => { $(this).focus(); }, 9);
                        error = true;
                        return false;
                    }
                }
            });

            if ($('[name="enter_any_number"]').val() != '') {
                message = 'Oops! Something has went wrong! Please try again after some time.';
                error = true;
                return false;
            }

            if (error) {
                $('.infoMessage').text(message).css({'color':'red', 'border':'1px solid red', 'background-color':'#f4cdcd', 'padding':'10px 5px', 'border-radius':'5px', 'margin':'20px 0px'});
                setTimeout(() => {
                    $('.infoMessage').text('').css({'color':'none', 'border':'0px', 'background-color':'none', 'padding':'0px', 'border-radius':'0px', 'margin':'0px'});
                }, 5000);
            } else {
                $.ajax({
                    type: 'POST',
                    url: CustomUtils.siteUrl() + 'submit',
                    data: form.serialize(),
                    dataType: 'json',
                    async: false,
                    success: function(res) {
                        if (res.status == 'success') {
                            form[0].reset();
                            $('.infoMessage').text(res.message).css({'color':'green', 'border':'1px solid green', 'background-color':'#d2fad2', 'padding':'10px 5px', 'border-radius':'5px', 'margin':'20px 0px'});
                        } else {
                            $('.infoMessage').text(res.message).css({'color':'red', 'border':'1px solid red', 'background-color':'#f4cdcd', 'padding':'10px 5px', 'border-radius':'5px', 'margin':'20px 0px'});
                        }
                        setTimeout(() => {
                            $('.infoMessage').text('').css({'color':'none', 'border':'0px', 'background-color':'none', 'padding':'0px', 'border-radius':'0px', 'margin':'0px'});
                        }, 5000);
                    }
                });
            }
        });
    }

    var productSearchBar = function() {
        $('body').on('click', 'button[type="search"]', function(e) {
            e.preventDefault();
            var actionUrl = $(this).closest('form').attr('action'),
                start_date = $(this).closest('form').find('input[name="start_date"]').val(),
                end_date = $(this).closest('form').find('input[name="end_date"]').val(),
                age_confirmation = $(this).closest('form').find('#flexCheckDefault').is(':checked');

            if (start_date.trim() != '' && end_date.trim() != '') {
                $(this).closest('form').css('color','#212529');
                if (age_confirmation) {
                    $(this).closest('form').find('#flexCheckDefault').parent().css('color','#212529');
                    window.location.replace(actionUrl + '?sd=' + start_date + '&ed=' + end_date);
                } else {
                    $(this).closest('form').find('#flexCheckDefault').parent().css('color','#E63131');
                }
            } else {
                $(this).closest('form').css('color','#E63131');
            }
        });
    }

    return {
        addEnquiry: function() {
            addEnquiry();
        },
        productSearchBar: function() {
            productSearchBar();
        },
    };

}(jQuery);
