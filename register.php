<html>
<?php require('header.php'); ?>

<body style="padding-top: 5%;">
    <center>
    <h1>Register Account</h1>
        <div style="margin-top: 50px; width: 500px;">
            <form action ="PHP/apply.php" method = "POST" enctype = "multipart/form-data">
                <table class="table table-bordered">
                    <tr>
                        <td>
                            <p>Username:</p>
                        </td>
                        <td>
                            <input type ="text" name = "username" class="form-control" placeholder="Type username here" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Password:</p>
                            </td>
                            <td>
                                <input type ="password" name = "pass" class="form-control" placeholder="Type password here" /> 
                            </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Email:</p>
                            </td>
                            <td>
                                <input type ="text" name = "email" class="form-control" placeholder="Type email here" />
                            </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label for="photo">Upload Receipt Here :</label><br>
                            <input type="file"  name="receipt" id = "receipt" size ="30" /><br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan = "2" align="center">
                            <a href ="index.php">Cancel</a>
                            &nbsp;&nbsp;&nbsp;
                            <input type= "submit" name ="submit" value ="Apply" class ="btn btn-primary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div style="border-style: solid;
                        border-width: 1px;
                        padding: 35px 20px 35px 20px;
                        width: 580px;
                        border-radius: 10px;
                        border-color: #ccc;">
            <b><p class="b">Notes</p></b>
				<ol>
					<li class="d text-left">Once your registration APPROVED by Admin, you may login your account.</li>
					<li class="d text-left">Upload your payment receipt after login your account.</li>
				</ol>
            </div>
    </center>
</body>

</html>