    <br>

    <link href="/video-js/video-js.min.css" rel="stylesheet">
    <style>
    .my-video{width:100%;height:480px;}
    .my-video>.vjs-big-play-button{top:45%;left:42%;width:16%;height:70px;line-height:70px;}
    .my-video>.vjs-control-bar{width:70%;left:15%;bottom:33px;}
    .my-video>.my-video-logo{padding:5px 10px;top:16px;left:16px;position:relative;background-color:rgba(0,0,0,0.2);opacity:0.4;border:1px solid #ffffff;}
    </style>
    <script src="/video-js/video.min.js"></script>
    <script src="/video-js/videojs-contrib-hls.min.js"></script>

    <div class="container">
      <!-- Static navbar -->
      <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div>
          <ul class="nav navbar-nav">
            <li><a href="javascript:;" style="margin:5px -10px;"><b>Video-js</b></a></li>
          </ul>
          </div>

          <div class="navbar-form navbar-right">
              <div class="form-group has-feedback">
                <input type="text" id="video-input" style="width:500px;" class="form-control">
                <span class="glyphicon glyphicon-film form-control-feedback" aria-hidden="true"></span>
              </div>
              <button class="btn btn-success btn-sm" style="margin-left:10px;" type="button" onclick="playInput()">Play</button>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
    </div>

    <div class="container">

      <video poster="/video-js/video-poster.jpg" id="my-video" class="my-video video-js vjs-default-skin" controls preload="auto" data-setup='{}'>
      <!-- 
        autoplay data-setup='{"techOrder": ["flash"]}'
      //-->
      </video>

    </div>

    <div class="container" style="margin-top:15px;margin-bottom:15px;">

      <div>
        <button type="button" class="btn btn-default" onclick="playUrl('http://vjs.zencdn.net/v/oceans.mp4')">oceans.mp4</button>
        <button type="button" class="btn btn-default" onclick="playUrl('http://vjs.zencdn.net/v/oceans.webm')">oceans.webm</button>
        <button type="button" class="btn btn-default" onclick="playUrl('http://vjs.zencdn.net/v/oceans.ogv')">oceans.ogv</button>
        <button type="button" class="btn btn-default" onclick="playUrl('https://starmakerapp-hrd.appspot.com/api/v16/web/recordings/4664162789097472/masterhls')">masterhls m3u8</button>
        <button type="button" class="btn btn-default" onclick="playUrl('http://streambox.fr/playlists/test_001/stream.m3u8')">stream.m3u8</button>
        <button type="button" class="btn btn-default" onclick="playUrl('http://www.flashls.org/playlists/issue_067/stream.m3u8')">stream2.m3u8</button>
        <button type="button" class="btn btn-default" onclick="playUrl('http://101.96.8.165/pixijs.github.io/examples/required/assets/testVideo.mp4')">testVideo.mp4</button>
      </div>

    <script>
    videojs.options.flash.swf = "/video-js/video-js-4.5.1.swf";
    function playUrl(video_url) {
        document.getElementById("video-input").value = video_url;
        playInput();
    }
    function playInput() {
        var video_url = document.getElementById("video-input").value;
        var video_type = "application/x-mpegURL";
        if (/\.mp4$/.test(video_url)) {
            video_type = "video/mp4"
        }
        else if (/\.webm$/.test(video_url)) {
            video_type = "video/webm"
        }
        else if (/\.ogv$/.test(video_url)) {
            video_type = "video/ogg"
        }
        if (/^https?:\/\/.+/.test(video_url)) {
            videoPlay(video_url, video_type);
        }
    }
    // <span class="label @{{ $col }}" data-toggle="tooltip" data-placement="left" title="@{{ $tit }}">@{{ $tab }}</span>
    function videoPlay(video_url, video_type) {
        if (!$(".my-video").find(".my-video-logo").exist()) {
          $(".my-video").append("<div class=\"label my-video-logo\"><b>Doopp TV</b></div>");
        }
        var video = videojs("my-video").src([{type:video_type, src:video_url}]);
        video.volume(0);
        video.play();
    }
    </script>

    </div>
