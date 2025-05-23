<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoanApplicationsUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'name_of_applicant' => ['required', 'string'],
            'phone' => ['required', 'min:10', 'numeric'],
            'amount' => ['required', 'numeric'],
            'pan_number' => ['required', 'max:255', 'string'],
            'pan_image' => ['file', 'max:4096'],
            'adhar_number' => ['required', 'max:255', 'string'],
            'adhar_image' => ['file', 'max:4096'],
            'bank_statement' => ['nullable', 'file', 'max:4096'],
            'salary_slip' => ['nullable', 'file', 'max:4096'],
            'electricity_bill' => ['nullable', 'file', 'max:4096'],
            'pincode' => ['required', 'numeric', 'min:6'],
            'status' => ['required', 'in:pending,inreview,completed,rejected'],
            'loan_type_id' => ['required', 'exists:loan_types,id'],
            'bank_id' => ['required', 'exists:banks,id'],
            'reason_of_rejection' => ['nullable', 'max:255', 'string'],
        ];
    }
}
