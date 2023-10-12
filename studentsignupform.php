<html>
    <head>
        <title>Student Signup page</title>
        <?php
          include("loginlink.php");
        ?>
        <link rel="stylesheet" href="styles.css">
    
    <script>
        function validate(){
              var textphonepattern= /^[0-9]{10}$/;
              var phone=document.forms["regform"]["textsphone"].value;
                if(phone.search(textphonepattern)==-1){
                    document.getElementById("phonemessage").innerHTML="Phone number should contain only digits";
                     return false;
                }
            var textnamepattern=/^[A-Za-z]+\s?[A-Za-z]+$/;
            var name=document.forms["regform"]["textsname"].value;
            if(name.search(textnamepattern)==-1){
                document.getElementById("namemessage").innerHTML="Name contains only alphabets with one space between each word";
                return false;
            }
            var npwdpattern=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,8}$/;
            var npwd=document.forms["regform"]["textpassword"].value;
            if(npwd.search(npwdpattern)==-1)
            {
                document.getElementById("pwdmessage").innerHTML="Password must contain at least 1 lower,1 upper,1 digit,1 special";
                return false;
            }
            var textrollpattern=/^[A-Za-z0-9]{8,20}$/;
            var rollno=document.forms["regform"]["textrollno"].value;
            if(rollno.search(textrollpattern)==-1){
                document.getElementById("rollmessage").innerHTML="Rollno contains only alphabets and digits with no spaces";
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
            <h3>STUDENT SIGNUP</h3>
        <form method="POST" action="studentsignup.php" name="regform" onsubmit="return validate();">
            
            <table>                                                                                                                                             
                <div align="center">
                <tr>
                    <td>Roll no</td>
                    <td>
                        <input type="text" name="textrollno" id="textrollno" maxlength="20" minlength="8"  required autofocus/>
                        <p id="rollmessage" style="color:tomato";></p>
                    </td>
                </tr>
                <tr>
                    <td>Student name</td>
                    <td>
                        <input type="text" name="textsname" id="textsname" maxlength="30" minlength="3"required  />
                        <p id="namemessage" style="color:tomato";></p>
                    </td>
                </tr>
               <tr>
                 <td>Phone</td>
                        <td>
                            <input type="text" name="textsphone" id="textsphone" maxlength="10" minlength="10"  required />
                            <p id="phonemessage" style="color:tomato";></p>
                        </td>
                </tr>
                <tr>
                <td>Email</td>
                    <td>
                        <input type="email" name="textsemail" id="textsemail"  required />
                    </td>
                    </tr>
                <tr>
                    <td>New Password</td>
                    <td>
                        <input type="password" name="textpassword" id="textpassword" maxlength="8" minlength="8" required />
                        <p id="pwdmessage" style="color:tomato";></p>
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td>
                        <input type="password" name="textcpassword" id="textcpassword"  required />
                    </td>
                 </tr>
                <tr>
                    <td>Course</td>
                    <td>
                        <select name="textcourse">
                        <option> </option> 
                        <option>BBA</option>
                        <option>BCA</option>
                        <option>BCom</option>
                        <option>BSC(CS)</option>
                        <option>MA(English)</option>
                        <option>MCom</option>
                        <option>MSc(CS)</option>
                        <option>Others</option>
                        </select>
                    </td>
                 </tr>
                 <tr>
                    <td>Semester</td>
                    <td>
                    <select name="textsem">
                        <option> </option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        </select>
                        
                    </td>
                 </tr>
                    
                
                <tr>
                    <td>
                        <input type="submit" class="btn btn-primary" name="btn" value="SIGN UP">
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
