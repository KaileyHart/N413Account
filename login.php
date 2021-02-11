<?php
/*Author: Kailey Hart
//Project: N-413 Account
//Date: 02-10-2021
//Description: This page displays a login form. It read whether the input is an actual user from the database and displays a successful or unsuccesful page after the user clicks submit. 
*/
    include("head.php");
?>
<div class="container-fluid">
    <div id="headline" class="row mt-5">
        <div class="col-12 text-center">
            <h2>The Account Log-in</h2>
        </div> <!-- /col-12 -->
    </div> <!-- /row -->
    <form method="POST" action="n413auth.php">
    <div class="row mt-5">
        <div class="col-4"></div>  <!-- spacer -->
        <div id="form-container" class="col-4">
            User Name: <input type="text" id="username" name="username" class="form-control" value="" placeholder="Enter User Name" required/><br/>
            Password: <input type="password" id="password" name="password" class="form-control" value="" placeholder="Enter Password" required/><br/>
            <button type="submit" id="submit" class="btn btn-dark float-right">Submit</button>
        </div>  <!-- /#form-container -->
    </div>  <!-- /.row -->
</form>
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