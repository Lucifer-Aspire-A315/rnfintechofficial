<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\LoanApplications;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\LoanApplicationsResource;
use App\Http\Resources\LoanApplicationsCollection;
use App\Http\Requests\LoanApplicationsStoreRequest;
use App\Http\Requests\LoanApplicationsUpdateRequest;

class LoanApplicationsController extends Controller
{
    public function index(Request $request): LoanApplicationsCollection
    {
        $this->authorize('view-any', LoanApplications::class);

        $search = $request->get('search', '');

        $allLoanApplications = LoanApplications::search($search)
            ->latest()
            ->paginate();

        return new LoanApplicationsCollection($allLoanApplications);
    }

    public function store(
        LoanApplicationsStoreRequest $request
    ): LoanApplicationsResource {
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

        $loanApplications = LoanApplications::create($validated);

        return new LoanApplicationsResource($loanApplications);
    }

    public function show(
        Request $request,
        LoanApplications $loanApplications
    ): LoanApplicationsResource {
        $this->authorize('view', $loanApplications);

        return new LoanApplicationsResource($loanApplications);
    }

    public function update(
        LoanApplicationsUpdateRequest $request,
        LoanApplications $loanApplications
    ): LoanApplicationsResource {
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

        $loanApplications->update($validated);

        return new LoanApplicationsResource($loanApplications);
    }

    public function destroy(
        Request $request,
        LoanApplications $loanApplications
    ): Response {
        $this->authorize('delete', $loanApplications);

        if ($loanApplications->pan_image) {
            Storage::delete($loanApplications->pan_image);
        }

        if ($loanApplications->adhar_image) {
            Storage::delete($loanApplications->adhar_image);
        }

        $loanApplications->delete();

        return response()->noContent();
    }
}
