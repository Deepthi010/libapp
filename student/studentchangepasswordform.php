<?php
           session_start();
           if(empty($_SESSION))
                 {
                     header('location:../studentsigninform.php');
                 }
             ?>

<html>
    <head>
        <title>Change password</title>
        <?php
        include('headerlink.php');
        ?>
        <script>
        function validate(){
        var npwdpattern=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,8}$/;
            var npwd=document.forms["regform"]["textnewpassword"].value;
            if(npwd.search(npwdpattern)==-1)
            {
                document.getElementById("pwdmessage").innerHTML="Password must contain at least 1 lower,1 upper,1 digit,1 special character";
                return false;
            }
        }
        </script>
    </head>
    <body>
    <?php
        include('header.php');
        ?>
        <div class="container">
            
       <div class="item">
           <form method="POST" action="studentchangepassword.php" name="regform" onsubmit="return validate();">
               <h3>Student change password</h3>
               <table>
                   <tr>
                       <td>current password</td>
                       <td><input type="text" name="textcurrentpassword"></td>
                   </tr>

                   <tr>
                       <td>new password</td>
                       <td><input type="text" name="textnewpassword" maxlength="8" minlength="8"></td>
                      <td> <p id="pwdmessage"  style="color:tomato";></p></td>
                   </tr>

                   <tr>
                       <td>confirm password</td>
                       <td><input type="text" name="textconfirmpassword"></td>
                   </tr>
                    
                   <tr>
                       <td colspan="2"><input type ="submit" class="btn btn-primary" name="btn" value="change"></td>
                   </tr>
                   
               </table>
               
           </form>
       </div> 
        </div>
        
             <?php
        include('footer.php');
        ?>
    </body>
</html>     