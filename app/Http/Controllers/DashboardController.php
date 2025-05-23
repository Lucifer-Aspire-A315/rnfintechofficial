<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoanApplications;
use App\Models\LoanType;
use App\Models\Bank;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Total counts
        $totalLoans = LoanApplications::count();
        $totalLoanTypes = LoanType::count();
        $totalBanks = Bank::count();
        $totalUsers = User::count();

        // Loan status counts
        $approvedLoans = LoanApplications::where('status', 'completed')->count();
        $rejectedLoans = LoanApplications::where('status', 'rejected')->count();
        $pendingLoans = LoanApplications::where('status', 'pending')->count();
        $inReviewLoans = LoanApplications::where('status', 'inreview')->count();

        // Reports (Today, Weekly, Monthly)
        $todayLoans = LoanApplications::whereDate('created_at', Carbon::today())->count();
        $weeklyLoans = LoanApplications::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $monthlyLoans = LoanApplications::whereMonth('created_at', Carbon::now()->month)->count();

        // Recent loan applications (limit to 5)
        $recentLoans = LoanApplications::latest()->take(10)->get();

        return view('dashboard', compact(
            'totalLoans',
            'totalLoanTypes',
            'totalBanks',
            'totalUsers',
            'approvedLoans',
            'rejectedLoans',
            'pendingLoans',
            'inReviewLoans',
            'todayLoans',
            'weeklyLoans',
            'monthlyLoans',
            'recentLoans'
        ));
    }
}
