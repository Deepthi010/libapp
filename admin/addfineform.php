<?php
           session_start();
           if(empty($_SESSION))
                 {
                     header('location:../adminsigninform.php');
                 }
             ?>

<html>
    <head>
        <title>Add fine page</title>
        <?php
           include('headerlink.php');
          ?>
        <link rel="stylesheet" href="styles.css">
        
    </head>
    <body>
    <?php
        include('header.php');
        ?>

        <div class="container">
            
        <div class="item">
            <h3>ADD FINE</h3>
            <form method="POST" action="addcategory.php">
                <table>
                    <tr>
                        <td>Additional Fine</td>
                        <td>
                            <input type="text" name="textfine" id="textfine" required autofocus/>
        
                        </td>
                        </tr>
                        
                    <tr>
                       <td> <input type="submit" class="btn btn-primary" name="btn" value="SUBMIT"/>
                        </td>
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
              