<html>
    <head>
        <title>Faculty Signup page</title>
        <?php
          include("loginlink.php");
        ?>
        <link rel="stylesheet" href="styles.css">
    <script>
        function validate(){
              var textphonepattern= /^[0-9]{10}$/;
              var phone=document.forms["facregform"]["textphone"].value;
                if(phone.search(textphonepattern)==-1){
                    document.getElementById("phonemessage").innerHTML="Phone number should contain only digits";
                     return false;
                }
            var textnamepattern=/^[A-Za-z]+\s?[A-Za-z]+$/;
            var name=document.forms["facregform"]["textname"].value;
            if(name.search(textnamepattern)==-1){
                document.getElementById("namemessage").innerHTML="Name contains only alphabets with one space between each word";
                return false;
            }
            var npwdpattern=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,8}$/;
            var npwd=document.forms["facregform"]["textpassword"].value;
            if(npwd.search(npwdpattern)==-1)
            {
                document.getElementById("pwdmessage").innerHTML="Password must contain at least 1 lower,1 upper,1 digit,1 special symbol";
                return false;
            }
        }
        </script>
    </head>

<body>
        
        <?php
          include("header.php");
        ?>
        <div align="center">
        <h3>FACULTY SIGNUP</h3>
        <form method="POST" action="facultysignup.php" name="facregform" onsubmit="return validate();">
            
            <table>
                <div align="center">
                <tr>
                    <td>Faculty id</td>
                    <td>
                        <input type="number" name="textnumber" id="textnumber" required autofocus/>
                    </td>
                </tr>
                <tr>
                    <td>Faculty name</td>
                    <td>
                        <input type="text" name="textname" id="textname" maxlength="30" minlength="3" required />
                        <p id="namemessage" style="color:tomato";></p>
                    </td>
                </tr>
               <tr>
                 <td>Phone</td>
                        <td>
                            <input type="text" name="textphone" id="textphone" maxlength="10" minlength="10" required />
                            <p id="phonemessage" style="color:tomato";></p>
                        </td>
                </tr>
                <tr>
                <td>Email</td>
                    <td>
                        <input type="email" name="textemail" id="textemail" required />
                    </td>
                    </tr>
                <tr>
                    <td>New Password</td>
                    <td>
                        <input type="password" name="textpassword" id="textpassword"  maxlength="8" minlength="8" required />
                        <p id="pwdmessage"  style="color:tomato";></p>
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td>
                        <input type="password" name="textcpassword" id="textcpassword"  maxlength="8" minlength="8" required />
                    </td>
                 </tr>
                
                <tr>
                    <td>
                        <input type="submit" class="btn btn-primary" name="btn"value="SIGN UP">
                    </td>
                </tr>                            
                 </div>
            </table>
        </form>
        <?php
          include("footer.php");
          ?>
    </body>
    </html>
