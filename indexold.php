<?php include('db/config.php');
session_start();
error_reporting(0);
?>

<?php include('include/header.php');    
 include('include/social_link_top.php');  ?>
<style type="text/css">
     .roundSaif {
   /* border-radius: 10px 20px;*/
   border-radius:30%;
    border: 2px solid #ffd000;
    padding: 1px; 
    width: 100px;
    height: 100px;
   /* margin-left: 45%;*/

    overflow: hidden;
    position: absolute;
    top: calc(100px/2);
    left: calc(50% - 50px);
}
 </style>
   
                    

 

    <!--== Slider Area Start ==-->
    <section id="slider-area">
        <!--== slide Item One ==-->
        <div class="single-slide-item overlay">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="book-a-car">
                            <a href="index.php" >
                            <img src="assets/img/logo.png" class="roundSaif" alt="CPB" >
                        </a>
                            <form action="loging_action.php" method="POST" class="form">
                                <!--== Pick Up Location ==-->
                               <span style="color:red;"><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span> 

                                <!--== Pick Up Date ==-->

                                <div class="pick-up-date book-item">
                                    <h4>Login ID:</h4>
                                    <input type="text" name="user_login" class="form-control text-center" placeholder="User LogIn ID" required="">

                                    <div class="return-car">
                                        <h4>Password:</h4>
                                        <input type="password" name="password" class="form-control text-center" placeholder="Password" required="">
                                    </div>
                                </div>
                                <!--== Pick Up Location ==-->

                                

                                <div class="book-button text-center">
                                    <button type="submit"  name="submit" class="book-now-btn">LogIn</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-7 text-right">
                        <div class="display-table">
                            <div class="display-table-cell">
                                <div class="slider-right-text">
                                    <h1>ARE YOU BOOKING A CAR TODAY ??</h1>
                                    <p>FOR COMFORTABLE CAR... <br> Please Log In First.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--== slide Item One ==-->
    </section>
    <!--== Slider Area End ==--> 
               
<?php include('include/footer.php'); ?>