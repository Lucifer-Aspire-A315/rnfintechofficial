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
        <div class="container mx-auto flex flex-wrap items-center justify-between px-4 py-1 md:px-6">
            <div class="flex items-center space-x-3">
                <!-- Responsive Logo -->
                <x-application-mark class="block w-auto" />
            </div>
            <nav class="w-full mt-4 md:mt-0 md:w-auto flex flex-col md:flex-row md:items-center space-y-2 md:space-y-0 md:space-x-6">
                <a href="#features" class="text-gray-700 hover:text-blue-700 font-medium">Features</a>
                <a href="#howitworks" class="text-gray-700 hover:text-blue-700 font-medium">How it Works</a>
                <a href="#contact" class="text-gray-700 hover:text-blue-700 font-medium">Contact</a>
                <a href="{{ route('documentation') }}" class="text-gray-700 hover:text-blue-700 font-medium">Documentation</a>
                @guest
                    <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition text-center">Login</a>
                    <a href="{{ route('register') }}" class="bg-white border border-blue-600 text-blue-600 px-4 py-2 rounded hover:bg-blue-50 transition text-center">Register</a>
                @else
                    <a href="{{ route('dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition text-center">Dashboard</a>
                @endguest
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-blue-50 py-12 md:py-16">
        <div class="container mx-auto px-4 md:px-6 flex flex-col-reverse md:flex-row items-center">
            <div class="w-full md:w-1/2 mt-8 md:mt-0">
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-blue-800 mb-4">Welcome to <span class="text-blue-600">RNFINTECH</span></h1>
                <!-- Fast Approval Badge -->
                <div class="flex items-center mb-4">
                    <span class="inline-flex items-center bg-blue-100 text-blue-700 text-sm font-semibold px-4 py-1 rounded-full shadow">
                        <i class="fa-solid fa-bolt mr-2 text-yellow-500"></i>
                        Fast Approval & Disbursal – Get loans in as little as 24 hours!
                    </span>
                </div>
                <p class="text-base sm:text-lg text-gray-700 mb-6">Your one-stop portal for comparing, applying, and tracking loans from multiple banks and NBFCs. Fast, secure, and transparent—built for both customers and agents.</p>
