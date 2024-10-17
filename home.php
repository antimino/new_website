<!DOCTYPE html>
<?php 
require "class/class.sql.php";
$SQL=new Database();
$result = $SQL->query("SELECT * FROM users");
?>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Page Title</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src='main.js'></script>
    </head>
    <body>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php echo "<td>{$result[0]['id']}</td>" ?>
                    <?php echo "<td>{$result[0]['email']}</td>" ?>
                    <?php echo "<td>{$result[0]['password']}</td>" ?>
                </tr>
            </tbody>
        </table>
    </body>
</html>