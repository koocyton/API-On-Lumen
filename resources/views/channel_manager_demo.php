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
  var vue_template = {};

  // 主题的模版
  vue_template["category"] = "<div class=\"category\"><ul><li v-for=\"category in categorys\">{{ category.name }}</li></ul></div>";

  // 页面内模块
  vue_template["tiles"] = {
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
  </script>

  <title>-</title>
  </head>
  <body>

  <div class="category">
    <ul>
      <li>中国</li>
      <li>北京</li>
      <li>政治</li>
      <li>西直门</li>
      <li>万科</li>
    </ul>
  </div>

  </body>
</html>
