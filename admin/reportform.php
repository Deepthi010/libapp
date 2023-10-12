<?php
session_start();
//get catid parameter
if(empty($_SESSION))
{
    header('location:../adminsigninform.php');
}
?>
<html>
    <head>
        <title>Report</title>
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
                <form method="POST" action="viewreport.php">
                    <h2>Summary</h2>
                    <table class="table" style="font-weight:bold; width:100%;" >
                        <tr>
                            <td>From Date</td>
                            <td>
                                <input type="date" name="textfdate" required/>
                            </td>
                        </tr>
                        <tr>
                            <td>To Date</td>
                            <td>
                                <input type="date" name="texttdate" required/>
                            </td>
                        </tr>
                        <tr>
                        <td colspan="2">
                            <input type="submit" class="btn btn-primary" value="Generate"/>
                        </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <?php
        include("footer.php");
        ?>
    </body>
</html>