<div class="space-y-3 sm:space-x-4 sm:space-y-0 flex flex-col sm:flex-row items-center">
                    @guest
                        <a href="{{ route('register') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold shadow hover:bg-blue-700 transition text-center">Apply for a Loan</a>
                    @else
                        @if(auth()->user()->hasRole('agent') || auth()->user()->hasRole('staff'))
                            <a href="{{ route('all-loan-applications.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold shadow hover:bg-blue-700 transition text-center">Apply for a Loan</a>
                        @elseif(auth()->user()->hasRole('customer'))
                            <a href="{{ route('dashboard') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold shadow hover:bg-blue-700 transition text-center">Apply for a Loan</a>
                        @else
                            <a href="{{ route('dashboard') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold shadow hover:bg-blue-700 transition text-center">Dashboard</a>
                        @endif
                    @endguest
                    <a href="{{ route('documentation') }}" class="text-blue-700 font-semibold hover:underline text-center">Learn More</a>
                </div>
            </div>
            <div class="w-full md:w-1/2 flex justify-center">
                <img src="https://img.freepik.com/free-vector/loan-application-concept-illustration_114360-7967.jpg?w=700"
                     alt="Loan Portal Illustration"
                     class="w-full max-w-xs sm:max-w-md md:max-w-lg rounded-lg shadow-lg object-contain" />
            </div>
        </div>
    </section>

    <!-- Loan Eligibility & EMI Calculator Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="max-w-3xl mx-auto mb-10 text-center">
                <h2 class="text-3xl font-bold text-blue-800 mb-4">Loan Eligibility & EMI Calculator</h2>
                <p class="text-gray-700 text-lg">
                    Instantly estimate your monthly EMI and check your maximum eligible loan amount.  
                    Use our calculators below to make smarter borrowing decisions and plan your finances with confidence.
                </p>
            </div>
            <div class="bg-blue-50 rounded-2xl shadow-xl p-12">
                <div class="grid md:grid-cols-2 gap-12">
                    <!-- EMI Calculator -->
                    <div class="bg-white rounded-lg shadow p-8 border border-blue-100 hover:shadow-lg transition">
                        <h3 class="text-lg font-semibold text-blue-700 mb-4 text-center">EMI Calculator</h3>
                        <form id="emiForm" onsubmit="event.preventDefault(); calculateEMI();">
                            <div class="mb-6">
                                <label class="block text-gray-700 mb-1 font-medium">Loan Amount (₹)</label>
                                <input type="number" id="emiAmount" class="w-full border-2 border-blue-200 focus:border-blue-500 rounded px-4 py-3 outline-none transition text-lg" min="10000" max="10000000" required placeholder="e.g. 500000">
                            </div>
                            <div class="mb-6">
                                <label class="block text-gray-700 mb-1 font-medium">Interest Rate (% p.a.)</label>
                                <input type="number" id="emiRate" class="w-full border-2 border-blue-200 focus:border-blue-500 rounded px-4 py-3 outline-none transition text-lg" min="5" max="30" step="0.01" required placeholder="e.g. 10.5">
                            </div>
                            <div class="mb-6">
                                <label class="block text-gray-700 mb-1 font-medium">Tenure (months)</label>
                                <input type="number" id="emiTenure" class="w-full border-2 border-blue-200 focus:border-blue-500 rounded px-4 py-3 outline-none transition text-lg" min="6" max="360" required placeholder="e.g. 60">
                            </div>
                            <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded font-semibold text-lg hover:bg-blue-700 transition">Calculate EMI</button>
                        </form>
                        <div id="emiResult" class="mt-6 text-center text-blue-800 font-semibold text-lg"></div>
                    </div>
                    <!-- Eligibility Calculator -->
                    <div class="bg-white rounded-lg shadow p-8 border border-blue-100 hover:shadow-lg transition">
                        <h3 class="text-lg font-semibold text-blue-700 mb-4 text-center">Eligibility Checker</h3>
                        <form id="eligibilityForm" onsubmit="event.preventDefault(); calculateEligibility();">
                            <div class="mb-6">
                                <label class="block text-gray-700 mb-1 font-medium">Monthly Income (₹)</label>
                                <input type="number" id="income" class="w-full border-2 border-blue-200 focus:border-blue-500 rounded px-4 py-3 outline-none transition text-lg" min="5000" required placeholder="e.g. 40000">
                            </div>
                            <div class="mb-6">
                                <label class="block text-gray-700 mb-1 font-medium">Existing EMIs (₹/month)</label>
                                <input type="number" id="existingEmi" class="w-full border-2 border-blue-200 focus:border-blue-500 rounded px-4 py-3 outline-none transition text-lg" min="0" value="0" required placeholder="e.g. 5000">
                            </div>
                            <div class="mb-6">
                                <label class="block text-gray-700 mb-1 font-medium">Tenure (months)</label>
                                <input type="number" id="eligTenure" class="w-full border-2 border-blue-200 focus:border-blue-500 rounded px-4 py-3 outline-none transition text-lg" min="6" max="360" required placeholder="e.g. 60">
                            </div>
                            <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded font-semibold text-lg hover:bg-blue-700 transition">Check Eligibility</button>
                        </form>
                        <div id="eligibilityResult" class="mt-6 text-center text-blue-800 font-semibold text-lg"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- EMI & Eligibility Calculator Script -->
    <script>
    function calculateEMI() {
        const P = parseFloat(document.getElementById('emiAmount').value);
        const R = parseFloat(document.getElementById('emiRate').value) / 12 / 100;
        const N = parseInt(document.getElementById('emiTenure').value);

        if (P && R && N) {
            const emi = (P * R * Math.pow(1 + R, N)) / (Math.pow(1 + R, N) - 1);
            document.getElementById('emiResult').innerHTML =
                'Monthly EMI: <span class="text-green-600">₹' + emi.toLocaleString(undefined, {maximumFractionDigits: 0}) + '</span>';
        } else {
            document.getElementById('emiResult').innerHTML = '';
        }
    }

    function calculateEligibility() {
        const income = parseFloat(document.getElementById('income').value);
        const existingEmi = parseFloat(document.getElementById('existingEmi').value);
        const tenure = parseInt(document.getElementById('eligTenure').value);

        // Standard: Max 50% of income can go to EMIs
        const maxEmi = (income * 0.5) - existingEmi;
        // Assume 12% interest rate for eligibility calculation
        const R = 12 / 12 / 100;
        const N = tenure;
        // Reverse EMI formula to get max loan
        const maxLoan = maxEmi > 0
            ? maxEmi * ( (Math.pow(1 + R, N) - 1) / (R * Math.pow(1 + R, N)) )
            : 0;

        if (maxLoan > 0) {
            document.getElementById('eligibilityResult').innerHTML =
                'Eligible Loan Amount: <span class="text-green-600">₹' + Math.floor(maxLoan).toLocaleString() + '</span>';
        } else {
            document.getElementById('eligibilityResult').innerHTML =
                '<span class="text-red-600">Not eligible for a new loan with current details.</span>';
        }
    }
    </script>


    <!-- Features Section -->
    <section id="features" class="py-12 md:py-16 bg-white">
        <div class="container mx-auto px-4 md:px-6">
            <h2 class="text-3xl font-bold text-center text-blue-800 mb-10">Why Choose RNFINTECH?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
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
    <section id="howitworks" class="py-12 md:py-16 bg-gray-50">
        <div class="container mx-auto px-4 md:px-6">
            <h2 class="text-3xl font-bold text-center text-blue-800 mb-10">How It Works</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
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

    <!-- Our Partners Section (Dynamic from DB) -->
    <section class="py-12 md:py-16 bg-white">
        <div class="container mx-auto px-4 md:px-6">
            <h2 class="text-3xl font-bold text-center text-blue-800 mb-10">Our Partners from the Industry</h2>
            <div class="bg-blue-50 rounded-2xl shadow-xl p-8 max-w-5xl mx-auto">
                <div class="flex flex-wrap justify-center gap-8">
                    @foreach($banks as $bank)
                        <div class="flex flex-col items-center w-32 mb-6">
                            <div class="bg-white rounded shadow p-2 flex items-center justify-center" style="height:64px;">
                                <img src="{{ $bank->image ? \Storage::url($bank->image) : '/default-bank.png' }}"
                                     alt="{{ $bank->name }}"
                                     class="h-12 w-auto object-contain mx-auto"
                                     style="max-width: 96px;">
                            </div>
                            <span class="mt-2 text-sm text-center text-blue-900 font-semibold">{{ $bank->name }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ & Loan Education Section -->
<section id="education" class="py-12 md:py-16 bg-white">
    <div class="container mx-auto px-4 md:px-8 max-w-5xl">
        <h2 class="text-3xl font-bold text-blue-800 mb-8 text-center">Loan Education & Portal Guide</h2>
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Loan Education Cards -->
            <div class="space-y-6">
                <div class="bg-blue-50 rounded-lg shadow p-6">
                    <h4 class="font-semibold text-blue-700 mb-2">Tips to Improve Loan Eligibility</h4>
                    <ul class="list-disc list-inside text-gray-700 text-sm space-y-1">
                        <li>Maintain a good credit score (CIBIL 750+).</li>
                        <li>Reduce existing debts and EMIs.</li>
                        <li>Show stable income and employment.</li>
                        <li>Apply for a realistic loan amount.</li>
                    </ul>
                </div>
                <div class="bg-blue-50 rounded-lg shadow p-6">
                    <h4 class="font-semibold text-blue-700 mb-2">Understanding Loan Types</h4>
                    <ul class="list-disc list-inside text-gray-700 text-sm space-y-1">
                        <li>Personal Loans: Unsecured loans for personal needs.</li>
                        <li>Home Loans: For purchasing or renovating property.</li>
                        <li>Business Loans: To support business growth and operations.</li>
                        <li>Vehicle Loans: For buying new or used vehicles.</li>
                        <li>Education Loans: To fund higher studies.</li>
                        <li>And many more—check our portal for the latest options.</li>
                    </ul>
                </div>
            </div>
            <!-- Portal Guide Cards -->
            <div class="space-y-6">
                <div class="bg-blue-50 rounded-lg shadow p-6">
                    <h4 class="font-semibold text-blue-700 mb-2">How to Use RNFINTECH Portal</h4>
                    <ul class="list-decimal list-inside text-gray-700 text-sm space-y-1">
                        <li>Register or Login as Customer, Agent, Staff, or Admin.</li>
                        <li>Access your dashboard for quick stats and links.</li>
                        <li>Customers: Track your loan applications.</li>
                        <li>Agents/Staff: Apply for loans on behalf of customers.</li>
                        <li>Admins: Manage users, banks, loan types, and permissions.</li>
                        <li>Track application status in real time.</li>
                        <li>Update your profile and contact info anytime.</li>
                    </ul>
                </div>
                <div class="bg-blue-50 rounded-lg shadow p-6">
                    <h4 class="font-semibold text-blue-700 mb-2">Best Practices & Security</h4>
                    <ul class="list-disc list-inside text-gray-700 text-sm space-y-1">
                        <li>Keep your profile and contact info up to date.</li>
                        <li>Agents: Follow up on pending applications regularly.</li>
                        <li>Admins: Review permissions and roles for security.</li>
                        <li>Use strong passwords and never share your login credentials.</li>
                        <li>Contact <a href="mailto:admin@rnfintech.com" class="text-blue-600 underline">support</a> for help.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section id="faq" class="py-12 md:py-16 bg-blue-50">
    <div class="container mx-auto px-4 md:px-8 max-w-5xl">
        <h2 class="text-3xl font-bold text-blue-800 mb-8 text-center">Frequently Asked Questions</h2>
        <div class="space-y-6">
            <!-- Q1 -->
            <details class="bg-white rounded-lg shadow p-6 group">
                <summary class="font-medium cursor-pointer text-blue-700 group-open:text-blue-900">What is RNFINTECH and who can use it?</summary>
                <div class="mt-2 text-gray-700">
                    RNFINTECH is a unified platform for applying, tracking, and managing loans from multiple banks and NBFCs. It supports Super Admins, Agents, Customers, and Staff, each with specific access and features.
                </div>
            </details>
            <!-- Q2 -->
            <details class="bg-white rounded-lg shadow p-6 group">
                <summary class="font-medium cursor-pointer text-blue-700 group-open:text-blue-900">How do I apply for a loan?</summary>
                <div class="mt-2 text-gray-700">
                    Customers can request loans through agents or staff. Agents/Staff can apply for loans on behalf of customers by filling out the application form and uploading required documents.
                </div>
            </details>
            <!-- Q3 -->
            <details class="bg-white rounded-lg shadow p-6 group">
                <summary class="font-medium cursor-pointer text-blue-700 group-open:text-blue-900">What documents are required for a loan application?</summary>
                <div class="mt-2 text-gray-700">
                    You typically need identity proof, address proof, income proof (salary slip/bank statement), and a recent photograph. See our <a href="{{ route('documentation') }}" class="text-blue-600 underline">Documentation</a> page for details.
                </div>
            </details>
            <!-- Q4 -->
            <details class="bg-white rounded-lg shadow p-6 group">
                <summary class="font-medium cursor-pointer text-blue-700 group-open:text-blue-900">How do I track my loan application?</summary>
                <div class="mt-2 text-gray-700">
                    Log in to your dashboard to view the real-time status of your loan applications.
                </div>
            </details>
            <!-- Q5 -->
            <details class="bg-white rounded-lg shadow p-6 group">
                <summary class="font-medium cursor-pointer text-blue-700 group-open:text-blue-900">How fast can I get my loan approved?</summary>
                <div class="mt-2 text-gray-700">
                    Many loans are approved within 24 hours if your documents are in order and you meet the eligibility criteria.
                </div>
            </details>
            <!-- Q6 -->
            <details class="bg-white rounded-lg shadow p-6 group">
                <summary class="font-medium cursor-pointer text-blue-700 group-open:text-blue-900">How do I contact support?</summary>
                <div class="mt-2 text-gray-700">
                    You can email us at <a href="mailto:admin@rnfintech.com" class="text-blue-600 underline">admin@rnfintech.com</a> for any assistance.
                </div>
            </details>
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

    <!-- Enhanced Footer Card with Styled Badges and Social Icons -->
    <footer class="bg-gradient-to-r from-blue-800 via-blue-900 to-blue-950 text-white py-12 mt-12">
        <div class="container mx-auto px-4 md:px-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-10">
            <!-- About -->
            <div>
                <h4 class="font-bold text-lg mb-3">About RNFINTECH</h4>
                <p class="text-blue-100 text-sm mb-4">
                    RNFINTECH is your trusted partner for comparing, applying, and tracking loans from top banks and NBFCs. Fast, secure, and transparent.
                </p>
                <div class="flex space-x-4 mt-6">
                    <div class="flex flex-col items-center">
                        <div class="bg-white rounded-full p-2 shadow">
                            <img src="https://cdn-icons-png.flaticon.com/512/3064/3064197.png" alt="Secure" class="h-8 w-8" title="100% Secure">
                        </div>
                        <span class="text-xs text-blue-100 mt-2">Secure</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="bg-white rounded-full p-2 shadow">
                            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="RBI Registered" class="h-8 w-8" title="RBI Registered Partners">
                        </div>
                        <span class="text-xs text-blue-100 mt-2">RBI Registered</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="bg-white rounded-full p-2 shadow">
                            <img src="https://cdn-icons-png.flaticon.com/512/190/190411.png" alt="Trusted" class="h-8 w-8" title="Trusted by 10,000+ Customers">
                        </div>
                        <span class="text-xs text-blue-100 mt-2">Trusted</span>
                    </div>
                </div>
            </div>
            <!-- Quick Links -->
            <div>
                <h4 class="font-bold text-lg mb-3">Quick Links</h4>
                <ul class="space-y-2 text-blue-100 text-sm">
                    <li><a href="{{ route('register') }}" class="hover:underline">Apply for Loan</a></li>
                    <li><a href="#features" class="hover:underline">Features</a></li>
                    <li><a href="#howitworks" class="hover:underline">How it Works</a></li>
                    <li><a href="#contact" class="hover:underline">Contact Us</a></li>
                    <li><a href="{{ route('documentation') }}" class="hover:underline">Documentation</a></li>
                </ul>
            </div>
            <!-- Tools & Resources -->
            <div>
                <h4 class="font-bold text-lg mb-3">Tools & Resources</h4>
                <ul class="space-y-2 text-blue-100 text-sm">
                    <li><a href="/emi-calculator" class="hover:underline">EMI Calculator</a></li>
                    <li><a href="/blog" class="hover:underline">Loan Guides</a></li>
                    <li><a href="/compare" class="hover:underline">Compare Loans</a></li>
                    <li><a href="/reviews" class="hover:underline">Customer Reviews</a></li>
                </ul>
            </div>
            <!-- Contact -->
            <div>
                <h4 class="font-bold text-lg mb-3">Contact Us</h4>
                <p class="text-blue-100 text-sm mb-2">admin@rnfintech.com</p>
                <p class="text-blue-100 text-sm mb-2">+91-XXXXXXXXXX</p>
                <div class="flex space-x-4 mt-4">
                    <a href="#" title="Facebook">
                        <img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook" class="h-8 w-8 rounded-full bg-white p-1 hover:scale-110 transition">
                    </a>
                    <a href="#" title="Twitter">
                        <img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" alt="Twitter" class="h-8 w-8 rounded-full bg-white p-1 hover:scale-110 transition">
                    </a>
                    <a href="#" title="WhatsApp">
                        <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WhatsApp" class="h-8 w-8 rounded-full bg-white p-1 hover:scale-110 transition">
                    </a>
                    <a href="#" title="LinkedIn">
                        <img src="https://cdn-icons-png.flaticon.com/512/733/733561.png" alt="LinkedIn" class="h-8 w-8 rounded-full bg-white p-1 hover:scale-110 transition">
                    </a>
                </div>
            </div>
        </div>
        <div class="text-center text-blue-200 text-xs mt-10">
            &copy; {{ date('Y') }} RNFINTECH. All rights reserved.
        </div>
    </footer>

    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
</body>
</html>