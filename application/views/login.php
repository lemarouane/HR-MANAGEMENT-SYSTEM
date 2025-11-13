<!DOCTYPE html>
<html lang="en">

<head>
        <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Professional HR Management System">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>HR Management System | Secure Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            background: #0f172a;
            position: relative;
            overflow-x: hidden;
        }

        /* Sophisticated animated background */
        .bg-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
            overflow: hidden;
        }

        .grid-overlay {
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(99, 102, 241, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(99, 102, 241, 0.03) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: gridMove 20s linear infinite;
        }

        @keyframes gridMove {
            0% { transform: translate(0, 0); }
            100% { transform: translate(50px, 50px); }
        }

        .glow-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.15;
            animation: float 15s infinite ease-in-out;
        }

        .orb-1 {
            width: 500px;
            height: 500px;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            top: -10%;
            right: -5%;
            animation-delay: 0s;
        }

        .orb-2 {
            width: 400px;
            height: 400px;
            background: linear-gradient(135deg, #06b6d4, #3b82f6);
            bottom: -10%;
            left: -5%;
            animation-delay: 5s;
        }

        .orb-3 {
            width: 350px;
            height: 350px;
            background: linear-gradient(135deg, #a855f7, #ec4899);
            top: 40%;
            left: 50%;
            animation-delay: 10s;
        }

        @keyframes float {
            0%, 100% {
                transform: translate(0, 0) scale(1);
            }
            33% {
                transform: translate(50px, -50px) scale(1.1);
            }
            66% {
                transform: translate(-50px, 50px) scale(0.9);
            }
        }

        /* Main container */
        .login-wrapper {
            position: relative;
            z-index: 10;
            min-height: 100vh;
            display: flex;
            padding: 20px;
        }

        .left-panel {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 60px;
            color: white;
        }

        .brand-section {
            margin-bottom: 60px;
        }

        .brand-logo {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 40px;
        }

        .logo-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 40px rgba(99, 102, 241, 0.4);
        }

        .logo-icon i {
            font-size: 28px;
            color: white;
        }

        .brand-name {
            font-size: 24px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .hero-content h1 {
            font-size: 52px;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 24px;
            background: linear-gradient(135deg, #ffffff, #94a3b8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-content p {
            font-size: 18px;
            color: #94a3b8;
            line-height: 1.8;
            margin-bottom: 40px;
            max-width: 500px;
        }

        .features-list {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
        }

        .feature-item {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 12px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .feature-item:hover {
            background: rgba(255, 255, 255, 0.05);
            border-color: rgba(99, 102, 241, 0.3);
            transform: translateY(-5px);
        }

        .feature-icon {
            width: 44px;
            height: 44px;
            background: rgba(99, 102, 241, 0.15);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #818cf8;
            font-size: 18px;
        }

        .feature-text h4 {
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 4px;
            color: #e2e8f0;
        }

        .feature-text p {
            font-size: 12px;
            color: #64748b;
            margin: 0;
            line-height: 1.5;
        }

        /* Right panel - Login form */
        .right-panel {
            width: 520px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .login-card {
            width: 100%;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 50px;
            box-shadow: 0 20px 80px rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: slideInRight 0.6s ease-out;
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .login-header h2 {
            font-size: 32px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 8px;
        }

        .login-header p {
            font-size: 15px;
            color: #64748b;
        }

        .security-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: #f0fdf4;
            border: 1px solid #86efac;
            border-radius: 20px;
            font-size: 13px;
            color: #166534;
            margin-bottom: 30px;
        }

        .security-badge i {
            color: #22c55e;
        }

        .alert-custom {
            background: linear-gradient(135deg, #fee2e2, #fecaca);
            color: #991b1b;
            border: 1px solid #fca5a5;
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 25px;
            display: flex;
            align-items: flex-start;
            gap: 12px;
            animation: shake 0.5s;
        }

        .alert-custom i {
            font-size: 18px;
            margin-top: 2px;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 10px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 16px;
            z-index: 2;
            transition: color 0.3s ease;
        }

        .form-control {
            width: 100%;
            height: 56px;
            padding: 16px 20px 16px 52px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 500;
            color: #0f172a;
            background: #f8fafc;
            transition: all 0.3s ease;
        }

        .form-control::placeholder {
            color: #94a3b8;
            font-weight: 400;
        }

        .form-control:focus {
            outline: none;
            border-color: #6366f1;
            background: white;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }

        .form-control:focus ~ .input-icon {
            color: #6366f1;
        }

        .password-toggle {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #94a3b8;
            cursor: pointer;
            padding: 8px;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: #6366f1;
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .custom-checkbox {
            position: relative;
            width: 20px;
            height: 20px;
        }

        .custom-checkbox input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 20px;
            width: 20px;
            background-color: #f1f5f9;
            border: 2px solid #cbd5e1;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .custom-checkbox input:checked ~ .checkmark {
            background-color: #6366f1;
            border-color: #6366f1;
        }

        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
            left: 6px;
            top: 2px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        .custom-checkbox input:checked ~ .checkmark:after {
            display: block;
        }

        .remember-me label {
            font-size: 14px;
            color: #475569;
            cursor: pointer;
            user-select: none;
        }

        .forgot-link {
            font-size: 14px;
            color: #6366f1;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .forgot-link:hover {
            color: #4f46e5;
        }

        .btn-login {
            width: 100%;
            height: 56px;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            border: none;
            border-radius: 12px;
            color: white;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-login:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 40px rgba(99, 102, 241, 0.4);
        }

        .btn-login:hover:before {
            left: 100%;
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 30px 0;
            color: #94a3b8;
            font-size: 13px;
            font-weight: 500;
        }

        .divider:before,
        .divider:after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e2e8f0;
        }

        .divider span {
            padding: 0 20px;
        }

        .support-links {
            text-align: center;
        }

        .support-links a {
            color: #64748b;
            text-decoration: none;
            font-size: 14px;
            margin: 0 15px;
            transition: color 0.3s ease;
        }

        .support-links a:hover {
            color: #6366f1;
        }

        .support-links i {
            margin-right: 6px;
        }

        /* Preloader */
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #0f172a;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }

        .preloader.hidden {
            opacity: 0;
            visibility: hidden;
        }

        .loader {
            width: 60px;
            height: 60px;
            position: relative;
        }

        .loader:before,
        .loader:after {
            content: '';
            position: absolute;
            border-radius: 50%;
            animation: pulse 2s ease-in-out infinite;
        }

        .loader:before {
            width: 100%;
            height: 100%;
            background: rgba(99, 102, 241, 0.3);
            animation-delay: 0s;
        }

        .loader:after {
            width: 60%;
            height: 60%;
            background: #6366f1;
            top: 20%;
            left: 20%;
            animation-delay: 0.5s;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(0.8);
                opacity: 1;
            }
            50% {
                transform: scale(1.2);
                opacity: 0.3;
            }
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .left-panel {
                padding: 40px;
            }

            .hero-content h1 {
                font-size: 42px;
            }
        }

        @media (max-width: 992px) {
            .login-wrapper {
                flex-direction: column;
            }

            .left-panel {
                padding: 40px 20px;
            }

            .hero-content h1 {
                font-size: 36px;
            }

            .right-panel {
                width: 100%;
                max-width: 520px;
                margin: 0 auto;
            }

            .features-list {
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
            }

            .feature-item {
                padding: 16px;
            }
        }

        @media (max-width: 576px) {
            .login-card {
                padding: 35px 25px;
            }

            .hero-content h1 {
                font-size: 32px;
            }

            .login-header h2 {
                font-size: 26px;
            }

            .features-list {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="loader"></div>
    </div>

    <!-- Background -->
    <div class="bg-wrapper">
        <div class="grid-overlay"></div>
        <div class="glow-orb orb-1"></div>
        <div class="glow-orb orb-2"></div>
        <div class="glow-orb orb-3"></div>
    </div>

    <!-- Main Content -->
    <div class="login-wrapper">
        <!-- Left Panel -->
        <div class="left-panel">
            <div class="brand-section">
                <div class="brand-logo">
                    <div class="logo-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="brand-name">HR System</div>
                </div>
            </div>

            <div class="hero-content">
                <h1>Gestion avancée des ressources humaines</h1>
                <p>Simplifiez vos opérations RH avec notre plateforme complète. Gérez les employés, la paie, les présences et les performances dans un seul système sécurisé.</p>

                <div class="features-list">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="feature-text">
                            <h4>Sécurité de niveau bancaire</h4>
                            <p>Chiffrement 256 bits & authentification multi-facteurs</p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="feature-text">
                            <h4>Analyse en temps réel</h4>
                            <p>Tableaux de bord complets & outils de reporting</p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div class="feature-text">
                            <h4>Accès mobile</h4>
                            <p>Accès de n'importe où, sur n'importe quel appareil</p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-laptop"></i>
                        </div>
                        <div class="feature-text">
                            <h4>Accès multi-appareils</h4>
                            <p>Accès depuis plusieurs appareils grâce à la technologie responsive</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Panel - Login Form -->
        <div class="right-panel">
            <div class="login-card">
                <div class="login-header">
                    <div class="security-badge">
                        <i class="fas fa-lock"></i>
                        <span>Portail de connexion sécurisé</span>
                    </div>
                    <h2>Connexion</h2>
                    <p>Entrez vos identifiants pour accéder à votre compte</p>
                </div>

                <!-- Alert Message -->
                <?php if(!empty($this->session->flashdata('feedback'))): ?>
                <div class="alert-custom">
                    <i class="fas fa-exclamation-triangle"></i>
                    <div><?php echo $this->session->flashdata('feedback'); ?></div>
                </div>
                <?php endif; ?>

                <!-- Login Form -->
                <form method="post" action="login/Login_Auth" autocomplete="off">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-user" style="font-size: 12px;"></i>
                            Email professionnel
                        </label>
                        <div class="input-wrapper">
                            <input 
                                type="text" 
                                class="form-control" 
                                name="email" 
                                value="<?php if(isset($_COOKIE['email'])) { echo $_COOKIE['email']; } ?>" 
                                placeholder="Entrez votre email professionnel"
                                required
                                autocomplete="email"
                            >
                            <i class="fas fa-envelope input-icon"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-lock" style="font-size: 12px;"></i>
                            Mot de passe
                        </label>
                        <div class="input-wrapper">
                            <input 
                                type="password" 
                                class="form-control" 
                                name="password" 
                                id="password"
                                value="<?php if(isset($_COOKIE['password'])) { echo $_COOKIE['password']; } ?>" 
                                placeholder="Entrez votre mot de passe" 
                                required
                                autocomplete="current-password"
                            >
                            <i class="fas fa-lock input-icon"></i>
                            <button type="button" class="password-toggle" onclick="togglePassword()">
                                <i class="fas fa-eye" id="toggleIcon"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-footer">
                        <div class="remember-me">
                            <label class="custom-checkbox">
                                <input type="checkbox" name="remember" id="remember-me">
                                <span class="checkmark"></span>
                            </label>
                            <label for="remember-me">Se souvenir de moi</label>
                        </div>
                        <a href="#" class="forgot-link">Mot de passe oublié?</a>
                    </div>

                    <button type="submit" class="btn-login">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Se connecter</span>
                    </button>

                    <div class="divider">
                        <span>Besoin d'aide?</span>
                    </div>

                    <div class="support-links">
                        <a href="#"><i class="fas fa-headset"></i>Support</a>
                        <a href="#"><i class="fas fa-book"></i>Documentation</a>
                        <a href="#"><i class="fas fa-shield-alt"></i>Confidentialité</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        // Hide preloader
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.querySelector('.preloader').classList.add('hidden');
            }, 800);
        });

        // Password toggle
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Input animations
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-1px)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });

        // Button click effect
        document.querySelector('.btn-login').addEventListener('click', function(e) {
            if (this.querySelector('form').checkValidity()) {
                this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Signing in...';
            }
        });
    </script>
</body>

</html>