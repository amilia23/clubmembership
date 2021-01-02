<html>
<?php require('header.php'); ?>

<body style="padding-top: 10%;">
    <center>
    <h1>Login Page</h1>
        <div style="margin-top: 50px; width: 500px;">
            <form action ="PHP/login.php" method = "post">
                <table class="table table-bordered">
                    <tr>
                        <td>
                            Username : 
                        </td>
                        <td>
                            <input type ="text" name = "username" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Password:
                            </td>
                            <td>
                                <input type ="password" name = "pass" class="form-control">
                            </td>
                    </tr>
                    <tr>
                            <td colspan="2" align="center">
                            <a href ="index.php">Back</a>
                            &nbsp;&nbsp;&nbsp;
                                <input type= "submit" name ="submit" value ="Login" class="btn btn-primary"> 
                            </td>
                    </tr>
                </table>
            </form>
            <div style="border-style: solid;
                        border-width: 1px;
                        padding: 35px 20px 35px 20px;
                        width: 250px;
                        border-radius: 10px;
                        border-color: #ccc;">
                <p>Admin:</p>
                <p>Username : admin<br />
                Password : 123</p>
            </div>
        </div>
    </center>
</body>

</html>