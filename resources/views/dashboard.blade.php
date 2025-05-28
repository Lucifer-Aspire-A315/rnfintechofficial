@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mx-auto px-4 md:px-6 py-6">
    <!-- Main Grid Layout -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <!-- Total Loans -->
        <a href="{{ route('all-loan-applications.index') }}" class="transition-all duration-300 hover:scale-105">
            <div class="bg-white border-t-4 border-emerald-400 rounded-2xl shadow-xl p-6 group transition-all duration-300 hover:shadow-2xl hover:border-emerald-500 hover:bg-emerald-50/40">
                <div class="flex items-center mb-2">
                    <i class="fa-solid fa-file-invoice-dollar text-2xl text-indigo-600 group-hover:text-emerald-500 transition mr-2"></i>
                    <h3 class="text-lg font-semibold text-indigo-700 group-hover:text-emerald-500 transition">Total Loan Applications</h3>
                </div>
                <p class="text-3xl font-bold text-indigo-700 group-hover:text-emerald-500 transition" x-data="{ count: 0 }" x-init="setInterval(() => count = {{ $totalLoans }}, 50)" x-text="count"></p>
            </div>
        </a>
        <!-- Total Loan Types -->
        <a href="{{ route('loan-types.index') }}" class="transition-all duration-300 hover:scale-105">
            <div class="bg-white border-t-4 border-emerald-400 rounded-2xl shadow-xl p-6 group transition-all duration-300 hover:shadow-2xl hover:border-emerald-500 hover:bg-emerald-50/40">
                <div class="flex items-center mb-2">
                    <i class="fa-solid fa-layer-group text-2xl text-indigo-600 group-hover:text-emerald-500 transition mr-2"></i>
                    <h3 class="text-lg font-semibold text-indigo-700 group-hover:text-emerald-500 transition">Total Loan Types</h3>
                </div>
                <p class="text-3xl font-bold text-indigo-700 group-hover:text-emerald-500 transition" x-data="{ count: 0 }" x-init="setInterval(() => count = {{ $totalLoanTypes }}, 50)" x-text="count"></p>
            </div>
        </a>
        <!-- Total Banks -->
        <a href="{{ route('banks.index') }}" class="transition-all duration-300 hover:scale-105">
            <div class="bg-white border-t-4 border-emerald-400 rounded-2xl shadow-xl p-6 group transition-all duration-300 hover:shadow-2xl hover:border-emerald-500 hover:bg-emerald-50/40">
                <div class="flex items-center mb-2">
                    <i class="fa-solid fa-building-columns text-2xl text-indigo-600 group-hover:text-emerald-500 transition mr-2"></i>
                    <h3 class="text-lg font-semibold text-indigo-700 group-hover:text-emerald-500 transition">Total Banks / NBFC</h3>
                </div>
                <p class="text-3xl font-bold text-indigo-700 group-hover:text-emerald-500 transition" x-data="{ count: 0 }" x-init="setInterval(() => count = {{ $totalBanks }}, 50)" x-text="count"></p>
            </div>
        </a>
        <!-- Total Users (Only for super-admin) -->
        @role('super-admin')
        <a href="{{ route('users.index') }}" class="transition-all duration-300 hover:scale-105">
            <div class="bg-white border-t-4 border-emerald-400 rounded-2xl shadow-xl p-6 group transition-all duration-300 hover:shadow-2xl hover:border-emerald-500 hover:bg-emerald-50/40">
                <div class="flex items-center mb-2">
                    <i class="fa-solid fa-users text-2xl text-indigo-600 group-hover:text-emerald-500 transition mr-2"></i>
                    <h3 class="text-lg font-semibold text-indigo-700 group-hover:text-emerald-500 transition">Total Users</h3>
                </div>
                <p class="text-3xl font-bold text-indigo-700 group-hover:text-emerald-500 transition" x-data="{ count: 0 }" x-init="setInterval(() => count = {{ $totalUsers }}, 50)" x-text="count"></p>
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
    <div class="bg-white p-6 rounded-2xl shadow-xl border border-blue-100 mt-6">
        <h3 class="text-lg font-semibold text-blue-700 mb-4 flex items-center">
            <i class="fa-solid fa-chart-column mr-2 text-blue-500"></i>
            Loan Status Overview
        </h3>
        <div class="relative h-72">
            <canvas id="loanBarChart"></canvas>
        </div>
    </div>

    <!-- Reports Chart (Hide for customer) -->
    @unlessrole('customer')
    <div class="bg-white p-6 rounded-2xl shadow-xl border border-green-100 mt-6">
        <h3 class="text-lg font-semibold text-green-700 mb-4 flex items-center">
            <i class="fa-solid fa-chart-line mr-2 text-green-500"></i>
            Reports (Today, Weekly, Monthly)
        </h3>
        <div class="relative h-72">
            <canvas id="reportsChart"></canvas>
        </div>
    </div>
    @endunlessrole
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Gradient for Bar Chart
        const ctxBar = document.getElementById('loanBarChart')?.getContext('2d');
        let barGradient;
        if (ctxBar) {
            barGradient = ctxBar.createLinearGradient(0, 0, 0, 300);
            barGradient.addColorStop(0, "#3B82F6");
            barGradient.addColorStop(1, "#60A5FA");
        }

        // Loan Status Bar Chart
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
                        backgroundColor: [
                            '#10B981', // Approved - green
                            '#EF4444', // Rejected - red
                            '#FACC15', // Pending - yellow
                            '#3B82F6'  // In Review - blue
                        ],
                        borderRadius: 12,
                        barPercentage: 0.7,
                        categoryPercentage: 0.6,
                        borderSkipped: false,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#1e293b',
                            titleColor: '#fff',
                            bodyColor: '#fff',
                            borderColor: '#3B82F6',
                            borderWidth: 1,
                        }
                    },
                    scales: {
                        x: {
                            grid: { display: false },
                            ticks: { color: '#64748b', font: { weight: 'bold' } }
                        },
                        y: {
                            beginAtZero: true,
                            grid: { color: '#e0e7ef', borderDash: [4, 4] },
                            ticks: { color: '#64748b' }
                        }
                    }
                }
            });
        }

        // Gradient for Line Chart
        const ctxReports = document.getElementById('reportsChart')?.getContext('2d');
        let lineGradient;
        if (ctxReports) {
            lineGradient = ctxReports.createLinearGradient(0, 0, 0, 300);
            lineGradient.addColorStop(0, "rgba(16,185,129,0.4)");
            lineGradient.addColorStop(1, "rgba(16,185,129,0.05)");
        }

        // Reports Line Chart
        if (ctxReports) {
            new Chart(ctxReports, {
                type: 'line',
                data: {
                    labels: ['Today', 'Weekly', 'Monthly'],
                    datasets: [{
                        label: 'Loan Reports',
                        data: [{{ $todayLoans }}, {{ $weeklyLoans }}, {{ $monthlyLoans }}],
                        backgroundColor: lineGradient || 'rgba(16,185,129,0.2)',
                        borderColor: '#10B981',
                        borderWidth: 3,
                        pointBackgroundColor: '#10B981',
                        pointBorderColor: '#fff',
                        pointRadius: 7,
                        pointHoverRadius: 10,
                        fill: true,
                        tension: 0.4,
                        shadowOffsetX: 0,
                        shadowOffsetY: 2,
                        shadowBlur: 8,
                        shadowColor: 'rgba(16,185,129,0.2)'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#1e293b',
                            titleColor: '#fff',
                            bodyColor: '#fff',
                            borderColor: '#10B981',
                            borderWidth: 1,
                        }
                    },
                    scales: {
                        x: {
                            grid: { display: false },
                            ticks: { color: '#64748b', font: { weight: 'bold' } }
                        },
                        y: {
                            beginAtZero: true,
                            grid: { color: '#e0e7ef', borderDash: [4, 4] },
                            ticks: { color: '#64748b' }
                        }
                    }
                }
            });
        }
    });
</script>
@endpush
