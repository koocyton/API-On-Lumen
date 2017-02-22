
    <br>

    <div class="container">
      <!-- Static navbar -->
      <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <ul class="nav navbar-nav">
            <li><a href="javascript:;" style="margin:5px -10px;"><b>Vue</b></a></li>
          </ul>
        </div><!--/.container-fluid -->
      </nav>
    </div>

    <div class="container">

      <div id="app-6">
        <p>@{{ message }}</p>
        <input style="width:500px;" class="form-control" v-model="message">
      </div>

      <script>
      var app6 = new Vue({
        el: '#app-6',
        data: {
          message: 'Hello Vue!'
        }
      })
      </script>
    </div>