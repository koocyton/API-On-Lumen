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

        ScreenWidth: 100,

        ScreenHeight: 100,

        templateHtml: function(d) {
          var template_type = '$.MKTAnchor.' + d.type + 'Template';
          var template_func = eval(template_type);
          if ($.type(template_func)=="function") {
            return eval(template_type).apply(this, [d]);
          }
          return "";
        },

        // 划片
        slideTemplate: function(d) {
          var html = "<div class=\"slide\">";
          for(var ii=0; ii<d.data.length; ii++) {
            html += "<img src=\"" + d.data[ii].image + "\">";
          }
          html += "</div>";
          return html;
        },
        // 标题
        titleTemplate: function(d) {
          return "<div class=\"title\">" + d.text + "</div>";
        },
        // 主题
        topicTemplate: function(d) {
          html = "<div class=\"topic\">";
          for(var ii=0; ii<d.split; ii++) {
            html += "<img src=\"" + d.data[ii].image + "\">";
          }
          html += "</div>";
          return html;
        },
        // 图文
        tileTemplate: function(d) {
          switch (d.style) {
            case "trip":
              d.split = 1;
              d.width = this.ScreenWidth;
              d.height = this.ScreenWidth / 3;
              break;
            case "squaretile":
              d.split = 1;
              d.width = this.ScreenWidth;
              d.height = this.ScreenWidth;
              break;
            case "portrait":
              d.split = 2;
              d.width = this.ScreenWidth / 2;
              d.height = this.ScreenWidth / 2 * 0.62;
              break;
            case "landscape":
              d.split = 2;
              d.width = this.ScreenWidth / 2;
              d.height = this.ScreenHeight / 2 * 1.8;
              break;
          }

          html = "<div class=\"tile\">";
          var nn = 1
          for(var ii=0; ii<d.data.length; ii++) {
            html += "<img src=\"" + d.data[ii].image + "\">";
          }
          html += "</div>";
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
  .slide {width:100%;height:200px;overflow:hidden;margin:0 auto;border-bottom:1px solid #aaa;}
  .slide img {width:100%;height:100%;}
  .title {overflow:hidden;margin:5px 10px;height:20px;line-height:20px;font-weight:bold;font-size:14px;}
  .topic {width:100%;height:100px;overflow:hidden;margin:0 auto;border-bottom:1px solid #aaa;}
  .topic img {width:33.3%;height:100px;}
  .tile {width:100%;height:100px;overflow:hidden;margin:0 auto;border-bottom:1px solid #aaa;}
  .tile img {width:33.3%;height:100px;}
  </style>

  <title>-</title>
  </head>
  <body>
  </body>
</html>
