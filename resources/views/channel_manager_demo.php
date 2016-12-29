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

  <script>
  (function($){

    var $ = jQuery;

    $.extend({

      // Main Object
      MKTAnchor: {

        ChannelID : <?=$id;?>,

        GET: 'GET',

        POST: 'POST',

        ChannelURL: "/channel-detail/<?=$id;?>",

        templateHtml: function(d) {
          var html = '';
          // 切换跑马灯
          if (d.type=="slide") {
            html += "<div class=\"slide\">";
            for(var ii=0; ii<d.data.length; ii++) {
              html += "<img src=\"" + d.data[ii].image + "\">";
            }
            html += "</div>";
          }
          // 标题
          else if (d.type=="title") {
            html += "<div class=\"title\">" + d.text + "</div>";
          }
          // 主题
          else if (d.type=="topic") {
            html += "<div class=\"topic\">";
            for(var ii=0; ii<d.data.length; ii++) {
              html += "<img src=\"" + d.data[ii].image + "\">";
            }
            html += "</div>";
          }
          // 块
          else if (d.type=="tile") {
            html += "<div class=\"topic\">";
            for(var ii=0; ii<d.data.length; ii++) {
              html += "<img src=\"" + d.data[ii].image + "\">";
            }
            html += "</div>";
          }
          return html;
        },

        begin: function(responseText) {
        },

        success: function(response) {
          if ($.type(response)=="object" && $.type(response.content)=="array"){
            for(var ii=0; ii<response.content.length; ii++) {
              $(document.body).append($($.MKTAnchor.templateHtml(response.content[ii])));
            }
          }
        },

        error: function(XMLHttpRequest) {
        },

        complete: function(XMLHttpRequest) {
        }
      },

      // print_r arguments
      MKTLog: function(){
        if (window.console && window.console.log && arguments.length>=1) {
          window.console.log("arguments.length : " + arguments.length);
          for (var ii=0; ii<arguments.length; ii++){
            window.console.log(arguments[ii]);
          }
        }
      },

      // http request function
      MKTAjax: function(url, method, data, headers, success, error, complete) {
        // stop before one ajax request
        if (typeof(window.currentMKTAjax)=="object") {
          try{window.currentMKTAjax.abort();}catch(e){;}
        }
        // set headers
        if ($.type(headers)!="object" || $.isEmptyObject(headers)) {
          headers = {};
        }
        headers['Request-Client'] = "MKTAnchor-JQuery 1.0";
        // set ajax request
        window.currentMKTAjax = $.ajax({
          url  : url,
          type : method,
          data : data,
          contentType : (method==$.MKTAnchor.POST) ? "application/x-www-form-urlencoded" : false,
          processData : false,
          headers : headers,
          success : function(responseText) {
            $.isFunction(success) ? success(responseText) : $.MKTAnchor.success(responseText);
          },
          error : function(XMLHttpRequest) {
            $.isFunction(error) ? error(XMLHttpRequest) : $.MKTAnchor.error(XMLHttpRequest);
          },
          complete : function(XMLHttpRequest) {
            $.isFunction(complete) ? complete(XMLHttpRequest) : $.MKTAnchor.complete(XMLHttpRequest);
          }
        });
      }
    });

    $.fn.extend({
      KTAnchor : function(success, error, begin, complete) {
        // ajax 请求，并回调
        $.MKTAjax($.MKTAnchor.ChannelURL, $.MKTAnchor.GET, null, null,
          // 成功
          function(responseText){
            $.isFunction(success) ? success(responseText) : $.MKTAnchor.success(responseText);
          },
          // 错误
          function(XMLHttpRequest){
            $.isFunction(error) ? error(XMLHttpRequest) : $.MKTAnchor.error(XMLHttpRequest);
          },
          // 结束 ( 成功或失败后 )
          function(XMLHttpRequest){
            $.isFunction(complete) ? complete(XMLHttpRequest) : $.MKTAnchor.complete(XMLHttpRequest);
          }
        );
      }
    });

  })(jQuery);

  $(document).ready(function(){
    $(document.body).KTAnchor();
  });

  </script>

  <style>
  *{margin:0;padding:0;text-align:left;vertical-align:middle;-webkit-overflow-scrolling:touch;}
  html, body{width:100%;height:100%;}
  body{background:#fff;color:#292f33;font-size:14px;line-height:18px;font-size:8.75pt;}
  .slide {width:100%;height:200px;overflow:hidden;margin:0 auto;}
  .title {overflow:hidden;margin:5px 10px;height:20px;line-height:20px;font-weight:bold;font-size:14px;}
  </style>

  <title>-</title>
  </head>
  <body>
  </body>
</html>
