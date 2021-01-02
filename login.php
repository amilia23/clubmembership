<html>
<?php require('header.php'); ?>
<body>
    <form action ="PHP/login.php" method = "post">
    <table border = "1">
        <tr>
            <td colspan="2">
                <h1>Login Page</h1>
            </td>
        </tr>
        <tr>
            <td>
                Username : 
            </td>
            <td>
                <input type ="text" name = "username">
            </td>
        </tr>
        <tr>
            <td>
                Password:
                </td>
                <td>
                    <input type ="password" name = "pass">
                </td>
        </tr>
        <tr>
            <td>
                <a href ="index.php">Back</a>
                </td>
                <td>
                    <input type= "submit" name ="submit" value ="Login"> 
                </td>
        </tr>
    </table>
</form>
<p>Admin:</p>
<p>Username : admin</p>
<p>Password : 123</p>
</body>
</html>