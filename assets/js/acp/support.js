var Support = function() {

    var initEditor = function() {
        // https://froala.com/wysiwyg-editor/examples/
        // https://froala.com/wysiwyg-editor/docs/options/
        // https://froala.com/wysiwyg-editor/docs/events/
        var editor = new FroalaEditor('#ticketMessage', {
            // key: 'ACTIVATION_KEY',
            height: 500,
            zIndex: 1,
            dragInline: false,
            toolbarBottom: false,
            videoResponsive: true,
            enter: FroalaEditor.ENTER_BR,
            fileUpload: true,
            fileUploadMethod: 'POST',
            fileUploadParam: 'file',
            fileUploadURL: CustomUtils.siteUrl() + 'acp/Uploads/doUpload/askforservice',
            fileAllowedTypes: ['application/pdf','application/msword','video/mp4','video/webm','image/png'],
            fileMaxSize: 1024 * 1024 * 3,
            placeholderText: 'Enter your message here...',
            toolbarButtons: [['bold', 'italic', 'underline', 'paragraphFormat', 'align', 'undo', 'redo'], ['fontFamily', 'fontSize', 'textColor', 'backgroundColor', 'clearFormatting'], ['insertImage', 'insertLink', 'insertTable', 'emoticons', 'fontAwesome'], ['clear', 'fullscreen'], ['getPDF']],

            imageEditButtons: ['imageReplace', 'imageAlign', 'imageCaption', 'imageRemove', '|', 'imageLink', 'linkOpen', 'linkEdit', 'linkRemove', '-', 'imageDisplay', 'imageStyle', 'imageAlt', 'imageSize'],
            imageAllowedTypes: ['jpeg', 'jpg', 'png', 'gif', 'webp'],
            imageMaxSize: 1024 * 1024 * 3,
            imageUploadParam: 'file',
            imageUploadURL: CustomUtils.siteUrl() + 'acp/Uploads/doUpload/askforservice',
            imageUploadMethod: 'POST',
        });
        
        FroalaEditor.DefineIcon('clear', {NAME: 'remove', SVG_KEY: 'remove'});
        FroalaEditor.RegisterCommand('clear', {
            title: 'Clear HTML',
            focus: false,
            undo: true,
            refreshAfterCallback: true,
            callback: function () {
            this.html.set('');
            this.events.focus();
            }
        });
    }

    var dataValidator = function() {
        $('body').on('click', '#saveTicket', function(ev) {
            ev.preventDefault();
            var error = false,
                message = 'Oops! Something has went wrong!',
                ticketMessage = '';

            $('form#manageSupport').find('textarea').each(function() {
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

            $('form#manageSupport').find('input').each(function() {
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

            $('form#manageSupport').find('select').each(function() {
                var fieldVal = $.trim($(this).find('option:selected').val());
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
            
            editor = new FroalaEditor('div#ticketMessage');
            ticketMessage = editor.html.get();
            ticketMessage = ticketMessage.replace('<p data-f-id="pbf" style="text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;">Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a></p>', '');
            if (!error && $.trim(ticketMessage) == '') {
                message = 'Content cannot be empty';
                error = true;
            }

            if (error) {
                CustomUtils.gritter({
                    'title': 'Error',
                    'text': message
                }, 'error');
            } else {
                $.ajax({
                    type: 'POST',
                    url: CustomUtils.siteUrl() + 'acp/AskforSupport/send',
                    data: {'ticket_type': $('#ticket_type option:selected').val(), 'ticket_priority': $('#ticket_priority option:selected').val(), 'subject': $('#ticketTitle').val(), 'ticketMessage': ticketMessage },
                    dataType: 'json',
                    async: false,
                    success: function(res) {
                        if (res.status == 'success') {
                            CustomUtils.gritter({
                                'title': res.title,
                                'text': res.message
                            }, res.status);
                            window.location = CustomUtils.siteUrl() + 'acp/AskforSupport';
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
            initEditor();
        },
        send: function() {
            dataValidator();
        },
    };

}(jQuery);