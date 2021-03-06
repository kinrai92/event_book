<html>
   <head>
     <meta charset="utf-8">
     <title>チケット一覧</title>
           <!-- 新 Bootstrap 核心 CSS 文件 -->
        <link href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

        <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
        <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>

        <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
        <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <style>

          .height{

            margin-top:100px;
          }
          .borderln{
            border:1px solid black
          }
          #content{
            display:block;
            margin:0 auto;
            width:900px
          }
          #a.visited{
            color:#cc33ff;
          }
        </style>
   </head>
   <body>
     <div id="content" class="container">
       <div class="row">

           <nav class="navbar navbar-default" role="navigation">
             <div class="container-fluid">
               <div>
                  <ul class="nav navbar-nav">
                     <li><a id="a" href="?value=?">未使用</a></li>
                     <li><a href="#">使用済み</a></li>
                     <li><a id="a" href="#">キャンセル済み</a></li>
                  </ul>
              </div>
            </div>
           </nav>

           <div class="row borderln">
              <div class="col-md-4">
              <img src="img/Events001.jpg" width="200px" height="100px" style="padding:20px">
              </div>

              <div class="col-md-8">
                <table class="table">
                  <tr>
                    <td>イベント:</td>
                    <td>明日の凧</td>
                  </tr>
                  <tr>
                    <td>応募済みユーザー数:</td>
                    <td>100人</td>
                  </tr>
                  <tr>
                    <td>残り応募可能人数:</td>
                    <td>100人</td>
                  </tr>
                 <tr>
                   <td>イベント開催場所:</td>
                   <td>東京都港区</td>
                 </tr>
                </table>
              </div>
            </div>

          <div class="row borderln" style="margin-top:50px">
             <div class="col-md-4">
             <img src="img/Events002.jpg" width="200px" height="100px" style="padding:20px">
             </div>

             <div class="col-md-8">
               <table class="table">
                 <tr>
                   <td>イベント:</td>
                   <td>明日の凧</td>
                 </tr>
                 <tr>
                   <td>応募済みユーザー数:</td>
                   <td>100人</td>
                 </tr>
                 <tr>
                   <td>残り応募可能人数:</td>
                   <td>100人</td>
                 </tr>
                <tr>
                  <td>イベント開催場所:</td>
                  <td>東京都港区</td>
                </tr>
               </table>
             </div>
           </div>
         </div>
        </div>
      </div>
    </div>



   </body>
</html>
