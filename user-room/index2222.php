<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <style type="text/css">
        .font_lgo
        {
            height: 70px; 
            width: 70px; border-radius:30%;
            border: 2px solid  #ffd000;
        }
    </style>
   
<?php require('common/all_css.php'); ?>
</head>

<body class="loader-active">

    <!--== Preloader Area Start ==-->
    <div class="preloader">
        <div class="preloader-spinner">
            <div class="loader-content">
                <img src="assets/img/preloader.gif" alt="Syful-IT">
            </div>
        </div>
    </div>
    <!--== Preloader Area End ==-->

    <!--== Header Area Start ==-->
    <header id="header-area" class="fixed-top">
        <!--== Header Top Start ==-->
        
        <!--== Header Top End ==-->
        <?php require('common/top_bar.php'); ?>
        <!--== Header Bottom Start ==-->
        <div id="header-bottom">
            <div class="container">
                <div class="row">
                    <!--== Logo Start ==-->
                    <img src="assets/img/logo.png" alt="Syful-IT" class="rounded mx-auto d-block font_lgo" >                
                    <!--== Logo End ==-->

                    
                </div>
            </div>
        </div>
        <!--== Header Bottom End ==-->
    </header>
    <!--== Header Area End ==-->

    <!--== SlideshowBg Area Start ==-->
    <section id="slideslow-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="slideshowcontent">
                        <div class="display-table">
                            <div class="display-table-cell">
                               <h1>MEETING ROOM BOOKING!</h1>

        
                            <form action="login_action.php" method="post"  >
                                <!--== Pick Up Location ==-->
                               <span style="color:red;"><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span> 

                                <!--== Pick Up Date ==-->

                                <div class="book-item">
                                  
                                    <input type="text" name="user_login" placeholder="User LogIn ID" class="text-center col-md-6" required="">

                                    <div class="return-car">
                                      
                                        <input type="password" name="user_pass" placeholder="Password" class="text-center col-md-6" required="">
                                    </div>
                                </div>
                                <!--== Pick Up Location ==-->

                                

                                <div class="book-button text-center">
                                    <button type="submit"  name="submit" class="book-now-btn">LogIn</button>
                                </div>
                            </form>

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== SlideshowBg Area End ==-->

   

    <!--== Footer Area End ==-->
        <?php require('common/footer.php'); ?>
    <!--== Scroll Top Area Start ==-->
    <div class="scroll-top">
        <img src="assets/img/scroll-top.png" alt="JSOFT">
    </div>
    <!--== Scroll Top Area End ==-->
    <?php require('common/all_js.php'); ?>

</body>

</html>