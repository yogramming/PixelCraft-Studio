<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PixelCraft Studio | Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        :root {
            --primary-color: #1e88e5;
            --primary-hover: #1565c0;
            --secondary-blue: #bbdefb;
            --dark-blue: #0d47a1;
            --light-blue: #e3f2fd;
            --text-color: #0d47a1;
            --shadow-color: rgba(30, 136, 229, 0.2);
        }
        
        body {
            width: 100%;
            height: 100vh;
            overflow-x: hidden;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-blue);
        }
        
        main#main-login {
            width: 100%;
            height: 100vh;
            display: flex;
            background: white;
        }
        
        .site-title {
            position: absolute;
            top: 30px;
            left: 30px;
            z-index: 20;
            color: white;
            text-shadow: 0 2px 4px rgba(0,0,0,0.5);
            font-size: 2.4rem;
            font-weight: 700;
            font-family: 'Montserrat', sans-serif;
        }
        
        .site-title span {
            color: var(--secondary-blue);
        }
        
        #login-left {
            position: relative;
            width: 50%;
            height: 100%;
            background: url(assets/img/recruitment-cover.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        #login-left::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(13, 71, 161, 0.4);
        }
        
        #login-right {
            position: relative;
            width: 50%;
            height: 100%;
            background: linear-gradient(135deg, #ffffff 0%, #e3f2fd 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .logo {
            position: relative;
            width: 70%;
            max-width: 300px;
            height: auto;
            padding: 1.5rem;
            display: flex;
            justify-content: center;
            background: white;
            border-radius: 50%;
            box-shadow: 0 10px 25px var(--shadow-color);
            z-index: 10;
        }
        
        .logo img {
            max-width: 100%;
            height: auto;
        }
        
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 15px 30px var(--shadow-color);
            padding: 1rem;
            width: 90%;
            max-width: 500px;
            background: white;
        }
        
        .card-body {
            padding: 2rem;
        }
        
        .form-group label {
            font-weight: 500;
            color: var(--text-color);
            margin-bottom: 0.5rem;
        }
        
        .form-control {
            border-radius: 8px;
            border: 1px solid var(--secondary-blue);
            padding: 12px 15px;
            height: auto;
            font-size: 1rem;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(30, 136, 229, 0.25);
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            border-radius: 8px;
            padding: 10px 25px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(30, 136, 229, 0.3);
        }
        
        .login-text {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .login-text h3 {
            font-weight: 700;
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
            color: var(--dark-blue);
        }
        
        .login-text p {
            color: var(--primary-color);
            font-size: 0.95rem;
        }
        
        .separator {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 1.5rem 0;
            color: var(--primary-color);
        }
        
        .separator::before,
        .separator::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid var(--secondary-blue);
        }
        
        .separator::before {
            margin-right: 0.5rem;
        }
        
        .separator::after {
            margin-left: 0.5rem;
        }
        
        .signup-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .signup-link:hover {
            color: var(--primary-hover);
            text-decoration: none;
        }
        
        .alert {
            border-radius: 8px;
            padding: 0.75rem 1.25rem;
            margin-bottom: 1rem;
        }
        
        @media (max-width: 992px) {
            #login-left {
                display: none;
            }
            #login-right {
                width: 100%;
            }
            
            .site-title {
                color: var(--dark-blue);
                text-shadow: none;
                position: relative;
                top: 20px;
                left: 0;
                width: 100%;
                text-align: center;
            }
        }
        
        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1050;
        }
    </style>
</head>
<body id="page-top">
    <!-- Toast for alerts -->
    <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body text-white"></div>
    </div>
    
    <!-- Main Login Container -->
    <main id="main-login">
        <!-- Left Side - Image -->
        <div id="login-left">
            <h1 class="site-title">Pixel<span>Craft</span> Studio</h1>
            <div class="logo">
                <img src="assets/img/downloaded/gallery-logo.png" alt="Gallery Logo">
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div id="login-right">
            <div class="card">
                <div class="card-body">
                    <div class="login-text">
                        <h3>Welcome to PixelCraft</h3>
                        <p>Login to access your creative dashboard</p>
                    </div>
                    
                    <form id="login-form">
                        <div class="form-group">
                            <label for="email"><i class="fas fa-envelope mr-2"></i>Email</label>
                            <input type="text" id="email" name="email" class="form-control" placeholder="Enter your email">
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="fas fa-lock mr-2"></i>Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
                        </div>
                        <div class="form-group text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                        <div class="separator">or</div>
                        <div class="text-center">
                            <a href="javascript:void(0)" id="signup_btn" class="signup-link">Create an Account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Modals -->
    <div class="modal fade" id="confirm_modal" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="delete_content"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="confirm" onclick="">Continue</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="uni_modal" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="submit" onclick="$('#uni_modal form').submit()">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="uni_modal_right" role="dialog">
        <div class="modal-dialog modal-full-height modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"></div>
            </div>
        </div>
    </div>

    <div id="preloader"></div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#signup_btn').click(function(){
                uni_modal("Create Account","signup.php");
            });
            
            $('#login-form').submit(function(e){
                e.preventDefault();
                var loginBtn = $(this).find('button[type="submit"]');
                loginBtn.attr('disabled', true).html('<i class="fas fa-spinner fa-spin mr-2"></i> Logging in...');
                
                if($(this).find('.alert-danger').length > 0)
                    $(this).find('.alert-danger').remove();
                
                $.ajax({
                    url: 'ajax.php?action=login',
                    method: 'POST',
                    data: $(this).serialize(),
                    error: function(err){
                        console.log(err);
                        loginBtn.removeAttr('disabled').html('Login');
                    },
                    success: function(resp){
                        if(resp == 1){
                            location.href = 'index.php?page=home';
                        } else {
                            $('#login-form').prepend('<div class="alert alert-danger"><i class="fas fa-exclamation-circle mr-2"></i> Username or password is incorrect.</div>');
                            loginBtn.removeAttr('disabled').html('Login');
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>