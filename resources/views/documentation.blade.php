<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>RNFINTECH Portal Documentation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;600&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @keyframes gradient-x {
            0%, 100% { background-position: 0% 50% }
            50% { background-position: 100% 50% }
        }
        .animate-gradient-x {
            background-size: 200% 200%;
            animation: gradient-x 3s ease-in-out infinite;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-indigo-50 via-white to-emerald-50 min-h-screen font-[Figtree]">
    <div class="container mx-auto px-6 py-12 max-w-4xl">
        <h1 class="text-3xl font-extrabold text-indigo-700 mb-4 drop-shadow-lg text-center">
            <div class="flex justify-center"><x-application-mark class="block h-12 w-auto" /></div> <span class="text-emerald-500 animate-gradient-x bg-gradient-to-r from-emerald-400 via-indigo-500 to-emerald-400 bg-clip-text text-transparent">Portal User Guide</span>
        </h1>
        <p class="mb-8 text-gray-700">Welcome to RNFINTECH! This documentation will help you understand how to use the portal efficiently, based on your role. Please read the relevant sections to make the most of your experience.</p>

        <div class="bg-white border-t-4 border-emerald-400 rounded-2xl shadow-lg p-6 mb-8 transition-all duration-300 hover:shadow-2xl hover:border-emerald-500 hover:bg-emerald-50/40">
            <h2 class="text-2xl font-semibold text-indigo-700 mb-2">Portal Overview</h2>
            <ul class="list-disc ml-6 text-gray-700">
                <li>RNFINTECH is a unified platform for applying, tracking, and managing loans from multiple banks and NBFCs.</li>
                <li>Roles supported: <span class="font-semibold">Super Admin, Agent, Customer, Staff</span>.</li>
                <li>Each role has specific permissions and access to features.</li>
            </ul>
        </div>

        <div class="bg-white border-t-4 border-emerald-400 rounded-2xl shadow-lg p-6 mb-8 transition-all duration-300 hover:shadow-2xl hover:border-emerald-500 hover:bg-emerald-50/40">
            <h2 class="text-xl font-semibold text-indigo-700 mb-2">Role-Based Features & Access</h2>
            <div class="mb-4">
                <h3 class="font-semibold text-indigo-600 group-hover:text-emerald-500 transition">1. Super Admin</h3>
                <ul class="list-disc ml-6 text-gray-700">
                    <li>Full access to all modules: Users, Roles, Permissions, Banks, Loan Types, Loan Applications.</li>
                    <li>Can create, edit, and delete users, assign roles, and manage all data.</li>
                    <li>Access to all reports, analytics, and dashboards.</li>
                </ul>
            </div>
            <div class="mb-4">
                <h3 class="font-semibold text-indigo-600 group-hover:text-emerald-500 transition">2. Agent</h3>
                <ul class="list-disc ml-6 text-gray-700">
                    <li>Can view and manage loan applications assigned to them or created by them.</li>
                    <li>Can assist customers in filling out loan applications.</li>
                    <li>Can view banks and loan types, but cannot manage users or roles.</li>
                    <li>Access to their own dashboard and relevant reports.</li>
                </ul>
            </div>
            <div class="mb-4">
                <h3 class="font-semibold text-indigo-600 group-hover:text-emerald-500 transition">3. Customer</h3>
                <ul class="list-disc ml-6 text-gray-700">
                    <li>Can view and track the status of their own loan applications.</li>
                    <li>Cannot apply for new loans directly; loan applications are created by agents or staff on their behalf.</li>
                    <li>Can view available banks and loan types.</li>
                    <li>Access to a simplified dashboard (no user management or reports).</li>
                    <li>Can update their own profile information.</li>
                </ul>
            </div>
            <div>
                <h3 class="font-semibold text-indigo-600 group-hover:text-emerald-500 transition">4. Staff</h3>
                <ul class="list-disc ml-6 text-gray-700">
                    <li>Can process and review loan applications.</li>
                    <li>Can view all banks, loan types, and applications but limited user management.</li>
                    <li>Access to operational dashboards and reports.</li>
                </ul>
            </div>
        </div>

        <div class="bg-white border-t-4 border-emerald-400 rounded-2xl shadow-lg p-6 mb-8 transition-all duration-300 hover:shadow-2xl hover:border-emerald-500 hover:bg-emerald-50/40">
            <h2 class="text-xl font-semibold text-indigo-700 mb-2">How to Use the Portal</h2>
            <ol class="list-decimal ml-6 text-gray-700 space-y-2">
                <li><span class="font-semibold">Register or Login:</span> New users can register as customers or agents. Staff and admins are created by the admin.</li>
                <li><span class="font-semibold">Dashboard:</span> After login, you’ll see a dashboard tailored to your role, showing relevant stats and quick links.</li>
                <li><span class="font-semibold">For Customers:</span> You can view and track your loan applications, but cannot apply for new loans directly. Please contact your agent or staff for new loan applications.</li>
                <li><span class="font-semibold">For Agents/Staff:</span> Go to "Apply for a Loan" from the dashboard or home page, fill in the required details for your customer, and submit the application.</li>
                <li><span class="font-semibold">Track Applications:</span> View the status of your applications in real time from your dashboard.</li>
                <li><span class="font-semibold">Manage Data (Admins):</span> Use the sidebar or dashboard links to manage users, roles, permissions, banks, and loan types.</li>
                <li><span class="font-semibold">Reports & Analytics:</span> (Admins/Staff/Agents) Access various reports to analyze loan trends, application statuses, and more.</li>
                <li><span class="font-semibold">Profile Management:</span> Update your personal information from the profile section.</li>
            </ol>
        </div>

        <div class="bg-white border-t-4 border-emerald-400 rounded-2xl shadow-lg p-6 mb-8 transition-all duration-300 hover:shadow-2xl hover:border-emerald-500 hover:bg-emerald-50/40">
            <h2 class="text-xl font-semibold text-indigo-700 mb-2">Best Practices</h2>
            <ul class="list-disc ml-6 text-gray-700">
                <li>Keep your profile and contact information up to date.</li>
                <li>Agents should regularly follow up on pending applications.</li>
                <li>Admins should review permissions and roles periodically for security.</li>
                <li>Customers should review loan offers carefully before applying.</li>
                <li>Use secure passwords and do not share your login credentials.</li>
            </ul>
        </div>

        <div class="bg-white border-t-4 border-emerald-400 rounded-2xl shadow-lg p-6 transition-all duration-300 hover:shadow-2xl hover:border-emerald-500 hover:bg-emerald-50/40">
            <h2 class="text-xl font-semibold text-indigo-700 mb-2">Support & Help</h2>
            <p class="text-gray-700 mb-2">If you have any questions or need assistance, please contact our support team:</p>
            <a href="mailto:admin@rnfintech.com" class="text-emerald-600 font-semibold hover:underline"><i class="fa fa-envelope mr-2"></i>admin@rnfintech.com</a>
        </div>
    </div>
</body>
</html>