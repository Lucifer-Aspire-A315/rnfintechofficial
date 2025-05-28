@extends('layouts.app')

@section('title', 'RNFINTECH - Your Trusted Loan Portal')

@section('content')

    <!-- Hero Section -->
    <section class=" bg-gradient-to-br from-indigo-50 via-white to-emerald-50 py-12 md:py-20 overflow-hidden">
        <!-- Floating SVG Blobs -->
        <svg class="absolute left-0 top-0 w-64 h-64 opacity-20 -z-10" viewBox="0 0 200 200"><circle fill="#34d399" cx="100" cy="100" r="100"/></svg>
        <svg class="absolute right-0 bottom-0 w-80 h-80 opacity-10 -z-10" viewBox="0 0 200 200"><circle fill="#6366f1" cx="100" cy="100" r="100"/></svg>
        <div class="container mx-auto px-4 md:px-6 flex flex-col-reverse md:flex-row items-center">
            <div class="w-full md:w-1/2 mt-8 md:mt-0">
                <div class="bg-white/70 backdrop-blur-lg rounded-2xl shadow-2xl p-8 md:p-12 mb-6 border-t-4 border-emerald-400">
                    <h1 class="text-4xl md:text-5xl font-extrabold text-indigo-700 mb-4 drop-shadow-lg">
                        Welcome to <span class="text-emerald-500 animate-gradient-x bg-gradient-to-r from-emerald-400 via-indigo-500 to-emerald-400 bg-clip-text text-transparent">RNFINTECH</span>
                    </h1>
                    <!-- Fast Approval Badge with Animation -->
                    <div class="flex items-center mb-4">
                        <span class="inline-flex items-center bg-emerald-100 text-emerald-700 text-sm font-semibold px-4 py-1 rounded-full shadow animate-pulse">
                            <i class="fa-solid fa-bolt mr-2 text-yellow-400 animate-bounce"></i>
                            Fast Approval & Disbursal – Get loans in as little as 24 hours!
                        </span>
                    </div>
                    <p class="text-lg text-gray-700 mb-6">
                        Your one-stop portal for comparing, applying, and tracking loans from multiple banks and NBFCs. Fast, secure, and transparent—built for both customers and agents.
                    </p>
                    <div class="flex flex-col sm:flex-row items-center gap-3">
                        @guest
                            <a href="{{ route('register') }}" class="bg-gradient-to-r from-indigo-500 to-violet-500 text-white px-6 py-3 rounded-2xl font-semibold shadow-xl hover:from-indigo-600 hover:to-violet-600 transition text-center">Apply for a Loan</a>
                        @else
                            @if(auth()->user()->hasRole('agent') || auth()->user()->hasRole('staff'))
                                <a href="{{ route('all-loan-applications.create') }}" class="bg-gradient-to-r from-indigo-500 to-violet-500 text-white px-6 py-3 rounded-2xl font-semibold shadow-xl hover:from-indigo-600 hover:to-violet-600 transition text-center">Apply for a Loan</a>
                            @elseif(auth()->user()->hasRole('customer'))
                                <a href="{{ route('dashboard') }}" class="bg-gradient-to-r from-indigo-500 to-violet-500 text-white px-6 py-3 rounded-2xl font-semibold shadow-xl hover:from-indigo-600 hover:to-violet-600 transition text-center">Apply for a Loan</a>
                            @else
                                <a href="{{ route('dashboard') }}" class="bg-gradient-to-r from-indigo-500 to-violet-500 text-white px-6 py-3 rounded-2xl font-semibold shadow-xl hover:from-indigo-600 hover:to-violet-600 transition text-center">Dashboard</a>
                            @endif
                        @endguest
                        <a href="{{ route('documentation') }}" class="text-indigo-700 font-semibold hover:underline text-center">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 flex justify-center">
    <div class="rounded-2xl shadow-2xl border-t-4 border-emerald-400 bg-white/70 p-2 transition-all duration-300 hover:shadow-emerald-200 hover:scale-105">
        <img src="https://img.freepik.com/free-vector/loan-application-concept-illustration_114360-7967.jpg?w=700"
             alt="Loan Portal Illustration"
             class="w-full max-w-xs sm:max-w-md md:max-w-lg rounded-2xl object-contain transition-all duration-300" />
    </div>
