<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacies Zone - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary: #4a90e2;
            --primary-dark: #357abd;
            --secondary: #6c757d;
            --success: #28a745;
            --danger: #dc3545;
            --light: #f8f9fa;
            --dark: #343a40;
            --pharma-green: #2ecc71;
            --pharma-blue: #3498db;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }

        .auth-container {
            display: flex;
            min-height: 100vh;
        }

        .auth-left {
            flex: 1;
            background: linear-gradient(135deg, var(--pharma-blue), var(--pharma-green));
            color: white;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .auth-left::before {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -100px;
            right: -100px;
        }

        .auth-left::after {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            bottom: -50px;
            left: -50px;
        }

        .logo {
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            z-index: 1;
        }

        .logo img {
            height: 50px;
            margin-right: 10px;
        }

        .logo h1 {
            font-size: 1.8rem;
            font-weight: 700;
        }

        .auth-left h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
            z-index: 1;
        }

        .auth-left p {
            margin-bottom: 2rem;
            max-width: 80%;
            z-index: 1;
        }

        .auth-right {
            flex: 1;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .auth-form {
            max-width: 400px;
            width: 100%;
            margin: 0 auto;
            background: white;
            padding: 2.5rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .auth-form h3 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: var(--dark);
            text-align: center;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark);
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--pharma-blue);
        }

        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background: var(--pharma-blue);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s;
            width: 100%;
        }

        .btn:hover {
            background: var(--primary-dark);
        }

        .btn-google {
            background: white;
            color: var(--dark);
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 1rem;
        }

        .btn-google:hover {
            background: #f8f9fa;
        }

        .btn-google i {
            margin-right: 10px;
            color: var(--danger);
        }

        .auth-footer {
            text-align: center;
            margin-top: 1.5rem;
            color: var(--secondary);
        }

        .auth-footer a {
            color: var(--pharma-blue);
            text-decoration: none;
            font-weight: 500;
        }

        .auth-footer a:hover {
            text-decoration: underline;
        }

        .forgot-password {
            text-align: right;
            margin-bottom: 1rem;
        }

        .forgot-password a {
            color: var(--pharma-blue);
            text-decoration: none;
            font-size: 0.9rem;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .auth-container {
                flex-direction: column;
            }

            .auth-left {
                padding: 2rem 1rem;
            }

            .auth-right {
                padding: 2rem 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="auth-container">
        <div class="auth-left">
            <div class="logo">
                <img src="Logo.png" alt="Pharmacies Zone Logo">
                <h1>Pharmacies Zone</h1>
            </div>
            <h2>Welcome Back!</h2>
            <p>Access your personalized medication management, prescription history, and health resources.</p>
        </div>

        <div class="auth-right">
            <form class="auth-form" method="POST" action="{{ route('auth_login_submit_emp') }}">
                @csrf
                <h3>Login to Your Account</h3>
                @if(session('success'))
                <div style="color: var(--success); margin-bottom: 1rem; text-align: center;">
                    {{ session('success') }}
                </div>
                @endif
                @if($errors->any())
                <div style="color: var(--danger); margin-bottom: 1rem;">
                    <ul style="list-style: none; padding: 0;">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control"
                        placeholder="Enter your email" required value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password"
                        class="form-control" placeholder="Enter your password" required>
                </div>
                <div class="forgot-password">
                    <a href="#">Forgot password?</a>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>
    </div>
</body>

</html>
