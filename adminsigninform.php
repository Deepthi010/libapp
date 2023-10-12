<html>
    <head>
        <title>Admin signin page</title>
        <?php
    include ('loginlink.php');
    ?> 
    <script>
    function myfns(){
//count++;
console.log(count);
if (count>3){
document.getElementById("btn").disabled = true;
alert("Cannot login now ");

}
    }
</script>
</head>
<body>
    <?php
    include ('header.php');
    ?>

        <div align="center">
            <h3>ADMIN SIGNIN</h3>
            <form method="POST" action="adminsignin.php">
                <table>
                    <tr>
                        <td>
                     E Mail ID
                     </td>
                        <td>
                        <div class="wrap-input100 validate-input" data-validate = "Enter username">
                            <input type="email"  name="textemail" id="textemail" required autofocus/>
                            
</div>
                        </td>
                        </tr>
                        <tr>
                        <td>
                            Password
                            </td>
                            <td>
                            <div class="wrap-input100 validate-input" data-validate="Enter password">
                                <input type="password" name="textpassword" id="textpassword" required />
                           
</div>
                            </td>
                            </tr>
                            
                            
                     <tr>
                       <td> <input type="submit" class="btn btn-primary" id="btn" name="btn" value="SIGNIN" onclick="myfns()"/>
                        </td>
                    </tr>
                </table>
                <a href="adminforgotpwdform.php">Forgotpassword? Click here</a>
                </form>
                </div>

                <?php
    include ('footer.php');
    ?>
            </body>
        </html>
        
function myfns(){
count++;
console.log(count);
if (count>3){
document.getElementById("btn").disabled = true;
alert("You can only click this button 3 times !!!");

}
  
       

 
