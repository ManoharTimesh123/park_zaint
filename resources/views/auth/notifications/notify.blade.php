<!DOCTYPE html>
<html>
<head>
    <title>Notification</title>
</head>
<body>
    <h3>Hi there,</h3>
    <p>&emsp;&emsp;{{ $details['title'] }}</p>
    <p>&emsp;&emsp;{{ $details['body'] }}</p>
    @if(isset($details['link']))
        <p>&emsp;&emsp;Click <a href="{{ $details['link'] }}">here</a> to reset.</p>
    @elseif(isset($details['password']))
        <strong>&emsp;&emsp;{{ $details['password'] }}</strong>
    @endif
    <p>
        <h3>Thanks,</h3>
        support team,<br>
        park giants<br>
    </p>
</body>
</html>