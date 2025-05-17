<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacies Zone - Sign Up</title>
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
            max-width: 450px;
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

        .dob-group {
            display: flex;
            gap: 10px;
        }

        .dob-group select {
            flex: 1;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 5px;
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
            <h2>Join Our Pharmacy Network</h2>
            <p>Create your account to access personalized medication management, prescription refills, and health resources.</p>
        </div>

        <div class="auth-right">
            <form class="auth-form" method="POST" action="{{ route('auth.signup.submit') }}">
                @csrf
                <h3>Create Account</h3>
                @if($errors->any())
                <div style="color: red; padding: 10px; margin-bottom: 15px; border: 1px solid red;">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Enter username" required>
                </div>

                <div class="form-group">
                    <div class="dob-group">
                        <div style="flex: 1;">
                            <label for="first_name">First Name</label>
                            <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First name" required>
                        </div>
                        <div style="flex: 1;">
                            <label for="last_name">Last Name</label>
                            <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last name" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="dateOfBirth">Date of Birth</label>
                    <input type="date" id="dateOfBirth" name="dateOfBirth" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="allergies">Allergies (Optional)</label>
                    <input type="text" id="allergies" name="allergies" class="form-control" placeholder="List any allergies">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter email" required>
                </div>

                <div class="form-group">
                    <label for="mobile_number">Mobile Number</label>
                    <input type="tel" id="mobile_number" name="mobile_number" class="form-control" placeholder="Enter mobile number" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Create password" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm password" required>
                </div>

                <button type="submit" class="btn">Sign Up</button>

                <button type="button" class="btn btn-google">
                    <i class="fab fa-google"></i> Sign up with Google
                </button>

                <div class="auth-footer">
                    Already have an account? <a href="{{ route('auth.login') }}">Log in</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
