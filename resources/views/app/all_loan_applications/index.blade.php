<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.all_loan_applications.index_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <div class="mb-5 mt-4">
                    <div class="flex flex-wrap justify-between">
                        <div class="md:w-1/2">
                            <form>
                                <div class="flex items-center w-full">
                                    <x-inputs.text
                                        name="search"
                                        value="{{ $search ?? '' }}"
                                        placeholder="{{ __('crud.common.search') }}"
                                        autocomplete="off"
                                    ></x-inputs.text>

                                    <div class="ml-1">
                                        <button
                                            type="submit"
                                            class="button button-primary"
                                        >
                                            <i class="icon ion-md-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="md:w-1/2 text-right">
                            @can('create', App\Models\LoanApplications::class)
                            <a
                                href="{{ route('all-loan-applications.create') }}"
                                class="button button-primary"
                            >
                                <i class="mr-1 icon ion-md-add"></i>
                                @lang('crud.common.create')
                            </a>
                            @endcan
                        </div>
                    </div>
                </div>

                <div class="block w-full overflow-auto scrolling-touch">
                    <table class="w-full max-w-full mb-4 bg-transparent">
                        <thead class="text-gray-700">
                            <tr>
                                <th></th>
                                <th class="px-4 py-3 text-left">
                                    Submitted By
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.all_loan_applications.inputs.name_of_applicant')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.all_loan_applications.inputs.phone')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.all_loan_applications.inputs.amount')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.all_loan_applications.inputs.pan_number')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.all_loan_applications.inputs.pan_image')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.all_loan_applications.inputs.adhar_number')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.all_loan_applications.inputs.adhar_image')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.all_loan_applications.inputs.bank_statement')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.all_loan_applications.inputs.salary_slip')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.all_loan_applications.inputs.electricity_bill')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.all_loan_applications.inputs.pincode')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.all_loan_applications.inputs.status')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.all_loan_applications.inputs.loan_type_id')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.all_loan_applications.inputs.bank_id')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.all_loan_applications.inputs.reason_of_rejection')
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600">
                            @forelse($allLoanApplications as $loanApplications)
                            <tr class="hover:bg-gray-50">
                                <td
                                    class="px-4 py-3 text-center"
                                    style="width: 134px;"
                                >
                                    <div
                                        role="group"
                                        aria-label="Row Actions"
                                        class="
                                            relative
                                            inline-flex
                                            align-middle
                                        "
                                    >
                                        @can('update', $loanApplications)
                                        <a
                                            href="{{ route('all-loan-applications.edit', $loanApplications) }}"
                                            class="mr-1"
                                        >
                                            <button
                                                type="button"
                                                class="button"
                                            >
                                                <i
                                                    class="icon ion-md-create"
                                                ></i>
                                            </button>
                                        </a>
                                        @endcan @can('view', $loanApplications)
                                        <a
                                            href="{{ route('all-loan-applications.show', $loanApplications) }}"
                                            class="mr-1"
                                        >
                                            <button
                                                type="button"
                                                class="button"
                                            >
                                                <i class="icon ion-md-eye"></i>
                                            </button>
                                        </a>
                                        @endcan @can('delete',
                                        $loanApplications)
                                        <form
                                            action="{{ route('all-loan-applications.destroy', $loanApplications) }}"
                                            method="POST"
                                            onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                        >
                                            @csrf @method('DELETE')
                                            <button
                                                type="submit"
                                                class="button"
                                            >
                                                <i
                                                    class="
                                                        icon
                                                        ion-md-trash
                                                        text-red-600
                                                    "
                                                ></i>
                                            </button>
                                        </form>
                                        @endcan
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ optional($loanApplications->user)->name
                                    ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $loanApplications->name_of_applicant ??
                                    '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $loanApplications->phone ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $loanApplications->amount ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $loanApplications->pan_number ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    @if($loanApplications->pan_image)
                                    <a
                                        href="{{ \Storage::url($loanApplications->pan_image) }}"
                                        target="blank"
                                        ><i
                                            class="mr-1 icon ion-md-download"
                                        ></i
                                        >&nbsp;Download</a
                                    >
                                    @else - @endif
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $loanApplications->adhar_number ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    @if($loanApplications->adhar_image)
                                    <a
                                        href="{{ \Storage::url($loanApplications->adhar_image) }}"
                                        target="blank"
                                        ><i
                                            class="mr-1 icon ion-md-download"
                                        ></i
                                        >&nbsp;Download</a
                                    >
                                    @else - @endif
                                </td>
                                <td class="px-4 py-3 text-left">
                                    @if($loanApplications->bank_statement)
                                    <a
                                        href="{{ \Storage::url($loanApplications->bank_statement) }}"
                                        target="blank"
                                        ><i
                                            class="mr-1 icon ion-md-download"
                                        ></i
                                        >&nbsp;Download</a
                                    >
                                    @else - @endif
                                </td>
                                <td class="px-4 py-3 text-left">
                                    @if($loanApplications->salary_slip)
                                    <a
                                        href="{{ \Storage::url($loanApplications->salary_slip) }}"
                                        target="blank"
                                        ><i
                                            class="mr-1 icon ion-md-download"
                                        ></i
                                        >&nbsp;Download</a
                                    >
                                    @else - @endif
                                </td>
                                <td class="px-4 py-3 text-left">
                                    @if($loanApplications->electricity_bill)
                                    <a
                                        href="{{ \Storage::url($loanApplications->electricity_bill) }}"
                                        target="blank"
                                        ><i
                                            class="mr-1 icon ion-md-download"
                                        ></i
                                        >&nbsp;Download</a
                                    >
                                    @else - @endif
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $loanApplications->pincode ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $loanApplications->status ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{
                                    optional($loanApplications->loanType)->name
                                    ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ optional($loanApplications->bank)->name
                                    ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $loanApplications->reason_of_rejection ??
                                    '-' }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="17">
                                    @lang('crud.common.no_items_found')
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="17">
                                    <div class="mt-10 px-4">
                                        {!! $allLoanApplications->render() !!}
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </x-partials.card>
        </div>
    </div>
</x-app-layout>
