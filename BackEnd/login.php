<!DOCTYPE html>
<html lang="en">

<?php include("{$_SERVER["DOCUMENT_ROOT"]}/Backend/includes/_head.php") ;?>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="card col-lg-4 mx-auto" style="border-radius: 1.25rem; opacity: 0.9">
                        <div class="card-body px-5 py-5">
                            <h3 class="card-title text-left mb-3" style="font-size: 36px;
                            line-height: 1em;
                            color: #00bcd4;">Connexion</h3>
                            <form action="actions/action.php" method="post">
                                <div class="form-group">
                                    <label>Username ou email <span style="color:red">*</span></label>
                                    <input name="username" type="name" class="form-control p_input">
                                </div>
                                <div class="form-group">
                                    <label>Mot de passe  <span style="color:red">*</span></label>
                                    <input  name="password" type="password" class="form-control p_input">
                                    
                                </div>
                                <div style="margin-top:20px;margin-bottom:20px;">    
                                    <?php
                                    if(isset($_GET["loginFailed"]))
                                    {?>
                                    <span style="color: #f50303; font-weight: bold;"> Username or password are incorrect </span>
                                    <?php } ?>
                                </div>
                                
                                    <div class="text-center">
                                    <button  name="login" type="submit" class="btn btn-primary btn-block enter-btn">Connexion</button>
                                </div>    
                            </form>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>

    <!-- endinject -->
</body>

</html>