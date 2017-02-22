    <script src="/js/pixi-4.3.5.min.js"></script>

    <br>
  
    <div class="container">
      <!-- Static navbar -->
      <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <ul class="nav navbar-nav">
            <li><a href="javascript:;" style="margin:5px -10px;"><b>Pixi html5</b></a></li>
          </ul>
        </div><!--/.container-fluid -->
      </nav>
    </div>

    <div class="container" id="pixi-convas">

      <script>
      var app = new PIXI.Application(800, 600, {backgroundColor : 0xffffff});
      document.getElementById("pixi-convas").appendChild(app.view);

      // create a new Sprite from an image path
      var bunny = PIXI.Sprite.fromImage('/image/php.jpg')

      // center the sprite's anchor point
      bunny.anchor.set(0.5);

      // move the sprite to the center of the screen
      bunny.x = app.renderer.width / 2;
      bunny.y = app.renderer.height / 2;

      // bunny.width = 100;
      // bunny.height = 100;

      app.stage.addChild(bunny);

      // Listen for animate update
      app.ticker.add(function(delta) {
          // just for fun, let's rotate mr rabbit a little
          // delta is 1 if running at 100% performance
          // creates frame-independent tranformation
          bunny.rotation += 0.1 / delta;
      });

      // Create play button that can be used to trigger the video
      var button = new PIXI.Graphics()
          .beginFill(0x0, 0.5)
          .drawRoundedRect(0, 0, 100, 100, 10)
          .endFill()
          .beginFill(0xffffff)
          .moveTo(36, 30)
          .lineTo(36, 70)
          .lineTo(70, 50);

      // Position the button
      button.x = (app.renderer.width - button.width) / 2;
      button.y = (app.renderer.height - button.height) / 2;

      // Enable interactivity on the button
      button.interactive = true;
      button.buttonMode = true;

      // Add to the stage
      app.stage.addChild(button);

      // Listen for a click/tap event to start playing the video
      // this is useful for some mobile platforms. For example:
      // ios9 and under cannot render videos in PIXI without a 
      // polyfill - https://github.com/bfred-it/iphone-inline-video
      // ios10 and above require a click/tap event to render videos 
      // that contain audio in PIXI. Videos with no audio track do 
      // not have this requirement
      button.on('pointertap', onPlayVideo);

      function onPlayVideo() {

          // Don't need the button anymore
          button.destroy();

          // create a video texture from a path
          var texture = PIXI.Texture.fromVideo('http://101.96.8.165/pixijs.github.io/examples/required/assets/testVideo.mp4');

          // create a new Sprite using the video texture (yes it's that easy)
          var videoSprite = new PIXI.Sprite(texture);

          // Stetch the fullscreen
          videoSprite.width = app.renderer.width;
          videoSprite.height = app.renderer.height;

          app.stage.addChild(videoSprite); 
      }
      </script>

    </div>