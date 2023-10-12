<?php
              session_start();
               if(empty($_SESSION))
                 {
                     header('location:../facultysigninform.php');
                 }
        ?>


<html>
    <head>
        <title>Change password</title>
        <?php
        include('headerlink.php');
        ?>
        <link rel="stylesheet" href="styles.css">
        <script>
        function validate(){
        var npwdpattern=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,8}$/;
            var npwd=document.forms["facregform"]["textnewpassword"].value;
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
           <form method="POST" action="facultychangepassword.php" name="facregform" onsubmit="return validate();">
               <h3>Faculty change password</h3>
               <table>
                   <tr>
                       <td>Current password</td>
                       <td><input type="text" name="textcurrentpassword"></td>
                   </tr>

                   <tr>
                       <td>New password</td>
                       <td><input type="text" name="textnewpassword" maxlength="8" minlength="8"></td>
                       <td> <p id="pwdmessage"  style="color:tomato";></p></td>
                   </tr>

                   <tr>
                       <td>Confirm password</td>
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