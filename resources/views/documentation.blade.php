<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>RNFINTECH Portal Documentation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-[Figtree]">
    <div class="container mx-auto px-6 py-12 max-w-4xl">
        <h1 class="text-3xl font-bold text-blue-800 mb-4">RNFINTECH Portal User Guide</h1>
        <p class="mb-8 text-gray-700">Welcome to RNFINTECH! This documentation will help you understand how to use the portal efficiently, based on your role. Please read the relevant sections to make the most of your experience.</p>

        <div class="bg-white rounded-lg shadow p-6 mb-8">
            <h2 class="text-2xl font-semibold text-blue-700 mb-2">Portal Overview</h2>
            <ul class="list-disc ml-6 text-gray-700">
                <li>RNFINTECH is a unified platform for applying, tracking, and managing loans from multiple banks and NBFCs.</li>
                <li>Roles supported: <span class="font-semibold">Super Admin, Agent, Customer, Staff</span>.</li>
                <li>Each role has specific permissions and access to features.</li>
            </ul>
        </div>

        <div class="bg-white rounded-lg shadow p-6 mb-8">
            <h2 class="text-xl font-semibold text-blue-700 mb-2">Role-Based Features & Access</h2>
            <div class="mb-4">
                <h3 class="font-semibold text-blue-600">1. Super Admin</h3>
                <ul class="list-disc ml-6 text-gray-700">
                    <li>Full access to all modules: Users, Roles, Permissions, Banks, Loan Types, Loan Applications.</li>
                    <li>Can create, edit, and delete users, assign roles, and manage all data.</li>
                    <li>Access to all reports, analytics, and dashboards.</li>
                </ul>
            </div>
            <div class="mb-4">
                <h3 class="font-semibold text-blue-600">2. Agent</h3>
                <ul class="list-disc ml-6 text-gray-700">
                    <li>Can view and manage loan applications assigned to them or created by them.</li>
                    <li>Can assist customers in filling out loan applications.</li>
                    <li>Can view banks and loan types, but cannot manage users or roles.</li>
                    <li>Access to their own dashboard and relevant reports.</li>
                </ul>
            </div>
            <div class="mb-4">
                <h3 class="font-semibold text-blue-600">3. Customer</h3>
                <ul class="list-disc ml-6 text-gray-700">
                    <li>Can view and track the status of their own loan applications.</li>
                    <li>Cannot apply for new loans directly; loan applications are created by agents or staff on their behalf.</li>
                    <li>Can view available banks and loan types.</li>
                    <li>Access to a simplified dashboard (no user management or reports).</li>
                    <li>Can update their own profile information.</li>
                </ul>
            </div>
            <div>
                <h3 class="font-semibold text-blue-600">4. Staff</h3>
                <ul class="list-disc ml-6 text-gray-700">
                    <li>Can process and review loan applications.</li>
                    <li>Can view all banks, loan types, and applications but limited user management.</li>
                    <li>Access to operational dashboards and reports.</li>
                </ul>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6 mb-8">
            <h2 class="text-xl font-semibold text-blue-700 mb-2">How to Use the Portal</h2>
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

        <div class="bg-white rounded-lg shadow p-6 mb-8">
            <h2 class="text-xl font-semibold text-blue-700 mb-2">Best Practices</h2>
            <ul class="list-disc ml-6 text-gray-700">
                <li>Keep your profile and contact information up to date.</li>
                <li>Agents should regularly follow up on pending applications.</li>
                <li>Admins should review permissions and roles periodically for security.</li>
                <li>Customers should review loan offers carefully before applying.</li>
                <li>Use secure passwords and do not share your login credentials.</li>
            </ul>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold text-blue-700 mb-2">Support & Help</h2>
            <p class="text-gray-700 mb-2">If you have any questions or need assistance, please contact our support team:</p>
            <a href="mailto:admin@rnfintech.com" class="text-blue-600 font-semibold hover:underline">admin@rnfintech.com</a>
        </div>
    </div>
</body>
</html>