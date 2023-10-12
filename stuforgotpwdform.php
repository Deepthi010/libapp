<html>
    <head>
        <title>Forgot password</title>
        <?php
        include("loginlink.php");
        ?>
    </head>
    <body>
    <?php
        include("header.php");
        ?>
        <form method="POST" action="stuforgotpwd.php">
            <h3>Forgot Password</h3>
            <table class="table">
                <tr>
                    <td>Email Id</td>
                    <td><input type="email" name="textemailid"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" class="btn btn-primary" name="btn" value="SUBMIT"></td>    
                </tr>
            </table>
        </form>
        <?php
        include("footer.php");
        ?>
    </body>
</html>