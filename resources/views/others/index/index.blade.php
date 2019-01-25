<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Eventbook homepage</title>

<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/css/bootstrap.min.css">>
  <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <!-- Custom styles for this template -->
  <style>

		body {
		    padding-top: 54px;
		  padding-top: 54px;
		}

		@media (min-width: 992px) {
		    body {
		        padding-top: 56px;
		    }
		  body {
		    padding-top: 56px;
		  }
		}
    .row1{

      margin-top: : 50px;
    }

    .row2{
      margin:0 auto;
    }

    .top1{
      margin-left: 100px;
      margin-bottom: 20px;
      margin-top: 15px;
    }
	</style>




  <script>
    $(document).ready(function(){
      $.get("{{ route('api_get_events_number') }}",function(data,status){
        if(status == "success") {
          $("#number_of_events").text(data.number + "件");
        }
      });
    });
  </script>
  <!-- <script>
  $(document).ready(function(){
    $.get("{{ route('api_get_events_title') }}",function(data,status){
        if(status == "success") {
           data.forEach(value =>{
              $("#titles_of_events").append('<li>'+ value.title+ '</li>');
          });

      }
    });
  });
  </script> -->
  <script>
    $(document).ready(function(){
      $.get("{{ route('api_get_events_title') }}",(data,status) => {
        if (status === 'success') {
          data.forEach(value => {
            let urlbase = '/event/find/';//路由地址
            let linkTag = $('<a></a>').text(value.title).attr('href', urlbase + value.id).attr('title',value.title);
            $("#titles_of_events").append($('<li></li>').append(linkTag));
          });
          //console.log(data);
        }
      });
    });
  </script>

  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Event	Book	イベント数 No.1 国内最大級のイベントサイト</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="top-right links">
            @auth('user')
                <a href="{{ url('/event_book') }}">{{auth('user')->user()->user_detail->nickname}}</a>
                <a href="{{ route('get_user_logout') }}">Logout</a>
            @else
                <a href="{{ route('get_user_login') }}">Login</a>
                <a href="{{ url('/user_create') }}">Register</a>
            @endauth
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <h1 class="my-4">Event	Book
            <small>イベントを検索</small>
            <small id="number_of_events">件数を取得中</small>
          </h1>
          <script language="JavaScript">
            <!--
            var caution = false
            function setCookie(name, value, expires, path, domain, secure) {
              var curCookie = name + "=" + escape(value) +
              ((expires) ? "; expires=" + expires.toGMTString() : "") +
              ((path) ? "; path=" + path : "") +
              ((domain) ? "; domain=" + domain : "") +
              ((secure) ? "; secure" : "")
              if (!caution || (name + "=" + escape(value)).length <= 4000)
              document.cookie = curCookie
              else
              if (confirm("Cookie exceeds 4KB and will be cut!"))
              document.cookie = curCookie
            }
            function getCookie(name) {
              var prefix = name + "="
              var cookieStartIndex = document.cookie.indexOf(prefix)
              if (cookieStartIndex == -1)
              return null
              var cookieEndIndex = document.cookie.indexOf(";", cookieStartIndex + prefix.length)
              if (cookieEndIndex == -1)
              cookieEndIndex = document.cookie.length
              return unescape(document.cookie.substring(cookieStartIndex + prefix.length, cookieEndIndex))
            }
            function deleteCookie(name, path, domain) {
              if (getCookie(name)) {
                document.cookie = name + "=" +
                ((path) ? "; path=" + path : "") +
                ((domain) ? "; domain=" + domain : "") +
                "; expires=Thu, 01-Jan-70 00:00:01 GMT"
              }
            }
            function fixDate(date) {
              var base = new Date(0)
              var skew = base.getTime()
              if (skew > 0)
              date.setTime(date.getTime() - skew)
            }
            var now = new Date()
            fixDate(now)
            now.setTime(now.getTime() + 365 * 24 * 60 * 60 * 1000)
            var visits = getCookie("counter")
            if (!visits)
            visits = 1
            else
            visits = parseInt(visits) + 1
            setCookie("counter", visits, now)
            document.write("您是第" + visits + "访客！")
            // -->
          </script>

          <div class="row1">
            <a class="btn btn-primary" href="{{ route('get_events') }}">イベントを全て見る</a>
          </div>

          <!-- Blog Post -->
          @foreach($events as $event)
          <div class="card mb-4">
            <img class="card-img-top" src="{{ asset('/storage/' . $event->picture1) }}" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title">{{ $event->title }}</h2>
              <p class="card-text">{{ $event->detail }}</p>
            </div>
          </div>
          @endforeach

          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">予約済みのチケット</h5>

            @foreach($tickets as $ticket)
            <div class="card-body">
              <div class="clear"></div>
                <dl id="new">
                <dt>チケットの番号:</a></dt><dd>{{ $ticket->code }}</dd>
                <dt>イベント:</a></dt><dd>{{ $ticket->event->title }}</dd>
                <dt>user:</a></dt><dd>{{ $ticket->user_detail->nickname }}</dd>
                </dl>
            </div>
            @endforeach

            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
            <div class="top_list top1">
              <a href="{{ route('show_user_tickets_page') }}">&raquo; 一覧ページへ</a>
            </div>

          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">今月の注目企画</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">不動産投資</a>
                    </li>
                    <li>
                      <a href="#">うめきたグリーンプロジェクト ☆スーパーイリュージョン☆ 木下大サーカス</a>
                    </li>
                    <li>
                      <a href="#">FIVE HEP UP BARGAIN</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">大阪城イルミナージュ</a>
                    </li>
                    <li>
                      <a href="#">whatever</a>
                    </li>
                    <li>
                      <a href="#">Tutorials</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="card my-4">
            <h5 class="card-header">人気のイベントランキングTOP３</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <ul id="titles_of_events" class="list-unstyled mb-0">
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Event Book Website 2019</p>
      </div>
      <!-- /.container -->
    </footer>



  </body>

</html>
