var Blogs = function() {

    var getBlogsTable = function() {
        var checkEL = setInterval(() => {
            if ($('.dataTable-Blogs').length > 0) {
                clearInterval(checkEL);
                $.ajax({
                    type: 'POST',
                    url: CustomUtils.siteUrl() + 'acp/Blogs/getBlogsTable',
                    success: function(res) {
                        $('.dataTable-Blogs').html(res);
                        CustomUtils.initDataTable();
                    }
                });
            }
        }, 100);
    }

    var actions = function() {
        $('body').off('click', '.delete, .draft, .publish').on('click', '.delete, .draft, .publish', function() {
            var blog = $(this).data('bid'),
                action = $(this).data('action');

            if (action == '0') {
                $('.modal#confirm').off('click', '.btn-danger').on('click', '.btn-danger', function() {
                    doAction(action, blog);
                });
            } else { 
                doAction(action, blog);
            }
        });

        function doAction(action, blog) {
            $.ajax({
                type: 'POST',
                url: CustomUtils.siteUrl() + 'acp/Blogs/action',
                data: {'action': action, 'blog': blog},
                dataType: 'json',
                success: function(res) {
                    if (res.status == 'success') {
                        CustomUtils.gritter({
                            'title': res.title,
                            'text': res.message
                        }, res.status);
                        getBlogsTable();
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

        $('body').off('click', '[data-dismiss="modal"]').on('click', '[data-dismiss="modal"]', function() {
            $('.modal-backdrop.fade').fadeOut("slow");
        });
    }

    var addBlog = function() {
        $('body').on('keyup focus', '#blog_name', function() {
            var text = $(this).val();
            if (text.trim() != '') {
                $.ajax({
                    type: 'POST',
                    url: CustomUtils.siteUrl() + 'acp/Blogs/doSlugify',
                    data: {'text': text, 'except': $('#blog_id').val()},
                    dataType: 'json',
                    success: function(res) {
                        if (res.status == 'success') {
                            $('#blog_canonial_name').val(res.slugText);
                            $('#show_canonial_name').text(res.slugText);
                        }
                    }
                });
            } else {
                $('#blog_canonial_name').val(''); //Clear slug
            }
        });

        $('body').on('click', '#saveBlogSubmit', function(ev) {
            ev.preventDefault();
            var form = $('form#manageBlogs'),
                error = false,
                message = 'Oops! Something has went wrong!';

            // 0:Trashed; 1:Draft; 2:Published;
            if ($(this).hasClass('draftBlog')) blog_status = 1;
            else if ($(this).hasClass('publishBlog')) blog_status = 2;

            var blog_optin = form.find('#blog_notify:checked').length;

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

            if ($('#blog_featured_image').val() == '') {
                CustomUtils.gritter({
                    'title': 'Error',
                    'text': 'Please add a featured image to this blog'
                }, 'error');
                error = true;
                return false;
            }

            blogContent = new FroalaEditor('div#blogContent').html.get(true);
            blogContent = blogContent.replace('<p data-f-id="pbf" style="text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;">Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a></p>', '');
            if (!error && $.trim(blogContent) == '') {
                message = 'Content cannot be empty';
                error = true;
            }

            if (error) {
                CustomUtils.gritter({
                    'title': 'Error',
                    'text': message
                }, 'error');
            } else {
                var imgdesc = [];
                $('[name="pimgdesc[]"]').each(function() {
                    var fld = $(this).attr('id');
                    imgdesc.push({title: $(this).attr('id'), val: $('#'+fld).val()});
                });
                $.ajax({
                    type: 'POST',
                    url: CustomUtils.siteUrl() + 'acp/Blogs/save',
                    data: {'blog_id': $('#blog_id').val(), 'blog_name': $('#blog_name').val(), 'blog_canonial_name': $('#blog_canonial_name').val(), 'blog_subject': $('#blog_subject').val(), 'blogContent': blogContent, 'blog_featured_image': $('#blog_featured_image').val(), 'blogImages': $('#blogImages').val(), 'imgdesc': imgdesc, 'blog_notify': blog_optin, 'blog_status': blog_status},
                    dataType: 'json',
                    async: false,
                    success: function(res) {
                        if (res.status == 'success') {
                            CustomUtils.gritter({
                                'title': res.title,
                                'text': res.message
                            }, res.status);
                            window.location = CustomUtils.siteUrl() + 'acp/Blogs';
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
            url: CustomUtils.siteUrl() + 'acp/Uploads/doUpload/blogs',
            maxFiles: 10,
            acceptedFiles: ".jpeg,.jpg,.png,.bmp,.webp,.svg,.gif",
            addRemoveLinks: true,
            paramName: 'file',
            dictDefaultMessage: 'Drop featred image here to upload',
            init: function() {
                this.on('complete', function(file) {
                    $('.dz-preview.dz-success.dz-complete').each(function() {
                        var filename = $.trim($(this).find('.dz-filename').text());
                        filename = filename.replace(/ /g, '_'); // replace all space
                        if ($(this).find('.primBtn').length == 0) {
                            $(this).append('<button type="button" data-pimg="'+filename+'" class="btn btn-flat btn-success btn-xs ml-2 primBtn '+(($('#blog_featured_image').val() == '')? 'isPrimaryImage' : 'makePrimaryImage')+'">'+(($('#blog_featured_image').val() == '')? 'Primary Image' : 'Make Primary')+'</button>');
                            var blogImages = $('#blogImages').val();
                            if (blogImages.indexOf('~'+filename+'~,') < 0) {
                                blogImages += '~'+filename+'~,';
                                $('#blogImages').val(blogImages);
                            }
                        }
                        if ($('.dropzoneDetailed').find('#imageDesc_'+(filename.replace('.','_'))).length == 0) {
                            $('.dropzoneDetailed').append('<div id="imageDesc_'+(filename.replace('.','_'))+'" class="blogimagedetails row mt-3"><div class="col-1 pimg pl-4" style="border-radius: 50%;height: 50px;width: 50px;"><img src="'+CustomUtils.siteUrl()+'assets/uploads/blogs/'+filename+'" style="border-radius: 50%;height: 50px;width: 50px;padding:2px;"></div><div class="col-11 pimgdesc"><div class="for"><div class="col-md-12 mt-s3 cdard-body"><textarea class="form-control" id="pimgdesc_'+filename.replace('.','_')+'" name="pimgdesc[]" placeholder="Enter image description"></textarea></div></div></div></div>');
                        }
                        if ($('#blog_featured_image').val() == '') {
                            $('#blog_featured_image').val(filename);
                            $('.dropzoneDetailed').find('#imageDesc_'+($('#blog_featured_image').val().replace('.','_'))).find('img').addClass('btn-success');
                        }
                    });
                }),
                this.on('removedfile', function(file) {
                    filename = (file.name).replace(/ /g, '_');
                    if (filename == $('#blog_featured_image').val()) {
                        if ($('.dropzone').find('[data-pimg="'+filename+'"]').length == 0) {
                            $('#blog_featured_image').val('');
                            var blogImages = $('#blogImages').val();
                            if (blogImages.indexOf('~'+filename+'~,') > -1) {
                                blogImages = blogImages.replace('~'+filename+'~,', '');
                                $('#blogImages').val(blogImages);
                            }
                        }
                        if ($('.dropzoneDetailed').find('#imageDesc_'+((filename).replace('.','_'))).length > 0) {
                            $('.dropzoneDetailed').find('#imageDesc_'+((filename).replace('.','_'))).remove();
                        }
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

        // making blog image as primary
        $('body').off('click', '.makePrimaryImage').on('click', '.makePrimaryImage', function() {
            console.log('Make primary: '+$(this).data('pimg'))
            $('.dropzone').find('.isPrimaryImage').removeClass('isPrimaryImage').addClass('makePrimaryImage').text('Make Primary');
            $('#blog_featured_image').val($(this).data('pimg'));
            $(this).removeClass('makePrimaryImage').addClass('isPrimaryImage').text('Primary Image');
            if ($('.dropzoneDetailed').find('#imageDesc_'+(($(this).data('pimg')).replace('.','_'))).length > 0) {
                $('.dropzoneDetailed').find('.pimg').find('img').removeClass('btn-success');
                $('.dropzoneDetailed').find('#imageDesc_'+(($(this).data('pimg')).replace('.','_'))).find('img').addClass('btn-success');
            }
            CustomUtils.gritter({
                'title': 'Success',
                'text': $(this).data('pimg')+' set as Featured image for this blog.'
            }, 'success');
        });

        // on removing primary image
        $('body').off('click', '.dz-remove').on('click', '.dz-remove', function() {
            if ($(this).closest('div').find('.isPrimaryImage').length > 0) {
                console.log('Removed primary image: '+$('#blog_featured_image').val());
                var blogImages = $('#blogImages').val();
                if (blogImages.indexOf('~'+$('#blog_featured_image').val()+'~,') > -1) {
                    blogImages = blogImages.replace('~'+$('#blog_featured_image').val()+'~,', '');
                    $('#blogImages').val(blogImages);
                }
                $('#blog_featured_image').val('');                
            }
        });
    }

    var initEditor = function() {
        // https://froala.com/wysiwyg-editor/examples/
        // https://froala.com/wysiwyg-editor/docs/options/
        // https://froala.com/wysiwyg-editor/docs/events/
        var editor = new FroalaEditor('#blogContent', {
            // key: 'ACTIVATION_KEY',
            height: 500,
            zIndex: 0,
            dragInline: false,
            toolbarBottom: false,
            videoResponsive: true,
            enter: FroalaEditor.ENTER_DIV,
            
            fileUpload: true,
            fileUploadMethod: 'POST',
            fileUploadParam: 'file',
            fileUploadURL: CustomUtils.siteUrl() + 'acp/Uploads/doUpload/blogs',
            fileAllowedTypes: ['application/pdf', 'application/msword', 'video/mp4', 'video/webm', 'image/png', 'image/jpg', 'image/jpeg'],
            fileMaxSize: 1024 * 1024 * 3,

            placeholderText: 'Enter your blog content here...',
            toolbarButtons: [['bold', 'italic', 'underline', 'align', 'undo', 'redo'], ['fontFamily', 'fontSize', 'textColor', 'backgroundColor'], ['inlineStyle', 'paragraphStyle', 'clearFormatting'], ['paragraphFormat', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote'], ['insertImage', 'insertLink', 'insertTable', 'emoticons', 'fontAwesome', 'html'], ['clear', 'fullscreen'], ['getPDF']],

            imageEditButtons: ['imageReplace', 'imageAlign', 'imageCaption', 'imageRemove', '|', 'imageLink', 'linkOpen', 'linkEdit', 'linkRemove', '-', 'imageDisplay', 'imageStyle', 'imageAlt', 'imageSize'],
            imageAllowedTypes: ['jpeg', 'jpg', 'png', 'gif', 'webp'],
            imageMaxSize: 1024 * 1024 * 3,
            imageUploadParam: 'file',
            imageUploadURL: CustomUtils.siteUrl() + 'acp/Uploads/doUpload/blogs',
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

    return {
        init: function() {
            getBlogsTable();
            actions();
        },
        initEditor: function() {
            initEditor();
        },
        manageBlog: function() {
            addBlog();
            dropzoneUpload();
        },
    };

}(jQuery);