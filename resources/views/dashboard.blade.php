<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.2/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-6">
        
        <!-- Main Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Total Loans -->
            <a href="{{ route('all-loan-applications.index') }}" class="hover:scale-105 transition transform duration-300">
                <div class="bg-blue-500 text-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold">Total Loan Applications</h3>
                    <p class="text-3xl font-bold" x-data="{ count: 0 }" x-init="setInterval(() => count = {{ $totalLoans }}, 50)" x-text="count"></p>
                </div>
            </a>

            <!-- Total Loan Types -->
            <a href="{{ route('loan-types.index') }}" class="hover:scale-105 transition transform duration-300">
                <div class="bg-green-500 text-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold">Total Loan Types</h3>
                    <p class="text-3xl font-bold" x-data="{ count: 0 }" x-init="setInterval(() => count = {{ $totalLoanTypes }}, 50)" x-text="count"></p>
                </div>
            </a>

            <!-- Total Banks -->
            <a href="{{ route('banks.index') }}" class="hover:scale-105 transition transform duration-300">
                <div class="bg-yellow-500 text-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold">Total Banks / NBFC</h3>
                    <p class="text-3xl font-bold" x-data="{ count: 0 }" x-init="setInterval(() => count = {{ $totalBanks }}, 50)" x-text="count"></p>
                </div>
            </a>

            <!-- Total Users (Only for super-admin) -->
            @role('super-admin')
            <a href="{{ route('users.index') }}" class="hover:scale-105 transition transform duration-300">
                <div class="bg-red-500 text-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold">Total Users</h3>
                    <p class="text-3xl font-bold" x-data="{ count: 0 }" x-init="setInterval(() => count = {{ $totalUsers }}, 50)" x-text="count"></p>
                </div>
            </a>
            @endrole
        </div>

     <!-- Recent Loan Applications -->
        <div class="bg-white shadow-md rounded-lg mt-6 p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Recent Loan Applications</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                    <thead>
                        <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-2 px-4 text-left">Applicant</th>
                            <th class="py-2 px-4 text-left">Phone</th>
                            <th class="py-2 px-4 text-left">Amount</th>
                            <th class="py-2 px-4 text-left">Status</th>
                            <th class="py-2 px-4 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($recentLoans as $loan)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-2 px-4">{{ $loan->name_of_applicant }}</td>
                                <td class="py-2 px-4">{{ $loan->phone }}</td>
                                <td class="py-2 px-4 font-bold">₹{{ number_format($loan->amount, 2) }}</td>
                                <td class="py-2 px-4">
                                    @if ($loan->status == 'completed')
                                        <span class="bg-green-200 text-green-700 py-1 px-3 rounded-full text-xs">Approved</span>
                                    @elseif ($loan->status == 'rejected')
                                        <span class="bg-red-200 text-red-700 py-1 px-3 rounded-full text-xs">Rejected</span>
                                    @elseif ($loan->status == 'pending')
                                        <span class="bg-yellow-200 text-yellow-700 py-1 px-3 rounded-full text-xs">Pending</span>
                                    @else
                                        <span class="bg-blue-200 text-blue-700 py-1 px-3 rounded-full text-xs">In Review</span>
                                    @endif
                                </td>
                                <td class="py-2 px-4">
                                    <a href="{{ route('all-loan-applications.show', $loan->id) }}" class="text-blue-500 hover:underline">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
       
   <!-- Loan Status Overview Chart -->
    <div class="bg-white p-6 rounded-lg shadow-md mt-6">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Loan Status Overview</h3>
        <div class="relative h-64">
            <canvas id="loanBarChart"></canvas>
        </div>
    </div>

    <!-- Reports Chart (Hide for customer) -->
    @unlessrole('customer')
    <div class="bg-white p-6 rounded-lg shadow-md mt-6">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Reports (Today, Weekly, Monthly)</h3>
        <div class="relative" style="height: 300px;">
            <canvas id="reportsChart"></canvas>
        </div>
    </div>
    @endunlessrole

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Chart.js Global Options
        const chartOptions = {
            responsive: true,
            maintainAspectRatio: false, // Prevents auto-increasing height
            scales: {
                y: { 
                    beginAtZero: true,
                    ticks: { stepSize: 1 } // Ensures increments of 1 instead of 0.1
                }
            }
        };

        // Loan Status Doughnut Chart
    const ctxBar = document.getElementById('loanBarChart')?.getContext('2d');

        if (ctxBar) {
            new Chart(ctxBar, {
                type: 'bar',
                data: {
                    labels: ['Approved', 'Rejected', 'Pending', 'In Review'],
                    datasets: [{
                        label: 'Loan Status Count',
                        data: [
                            {{ $approvedLoans ?? 0 }},
                            {{ $rejectedLoans ?? 0 }},
                            {{ $pendingLoans ?? 0 }},
                            {{ $inReviewLoans ?? 0 }}
                        ],
                        backgroundColor: ['#10B981', '#EF4444', '#FACC15', '#3B82F6'],
                        borderColor: ['#059669', '#DC2626', '#EAB308', '#2563EB'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1 // Ensures whole numbers on Y-axis
                            }
                        }
                    }
                }
            });
        } else {
            console.error("Canvas with ID 'loanBarChart' not found!");
        }

        // Reports Line Chart
        const ctxReports = document.getElementById('reportsChart')?.getContext('2d');
        if (ctxReports) {
            new Chart(ctxReports, {
                type: 'line',
                data: {
                    labels: ['Today', 'Weekly', 'Monthly'],
                    datasets: [{
                        label: 'Loan Reports',
                        data: [{{ $todayLoans }}, {{ $weeklyLoans }}, {{ $monthlyLoans }}],
                        backgroundColor: 'rgba(16, 185, 129, 0.2)',
                        borderColor: '#10B981',
                        borderWidth: 2,
                        pointBackgroundColor: '#10B981',
                        fill: true,
                        tension: 0.3
                    }]
                },
                options: chartOptions
            });
        } else {
            console.error("Canvas with ID 'reportsChart' not found!");
        }
    });
</script>




    </div>

</body>
</html>
