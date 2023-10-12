<html>
    <head>
        <title>forgot password</title>
        <?php
        include("loginlink.php");
        ?>
    </head>
    <body>
    <?php
        include("header.php");
        ?>
        <form method="POST" action="forgotpwd.php">
            <h3>Forgot Password</h3>
            <table class="table">
                <tr>
                    <td>Email Id</td>
                    <td><input type="email" name="textemailid"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="btn" class="btn btn-primary"  value="SUBMIT"></td>    
                </tr>
            </table>
        </form>
        <?php
        include("footer.php");
        ?>
    </body>
</html>