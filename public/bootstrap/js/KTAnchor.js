(function($){

	var $ = jQuery;

	$.extend({

		KTAnchor: {

			// version
			version : "1.0.1",

			// ajax : set default response_container
			response_container : ".body-content-right",

			// paging : set default paging_container
			paging_container : "#paging-container",

			// paging : set default paging_limit
			paging_limit : 30,

			// paging : the paging url parment ,  &.. or /..
			paging_symbol : "&cc",

			// 鼠标滚动的积累值
			wheel_delta : 0,

			// 如果是移动端浏览器
			mobile_browser : !!navigator.userAgent.match(/AppleWebKit.*Mobile.*/)||!!navigator.userAgent.match(/AppleWebKit/),

			// 默认进度条没有完成
			request_process_complete : false,

			/* init parment
			 *
			 * options.response_container
			 * options.paging_limit
			 * options.paging_symbol
			 */
			init: function(options){

				// init response_container
				if (typeof(options.response_container)=="string") {
					this.response_container = options.response_container;
				}
				// init paging_limit
				if (typeof(options.paging_limit)=="number" && options.paging_limit>=1) {
					this.paging_limit = options.paging_limit;
				}
				// init paging_symbol
				if (typeof(options.paging_symbol)=="string" && /[\/|&]\w+/.test(options.paging_symbol)) {
					this.paging_symbol = options.paging_symbol;
				}
				// init paging_container
				if (typeof(options.paging_container)=="string") {
					this.paging_container = options.paging_container;
				}
				// init dropdown_container
				if (typeof(options.dropdown_container)=="string") {
					this.dropdown_container = options.dropdown_container;
				}
				// init treemenu_container
				if (typeof(options.treemenu_container)=="string") {
					this.treemenu_container = options.treemenu_container;
				}
				// init mousewheel_container
				if (typeof(options.scroll_container)=="string") {
					this.scroll_container = options.scroll_container;
				}
			},

			showSlidMessage: function(message){
				var alert_elt = $(".alert");
				if (alert_elt.data("first-click")==null) {
					// 不冒泡
					alert_elt.bind("click", function(e){
						e.stopPropagation();
					});
					//
					alert_elt.data("first-click", "first-click");
				}
				// 弹出和弹出动画
				$(".alert-message").html(message);
				alert_elt.css({bottom:30,opacity:0,display:"block"}).animate({bottom:6,opacity:1}, 'fast' , function(){
					// 绑定界面点击时关闭弹出
					$(document.body).bind("click touchend", function(e){
						// 关闭动画
						alert_elt.animate({opacity: 0}, function(){
							$(".alert-message").html(message);
							alert_elt.css({display:"none"});
							$(document.body).unbind("click touchend");
						});
						e.stopPropagation();
					});
				});
			},

			inputError: function(input, message){
				// 关闭之间弹出的错误信息
				$(".input-error-pop").css("display", "none");
				// 获取 input , input 和 错误信息存放的容器，错误信息的层
				var $input = $(input);
				var $input_box = $input.parent().parent();
				var $error_pop = $input_box.find(".input-error-pop");
				// 如果错误信息层不存在，就创建
				if ($error_pop.length==0) {
					$input_box.append("<dd class=\"input-error-pop radius-4\"><b class=\"angle-up input-error-angle\"></b> &nbsp; "+message+"</dd>");
				}
				// 显示这个错误信息
				$error_pop.css("display", "block");
				$input.context.focus();

				if ($input.data("change")!=true) {
					$input.bind('input change blur',function(ev){
						if ($input_box.children(".input-error-pop").exist()) {
							$input_box.children(".input-error-pop").css("display", "none");
						}
					});
					$input.data("change", true);
				}
			},

			success: function(container, responseText){
				// 如果获取到一个 json
				if (typeof(responseText)=="object" && typeof(responseText.action)=="string") {
					if (responseText.action=="redirect") {
						window.location = responseText.url;
					}
					else if (responseText.action=="showMessage") {
						$.KTAnchor.showSlidMessage(responseText.message);
					}
				}
				else if (typeof(responseText)=="object") {
					// 填充
					$(container).empty();
					$(container).html("{<div style=\"padding-left:20px;\">" + $.KTPrintr(responseText) + "</div>}");
				}
				else if (/^<script>(.+)<\/script>$/.test(responseText)) {
					var response = responseText.match(/<script>(.+)<\/script>/);
					eval(response[1]);
				}
				// 请求到的文本
				else {
					// 填充
					$(container).empty();
					$(container).html(responseText);
					// 填充完后重新设定填充区域内的 KTLoader
					$(container).KTLoader();
					// 检查有无滚动条需要重置
					// $(container).parent($.KTAnchor.scroll_container).ktScrollReset();
				}
			},

			error: function(container, XMLHttpRequest){
				if (typeof(XMLHttpRequest.responseJSON)=="object" && typeof(XMLHttpRequest.responseJSON.action)=="string") {
					var responseJSON = XMLHttpRequest.responseJSON;
					if (responseJSON.action=="redirect") {
						window.location = responseText.url;
					}
					else if (responseJSON.action=="showMessage") {
						$.KTAnchor.showSlidMessage("Error : " + XMLHttpRequest.status + ' - ' + responseJSON.message);
					}
				}
				else if (typeof(XMLHttpRequest.responseJSON)=="object") {
					// 填充
					$(container).empty();
					$(container).html("{<div style=\"padding-left:20px;\">" + $.KTPrintr(XMLHttpRequest.responseJSON) + "</div>}");
				}
				else {
					$.KTAnchor.showSlidMessage("Error : " + XMLHttpRequest.status);
				}
			},

			begin: function(){
				$.KTLog("JQuery.KTAnchor.begin");
			},

			complete: function(container, XMLHttpRequest){
				$.KTLog("JQuery.KTAnchor.complete : " + container);
			},

			// 弹出窗口
		    popupLoader : function(url){
		    	// 进度条开始
				//$.KTAnchor.setRequestProcess(0);
		    	var popup_elt = $(".popup-model");
		    	var body_elt = $(".popup-model .modal-body").empty();
		    	var title_elt = $(".popup-model .modal-title").html("Loading...");
		    	body_elt.load(url,function(){
		    		//$.KTAnchor.completeRequestProcess();
		    		popup_elt.modal('show');
					body_elt.KTLoader();
					// 加载 title
					var popup_title = body_elt.find(".popup-title").html();
					title_elt.html(popup_title ? popup_title : 'Loading...');
		        });
		    },

			// 左侧菜单被选中
		    treemenuSelected : function(location_url) {
		        // 获取当前 URL
				// var location_url = url;//'http://panda.doopp.com/admin/tracklog';//window.location.href;
				var url_pattern  = /^https?:\/\/[^\/]+(\/[^\/\?]+)(\/[^\/\?]+)?(\/[^\/\?]+)?(\/[^\/\?]+)?/;
				//
				if (location_url.substr(0,1)=="/") {
					url_pattern = /^(\/[^\/\?]+)(\/[^\/\?]+)?(\/[^\/\?]+)?(\/[^\/\?]+)?/;
				}
				var url_match    = location_url.match(url_pattern);
				if (url_match==null) {
					return null;
				}
				// 从长到短获取节点
				var menu_elt = $($.KTAnchor.treemenu_container + " a[href='" + url_match[1] + url_match[2] + url_match[3] + url_match[4] + "']");
				if (!menu_elt.exist()) {
					menu_elt = $($.KTAnchor.treemenu_container + " a[href='" + url_match[1] + url_match[2] + url_match[3] + "']");
				}
				if (!menu_elt.exist()) {
					menu_elt = $($.KTAnchor.treemenu_container + " a[href='" + url_match[1] + url_match[2] + "']");
				}
				if (!menu_elt.exist()) {
					menu_elt = $($.KTAnchor.treemenu_container + " a[href^='" + url_match[1] + "']");
				}
				if (menu_elt.parent().prev().hasClass("tree-menu-close")) {
					menu_elt.parent().prev().trigger("click");
				}
				$(".tree-select-menu").removeClass("tree-select-menu").addClass("tree-menu");
				menu_elt.removeClass("tree-menu").addClass("tree-select-menu");
		    },

			// show request process
			setRequestProcess: function(process_length){
				// 进度的长度
				var progress_elt = $(".request-progress");
				// 完整进度的长度
				var full_process_length = (this.request_process_complete==true) ? $(window).width() : $(window).width() * 0.8;
				// 如果没有进度条则创建一个
				if (progress_elt.length==0) {
					progress_elt = $('<div class="request-progress"></div>').appendTo(document.body);
				}
				// 当前的进度条长度
				var new_process_length = (this.request_process_complete==true) ? (process_length+1)*1.28 : process_length + 1;
				progress_elt.css({width:new_process_length, display:'block'});
				if (new_process_length<=full_process_length) {
					setTimeout(function(){$.KTAnchor.setRequestProcess(new_process_length)}, 1);
				}
				else if (this.request_process_complete==true && new_process_length>full_process_length) {
					progress_elt.delay(500).fadeOut("fast");
					this.request_process_complete=false;
				}
			},

			// remove request process
			completeRequestProcess: function(){
				this.request_process_complete=true;
			},
		},

		KTDateFormat: function(ts, dt)   {
			var now = ts ? new Date(parseInt(ts)) : new Date();
			var y = now.getFullYear();
			var m = ((now.getMonth()+1)<10?"0":"")+(now.getMonth()+1);
			var d = (now.getDate()<10?"0":"")+now.getDate();
			var h = (now.getHours()<10?"0":"")+now.getHours();
			var i = (now.getMinutes()<10?"0":"")+now.getMinutes();
			var s = (now.getSeconds()<10?"0":"")+now.getSeconds();
			var nowDate = y + "-" + m + "-" + d;
			var nowDatetime = nowDate + " " + h + ":" + i + ":" + s;
			return (dt) ? nowDatetime : nowDate;
		},

		// print_r arguments
		KTLog: function(){
			if (window.console && window.console.log && arguments.length>=1){
				window.console.log("arguments.length : " + arguments.length);
				for (var ii=0; ii<arguments.length; ii++){
					window.console.log(arguments[ii]);
				}
			}
		},

		// open iframe
		KTIframe: function(el, url){
			var iframe = $('<iframe frameborder="0" src="" style="width:100%;height:100%;"></iframe>');
			iframe.attr("src", url);
			$(el).empty();
			$(el).append(iframe);
		},

		//
		KTPrintr: function(theObj) {
			var retStr = '';
			if (typeof theObj == 'object') {
				retStr += '<div>';
				for (var p in theObj) {
					if (typeof theObj[p] == 'object') {
						retStr += '<div><b>['+p+'] => ' + typeof(theObj) + '</b></div>';
						retStr += '<div style="padding-left:25px;">' + $.KTPrintr(theObj[p]) + '</div>';
					} else {
						retStr += '<div>['+p+'] => <b>' + theObj[p] + '</b></div>';
					}
				}
				retStr += '</div>';
			}
			return retStr;
		},

		// http request function
		KTAjax: function(url, method, data, headers, success, error, complete){
			// 进度条开始
			$.KTAnchor.setRequestProcess(0);
			// stop before one ajax request
			if (typeof(window.currentKTAjax)=="object") {
				try{window.currentKTAjax.abort()}catch(e){;}
			}
			// set headers
			if ($.type(headers)!="object" || $.isEmptyObject(headers)) {
				headers = {};
			}
			headers['Ajax-Request'] = "jQuery.KTAnchor";
			var contentType = false;
			if (method=="POST") {
				contentType = (data instanceof FormData) ? false : "application/x-www-form-urlencoded; charset=UTF-8";
			}
			// set ajax request
			window.currentKTAjax = $.ajax({
				"url"  : url,
				"type" : method,
				"data" : data,
				"contentType" : contentType,
				"processData" : false,
				"headers" : headers,
				"success" : function(responseText) {
					if ($.isFunction(success)) success(responseText);
				},
				"error" : function(XMLHttpRequest) {
					if ($.isFunction(error)) error(XMLHttpRequest);
				},
				"complete" : function(XMLHttpRequest) {
					$.KTAnchor.completeRequestProcess();
					if ($.isFunction(complete)) complete(XMLHttpRequest);
				}
			});
		},

		KTTreeMenuHTML: {

			getMenuItemHtml: function(menu_item, menu_level) {
				var pushstate_html = "";
				if (typeof(menu_item.pushstate)=="string" && menu_item.pushstate=="no") {
					pushstate_html = "pushstate=\"no\"";
				}
				return '<a href="'+menu_item.href+'" '+pushstate_html+' class="tree-menu tree-menu-'+menu_level+'"><div>'+menu_item.text+'</div></a>';
			},

			getMenuFolderHtml: function(menu_item, menu_level) {
				if (menu_level=="0") {
					return '<a href="javascript:;" class="tree-menu tree-menu-0"><div>'+menu_item.text+'</div></a>';
				}
				else if (menu_level=="1") {
					var toggle_class = menu_item.open ? "tree-menu-open" : "tree-menu-close" ;
					return '<a href="javascript:;" class="tree-menu tree-menu-1 '+toggle_class+'"><div>'+menu_item.text+'</div></a>';
				}
			},

			getMenuHtml: function(menus_data, menu_level) {
				// 初始化 html
				var menu_html = "";
				// 初始化菜单等级
				var menu_level = (typeof(menu_level)!="number") ? 0 : menu_level;
				// 开始循环
				$.each(menus_data, function(name, menu_data) {
					// 如果有子菜单
					if ($.isArray(menu_data.menus)) {
						menu_html += $.KTTreeMenuHTML.getMenuFolderHtml(menu_data, menu_level);
						if (menu_level==0) {
							menu_html += '<div style="display: block;">'+$.KTTreeMenuHTML.getMenuHtml(menu_data.menus, 1+menu_level)+'</div>';
						}
						else if (menu_level==1) {
							var display = (typeof(menu_data.open)!="undefined" && menu_data.open==true) ? "block" : "none" ;
							menu_html += '<div style="display: '+display+';">'+$.KTTreeMenuHTML.getMenuHtml(menu_data.menus, 1+menu_level)+'</div>';
						}
					}
					// 如果没有子菜单
					else if (typeof(menu_data.href)=="string") {
						menu_html += $.KTTreeMenuHTML.getMenuItemHtml(menu_data, menu_level);
					}
				});
				return (menu_level==0) ? '<div class="'+$.KTAnchor.treemenu_container.substr(1)+'">'+menu_html+'</div>' : menu_html;
				// return menu_html;
			}
		}
	});

	$.fn.extend({

		exist: function() {
			return ($(this).length>=1) ? true : false;
		},

		actionApplication: function(CallFunction) {
			var icon = $(this).find("img");
			CallFunction = $.isFunction(CallFunction) ? CallFunction : $.noop();
			icon.animate({top:'-20px'}, 230).animate({top:'0px'}, 130).animate({top: '-10px'}, 100, "", CallFunction).animate({top:'0px'}, 100).animate({top: '-5px'}, 50).animate({top:'0px'},  50);
		},

		KTLoader: function() {
			// 加载
			$(this).KTPaging().KTTreeMenu().KTAnchor().KTForm().KTInputBind();
		},

		KTInputBind: function() {
			$(this).tagsInputBind().timeInputBind().uploadInputBind();
		},

		KTAnchor : function(success, error, begin, complete) {
			// 取得 某文档下 所有没有被标注为原生的 anchor
			this.find("a[native!='yes']").each(function(key, anchor){
				// jQuery 对象
				var $anchor = $(anchor);
				// 如果是 <a href="javascript:..." 也是不能去绑定
				if (/^javascript\:/.test($anchor.attr("href"))) return;
				// 如果是 # 也是不能绑定
				if ($anchor.attr("href")=="#") return;
				// 如果特别标注 <a> 不绑定事件
				// if ($anchor.attr("native")!=null) return;
				// 绑定点击事件
				$anchor.bind("click", function(){
					// 如果有 confirm 属性
					if (typeof($anchor.attr("confirm"))!="undefined" && $anchor.attr("confirm").length>1) {
						if (!confirm($anchor.attr("confirm"))) {
							return false;
						}
					}
					// 聚焦会使得点击处框上虚线
					anchor.blur();
					// 获取要请求的地址
					var request_url = $anchor.attr("href");
					// 获取当前的地址
					var request_ref = window.location.href;
					// 如果设置了  <a pushstate="no" ... > 那么不做 url pushState
					if (typeof($anchor.attr("pushstate"))=="undefined" || $anchor.attr("pushstate")!="no") {
						window.history.pushState(null, "", request_url);
					}
					var container = $.KTAnchor.response_container;
					if (typeof($anchor.attr("container"))!="undefined" && $anchor.attr("container").length>1) {
						container = $anchor.attr("container");
					}
					// 开始
					$.isFunction(begin) ? begin() : $.KTAnchor.begin();
					// set header
					var header = null;
					if ($.type($anchor.attr("header"))=="string") {
						header = $.parseJSON($anchor.attr("header"));
					}
					// ajax 请求，并回调
					$.KTAjax(request_url, "GET", null, header,
						// 成功
						function(responseText){
							$.isFunction(success) ? success(container, responseText) : $.KTAnchor.success(container, responseText);
						},
						// 错误
						function(XMLHttpRequest){
							$.isFunction(error) ? error(container, XMLHttpRequest) : $.KTAnchor.error(container, XMLHttpRequest);
						},
						// 结束 ( 成功或失败后 )
						function(XMLHttpRequest){
							$.isFunction(complete) ? complete(container, XMLHttpRequest) : $.KTAnchor.complete(container, XMLHttpRequest);
							if (typeof($anchor.attr("pushstate"))=="undefined" || $anchor.attr("pushstate")!="no") {
								$.KTAnchor.treemenuSelected(request_url);
							}
						}
					);
					// 防止链接点击生效
					return false;
				});
			});
			// 返回 JQuery 对象
			return this;
		},

		KTForm : function(inputError, success, error, begin, complete) {
			// 查找 form，如果 native="yes" 则跳过
			this.find("form[native!='yes']").each(function(key, form){
				// jQuery 对象
				var $form = $(form);
				$form.find(":input").each(function(key, input_elt){
					$(input_elt).bind("change keyup", function(){
						var submit_btn = $form.find("button[type='submit']");
						var button_class = submit_btn.attr("button-class");
						var submit_class = (button_class && button_class=="submit-btn") ? "submit-btn" : "button-btn";
						if ($form.checkInputs()){
							submit_btn.removeClass("disable-btn").addClass(submit_class);
						}
						else {
							submit_btn.removeClass(submit_class).addClass("disable-btn");
						}
					});
				});
				// 将 form 绑定 submit 事件
				$form.bind("submit", function(){
					// 检查表单
					// 自定义的错误处理
					if ($.isFunction(inputError)) {
						if (!$(this).checkInputs(inputError)) return false;
					}
					// 默认的错误处理，会输出到浏览器的控制台
					else {
						if (!$(this).checkInputs($.KTAnchor.inputError)) return false;
					}
					// 获取 url
					var request_url = $form.attr("action");
					// 默认是 Form method 是 POST
					var method = "POST";
					// 获取表单数据
					var data = $form.find("input[type='file']").exist() ? new FormData(this) : $(this).serialize();
					// 获取返回数据将填充哪个节点
					var container = $.KTAnchor.response_container;
					if (typeof($form.attr("container"))!="undefined" && $form.attr("container").length>1) {
						container = $form.attr("container");
					}
					// 开始
					$.isFunction(begin) ? begin() : $.KTAnchor.begin();

					var on_success = $form.attr("success");
					if (typeof(on_success)=="string" && on_success.length>0) {
						success = function(container, responseText) {
							
						}
					}

					// 如果 form 是 GET, 适合用来搜索
					if ($form.attr("method")=="get") {
						// 将字段拼接在 action 后
						$form.find("input").each(function(key, input_elt){
							input_elt = $(input_elt);
							if (input_elt.attr("name").length>0 && input_elt.val().length>0) {
								if (/\?/.test(request_url)) {
									request_url = request_url + "&" + input_elt.attr("name") + "=" + encodeURI(input_elt.val());
								}
								else {
									request_url = request_url + "?" + input_elt.attr("name") + "=" + encodeURI(input_elt.val());
								}
							}
						});
						method = "GET";
						data = null;
						// 如果设置了  <a pushstate="no" ... > 那么不做 url pushState
						if (typeof($form.attr("pushstate"))=="undefined" || $form.attr("pushstate")!="no") {
							window.history.pushState(null, "", request_url);
						}
					}
					// set header
					var header = null;
					if ($.type($form.attr("header"))=="string") {
						header = $.parseJSON($form.attr("header"));
					}
					// ajax 请求，并回调
					$.KTAjax(request_url, method, data, header,
						// 成功
						function(responseText){
							$.isFunction(success) ? success(container, responseText) : $.KTAnchor.success(container, responseText);
						},
						// 错误
						function(XMLHttpRequest){
							$.isFunction(error) ? error(container, XMLHttpRequest) : $.KTAnchor.error(container, XMLHttpRequest);
						},
						// 结束 ( 成功或失败后 )
						function(XMLHttpRequest){
							$.isFunction(complete) ? complete(container, XMLHttpRequest) : $.KTAnchor.complete(container, XMLHttpRequest);
						}
					);
					// 禁止表单继续提交
					return false;
				});
				$($form.find(":input")[0]).trigger("change");
			});
			// 返回 JQuery 对象
			return this;
		},

		checkInputs : function(inputError) {
			var field_ok = true;
			$(this).find(":input").each(function(key, input_elt){
				var validation = $(input_elt).attr("validation");
				if (typeof(validation)=="string" && validation.length>=1) {
					var input_value = $(input_elt).val();
					// 不能为空
					if (validation=="/!empty/") {
						if (input_value.length<1) {
							if ($.isFunction(inputError)) inputError(input_elt, "Can not be empty");
							field_ok = false;
							return false;
						}
					}
					// 请输入邮箱
					else if (/\/email:(.+)\//.test(validation)) {
						if (!/^([0-9A-Za-z\-_\.]+)@([0-9A-Za-z\-_\.]+\.[a-z]{2,3}(\.[a-z]{2})?)$/g.test(input_value)){
							var match = validation.match(/\/email:(.+)\//);
							if ($.isFunction(inputError)) inputError(input_elt, match[1]);
							field_ok = false;
							return false;
						}
					}
					// 请输入密码，并不小于 8 位长
					else if (/\/password:(.+)\//.test(validation)) {
						if (input_value.length<8) {
							var match = validation.match(/\/password:(.+)\//);
							if ($.isFunction(inputError)) inputError(input_elt, match[1]);
							field_ok = false;
							return false;
						}
					}
					// 修改密码，要么留空，要么不小于8 位长
					else if (/\/edpassword:(.+)\//.test(validation)) {
						if (input_value.length>=1) {
							if (input_value.length<8) {
								var match = validation.match(/\/edpassword:(.+)\//);
								if ($.isFunction(inputError)) inputError(input_elt, match[1]);
								field_ok = false;
								return false;
							}
						}
					}
					// 重复输入密码要和前面输入的密码一样
					else if (/\/repassword:(.+):(.+)\//.test(validation)) {
						var match = validation.match(/\/repassword:(.+):(.+)\//);
						var password_value = $(form_elt).find("input[name="+match[1]+"]").val();
						if (password_value!=input_value) {
							if ($.isFunction(inputError)) inputError(input_elt, match[1]);
							field_ok = false;
							return false;
						}
					}
					// 如果空就弹出后面的提示
					else if (/\/!empty:(.+)\//.test(validation)) {
						if (input_value.length<1) {
							var match = validation.match(/\/!empty:(.+)\//);
							if ($.isFunction(inputError)) inputError(input_elt, match[1]);
							field_ok = false;
							return false;
						}
					}
					// 手机号判断
					else if (/\/mobile:(.+)\//.test(validation)) {
						if (!/^1\d{10}$/g.test(input_value)){
							var match = validation.match(/\/mobile:(.+)\//);
							if ($.isFunction(inputError)) inputError(input_elt, match[1]);
							field_ok = false;
							return false;
						}
					}
					// 年-月-日 时间判断
					else if (/\/date:(.+)\//.test(validation)) {
						if (!/^[1|2]\d{3}\-(0[1-9]|1[0-2])\-(0[1-9]|[1-2][0-9]|3[1-2])$/g.test(input_value)){
							var match = validation.match(/\/date:(.+)\//);
							if ($.isFunction(inputError)) inputError(input_elt, match[1]);
							field_ok = false;
							return false;
						}
					}
					// 年-月-日 时:分:秒时间判断
					else if (/\/datetime:(.+)\//.test(validation)) {
						if (!/^[1|2]\d{3}\-(0[1-9]|1[0-2])\-(0[1-9]|[1-2][0-9]|3[1-2]) ([0|1][0-9]|2[0-4])\:([0-5][0-9])\:([0-5][0-9])$/g.test(input_value)){
							var match = validation.match(/\/datetime:(.+)\//);
							if ($.isFunction(inputError)) inputError(input_elt, match[1]);
							field_ok = false;
							return false;
						}
					}
				}
			});
			return field_ok;
		},

		timeInputBind : function()
		{
			$(this).find("input.date").each(function(key, date_input) {
				// 绑定
				$(this).datetimepicker({
					 timepicker:false,
					 lang:"ch",
					 format:'Y-m-d'
				});
			});

			$(this).find("input.datetime").each(function(key, datetime_input) {
				// 绑定
				$(this).datetimepicker({
					 timepicker:true,
					 lang:"ch",
					 format:'Y-m-d H:i:s'
				});
			});

			$(this).find("input.time").each(function(key, datetime_input) {
				// 绑定
				$(this).datetimepicker({
					 timepicker:false,
					 lang:"ch",
					 format:'H:i:s'
				});
			});
			return this;
		},

		uploadInputBind: function()
		{
			$(this).find("input.upload-input").each(function(key, input_elt) {
				var upload_input = $(this);
				var upload_frame = $("<div class=\"upload-frame\"></div>").appendTo(upload_input.parent());
				upload_input.appendTo(upload_frame);
				// 绑定事件
				upload_input.change(function() {
					var image_url = $(this).getInputFilePath();
					upload_frame.css("background-image", "url(" + image_url+ ")");
				});
			});

			return this;
		},

		tagsInputBind: function()
		{
			$(this).find("input.tags-input").each(function(key, tags_input){
				/*----------------------------------------------*\
				 |
				 | 初始化重要值，状态，节点
				 |
				\*----------------------------------------------*/
				// tags 的节点
				var tags_input = $(this);
				// 初始的就填入的 tags
				var initial_value = tags_input.val().split(",");
				// tag 的数据检索的来源
				var search_source = tags_input.attr("search-source");
				// 搜索的数据
				var search_data = typeof(search_source)=="string" ? search_source.split(",") : [];
				// 是否允许输入多个 tag
				var accept_multipart = tags_input.attr("accept-multipart");


				/*----------------------------------------------*\
				 |
				 | 插入 tags 的输入系统，区分带检索和不带检索的输入系统
				 |
				\*----------------------------------------------*/
				// 默认不带弹出检索层的 tag 输入系统
				var tags_frame = $('<div class="tags-frame form-control"><input type="text" class="tags-enter"></div>');

				// 如果有指定检索，就初始化弹出的检索层 
				if (typeof(search_source)=="string") {
					var dropup = tags_input.hasClass("dropup") ? "dropup" : "";
					// tags 操作的主体框，含输入的 input 和 检索弹出层
					tags_frame = $('<div class="tags-frame form-control ' + dropup + '"><input type="text" class="tags-enter"><ul class="dropdown-menu"></ul></div>');
				}
				// 插入到 input 的后面
				tags_frame.appendTo(tags_input.parent());

				// tags 检索弹出层
				var tags_options = tags_frame.children("ul.dropdown-menu");
				// tags 的输入框
				var tags_enter = tags_frame.children("input.tags-enter");

				// tags 输入框给一个标记，
				// 方法比较挫，用来标记退格前，如果输入框是空，就删除最后一个已经输入的 tag
				tags_enter.data("empty-data", "empty-data");

				// init <input value="tag1,tag2,tag3..."
				// 插入初始值
				for (var ii=0; ii<initial_value.length; ii++) {
					if (initial_value[ii]!="") {
						tags_frame.insertEnterTag(initial_value[ii]);
					}
				}

				/*----------------------------------------------*\
				 |
				 | 判断输入时，和 onblur 时的动作
				 |
				\*----------------------------------------------*/
				// 点外框时 focus 输入框
				tags_frame.click(function(e){
					tags_enter.focus();
					e.stopPropagation();
				});
				// 输入框 focus 时，外框亮色提示
				tags_enter.focus(function(){
					tags_frame.addClass("tags-frame-focus");
					// 回车键不会让 form 提交
					$(this).parents("form").bind("keydown", function(e){
						if(e.keyCode === 13) {
							return false;
						}
					});
					tags_frame.tagsAutoComplete();
					tags_options.css("display", "block");

					$(document.body).bind("click touchend", function(e){
						// 关闭动画
						tags_options.css("display", "none");
						$(document.body).unbind("click touchend");
					});
				});
				// 输入框 blur 时，外框亮色取消
				tags_enter.blur(function(){
					tags_frame.removeClass("tags-frame-focus");
					$(this).parents("form").unbind("keydown");
				});

				/*----------------------------------------------*\
				 |
				 | 输入 tag
				 |
				\*----------------------------------------------*/
				// 绑定事件
				tags_enter.bind("keyup", function(e){
					// 删除
					if(e.keyCode === 8 && $(this).val()=="" && $(this).data("empty-data")=="empty-data"){
						var tag_elt = $(this).parent().children("span:last");
						if (tag_elt.exist()) {
							tag_elt.children("p").trigger("click");
							return;
						}
					}
					tags_enter.data("empty-data", ($(this).val()!="") ? null : "empty-data");
					// 插入
					if(e.keyCode === 13 && $(this).val()!="") {
						if (typeof(search_source)=="string") {
							tags_options.children("li").each(function(idx, elt){
								var val = $(elt).children("a").html();
								if (val==tags_enter.val()) {
									tags_frame.insertEnterTag(val);
									return;
								}
							});
						}
						else {
							tags_frame.insertEnterTag($(this).val());
						}
					}
					tags_frame.tagsAutoComplete();
				});
			});
			return this;
		},

		tagsAutoComplete: function()
		{
			/*----------------------------------------------*\
			 |
			 | 初始化重要值，状态，节点
			 |
			\*----------------------------------------------*/
			// tags 的节点
			var tags_input = $(this).prev();
			// tag 的数据检索的来源
			var search_source = tags_input.attr("search-source");
			// 搜索的数据
			var search_data = typeof(search_source)=="string" ? search_source.split(",") : [];

			var tags_frame = $(this);
			// tags 检索弹出层
			var tags_options = tags_frame.children("ul.dropdown-menu");
			// tags 的输入框
			var tags_enter = tags_frame.children("input.tags-enter");

			// 目前填入的值
			var tags_spans = tags_frame.children("span");
			var tags_val = "";
			tags_spans.each(function(key, tag_span){
				var val = $(tag_span).html().split("<p>")[0];
				tags_val += "," + val;
			});
			tags_val = tags_val + ",";

			// 搜索 自动补全
			if (tags_options.exist()) {
				tags_options.empty();
				for(var ii=0; ii<search_data.length; ii++) {
					var reg = new RegExp(tags_enter.val(),"g");
					var reg2 = new RegExp("," + search_data[ii] + ",","g");
					// 在数据源里查找输入的字符串，并且绕过已经输入过的 tag
					if (reg.test(search_data[ii]) && !reg2.test(tags_val)) {
						var complete_li = $("<li><a href=\"javascript:void(0);\">" + search_data[ii] + "</a></li>");
						complete_li.appendTo(tags_options);
						complete_li.click(function(e){
							// var _tags_frame = $(this).parents(".tags-frame");
							// var _tags_enter = _tags_frame.children("input.tags-enter");
							tags_frame.insertEnterTag($(this).children().html());
							tags_enter.focus();
						});
					}
				}
			}
		},

		insertEnterTag: function(tag_text)
		{
			if (tag_text=="") {
				return;
			}
			var tags_frame = $(this);

			/*----------------------------------------------*\
			 |
			 | 初始化重要值，状态，节点
			 |
			\*----------------------------------------------*/
			// tags 的节点
			var tags_input = tags_frame.prev();
			// 是否允许输入多个 tag
			var accept_multipart = tags_input.attr("accept-multipart");
			if (typeof(accept_multipart)=="string" && accept_multipart=="no") {
				tags_frame.children("span").remove();
			}

			var tags_spans = tags_frame.children("span");
			var tag_exist = false;
			tags_spans.each(function(key, tag_span){
				var val = $(tag_span).html().split("<p>")[0];
				if (val==tag_text) {
					tag_exist = true;
					return;
				}
			});

			if (tag_exist==true) {
				return;
			}

			var tags_enter = tags_frame.children("input.tags-enter");
			var tag_elt = $("<span class=\"radius-5\">" + tag_text + "<p>×</p></span>").insertBefore(tags_enter);
			tags_enter.focus().val("");
			tags_enter.data("empty-data", ($(this).val()!="") ? null : "empty-data");
			tags_frame.tagsInputFlush();
			tag_elt.children("p").click(function(e){
				var tag = $(this).parent();
				var tags_frame = tag.parent();
				tag.empty().remove();
				tags_frame.tagsInputFlush();
			});
		},

		tagsInputFlush: function()
		{
			var tags_frame = $(this);
			var tags_input = tags_frame.parent().children("input.tags-input");
			var tags_spans = tags_frame.children("span");
			var tags_val = "";
			tags_spans.each(function(key, tag_span){
				var val = $(tag_span).html().split("<p>")[0];
				tags_val += (tags_val=="") ? val : "," + val;
			});
			tags_input.val(tags_val);
		},

		KTPaging : function() {
			// 从配置中获取参数配置
			var container = $.KTAnchor.paging_container;
			// 开始查找
			this.find(container).each(function(key, paging_bar){
				// jQuery 对象
				var $paging_elt = $(paging_bar);
				// 获取主要的数据
				var total = 0 + $paging_elt.attr("total");
				var current = 0 + $paging_elt.attr("current");
				var limit = $paging_elt.attr("limit");
				if (typeof(limit)=="undefined") limit = $.KTAnchor.paging_limit;
				// 最大页码 当前页码
				var max_page = Math.ceil(total / limit);
				var current_page = Math.ceil(current / limit);
				// 分页最长显示 7 个
				var page_list = [1,2,3,4,5,6,7];
				// 数组最后一个单元，不能大于 max_page
				if (max_page<=7) {
					page_list = page_list.slice(0, max_page);
				}
				else {
					// 如果当前页前 3 页
					if (current_page-1<=3) {
						page_list = [1,2,3,4,5,6,"...",max_page];
					}
					// 如果当前页为后 3 页
					else if (max_page-current_page<=3) {
						page_list = [1,"...",max_page-5,max_page-4,max_page-3,max_page-2,max_page-1,max_page];
					}
					// 当前页，离最大，最小，都超过 2 个单位
					else {
						page_list = [1,"...",current_page-2,current_page-1,current_page,current_page+1,current_page+2,"...",max_page];
					}
				}
				// class name
				var class_name = $paging_elt.attr("paging_class");
				if (typeof(class_name)=="undefined") {
					class_name = "paging-anchor radius-4";
				}
				// current class name
				var current_class_name = $paging_elt.attr("current_paging_class");
				if (typeof(current_class_name)=="undefined") {
					current_class_name = "paging-current-anchor radius-4";
				}
				// request url
				var request_url = $paging_elt.attr("request_url");
				if (typeof(request_url)=="undefined") {
					request_url = window.location.href;
				}
				// 分页参 连接 URL 的符号
				var paging_symbol = $paging_elt.attr("paging_symbol");
				if (!/[\&|\/]\w+/.test(paging_symbol)) {
					paging_symbol1 = $.KTAnchor.paging_symbol.substr(0, 1);
					paging_symbol2 = $.KTAnchor.paging_symbol.substr(1);
				}
				// 是否发生 pushstate
				var pushstate = $paging_elt.attr("pushstate");
				var pushstate_html = "";
				if (typeof(pushstate)=="string" && pushstate=="no") {
					pushstate_html = "pushstate=\"no\"";
				}
				// 输出页面
				var paging_html = "";
				for(var ii=0; ii<page_list.length; ii++) {
					var m = 1 + ( page_list[ii]-1 ) * limit;
					// $.KTLog(/\/p\/[0-9]+/, new RegExp("\/"+paging_symbol2+"\/[0-9]+"), /[\?\&]p=[0-9]+/, new RegExp("[\\?\\&]"+paging_symbol2+"=[0-9]+"));
					// get href
					if (paging_symbol1=="/") {
						var href = request_url.replace(new RegExp("\/"+paging_symbol2+"\/[0-9]+"), "")+"/"+paging_symbol2+"/"+m;
					}
					else {
						var href = request_url.replace(new RegExp("[\\?\\&]"+paging_symbol2+"=[0-9]+"), "");
						href = (/\?/.test(href)) ? href+"&"+paging_symbol2+"="+m : href+"?"+paging_symbol2+"="+m;
					}
					// 组织 html
					if (page_list[ii]=="...") {
						paging_html += "<li><span>...</span></li>";
					}
					else if (page_list[ii]==current_page){
						paging_html += '<li class="active"><a href="'+href+'" '+pushstate_html+'>'+page_list[ii]+'</a></li>';
					}
					else {
						paging_html += '<li><a href="'+href+'" '+pushstate_html+'>'+page_list[ii]+'</a></li>';
					}
				}
				$paging_elt.html('<nav><ul class="pagination">' + paging_html + '</ul></nav>');
			});
			// 返回 JQuery 对象
			return this;
		},

		KTTreeMenu : function(){
			//  从配置中获取参数
			var container = $.KTAnchor.treemenu_container;
			// 开始遍历
			this.find(container).each(function(key, treemenu_elt){
				// 处理节点，绑定事件
				$(treemenu_elt).setMainMenuEvent();
			});
			return this;
		},

		/* --------------------    tools function    ------------------ */

		// 得到图片的完整路径
		getInputFilePath: function() {
			var file = this.context.files[0];
		    var url = null;
		    if (window.createObjectURL != undefined) { // basic
		        url = window.createObjectURL(file);
		    }
		    else if (window.URL != undefined) { // mozilla(firefox)
		        url = window.URL.createObjectURL(file);
		    }
		    else if (window.webkitURL != undefined) { // webkit or chrome
		        url = window.webkitURL.createObjectURL(file);
		    }
		    return url;
		},

		setMainMenuEvent : function(){
			var $treemenu_elt = $(this)
			// 开始循环
			$treemenu_elt.children("a").each(function(key, menu_elt) {
				// 取得一个节点
				var $menu_elt = $(menu_elt);
				// 取得下一个节点
				var $next_elt = $menu_elt.next("div");
				// 如果节点后有DIV，说明一个折叠菜单
				if ($next_elt.exist()) {
					// 绑定点击事件
					$menu_elt.bind("click", function() {
						// 打开菜单
						if ($next_elt.css("display")=="none") {
							// 滑出
							$next_elt.slideDown("fast"); // $next_elt.css("display", "block");
							if ($menu_elt.hasClass("tree-menu-1")) {
								$menu_elt.removeClass("tree-menu-close").addClass("tree-menu-open");
							}
						}
						// 折叠菜单
						else {
							// 滑入
							$next_elt.slideUp("fast"); // $next_elt.css("display", "none");
							if ($menu_elt.hasClass("tree-menu-1")) {
								$menu_elt.removeClass("tree-menu-open").addClass("tree-menu-close");
							}
						}
						// 重置滚动条
						// $treemenu_elt.parents($.KTAnchor.scroll_container).ktScrollSliding();
						// menu_elt 没错
						menu_elt.blur();
						return false;
					});
					// 循环的递归
					$next_elt.setMainMenuEvent();
				}
			});
		}
	});

})(jQuery);

/* set KTAnchor default value */
$.KTAnchor.init({
	response_container: ".body-content-right", // Ajax, 设定默认 response 填充的区域
	paging_container: ".paging-container", // 分页，分页的容器
	paging_limit: 30, // 分页，默认每页 30 条记录
	paging_symbol: "&po", // 分页，默认通过传统的 & 来分割，值通过 http.request.GET.cc 来传递
	dropdown_container: ".dropdown-container", // 弹出菜单，通过识别此节点，来绑定 下拉菜单的 事件
	treemenu_container: ".treemenu-container", // 树状菜单，通过识别此节点，来绑定 树状菜单 点击事件
	scroll_container: ".scroll-container" // 自定义相应鼠标滚动，通过识别此节点，来绑定
});

// 返回按钮监听
$(window).bind("popstate", function(){
	$(".body-content-right").load(window.top.location.href, function(){
		$.KTAnchor.treemenuSelected(window.top.location.href);
		$(".body-content-right").KTLoader();
	});
});

$(document).ready(function(){
  $(document.body).KTLoader();
  $(window).trigger("popstate");

  // 调整窗口时时，
  $(window).bind("resize", function(){
    $(".body-content").height($(window).height()-40);
    $(".popup-model .modal-body").height($(window).height()*0.85-88);
  });

  // 手动触发一次
  $(window).trigger("resize");
});
