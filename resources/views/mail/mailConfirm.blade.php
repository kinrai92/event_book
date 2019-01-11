<html>
<body>


{{ $message_text }}

<a href="{{ route('get_mail_confirm', ['token' => $token])}}">クリックしてください</a>

</body>
</html>
　　
