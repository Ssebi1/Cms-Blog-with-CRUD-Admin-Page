<?php
include "includes/db.php";
include "includes/header.php";

        if(isset($_POST['submit']))
        {
            $msg = escape($_POST['email']);
            $msg = wordwrap($msg,70);
            $subject = escape($_POST['subject']);
            $body = escape($_POST['body']);

            mail("sebidancau1234@gmail.com",$subject,$body);
        }

        

    ?>


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row " >
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1 style="text-align:center;">Contact</h1><br>
                    <form role="form" action="contact.php" method="post" id="login-form" autocomplete="off">
                        
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="subject">Message</label><br>
                            <textarea name="body" id="body" class="form-control" rows="5"></textarea>
                        </div>
                        
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Submit">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
