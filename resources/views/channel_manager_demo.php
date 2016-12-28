<!DOCTYPE HTML>
<html>
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=0.5,minimum-scale=0.5,maximum-scale=0.5,user-scalable=no"/>
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="format-detection" content="telephone=no"/>
  <meta name="apple-mobile-web-app-status-bar-style" content="white" />
  <script src="/js/jquery-1.11.3.min.js"></script>
  <script src="/js/vue-1.0.26.min.js"></script>

  <style>
  *{margin:0;padding:0;text-align:left;vertical-align:middle;-webkit-overflow-scrolling:touch;}
  html, body{width:100%;height:100%;}
  body{background:#fff;color:#292f33;font-size:14px;line-height:18px;font-size:8.75pt;}

  .slide {width:100%;height:200px;overflow:hidden;margin:0 auto;}
  </style>

  <script>
  // 页面内模块
  var tiles_template = {
    // 幻灯片
    "slide" : "<div class=\"slide\"></div>",
    // 宽屏幻灯片
    "wide-slide" : "<div class=\"wide-slide\"></div>",
    // 主题
    "topic" : "<div class=\"topic\"></div>",
    // 2 个主题
    "two-topic" : "<div class=\"topic\"><ul><li v-for=\"topic in topics\">{{ topic.icon }}</li></ul></div>",
    // 3 个主题
    "three-topic" : "<div class=\"topic\"><ul><li v-for=\"topic in topics\">{{ topic.icon }}</li></ul></div>",
    // 4 个主题
    "four-topic" : "<div class=\"topic\"><ul><li v-for=\"topic in topics\">{{ topic.icon }}</li></ul></div>",
    // 图片
    "media" : "<div class=\"wide-slide\"></div>",
  };

  // 频道配置
  var channel_configure = {
    //
    "api" : "/channel-detail/1",
  };
  </script>

  <title>-</title>
  </head>
  <body>

  <script>
  (function($){

  var $ = jQuery;

  $.extend({

    MKTAnchor: {
    },

    success: function(container, responseText){
    },

    error: function(container, XMLHttpRequest){
    },

    begin: function(){
    },

    complete: function(container, XMLHttpRequest){
      $.KTLog("JQuery.KTAnchor.complete : " + container);
    },

    // print_r arguments
    MKTLog: function(){
      if (window.console && window.console.log && arguments.length>=1){
        window.console.log("arguments.length : " + arguments.length);
        for (var ii=0; ii<arguments.length; ii++){
          window.console.log(arguments[ii]);
        }
      }
    },

    // http request function
    MKTAjax: function(url, method, data, headers, success, error, complete) {
      // stop before one ajax request
      if (typeof(window.currentKTAjax)=="object") {
        try{window.currentKTAjax.abort()}catch(e){;}
      }
      // set headers
      if ($.type(headers)!="object" || $.isEmptyObject(headers)) {
        headers = {};
      }
      headers['Ajax-Request'] = "jQuery.KTAnchor";
      // set ajax request
      window.currentKTAjax = $.ajax({
        "url"  : url,
        "type" : method,
        "data" : data,
        "contentType" : (method=="POST") ? "application/x-www-form-urlencoded" : false,
        "processData" : false,
        "headers" : headers,
        "success" : function(responseText) {
          if ($.isFunction(success)) success(responseText);
        },
        "error" : function(XMLHttpRequest) {
          if ($.isFunction(error)) error(XMLHttpRequest);
        },
        "complete" : function(XMLHttpRequest) {
          if ($.isFunction(complete)) complete(XMLHttpRequest);
        }
      });
    }
  });

  $.fn.extend({
  });

  })(jQuery);
  </script>

  </body>
</html>
