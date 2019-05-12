<?php
    include __DIR__.'/function.php';

    if(!empty(check_dir('result'))){
        clear_dir('result');
    }
    if(!empty(check_dir('zip_result'))){
        clear_dir('zip_result');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<h1>past link</h1>
<form action="processor.php" method="post">
    <input type="text" name="link">
    <input type="submit" value="Go">
</form>

</body>
</html>