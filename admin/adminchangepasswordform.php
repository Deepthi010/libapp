
        <?php
              session_start();
               if(empty($_SESSION))
                 {
                     header('location:../adminsigninform.php');
                 }
        ?>
<html>
    <head>
        <title>Change password</title>
        <?php
          include("headerlink.php");
         ?> 
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
    <?php
        include('header.php');
        ?>
        <div class="container">
            
       <div class="item">
           <form method="POST" action="adminchangepassword.php">
               <h3>Admin change password</h3>
               <table>
                   <tr>
                       <td>current password</td>
                       <td><input type="text" name="textcurrentpassword"></td>
                   </tr>

                   <tr>
                       <td>new password</td>
                       <td><input type="text" name="textnewpassword"></td>
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