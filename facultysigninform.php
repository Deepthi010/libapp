<html>
    <head>
        <title>Faculty Signin page</title>
        <?php
          include("loginlink.php")
        ?>
    </head>
    <body>
        <?php
          include("header.php")
          ?>
        <div align="center">
            <h3>FACULTY SIGNIN</h3>
            <form method="POST" action="facultysignin.php">
                <table>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="email" name="textemail" id="textemail" required autofocus/>
        
                        </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>
                                <input type="password" name="textpassword" id="textpassword" required />
            
                            </td>
                            </tr>
                       
                        <tr>
                          <td>
                            <a href="facultysignupform.php">New faculty? Sign up</a>
                         </td>
                        </tr>
                    <tr>
                       <td> <input type="submit" class="btn btn-primary" name="btn" value="SIGNIN"/>
                        </td>
                    </tr>
                </table>
                <a href="forgotpwdform.php">Forgotpassword? Click here</a>
                </form>
                </div>
                <?php
          include("footer.php");
          ?>
            </body>
        </html>
       