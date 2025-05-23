<?php

namespace App\Http\Controllers;

use App\Models\LoanType;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\LoanTypeStoreRequest;
use App\Http\Requests\LoanTypeUpdateRequest;

class LoanTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', LoanType::class);

        $search = $request->get('search', '');

        $loanTypes = LoanType::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.loan_types.index', compact('loanTypes', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', LoanType::class);

        return view('app.loan_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LoanTypeStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', LoanType::class);

        $validated = $request->validated();

        $loanType = LoanType::create($validated);

        return redirect()
            ->route('loan-types.edit', $loanType)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, LoanType $loanType): View
    {
        $this->authorize('view', $loanType);

        return view('app.loan_types.show', compact('loanType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, LoanType $loanType): View
    {
        $this->authorize('update', $loanType);

        return view('app.loan_types.edit', compact('loanType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        LoanTypeUpdateRequest $request,
        LoanType $loanType
    ): RedirectResponse {
        $this->authorize('update', $loanType);

        $validated = $request->validated();

        $loanType->update($validated);

        return redirect()
            ->route('loan-types.edit', $loanType)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        LoanType $loanType
    ): RedirectResponse {
        $this->authorize('delete', $loanType);

        $loanType->delete();

        return redirect()
            ->route('loan-types.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
