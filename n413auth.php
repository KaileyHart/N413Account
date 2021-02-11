<?php
/*Author: Kailey Hart
//Project: N-413 Account
//Date: 02-10-2021
//Description: This page checks the username and password, sanitizes it, checks to see if it matches something in the database, then starts a session. It also tells the user if their login was successful or not. 
*/
    include("n413connect.php");
    
    function sanitize($item){
            global $link;
            $item = html_entity_decode($item);
            $item = trim($item);
            $item = stripslashes($item);
            $item = strip_tags($item);
            $item = mysqli_real_escape_string( $link, $item );
            return $item;
        }
        
        $username = "";
        $password = "";
        
        if(isset($_POST["username"])) { $username = sanitize($_POST["username"]); }
        if(isset($_POST["password"])) { $password = sanitize($_POST["password"]); }
        
        //Change for Web4 to n413_users
        $sql= "SELECT * FROM `users` 
        WHERE username = '".$username."'
        AND password = '".$password."'
        LIMIT 1";
        $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_BOTH);
    if($row){
     session_start();
     $_SESSION["user_id"] = $row["id"];
     $_SESSION["role"] = $row["role"];
 }
 
 include("head.php");
?>

<div class="container-fluid">
    <div id="headline" class="row mt-5">
        <div class="col-12 text-center">
            <h2>The Account Login</h2>
        </div> <!-- /col-12 -->
    </div> <!-- /row -->
    <div class="row mt-5">
        <div class="col-4"></div>  <!-- spacer -->
        <div class="col-4 text-center">
        <?php
            if(isset($_SESSION["user_id"])){
                echo '<h3>Congrats! You Logged In.</h3>';
            }else{
                echo '<h3>Uh oh...The Log-In was not successful. Check your credentials and try again.</h3>
                      <a href="login.php"><button class="btn btn-dark mt-5">Try Again</button></a>';
            }
        ?>
        </div> <!-- /.col-4 -->
    </div> <!-- /.row --> 
</div>  <!-- /.container-fluid -->
</body>
<script>
    var this_page = "login";
    var page_title = 'N413 ACCOUNT | Login';
		
    $(document).ready(function(){ 
            document.title = page_title;
            //navbar_update(this_page);
        }); //document.ready
</script>
</html>