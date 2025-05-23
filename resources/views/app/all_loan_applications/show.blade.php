<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                @lang('crud.all_loan_applications.show_title')
            </h2>

            @can('update', $loanApplications)
                <a href="{{ route('all-loan-applications.edit', $loanApplications) }}" class="button">
                    <i class="mr-1 icon ion-md-create"></i>
                    @lang('crud.common.edit')
                </a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <x-slot name="title">
                    <a href="{{ route('all-loan-applications.index') }}" class="mr-4">
                        <i class="mr-1 icon ion-md-arrow-back"></i>
                    </a>
                </x-slot>

                <div class="mt-4 px-4">
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">Submitted By</h5>
                        <span>{{ optional($loanApplications->user)->name ?? '-' }}</span>
                    </div>

                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.all_loan_applications.inputs.name_of_applicant')
                        </h5>
                        <span>{{ $loanApplications->name_of_applicant ?? '-' }}</span>
                    </div>

                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.all_loan_applications.inputs.phone')
                        </h5>
                        <span>{{ $loanApplications->phone ?? '-' }}</span>
                    </div>

                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.all_loan_applications.inputs.amount')
                        </h5>
                        <span>{{ $loanApplications->amount ?? '-' }}</span>
                    </div>

                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.all_loan_applications.inputs.pan_number')
                        </h5>
                        <span>{{ $loanApplications->pan_number ?? '-' }}</span>
                    </div>

                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.all_loan_applications.inputs.pan_image')
                        </h5>
                        @if($loanApplications->pan_image)
                            <a href="{{ \Storage::url($loanApplications->pan_image) }}" target="blank">
                                <i class="mr-1 icon ion-md-download"></i>&nbsp;Download
                            </a>
                        @else
                            -
                        @endif
                    </div>

                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.all_loan_applications.inputs.adhar_number')
                        </h5>
                        <span>{{ $loanApplications->adhar_number ?? '-' }}</span>
                    </div>

                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.all_loan_applications.inputs.adhar_image')
                        </h5>
                        @if($loanApplications->adhar_image)
                            <a href="{{ \Storage::url($loanApplications->adhar_image) }}" target="blank">
                                <i class="mr-1 icon ion-md-download"></i>&nbsp;Download
                            </a>
                        @else
                            -
                        @endif
                    </div>

                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.all_loan_applications.inputs.bank_statement')
                        </h5>
                        @if($loanApplications->bank_statement)
                            <a href="{{ \Storage::url($loanApplications->bank_statement) }}" target="blank">
                                <i class="mr-1 icon ion-md-download"></i>&nbsp;Download
                            </a>
                        @else
                            -
                        @endif
                    </div>

                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.all_loan_applications.inputs.salary_slip')
                        </h5>
                        @if($loanApplications->salary_slip)
                            <a href="{{ \Storage::url($loanApplications->salary_slip) }}" target="blank">
                                <i class="mr-1 icon ion-md-download"></i>&nbsp;Download
                            </a>
                        @else
                            -
                        @endif
                    </div>

                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.all_loan_applications.inputs.electricity_bill')
                        </h5>
                        @if($loanApplications->electricity_bill)
                            <a href="{{ \Storage::url($loanApplications->electricity_bill) }}" target="blank">
                                <i class="mr-1 icon ion-md-download"></i>&nbsp;Download
                            </a>
                        @else
                            -
                        @endif
                    </div>
                </div>

                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.all_loan_applications.inputs.pincode')
                        </h5>
                        <span>{{ $loanApplications->pincode ?? '-' }}</span>
                    </div>

                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.all_loan_applications.inputs.status')
                        </h5>
                        <span>{{ $loanApplications->status ?? '-' }}</span>
                    </div>

                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.all_loan_applications.inputs.loan_type_id')
                        </h5>
                        <span>{{ optional($loanApplications->loanType)->name ?? '-' }}</span>
                    </div>

                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.all_loan_applications.inputs.bank_id')
                        </h5>
                        <span>{{ optional($loanApplications->bank)->name ?? '-' }}</span>
                    </div>

                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.all_loan_applications.inputs.reason_of_rejection')
                        </h5>
                        <span>{{ $loanApplications->reason_of_rejection ?? '-' }}</span>
                    </div>

                    

                <div class="mt-10">
                    <a href="{{ route('all-loan-applications.index') }}" class="button">
                        <i class="mr-1 icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>

                    @can('create', App\Models\LoanApplications::class)
                        <a href="{{ route('all-loan-applications.create') }}" class="button">
                            <i class="mr-1 icon ion-md-add"></i>
                            @lang('crud.common.create')
                        </a>
                    @endcan
                </div>
            </x-partials.card>
        </div>
    </div>
</x-app-layout>
