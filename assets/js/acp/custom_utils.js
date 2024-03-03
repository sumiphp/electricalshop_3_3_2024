
var CustomUtils = function () {
    var site_url = '',
        current_year = '';

    var initUtils = function (data) {
		site_url = data.site_url||window.location.protocol + '//' + window.location.host + '/';
		current_year = new Date().getFullYear();
	}

    var addGritter = function(data, status, showtime) {
        var default_opts = {
            title: '',
            text: '',
            image: '',
            sticky: false
        }
        var statusClass = '';
    
        if (typeof status !== 'undefined') {
            if (typeof status !== 'boolean') {
                statusClass = 'gritter-' + status;
                default_opts.image = CustomUtils.siteUrl() + 'assets/images/icon-' + status + '.png';
            } else {
                if (status) {
                    statusClass = 'gritter-success';
                    default_opts.image = CustomUtils.siteUrl() + 'assets/images/icon-success.png';
                } else {
                    statusClass = 'gritter-error';
                    default_opts.image = CustomUtils.siteUrl() + 'assets/images/icon-error.png';
                }
            }
        }
    
        if (typeof data === 'object') {
            var opt = $.extend(true, default_opts, data || {});
        } else {
            var opt = $.extend(true, default_opts, {
                text: data
            });
        }
    
        if (opt.text != '') {
            if (opt.class_name) {
                opt.class_name = statusClass + ' ' + $.trim(opt.class_name);
            } else {
                opt.class_name = statusClass;
            }
            $.lazyLoad(
                [
                    CustomUtils.siteUrl() + 'assets/plugins/gritter/css/jquery.gritter.css',
                    CustomUtils.siteUrl() + 'assets/plugins/gritter/js/jquery.gritter.js'
                ],
                function() {
                    $.extend(true, $.gritter.options, {
                        position: 'bottom-right',
                        fade_in_speed: 250,
                        fade_out_speed: 250,
                        time: showtime
                    });
                    $.gritter.add(opt);
                }
            )
        }
    }
    
    var blockUI = function (msg,param, $element = null) {
        var msg = msg || 'Loading...';
        if(param != undefined) globalLoader = param;
        if(!$('.blockUI.blockOverlay').length) {
    
            var blockData = {
                baseZ: 999999999,
                message: '<img src="'+ CustomUtils.siteUrl() + 'assets/images/icon/loader.gif" style="width: 40px; margin-bottom:5px;" align="middle"><br><span style="font-weight:300; color: #eee; font-size: 18px; font-family:Open Sans;">&nbsp;'+ msg +'</span>',
                css: {
                    backgroundColor: 'transparent',
                    color: '#fff',
                    border: 'none'
                }
            };
            if($element) $element.block(blockData); else $.blockUI(blockData);
        }
    };
    
    var unblockUI = function (param, $element = null) {
        if(globalLoader == param) globalLoader = '';
        if($element) $element.unblock(); else $.unblockUI();
    };

    var inputMask = function (el, mask, data) {
    	var data = data||$(el).data();
    	$.lazyLoad(
    		[
    			CustomUtils.siteUrl() + 'assets/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js'
    		],
    		function () {
    			$.extend($.inputmask.defaults, {
		        	'autounmask': true
		        });
		       $(el).inputmask(mask, data);
    		}
    	);    	
    }

    var inputMaskURL = function () {
    	//input field onclick show http://wwww
    	$('body').on('focus','[data-mask="url"]',function(){		
			if(!$(this).val())
			{
				$(this).val('http://www.');
			}
		});
    }

    var initDataTable = function() {
        var oTable = $('.listingPage').dataTable( {
            "sScrollY": "350px",
            "bPaginate": true,
            "aoColumnDefs": [
                { "bSortable": false, "aTargets": [ parseInt($('.listingPage:first th:visible').length) - 1 ] }, 
                { "bSearchable": false, "aTargets": [ parseInt($('.listingPage:first th:visible').length) - 1 ] }
            ]
        });
        $(window).on('resize', function () {
            oTable.fnAdjustColumnSizing();
        });
        $('body').on('click', '.sidebarSwitch', function() {
            oTable.fnAdjustColumnSizing();
        });
        $('.modal').off('click', '[data-dismiss="modal"]').on('click', '[data-dismiss="modal"]', function() {
            $('.modal-backdrop.fade').fadeOut("slow");
        });
    }

	return {
        init: function(data) {
            initUtils(data);
        },
        siteUrl: function () {
			return site_url;
		},
        blockUI: function (msg,param, $element = null) {
            blockUI(msg,param, $element);
        },
        unblockUI: function (param, $element = null) {
            unblockUI(param, $element);			
        },		
        gritter: function (data, status, showtime) {
            showtime = showtime || 1500;
            addGritter(data, status, showtime);
        },
        inputMask: function (el, mask, data) {
            inputMask(el, mask, data);
        },
        inputMaskURL: function() {
            inputMaskURL();
        },
        initDataTable: function() {
            initDataTable();
        },
    };

}(jQuery);