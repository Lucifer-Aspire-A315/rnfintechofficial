<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RNFINTECH - Your Trusted Loan Portal</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;600&display=swap">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-[Figtree]">

    <!-- Header -->
    <header class="bg-white shadow">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <div class="flex items-center space-x-3">
                <!-- Logo (replace src with your logo if available) -->
                <img src="/logo.png" alt="RNFINTECH Logo" class="h-10 w-10 rounded-full border border-gray-200 bg-white shadow" onerror="this.style.display='none'">
                <span class="text-2xl font-bold text-blue-700 tracking-wide">RNFINTECH</span>
            </div>
            <nav class="space-x-6">
                <a href="#features" class="text-gray-700 hover:text-blue-700 font-medium">Features</a>
                <a href="#howitworks" class="text-gray-700 hover:text-blue-700 font-medium">How it Works</a>
                <a href="#contact" class="text-gray-700 hover:text-blue-700 font-medium">Contact</a>
                @guest
                    <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Login</a>
                    <a href="{{ route('register') }}" class="bg-white border border-blue-600 text-blue-600 px-4 py-2 rounded hover:bg-blue-50 transition">Register</a>
                @else
                    <a href="{{ route('dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Dashboard</a>
                @endguest
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-blue-50 py-16">
        <div class="container mx-auto px-6 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-10 md:mb-0">
                <h1 class="text-4xl md:text-5xl font-bold text-blue-800 mb-4">Welcome to <span class="text-blue-600">RNFINTECH</span></h1>
                <p class="text-lg text-gray-700 mb-6">Your one-stop portal for comparing, applying, and tracking loans from multiple banks and NBFCs. Fast, secure, and transparent—built for both customers and agents.</p>
                <div class="space-x-4">
                    @guest
                        <a href="{{ route('register') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold shadow hover:bg-blue-700 transition">Get Started</a>
                    @else
                        <a href="{{ route('documentation') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold shadow hover:bg-blue-700 transition">Apply for a Loan</a>
                    @endguest
                    <a href="#features" class="text-blue-700 font-semibold hover:underline">Learn More</a>
                </div>
            </div>
            <div class="md:w-1/2 flex justify-center">
                <img src="https://img.freepik.com/free-vector/loan-application-concept-illustration_114360-7967.jpg?w=700" alt="Loan Portal Illustration" class="w-full max-w-md rounded-lg shadow-lg">
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-blue-800 mb-10">Why Choose RNFINTECH?</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-blue-50 p-6 rounded-lg shadow hover:shadow-lg transition">
                    <div class="text-blue-600 text-4xl mb-4 text-center"><i class="fa-solid fa-bolt"></i></div>
                    <h3 class="text-xl font-semibold mb-2 text-center">Quick Loan Comparison</h3>
                    <p class="text-gray-600 text-center">Compare loan offers from multiple banks and NBFCs instantly to find the best rates and terms for you or your clients.</p>
                </div>
                <div class="bg-blue-50 p-6 rounded-lg shadow hover:shadow-lg transition">
                    <div class="text-blue-600 text-4xl mb-4 text-center"><i class="fa-solid fa-lock"></i></div>
                    <h3 class="text-xl font-semibold mb-2 text-center">Secure & Transparent</h3>
                    <p class="text-gray-600 text-center">Your data is protected with bank-level security. Track your application status in real-time with full transparency.</p>
                </div>
                <div class="bg-blue-50 p-6 rounded-lg shadow hover:shadow-lg transition">
                    <div class="text-blue-600 text-4xl mb-4 text-center"><i class="fa-solid fa-user-tie"></i></div>
                    <h3 class="text-xl font-semibold mb-2 text-center">Agent-Friendly Tools</h3>
                    <p class="text-gray-600 text-center">Agents can manage multiple applications, track commissions, and assist customers efficiently—all in one place.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="howitworks" class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-blue-800 mb-10">How It Works</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <div class="text-blue-600 text-3xl mb-3"><i class="fa-solid fa-magnifying-glass"></i></div>
                    <h4 class="font-semibold mb-2">1. Explore & Compare</h4>
                    <p class="text-gray-600">Browse and compare loan products from top banks and NBFCs.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <div class="text-blue-600 text-3xl mb-3"><i class="fa-solid fa-file-signature"></i></div>
                    <h4 class="font-semibold mb-2">2. Apply Online</h4>
                    <p class="text-gray-600">Fill out a simple application form and upload your documents securely.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <div class="text-blue-600 text-3xl mb-3"><i class="fa-solid fa-chart-line"></i></div>
                    <h4 class="font-semibold mb-2">3. Track & Manage</h4>
                    <p class="text-gray-600">Track your application status and manage your loans from your dashboard.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    @guest
    <section class="py-16 bg-blue-600">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Ready to get started?</h2>
            <p class="text-lg text-blue-100 mb-8">Sign up now and experience a smarter way to apply for loans with RNFINTECH.</p>
            <a href="{{ route('register') }}" class="bg-white text-blue-700 px-8 py-3 rounded-lg font-semibold shadow hover:bg-blue-50 transition">Register Now</a>
        </div>
    </section>
    @endguest

    <!-- Contact Section -->
    <section id="contact" class="py-12 bg-white">
        <div class="container mx-auto px-6 text-center">
            <h3 class="text-2xl font-bold text-blue-800 mb-2">Contact Us</h3>
            <p class="text-gray-600 mb-4">Have questions? Reach out to our support team.</p>
            <a href="mailto:admin@rnfintech.com" class="text-blue-600 font-semibold hover:underline">admin@rnfintech.com</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-100 py-6 text-center text-gray-500 text-sm">
        &copy; {{ date('Y') }} RNFINTECH. All rights reserved.
    </footer>

    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
</body>
</html>