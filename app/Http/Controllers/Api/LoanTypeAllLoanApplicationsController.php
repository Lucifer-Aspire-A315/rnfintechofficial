<?php

namespace App\Http\Controllers\Api;

use App\Models\LoanType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\LoanApplicationsResource;
use App\Http\Resources\LoanApplicationsCollection;

class LoanTypeAllLoanApplicationsController extends Controller
{
    public function index(
        Request $request,
        LoanType $loanType
    ): LoanApplicationsCollection {
        $this->authorize('view', $loanType);

        $search = $request->get('search', '');

        $allLoanApplications = $loanType
            ->allLoanApplications()
            ->search($search)
            ->latest()
            ->paginate();

        return new LoanApplicationsCollection($allLoanApplications);
    }

    public function store(
        Request $request,
        LoanType $loanType
    ): LoanApplicationsResource {
        $this->authorize('create', LoanApplications::class);

        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'name_of_applicant' => ['required', 'string'],
            'phone' => ['required', 'min:10', 'numeric'],
            'amount' => ['required', 'numeric'],
            'pan_number' => ['required', 'max:255', 'string'],
            'pan_image' => ['file', 'max:4096', 'required'],
            'adhar_number' => ['required', 'max:255', 'string'],
            'adhar_image' => ['file', 'max:1024', 'required'],
            'pincode' => ['required', 'numeric', 'min:6'],
            'status' => ['required', 'in:pending,inreview,completed,rejected'],
            'bank_id' => ['required', 'exists:banks,id'],
            'reason_of_rejection' => ['nullable', 'max:255', 'string'],
        ]);

        if ($request->hasFile('pan_image')) {
            $validated['pan_image'] = $request
                ->file('pan_image')
                ->store('public');
        }

        if ($request->hasFile('adhar_image')) {
            $validated['adhar_image'] = $request
                ->file('adhar_image')
                ->store('public');
        }

        $loanApplications = $loanType
            ->allLoanApplications()
            ->create($validated);

        return new LoanApplicationsResource($loanApplications);
    }
}
