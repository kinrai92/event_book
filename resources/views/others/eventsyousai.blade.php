<html>
  <head>
    <title>会社イベント内容の詳細</title>
    <meta charset="utf-8">
  	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
  	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
      .container{
        display: block;
        margin: 0 auto;
        width: 900px;
        background: #F8F8F8;
      }

      #title{
        text-align: center;
      }
      .row1{
        margin-left:400px;
        margin-top: 40px;
      }

      .row{
        margin-top: 40px;
      }

      .cool{
        padding-right: 20px;
        padding-left: 30px;

      }

      .cool1{
        padding-top: 50px;
      }
      .fontsize{
        font-size: 1.8em;
      }
    </style>
  </head>

<body>
  <div class="container">
    <h2 id="title">自社イベントの詳細</h2>
    <br>
  <div class="media">
    <div class="row">
      <div id="myCarousel" class="carousel slide col-sm-6 media-left media-middle">
      <!-- 轮播（Carousel）指标 -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <!-- 轮播（Carousel）项目 -->
        <div class="carousel-inner" class="media-object" style="width:436px" >
          <div class="item active" >
            <img src="../img/event1.jpg" alt="First slide">
          </div>
          <div class="item">
            <img src="../img/event2.jpg" alt="Second slide">
          </div>
          <div class="item">
            <img src="../img/event4.jpg" alt="Third slide">
          </div>
        </div>
        <!-- 轮播（Carousel）导航 -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      <div class="media-body cool">
        <h2 class="media-heading fontsize">ピクサー・ザ・フレンドシップ ～仲間といっしょに冒険の世界へ～</h2>
          <p class="cool1">『スプラトゥーン2』に登場するイカのキャラクター「インクリング」と京都水族館で展示している人気のいきものたちがコラボレーションした「Suizokukaan～イカす夏休み～」オリジナル描き起こしアートが館内に登場し、キャラクターたちと一緒になってまるで水槽の中に入ったかのように記念撮影することができます。</p>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <ul>
            <li>開催時間:1月9日(水)</li>
            <li>参加費:無料</li>
            <li>参加最大人数:50名</li>
            <li>参加最小人数:10名</li>
          </ul>
        </div>
        <div class="col-sm-6`">
          <ul>
            <li>主催:相続税対策にも有効な不動産小口投資セミナー</li>
            <li>開催場所:「京の海」大水槽(1階)横特設スペース</li>
            <li>開催状態:未開催</li>
          </ul>
        </div>
      </div>

      <div class="row1">
        <a class="btn btn-primary" href="updateevent">更新</a>
      </div>
    </div>
  </body>
