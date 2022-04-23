<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="http://localhost/mvcs/?controller=ctrlapartment&action=insertapartment" method="POST">
        <input type="text" name="code" placeholder="apartment code">
        <input type="text" name="address" placeholder="address">
        <input type="hidden" name="active_implants" value="0">
        <input type="submit">
    </form>
</body>
</html>