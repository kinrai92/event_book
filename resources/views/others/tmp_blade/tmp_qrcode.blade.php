<html>
<script type="text/javascript" src="http://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="http://static.runoob.com/assets/qrcode/qrcode.min.js"></script>
<body>
  <div id="qrcode" style="width:100px; height:100px; margin-top:15px;">
   Generate a QRCode Here!
  </div>
  <script type="text/javascript">
  var qrcode = new QRCode(document.getElementById("qrcode"), {
    text:"{{$code}}",
  	width : 100,
  	height : 100,
    colorDark : "#000000",
  	colorLight : "#ffffff",
  	correctLevel : QRCode.CorrectLevel.H
  });

  </script>
</body>
</html>
