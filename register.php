<html>
<?php require('header.php'); ?>
<body>
<h1>Register Account</h1>
    <form action ="PHP/apply.php" method = "POST">
    <table border = "1">
        <tr>
            <td colspan="2">
                <p>Register Form</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Username:</p>
            </td>
            <td>
                <input type ="text" name = "username">
            </td>
        </tr>
        <tr>
            <td>
                <p>Password:</p>
                </td>
                <td>
                    <input type ="password" name = "pass">
                </td>
        </tr>
        <tr>
            <td>
                <p>Email:</p>
                </td>
                <td>
                    <input type ="text" name = "email">
                </td>
        </tr>
        <tr>
            <td colspan = "2">
                <a href ="index.php" class = "g">Cancel</a>
                <input type= "submit" name ="submit" value ="Apply" class ="g"> 
            </td>
        </tr>
        <tr>
			<td colspan="2">
			    <b><p class="b">Notes</p></b>
				<ul>
					<li class="d">Once your registration APPROVED by Admin, you may login your account.</li>
					<li class="d">Upload your payment receipt after login your account.</li>
				</ul>
			</td>
		</tr>
        
    </table>
    </form>
</body>
</html>