</div>
        </div>
    </section>

    <!-- Loan Eligibility & EMI Calculator Section -->
    <section class="py-16">
        <div class="container mx-auto px-6">
            <div class="max-w-3xl mx-auto mb-10 text-center">
                <h2 class="text-3xl font-bold text-indigo-700 mb-4">Loan Eligibility & EMI Calculator</h2>
                <p class="text-gray-700 text-lg">
                    Instantly estimate your monthly EMI and check your maximum eligible loan amount.<br>
                    Use our calculators below to make smarter borrowing decisions and plan your finances with confidence.
                </p>
            </div>
            <div class="bg-white/90 rounded-2xl shadow-2xl border-t-4 border-emerald-400 p-12 transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 hover:border-emerald-500 hover:bg-emerald-50/40">
                <div class="grid md:grid-cols-2 gap-10">
                    <!-- EMI Calculator -->
                    <div class="rounded-2xl shadow-lg border border-emerald-100 p-8 transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 hover:border-emerald-500 hover:bg-emerald-50/40 group bg-white">
                        <h3 class="text-lg font-semibold text-indigo-700 mb-4 text-center group-hover:text-emerald-500 transition">EMI Calculator</h3>
                        <form id="emiForm" onsubmit="event.preventDefault(); calculateEMI();">
                            <div class="mb-6">
                                <label class="block text-gray-700 mb-1 font-medium">Loan Amount (₹)</label>
                                <input type="number" id="emiAmount" class="w-full border-2 border-emerald-200 focus:border-emerald-500 rounded px-4 py-3 outline-none transition text-lg" min="10000" max="10000000" required placeholder="e.g. 500000">
                            </div>
                            <div class="mb-6">
                                <label class="block text-gray-700 mb-1 font-medium">Interest Rate (% p.a.)</label>
                                <input type="number" id="emiRate" class="w-full border-2 border-emerald-200 focus:border-emerald-500 rounded px-4 py-3 outline-none transition text-lg" min="5" max="30" step="0.01" required placeholder="e.g. 10.5">
                            </div>
                            <div class="mb-6">
                                <label class="block text-gray-700 mb-1 font-medium">Tenure (months)</label>
                                <input type="number" id="emiTenure" class="w-full border-2 border-emerald-200 focus:border-emerald-500 rounded px-4 py-3 outline-none transition text-lg" min="6" max="360" required placeholder="e.g. 60">
                            </div>
                            <button type="submit" class="w-full bg-emerald-600 text-white py-3 rounded-2xl font-semibold text-lg hover:bg-emerald-700 transition">Calculate EMI</button>
                        </form>
                        <div id="emiResult" class="mt-6 text-center text-emerald-800 font-semibold text-lg"></div>
                    </div>
                    <!-- Eligibility Calculator -->
                    <div class="rounded-2xl shadow-lg border border-emerald-100 p-8 transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 hover:border-emerald-500 hover:bg-emerald-50/40 group bg-white">
                        <h3 class="text-lg font-semibold text-indigo-700 mb-4 text-center group-hover:text-emerald-500 transition">Eligibility Checker</h3>
                        <form id="eligibilityForm" onsubmit="event.preventDefault(); calculateEligibility();">
                            <div class="mb-6">
                                <label class="block text-gray-700 mb-1 font-medium">Monthly Income (₹)</label>
                                <input type="number" id="income" class="w-full border-2 border-emerald-200 focus:border-emerald-500 rounded px-4 py-3 outline-none transition text-lg" min="5000" required placeholder="e.g. 40000">
                            </div>
                            <div class="mb-6">
                                <label class="block text-gray-700 mb-1 font-medium">Existing EMIs (₹/month)</label>
                                <input type="number" id="existingEmi" class="w-full border-2 border-emerald-200 focus:border-emerald-500 rounded px-4 py-3 outline-none transition text-lg" min="0" value="0" required placeholder="e.g. 5000">
                            </div>
                            <div class="mb-6">
                                <label class="block text-gray-700 mb-1 font-medium">Tenure (months)</label>
                                <input type="number" id="eligTenure" class="w-full border-2 border-emerald-200 focus:border-emerald-500 rounded px-4 py-3 outline-none transition text-lg" min="6" max="360" required placeholder="e.g. 60">
                            </div>
                            <button type="submit" class="w-full bg-emerald-600 text-white py-3 rounded-2xl font-semibold text-lg hover:bg-emerald-700 transition">Check Eligibility</button>
                        </form>
                        <div id="eligibilityResult" class="mt-6 text-center text-emerald-800 font-semibold text-lg"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-12 md:py-16">
        <div class="container mx-auto px-4 md:px-6">
            <h2 class="text-3xl font-extrabold text-center text-indigo-700 mb-10">Why Choose RNFINTECH?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white border-t-4 border-emerald-400 rounded-2xl shadow-lg p-8 transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 hover:border-emerald-500 hover:bg-emerald-50/40 group">
                    <div class="text-indigo-600 text-4xl mb-4 text-center group-hover:text-emerald-500 transition"><i class="fa-solid fa-bolt"></i></div>
                    <h3 class="text-xl font-semibold mb-2 text-center">Quick Loan Comparison</h3>
                    <p class="text-gray-600 text-center">Compare loan offers from multiple banks and NBFCs instantly to find the best rates and terms for you or your clients.</p>
                </div>
                <div class="bg-white border-t-4 border-emerald-400 rounded-2xl shadow-lg p-8 transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 hover:border-emerald-500 hover:bg-emerald-50/40 group">
                    <div class="text-indigo-600 text-4xl mb-4 text-center group-hover:text-emerald-500 transition"><i class="fa-solid fa-lock"></i></div>
                    <h3 class="text-xl font-semibold mb-2 text-center">Secure & Transparent</h3>
                    <p class="text-gray-600 text-center">Your data is protected with bank-level security. Track your application status in real-time with full transparency.</p>
                </div>
                <div class="bg-white border-t-4 border-emerald-400 rounded-2xl shadow-lg p-8 transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 hover:border-emerald-500 hover:bg-emerald-50/40 group">
                    <div class="text-indigo-600 text-4xl mb-4 text-center group-hover:text-emerald-500 transition"><i class="fa-solid fa-user-tie"></i></div>
                    <h3 class="text-xl font-semibold mb-2 text-center">Agent-Friendly Tools</h3>
                    <p class="text-gray-600 text-center">Agents can manage multiple applications, track commissions, and assist customers efficiently—all in one place.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="howitworks" class="py-12 md:py-16">
        <div class="container mx-auto px-4 md:px-6">
            <h2 class="text-3xl font-bold text-center text-indigo-700 mb-10">How It Works</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white border-t-4 border-emerald-400 rounded-2xl shadow-lg p-8 text-center transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 hover:border-emerald-500 hover:bg-emerald-50/40 group">
                    <div class="text-indigo-600 text-3xl mb-3 group-hover:text-emerald-500 transition"><i class="fa-solid fa-magnifying-glass"></i></div>
                    <h4 class="font-semibold mb-2">1. Explore & Compare</h4>
                    <p class="text-gray-600">Browse and compare loan products from top banks and NBFCs.</p>
                </div>
                <div class="bg-white border-t-4 border-emerald-400 rounded-2xl shadow-lg p-8 text-center transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 hover:border-emerald-500 hover:bg-emerald-50/40 group">
                    <div class="text-indigo-600 text-3xl mb-3 group-hover:text-emerald-500 transition"><i class="fa-solid fa-file-signature"></i></div>
                    <h4 class="font-semibold mb-2">2. Apply Online</h4>
                    <p class="text-gray-600">Fill out a simple application form and upload your documents securely.</p>
                </div>
                <div class="bg-white border-t-4 border-emerald-400 rounded-2xl shadow-lg p-8 text-center transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 hover:border-emerald-500 hover:bg-emerald-50/40 group">
                    <div class="text-indigo-600 text-3xl mb-3 group-hover:text-emerald-500 transition"><i class="fa-solid fa-chart-line"></i></div>
                    <h4 class="font-semibold mb-2">3. Track & Manage</h4>
                    <p class="text-gray-600">Track your application status and manage your loans from your dashboard.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Partners Section (Single Card) -->
    <section class="py-12 md:py-16">
        <div class="container mx-auto px-4 md:px-6">
            <h2 class="text-3xl font-bold text-center text-indigo-700 mb-10">Our Partners from the Industry</h2>
            <div class="bg-white border-t-4 border-emerald-400 rounded-2xl shadow-xl p-8 max-w-5xl mx-auto transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 hover:border-emerald-500 hover:bg-emerald-50/40">
                <div class="flex flex-wrap justify-center gap-8">
                    @foreach($banks as $bank)
                        <div class="flex flex-col items-center w-32 mb-6 group transition-all duration-300">
                            <div class="bg-white rounded-xl shadow border border-emerald-100 p-2 flex items-center justify-center mb-2 transition-all duration-300 group-hover:shadow-lg group-hover:scale-105" style="height:64px;">
                                <img src="{{ $bank->image ? \Storage::url($bank->image) : '/default-bank.png' }}"
                                     alt="{{ $bank->name }}"
                                     class="h-12 w-auto object-contain mx-auto"
                                     style="max-width: 96px;">
                            </div>
                            <span class="mt-2 text-sm text-center text-indigo-900 font-semibold">{{ $bank->name }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ & Loan Education Section -->
    <section id="education" class="py-12 md:py-16">
        <div class="container mx-auto px-4 md:px-8 max-w-5xl">
            <h2 class="text-3xl font-bold text-indigo-700 mb-8 text-center">Loan Education & Portal Guide</h2>
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Loan Education Cards -->
                <div class="space-y-6">
                    <div class="bg-white border-t-4 border-emerald-400 rounded-2xl shadow-lg p-6 transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 hover:border-emerald-500 hover:bg-emerald-50/40">
                        <h4 class="font-semibold text-indigo-700 mb-2 group-hover:text-emerald-500 transition">Tips to Improve Loan Eligibility</h4>
                        <ul class="list-disc list-inside text-gray-700 text-sm space-y-1">
                            <li>Maintain a good credit score (CIBIL 750+).</li>
                            <li>Reduce existing debts and EMIs.</li>
                            <li>Show stable income and employment.</li>
                            <li>Apply for a realistic loan amount.</li>
                        </ul>
                    </div>
                    <div class="bg-white border-t-4 border-emerald-400 rounded-2xl shadow-lg p-6 transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 hover:border-emerald-500 hover:bg-emerald-50/40">
                        <h4 class="font-semibold text-indigo-700 mb-2 group-hover:text-emerald-500 transition">Understanding Loan Types</h4>
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
                    <div class="bg-white border-t-4 border-emerald-400 rounded-2xl shadow-lg p-6 transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 hover:border-emerald-500 hover:bg-emerald-50/40">
                        <h4 class="font-semibold text-indigo-700 mb-2 group-hover:text-emerald-500 transition">How to Use RNFINTECH Portal</h4>
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
                    <div class="bg-white border-t-4 border-emerald-400 rounded-2xl shadow-lg p-6 transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 hover:border-emerald-500 hover:bg-emerald-50/40">
                        <h4 class="font-semibold text-indigo-700 mb-2 group-hover:text-emerald-500 transition">Best Practices & Security</h4>
                        <ul class="list-disc list-inside text-gray-700 text-sm space-y-1">
                            <li>Keep your profile and contact info up to date.</li>
                            <li>Agents: Follow up on pending applications regularly.</li>
                            <li>Admins: Review permissions and roles for security.</li>
                            <li>Use strong passwords and never share your login credentials.</li>
                            <li>Contact <a href="mailto:admin@rnfintech.com" class="text-indigo-600 underline">support</a> for help.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-12 md:py-16">
        <div class="container mx-auto px-4 md:px-8 max-w-5xl">
            <h2 class="text-3xl font-bold text-indigo-700 mb-8 text-center">Frequently Asked Questions</h2>
            <div class="space-y-6">
                <!-- Q1 -->
                <details class="bg-white border-t-4 border-emerald-400 rounded-2xl shadow-lg p-6 group transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 hover:border-emerald-500 hover:bg-emerald-50/40">
                    <summary class="font-medium cursor-pointer text-indigo-700 group-hover:text-emerald-500 transition">What is RNFINTECH and who can use it?</summary>
                    <div class="mt-2 text-gray-700">
                        RNFINTECH is a unified platform for applying, tracking, and managing loans from multiple banks and NBFCs. It supports Super Admins, Agents, Customers, and Staff, each with specific access and features.
                    </div>
                </details>
                <!-- Q2 -->
                <details class="bg-white border-t-4 border-emerald-400 rounded-2xl shadow-lg p-6 group transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 hover:border-emerald-500 hover:bg-emerald-50/40">
                    <summary class="font-medium cursor-pointer text-indigo-700 group-hover:text-emerald-500 transition">How do I apply for a loan?</summary>
                    <div class="mt-2 text-gray-700">
                        Customers can request loans through agents or staff. Agents/Staff can apply for loans on behalf of customers by filling out the application form and uploading required documents.
                    </div>
                </details>
                <!-- Q3 -->
                <details class="bg-white border-t-4 border-emerald-400 rounded-2xl shadow-lg p-6 group transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 hover:border-emerald-500 hover:bg-emerald-50/40">
                    <summary class="font-medium cursor-pointer text-indigo-700 group-hover:text-emerald-500 transition">What documents are required for a loan application?</summary>
                    <div class="mt-2 text-gray-700">
                        You typically need identity proof, address proof, income proof (salary slip/bank statement), and a recent photograph. See our <a href="{{ route('documentation') }}" class="text-indigo-600 underline">Documentation</a> page for details.
                    </div>
                </details>
                <!-- Q4 -->
                <details class="bg-white border-t-4 border-emerald-400 rounded-2xl shadow-lg p-6 group transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 hover:border-emerald-500 hover:bg-emerald-50/40">
                    <summary class="font-medium cursor-pointer text-indigo-700 group-hover:text-emerald-500 transition">How do I track my loan application?</summary>
                    <div class="mt-2 text-gray-700">
                        Log in to your dashboard to view the real-time status of your loan applications.
                    </div>
                </details>
                <!-- Q5 -->
                <details class="bg-white border-t-4 border-emerald-400 rounded-2xl shadow-lg p-6 group transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 hover:border-emerald-500 hover:bg-emerald-50/40">
                    <summary class="font-medium cursor-pointer text-indigo-700 group-hover:text-emerald-500 transition">How fast can I get my loan approved?</summary>
                    <div class="mt-2 text-gray-700">
                        Many loans are approved within 24 hours if your documents are in order and you meet the eligibility criteria.
                    </div>
                </details>
                <!-- Q6 -->
                <details class="bg-white border-t-4 border-emerald-400 rounded-2xl shadow-lg p-6 group transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 hover:border-emerald-500 hover:bg-emerald-50/40">
                    <summary class="font-medium cursor-pointer text-indigo-700 group-hover:text-emerald-500 transition">How do I contact support?</summary>
                    <div class="mt-2 text-gray-700">
                        You can email us at <a href="mailto:admin@rnfintech.com" class="text-indigo-600 underline">admin@rnfintech.com</a> for any assistance.
                    </div>
                </details>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    @guest
    <section class="py-16 bg-emerald-600">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Ready to get started?</h2>
            <p class="text-lg text-emerald-100 mb-8">Sign up now and experience a smarter way to apply for loans with RNFINTECH.</p>
            <a href="{{ route('register') }}" class="bg-white text-emerald-700 px-8 py-3 rounded-2xl font-semibold shadow-xl hover:bg-emerald-50 transition">Register Now</a>
        </div>
    </section>
    @endguest

    <!-- Contact Section -->
    <section id="contact" class="py-12">
        <div class="container mx-auto px-6">
            <div class="flex justify-center">
                <div class="w-full max-w-xl bg-white border-t-4 border-emerald-400 rounded-2xl shadow-xl px-8 py-10 text-center transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 hover:border-emerald-500 hover:bg-emerald-50/40">
                    <div class="flex justify-center mb-4">
                        <span class="inline-flex items-center justify-center bg-emerald-100 text-emerald-600 rounded-full h-12 w-12 shadow">
                            <i class="fa-solid fa-envelope text-2xl"></i>
                        </span>
                    </div>
                    <h3 class="text-2xl font-bold text-indigo-700 mb-2 group-hover:text-emerald-500 transition">Contact Us</h3>
                    <p class="text-gray-600 mb-4">Have questions? Reach out to our support team.</p>
                    <a href="mailto:admin@rnfintech.com" class="text-emerald-600 font-semibold hover:underline">admin@rnfintech.com</a>
                </div>
            </div>
        </div>
    </section>
@endsection