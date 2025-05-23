<?php

namespace App\Http\Controllers\Api;

use App\Models\LoanType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\LoanTypeResource;
use App\Http\Resources\LoanTypeCollection;
use App\Http\Requests\LoanTypeStoreRequest;
use App\Http\Requests\LoanTypeUpdateRequest;

class LoanTypeController extends Controller
{
    public function index(Request $request): LoanTypeCollection
    {
        $this->authorize('view-any', LoanType::class);

        $search = $request->get('search', '');

        $loanTypes = LoanType::search($search)
            ->latest()
            ->paginate();

        return new LoanTypeCollection($loanTypes);
    }

    public function store(LoanTypeStoreRequest $request): LoanTypeResource
    {
        $this->authorize('create', LoanType::class);

        $validated = $request->validated();

        $loanType = LoanType::create($validated);

        return new LoanTypeResource($loanType);
    }

    public function show(Request $request, LoanType $loanType): LoanTypeResource
    {
        $this->authorize('view', $loanType);

        return new LoanTypeResource($loanType);
    }

    public function update(
        LoanTypeUpdateRequest $request,
        LoanType $loanType
    ): LoanTypeResource {
        $this->authorize('update', $loanType);

        $validated = $request->validated();

        $loanType->update($validated);

        return new LoanTypeResource($loanType);
    }

    public function destroy(Request $request, LoanType $loanType): Response
    {
        $this->authorize('delete', $loanType);

        $loanType->delete();

        return response()->noContent();
    }
}
