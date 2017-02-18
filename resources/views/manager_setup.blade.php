    <br>

  <link href="/video-js/video-js.min.css" rel="stylesheet">
  <style>
  body{margin:0;}
  .my-video{width:100%;height:480px;}
  .my-video>.vjs-big-play-button{top:45%;left:42%;width:16%;height:70px;line-height:70px;}
  </style>
  <script src="/video-js/video.min.js"></script>
  <script src="/video-js/videojs-contrib-hls.min.js"></script>
  <script>
  videojs.options.flash.swf = "/video-js/video-js.swf";
  </script>

    <div class="container">
      <!-- Static navbar -->
      <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div>
            <ul class="nav navbar-nav">
              <li><a href="javascript:;" style="margin:5px -10px;"><b>管理项设置</b></a></li>
             </ul>
          </div>
          <div class="navbar-form navbar-right">
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
     </div>

    <div class="container">

      <video poster="http://vjs.zencdn.net/v/oceans.png" class="my-video video-js vjs-default-skin" controls preload="auto" autoplay="true" data-setup='{}'>
      <source src="http://vjs.zencdn.net/v/oceans.webm" type="video/webm"></source>
      <!-- 
      <source src="http://vjs.zencdn.net/v/oceans.flv" type="video/x-flv"></source>
      <source src="http://vjs.zencdn.net/v/oceans.mp4" type="video/mp4"></source>
      <source src="http://vjs.zencdn.net/v/oceans.webm" type="video/webm"></source>
      <source src="http://vjs.zencdn.net/v/oceans.ogv" type="video/ogg">
      <source src="https://starmakerapp-hrd.appspot.com/api/v16/web/recordings/4664162789097472/masterhls" type="application/x-mpegURL">
      //-->
      </video>

    </div>