<!DOCTYPE html>
<html lang="ms">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data['subject'] }}</title>
</head>

<style>
    a:hover {
        text-decoration: underline
    }
</style>

<body style="background-color:#f4f4f4; font-family:Arial, sans-serif; line-height:1.6; margin:20px; padding:20px"
    bgcolor="#f4f4f4">
    <div class="container"
        style="background:#fff; border-radius:5px; box-shadow:0 2px 5px rgba(0, 0, 0, 0.1); padding:20px">
        <p>Feed Posted,</p>
        <p><strong>{{ $data['title'] }}</strong></p>
        <p>{{ $data['description'] }}</p>
        <p><strong>*</strong>Attention: This email is being generated automatically.</p>
    </div>
</body>

</html>
