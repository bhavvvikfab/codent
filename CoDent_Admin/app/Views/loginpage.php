<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin/login</title>
</head>
<body>
    <form action="<?= site_url('/login') ?>"  method="post" >
        <input type="email" name="email" >
        <input type="password" name="password">
        <button type="submit">login</button>
    </form> 
</body>
</html>