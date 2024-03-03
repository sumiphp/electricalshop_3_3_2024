var TnC = function() {

    var initEditor = function() {
        // https://froala.com/wysiwyg-editor/examples/
        // https://froala.com/wysiwyg-editor/docs/options/
        // https://froala.com/wysiwyg-editor/docs/events/
        var editor = new FroalaEditor('#tnc_content', {
            // key: 'ACTIVATION_KEY',
            height: 360,
            zIndex: 1,
            dragInline: false,
            toolbarBottom: false,
            videoResponsive: true,
            enter: FroalaEditor.ENTER_BR,
            fileUpload: true,
            fileUploadMethod: 'POST',
            fileUploadParam: 'file',
            fileUploadURL: CustomUtils.siteUrl() + 'acp/Uploads/doUpload/tnc',
            fileAllowedTypes: ['application/pdf','application/msword','video/mp4','video/webm','image/png', 'image/jpg', 'image/jpeg'],
            fileMaxSize: 1024 * 1024 * 3,
            
            placeholderText: 'Enter Our Policies here...',
            toolbarButtons: [['bold', 'italic', 'underline', 'paragraphFormat', 'align', 'undo', 'redo'], ['fontFamily', 'fontSize', 'textColor', 'backgroundColor', 'clearFormatting'], ['insertImage', 'insertLink', 'insertTable', 'emoticons', 'fontAwesome'], ['p', 'div', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'pre', 'blockquote'], ['ul', 'ol', 'hr'], ['clear', 'fullscreen'], ['getPDF']],

            imageAllowedTypes: ['jpeg', 'jpg', 'png', 'gif', 'webp'],
            imageMaxSize: 1024 * 1024 * 3,
            imageEditButtons: ['imageReplace', 'imageAlign', 'imageCaption', 'imageRemove', '|', 'imageLink', 'linkOpen', 'linkEdit', 'linkRemove', '-', 'imageDisplay', 'imageStyle', 'imageAlt', 'imageSize'],
            imageUploadParam: 'file',
            imageUploadURL: CustomUtils.siteUrl() + 'acp/Uploads/doUpload/tnc',
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
        $('body').on('click', '.close.confirmaction', function() {
            $('body').find('form#manageTnC').find('.submit-btn-area').css({'display': 'block'});
        });

        $('body').on('click', '#saveTnC', function(ev) {
            ev.preventDefault();
            var error = false,
                message = 'Oops! Something has went wrong!',
                tnc = '';
            
            editor = new FroalaEditor('div#tnc_content');
            tnc = editor.html.get();
            tnc = tnc.replace('<p data-f-id="pbf" style="text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;">Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a></p>', '');
            if (!error && $.trim(tnc) == '') {
                message = 'Our Policies cannot be empty';
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
                    url: CustomUtils.siteUrl() + 'acp/TermsandConditions/save',
                    data: {'tnc': tnc },
                    dataType: 'json',
                    async: false,
                    success: function(res) {
                        if (res.status == 'success') {
                            CustomUtils.gritter({
                                'title': res.title,
                                'text': res.message
                            }, res.status);
                            window.location = CustomUtils.siteUrl() + 'acp/TermsandConditions';
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
        save: function() {
            dataValidator();
        },
    };

}(jQuery);