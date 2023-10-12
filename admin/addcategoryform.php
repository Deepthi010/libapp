<?php
           session_start();
           if(empty($_SESSION))
                 {
                     header('location:../adminsigninform.php');
                 }
             ?>

<html>
    <head>
        <title>Add category page</title>
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
            <h3>ADD NEW CATEGORY</h3>
            <form method="POST" action="addcategory.php">
                <table>
                    <tr>
                        <td>New Category</td>
                        <td>
                            <input type="text" name="textcategory" id="textcategory" required autofocus/>
        
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
              