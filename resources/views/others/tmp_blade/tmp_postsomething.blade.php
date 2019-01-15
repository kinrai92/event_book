<html>
<form action="{{ route('test_qrcode')}}" method='post'>
@csrf
<input type="text" name="code">
<input type='submit' value="送信">
</form>
</html>
