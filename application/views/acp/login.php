<!doctype html>
<html class="no-js" lang="en">

<head>
    <title><?=$page_title?> | <?=sitename()?></title>
    <?php $this->load->view('acp/includes/header-assets.php'); ?>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area login-s2">
        <div class="container">
            <div class="login-box ptb--100">
                <form>
                    <div class="login-form-head">
                        <h4>User Login</h4>
                        <p>Hello, Login and start your day easily</p>
                        <p>Have a nice day</p>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="username">Username</label>
                            <input type="text" id="username" autocomplete="off">
                            <i class="ti-user"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="userpswrd">Password</label>
                            <input type="password" id="userpswrd" autocomplete="off">
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>                        
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Login <i class="ti-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <?php $this->load->view('acp/includes/footer-assets'); ?>

    <!-- custom js files -->
    <script src="<?=site_url()?>assets/js/acp/login.js"></script>
    <script type="text/javascript">
        $(function() {
            Login.init();
        });
    </script>
</body>

</html>