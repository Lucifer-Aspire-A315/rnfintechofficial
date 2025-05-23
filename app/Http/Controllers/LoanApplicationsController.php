<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bank;
use App\Models\LoanType;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\LoanApplications;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\LoanApplicationsStoreRequest;
use App\Http\Requests\LoanApplicationsUpdateRequest;
use App\Mail\LoanApplicationCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\LoanApplicationUpdated;

class LoanApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', LoanApplications::class);

        $search = $request->get('search', '');

        $allLoanApplications = LoanApplications::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.all_loan_applications.index',
            compact('allLoanApplications', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', LoanApplications::class);

        $users = User::pluck('name', 'id');
        $loanTypes = LoanType::pluck('name', 'id');
        $banks = Bank::pluck('name', 'id');

        return view(
            'app.all_loan_applications.create',
            compact('users', 'loanTypes', 'banks')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        LoanApplicationsStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', LoanApplications::class);

        $validated = $request->validated();
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

        foreach (['bank_statement', 'salary_slip', 'electricity_bill'] as $field) {
            if ($request->hasFile($field)) {
                $validated[$field] = $request->file($field)->store('public');
            }
        }

        $loanApplications = LoanApplications::create($validated);
    // Load relationships to get names
    $loanApplications->load('loanType', 'bank');

    
// ✅ Send Email to Admin
    $adminEmail = 'rnfinanceservices22@gmail.com'; // Replace with actual admin email
    Mail::to($adminEmail)->send(new LoanApplicationCreated($loanApplications, 'admin'));

    // ✅ Send Email to the User who submitted the form
  $loggedInUser = Auth::user();
    if (!empty($loggedInUser->email)) {
        Mail::to($loggedInUser->email)->send(new LoanApplicationCreated($loanApplications, 'user'));
    }
        return redirect()
            ->route('all-loan-applications.edit', $loanApplications)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        LoanApplications $loanApplications
    ): View {
        $this->authorize('view', $loanApplications);

        return view(
            'app.all_loan_applications.show',
            compact('loanApplications')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        LoanApplications $loanApplications
    ): View {
        $this->authorize('update', $loanApplications);

        $users = User::pluck('name', 'id');
        $loanTypes = LoanType::pluck('name', 'id');
        $banks = Bank::pluck('name', 'id');

        return view(
            'app.all_loan_applications.edit',
            compact('loanApplications', 'users', 'loanTypes', 'banks')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        LoanApplicationsUpdateRequest $request,
        LoanApplications $loanApplications
    ): RedirectResponse {
        $this->authorize('update', $loanApplications);

        $validated = $request->validated();
        if ($request->hasFile('pan_image')) {
            if ($loanApplications->pan_image) {
                Storage::delete($loanApplications->pan_image);
            }

            $validated['pan_image'] = $request
                ->file('pan_image')
                ->store('public');
        }

        if ($request->hasFile('adhar_image')) {
            if ($loanApplications->adhar_image) {
                Storage::delete($loanApplications->adhar_image);
            }

            $validated['adhar_image'] = $request
                ->file('adhar_image')
                ->store('public');
        }

        foreach (['bank_statement', 'salary_slip', 'electricity_bill'] as $field) {
            if ($request->hasFile($field)) {
                $validated[$field] = $request->file($field)->store('public');
            }
        }

    // 🚀 Ensure that `user_id` is not changed accidentally
    unset($validated['user_id']); 
        $loanApplications->update($validated);
// Load relationships (for loan type & bank names)
    $loanApplications->load('loanType', 'bank');

    // ✅ Find Changed Fields
    $updatedFields = [];
    foreach ($validated as $key => $newValue) {
        if (isset($oldValues[$key]) && $oldValues[$key] != $newValue) {
            $updatedFields[$key] = [
                'old' => $oldValues[$key],
                'new' => $newValue
            ];
        }
    }

    // ✅ Send Email to Admin
    $adminEmail = 'rnfinanceservices22@gmail.com';
    Mail::to($adminEmail)->send(new LoanApplicationUpdated($loanApplications, 'admin', $updatedFields));

    // ✅ Send Email to the Logged-In User
    $loggedInUser = Auth::user();
    if (!empty($loggedInUser->email)) {
        Mail::to($loggedInUser->email)->send(new LoanApplicationUpdated($loanApplications, 'user', $updatedFields));
    }
        return redirect()
            ->route('all-loan-applications.edit', $loanApplications)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        LoanApplications $loanApplications
    ): RedirectResponse {
        $this->authorize('delete', $loanApplications);

        if ($loanApplications->pan_image) {
            Storage::delete($loanApplications->pan_image);
        }

        if ($loanApplications->adhar_image) {
            Storage::delete($loanApplications->adhar_image);
        }

        $loanApplications->delete();

        return redirect()
            ->route('all-loan-applications.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
