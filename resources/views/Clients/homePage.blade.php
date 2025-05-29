<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacies Zone - Your Online Pharmacy</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            background-color: #2c3e50;
            color: white;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo img {
            height: 40px;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
        }

        .nav-links a.active {
            color: #3498db;
        }

        .profile-icon {
            background-color: #3498db;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            margin-left: 1rem;
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 20px;
        }

        .section-title {
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            color: #2a7fba;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background-color: #2a7fba;
        }

        .hero-section {
            width: 100%;
            height: 500px;
            position: relative;
            overflow: hidden;
            margin-bottom: 3rem;
        }

        .hero-carousel {
            display: flex;
            width: 100%;
            height: 100%;
            transition: transform 0.5s ease;
        }

        .hero-slide {
            min-width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .hero-slide::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            color: white;
            text-align: center;
            padding: 0 20px;
            max-width: 800px;
        }

        .hero-content h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }

        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        .hero-btn {
            display: inline-block;
            padding: 12px 30px;
            background-color: #2a7fba;
            color: white;
            border-radius: 4px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .hero-btn:hover {
            background-color: #1e6ca3;
            transform: translateY(-3px);
        }

        .carousel-dots {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
        }

        .carousel-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: all 0.3s;
        }

        .carousel-dot.active {
            background-color: white;
            transform: scale(1.2);
        }

        .pharmacy-tag {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: rgba(42, 127, 186, 0.9);
            color: white;
            padding: 8px 15px;
            border-radius: 4px;
            font-weight: 600;
            z-index: 3;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 768px) {
            .hero-section {
                height: 400px;
            }

            .hero-content h2 {
                font-size: 2rem;
            }

            .hero-content p {
                font-size: 1rem;
            }
        }

        @media (max-width: 576px) {
            .hero-section {
                height: 350px;
            }

            .pharmacy-tag {
                top: 10px;
                left: 10px;
                font-size: 0.9rem;
            }
        }

        .medicine-grid,
        .pharmacy-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .medicine-card,
        .pharmacy-card {
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .medicine-card:hover,
        .pharmacy-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .medicine-img {
            height: 100px;
            background-color: #e9f5ff;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .medicine-img img {
            max-width: 40%;
            max-height: 40%;
            object-fit: contain;
        }

        .medicine-details,
        .pharmacy-details {
            padding: 1.2rem;
        }

        .medicine-name,
        .pharmacy-name {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .medicine-desc {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .medicine-price {
            font-size: 1.2rem;
            font-weight: 700;
            color: #2a7fba;
            margin-bottom: 1rem;
        }

        .medicine-actions {
            display: flex;
            justify-content: space-between;
        }

        .btn {
            padding: 0.5rem 1rem;
            border-radius: 4px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
        }

        .btn-primary {
            background-color: #2a7fba;
            color: white;
        }

        .btn-primary:hover {
            background-color: #1e6ca3;
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid #2a7fba;
            color: #2a7fba;
        }

        .btn-outline:hover {
            background-color: #2a7fba;
            color: white;
        }

        .pharmacy-img {
            height: 120px;
            background-color: #f0f8ff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .pharmacy-img img {
            max-width: 70%;
            max-height: 70%;
            object-fit: contain;
        }

        .pharmacy-location {
            display: flex;
            align-items: center;
            color: #666;
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }

        .pharmacy-location i {
            margin-right: 5px;
            color: #2a7fba;
        }

        .contact-section {
            background-color: #fff;
            padding: 3rem;
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 3rem;
        }

        .contact-info {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-top: 2rem;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
        }

        .contact-icon {
            font-size: 1.5rem;
            color: #2a7fba;
        }

        .contact-text h3 {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .contact-text p {
            color: #666;
            font-size: 0.9rem;
        }

        footer {
            background-color: #2a3f54;
            color: #fff;
            padding: 3rem 5%;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-column h3 {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .footer-column h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 2px;
            background-color: #2a7fba;
        }

        .footer-column p,
        .footer-column a {
            color: #b8c7d8;
            font-size: 0.9rem;
            margin-bottom: 0.8rem;
            display: block;
        }

        .footer-column a:hover {
            color: #fff;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-links a {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background-color: #3a4f66;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s;
        }

        .social-links a:hover {
            background-color: #2a7fba;
        }

        .copyright {
            text-align: center;
            padding-top: 2rem;
            margin-top: 2rem;
            border-top: 1px solid #3a4f66;
            color: #b8c7d8;
            font-size: 0.9rem;
        }

        @media (max-width: 1024px) {

            .medicine-grid,
            .pharmacy-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .contact-info {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-content {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                gap: 1rem;
            }

            .medicine-grid,
            .pharmacy-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .contact-info {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .navbar {
                flex-direction: column;
                padding: 1rem;
            }

            .logo {
                margin-bottom: 1rem;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }

            .medicine-grid,
            .pharmacy-grid {
                grid-template-columns: 1fr;
            }

            .footer-content {
                grid-template-columns: 1fr;
            }
        }

        .pagination-title {
            text-align: center;
            margin-top: 2rem;
            font-size: 1rem;
            font-weight: normal;
        }

        .pagination-title .pagination {
            display: inline-flex;
            list-style: none;
            padding: 0;
            margin: 0;
            gap: 0.3rem;
        }

        .pagination-title .pagination li {
            display: inline-block;
        }

        .pagination-title .pagination li a,
        .pagination-title .pagination li span {
            display: inline-block;
            padding: 0.3rem 0.6rem;
            border-radius: 3px;
            text-decoration: none;
            border: 1px solid #ddd;
            color: #3498db;
            font-size: 0.8rem;
        }

        .pagination-title .pagination li.active span {
            background-color: #3498db;
            color: white;
            border-color: #3498db;
        }

        .pagination-title .pagination li a:hover {
            background-color: #f5f5f5;
        }

        .pagination-title .pagination li.disabled span {
            color: #aaa;
            border-color: #eee;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <img src="{{ asset('Logo.png') }}" alt="Pharmacies Zone Logo">
            <h1>Pharmacies Zone</h1>
        </div>
        <div class="nav-links">
            <a href="{{ route('clientPage') }}" class="btn btn-primary">Home</a>
            <a href="{{ route('MedicinesList') }}">Medicines</a>
            <a href="{{ route('pharmacies') }}">Pharmacies</a>
            <a href="{{ route('orders.my') }}">Orders</a>
            <a href="{{ route('cart.index') }}">
                Cart
                @if(count((array) session('cart')) > 0)
                <span class="badge bg-danger">{{ count((array) session('cart')) }}</span>
                @endif
            </a>
        </div>
        <form action="{{ route('auth.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-light colored to-blue-800 border to-black">Logout</button>
        </form>
        <div class="profile-icon">Mohamad</div>
    </nav>
    <section class="hero-section">
        <div class="pharmacy-tag">
            Lebanon's Trusted Online Pharmacy Since 2025
        </div>
        <div class="hero-carousel">
            <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1587854692152-cbe660dbde88?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
                <div class="hero-content">
                    <h2>Your Health, Our Priority</h2>
                    <p>Get authentic medicines delivered to your doorstep across Lebanon</p>
                    <a href="#" class="hero-btn">Shop Now</a>
                </div>
            </div>

            <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1579684385127-1ef15d508118?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
                <div class="hero-content">
                    <h2>24/7 Pharmacy Services</h2>
                    <p>Emergency medications available with our partner pharmacies nationwide</p>
                    <a href="#" class="hero-btn">Find a Pharmacy</a>
                </div>
            </div>

            <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
                <div class="hero-content">
                    <h2>Healthcare Made Easy</h2>
                    <p>Consult with licensed pharmacists and get expert advice online</p>
                    <a href="#" class="hero-btn">Ask a Pharmacist</a>
                </div>
            </div>
        </div>
        <div class="carousel-dots">
            <div class="carousel-dot active"></div>
            <div class="carousel-dot"></div>
            <div class="carousel-dot"></div>
        </div>
    </section>
    <div class="container">
        <section>
            <h2 class="section-title">Featured Medicines</h2>
            <div class="medicine-grid">
                @foreach($medicines as $medicine)
                <div class="medicine-card">
                    <div class="medicine-img">
                        @if($medicine->image)
                        <img src="{{ asset('storage/' . $medicine->image) }}" alt="{{ $medicine->medicine_name }}">
                        @else
                        <img src="https://via.placeholder.com/150x150" alt="Medicine Image">
                        @endif
                    </div>
                    <div class="medicine-details">
                        <h3 class="medicine-name">{{ $medicine->medicine_name }}</h3>
                        <p class="medicine-desc">{{ $medicine->description }}</p>
                        <div class="medicine-price">${{ number_format($medicine->price, 2) }}</div>
                        <div class="medicine-actions">
                            <form action="{{ route('cart.add', $medicine->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </form>
                            <a href="{{ route('medicines.show', $medicine->id) }}" class="btn btn-outline">View</a>
                        </div>
                    </div>
                </div>
                @endforeach
                {{ $medicines->links() }}
            </div>
        </section>
        <section>
            <h2 class="section-title">Featured Pharmacies</h2>
            <div class="pharmacy-grid">
                <div class="pharmacy-card">
                    <div class="pharmacy-img">
                        <img src="https://via.placeholder.com/150x80" alt="Pharmacy Logo">
                    </div>
                    <div class="pharmacy-details">
                        <h3 class="pharmacy-name">Beirut Pharmacy</h3>
                        <p class="pharmacy-desc">24/7 emergency services available</p>
                        <div class="pharmacy-location">
                            <i>📍</i> Downtown Beirut
                        </div>
                        <div class="medicine-actions">
                            <button class="btn btn-outline">View Pharmacy</button>
                        </div>
                    </div>
                </div>

                <div class="pharmacy-card">
                    <div class="pharmacy-img">
                        <img src="https://via.placeholder.com/150x80" alt="Pharmacy Logo">
                    </div>
                    <div class="pharmacy-details">
                        <h3 class="pharmacy-name">Hamra MedCare</h3>
                        <p class="pharmacy-desc">Specialized in rare medications</p>
                        <div class="pharmacy-location">
                            <i>📍</i> Hamra Street
                        </div>
                        <div class="medicine-actions">
                            <button class="btn btn-outline">View Pharmacy</button>
                        </div>
                    </div>
                </div>

                <div class="pharmacy-card">
                    <div class="pharmacy-img">
                        <img src="https://via.placeholder.com/150x80" alt="Pharmacy Logo">
                    </div>
                    <div class="pharmacy-details">
                        <h3 class="pharmacy-name">ABC Pharmacy</h3>
                        <p class="pharmacy-desc">Family-owned since 1985</p>
                        <div class="pharmacy-location">
                            <i>📍</i> Ashrafieh
                        </div>
                        <div class="medicine-actions">
                            <button class="btn btn-outline">View Pharmacy</button>
                        </div>
                    </div>
                </div>

                <div class="pharmacy-card">
                    <div class="pharmacy-img">
                        <img src="img/bootsPharmacy.jpg" alt="Pharmacy Logo">
                    </div>
                    <div class="pharmacy-details">
                        <h3 class="pharmacy-name">Green Valley Pharma</h3>
                        <p class="pharmacy-desc">Natural and organic products</p>
                        <div class="pharmacy-location">
                            <i>📍</i> Verdun
                        </div>
                        <div class="medicine-actions">
                            <button class="btn btn-outline">View Pharmacy</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="contact-section">
            <h2 class="section-title">Contact Us</h2>
            <p>Have questions or need assistance? Our team is here to help you with all your pharmaceutical needs.</p>

            <div class="contact-info">
                <div class="contact-item">
                    <div class="contact-icon">📞</div>
                    <div class="contact-text">
                        <h3>Phone</h3>
                        <p>+961 1 123 456</p>
                        <p>+961 70 123 456</p>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">✉️</div>
                    <div class="contact-text">
                        <h3>Email</h3>
                        <p>info@pharmacieszone.lb</p>
                        <p>support@pharmacieszone.lb</p>
                    </div>
                </div>

                <div class="contact-item">s
                    <div class="contact-icon">🏢</div>
                    <div class="contact-text">
                        <h3>Address</h3>
                        <p>123 Medical Street</p>
                        <p>Beirut, Lebanon</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer>
        <div class="footer-content">
            <div class="footer-column">
                <h3>About Pharmacies Zone</h3>
                <p>Lebanon's leading online pharmacy platform, connecting patients with trusted pharmacies since 2025.</p>
                <div class="social-links">
                    <a href="#">f</a>
                    <a href="#">in</a>
                    <a href="#">t</a>
                    <a href="#">ig</a>
                </div>
            </div>

            <div class="footer-column">
                <h3>Quick Links</h3>
                <a href="#">Home</a>
                <a href="#">Medicines</a>
                <a href="#">Pharmacies</a>
                <a href="#">My Orders</a>
                <a href="#">My Profile</a>
            </div>

            <div class="footer-column">
                <h3>Information</h3>
                <a href="#">About Us</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Terms & Conditions</a>
                <a href="#">Shipping Policy</a>
                <a href="#">Returns & Refunds</a>
            </div>

            <div class="footer-column">
                <h3>Newsletter</h3>
                <p>Subscribe to our newsletter for the latest updates and offers.</p>
                <form>
                    <input type="email" placeholder="Your Email" style="width: 100%; padding: 0.5rem; margin-bottom: 0.5rem; border-radius: 4px; border: none;">
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Subscribe</button>
                </form>
            </div>
        </div>

        <div class="copyright">
            <p>&copy; 2025 Pharmacies Zone Lebanon. All Rights Reserved.</p>
        </div>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const carousel = document.querySelector('.hero-carousel');
            const dots = document.querySelectorAll('.carousel-dot');
            let currentIndex = 0;
            const slideCount = document.querySelectorAll('.hero-slide').length;

            function goToSlide(index) {
                carousel.style.transform = `translateX(-${index * 100}%)`;
                dots.forEach(dot => dot.classList.remove('active'));
                dots[index].classList.add('active');
                currentIndex = index;
            }
            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => goToSlide(index));
            });

            setInterval(() => {
                currentIndex = (currentIndex + 1) % slideCount;
                goToSlide(currentIndex);
            }, 5000);
        });
    </script>
</body>

</html>