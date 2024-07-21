<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send SMS</title>
</head>
<body>
    <form action="{{ route('sendsms') }}" method="POST">
        @csrf
        <div>
            <label for="message">Message:</label>
            <textarea name="message" id="message" required></textarea>
        </div>
        <div>
            <label for="recipients">Recipients (comma separated):</label>
            <input type="text" name="recipients" id="recipients" required>
        </div>
        <button type="submit">Send SMS</button>
    </form>
</body>
</html>
