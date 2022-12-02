<?php

    require_once 'core/init.php';

    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){//cheking whether the user logged in or not
        header("location: index.php");
        exit;//if user alrady logged in it will exit
    }

    if (isset($_POST['Login']) && !empty($_POST['email']) && !empty($_POST['password'])) //cheaking whether email or password empty when clicking the submit button
    {
        $email = $_POST["email"];//getting user typed email to a variable

        $sql = "SELECT * FROM user_ WHERE u_email = ?";//this is the quarry
        $stmt = $database->prepare($sql); //prepare the statement
        $stmt->bind_param("s", $email);//bind the table
        $stmt->execute();//ececuting the sql quarry
        $result = $stmt->get_result();//getting results of sql
        $userObj = $result->fetch_assoc();//

        if (isset($userObj["u_psw"])){
            if ($_POST['password'] == $userObj['u_psw']){
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['user'] = $userObj;

                $_COOKIE['loggedin'] = $_SESSION['loggedin'];
                $_COOKIE['email'] = $_SESSION['email'];
                $_COOKIE['user'] = $_SESSION['user'];

                // print_r($_SESSION);
                // print_r($_COOKIE);
                echo 'You have entered valid email and password';
                header('Refresh:0; URL=index.php');
            }
            else {
                echo ("Invalide Password");
            }
        }
        else{
            echo ("email is invalide");
        }
    }
?>

<?php
    include 'includes/head.php';
    include 'includes/header.php';
?>
<div class="A_background">

    <div class="login_wrapper">
        <div id = "frm">  
            <h1>Login</h1>  
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit = "return validation()">  
                <p>  
                    <label> Email: </label>  
                    <input type = "text" id ="email" name  = "email" />  
                </p>  
                <p>  
                    <label> Password: </label>  
                    <input type = "password" id ="pass" name  = "password" />  
                </p>  
                <p>     
                    <input type =  "submit" id = "btn" value = "Login" name="Login" />  
                </p>  
            </form> 
            <a href="index.php">Go to home Page</a>
        </div>
    </div>
<div>

<script>  
            function validation()  
            {  
                var id=document.f1.email.value;  
                var ps=document.f1.pass.value;  
                if(id.length=="" && ps.length=="") {  
                    alert("User Name and Password fields are empty");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("E-mail is empty");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Password field is empty");  
                    return false;  
                    }  
                }                             
            }  
        </script>  
<?php
    include 'includes/footer.php';
?>