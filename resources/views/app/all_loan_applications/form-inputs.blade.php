@php $editing = isset($loanApplications) @endphp

<div class="flex flex-wrap">
<x-inputs.group class="w-full">
    <x-inputs.select name="user_id" label="Submitted By" required disabled>
        @php 
            $selected = auth()->id(); // Get the currently logged-in user ID
        @endphp
        <option value="{{ $selected }}" selected>
            {{ auth()->user()->name }}
        </option>
    </x-inputs.select>

    <!-- Hidden input to ensure the value is submitted -->
    <input type="hidden" name="user_id" value="{{ $selected }}">
</x-inputs.group>


    <x-inputs.group class="w-full">
        <x-inputs.text
            name="name_of_applicant"
            label="Name Of Applicant"
            :value="old('name_of_applicant', ($editing ? $loanApplications->name_of_applicant : ''))"
            maxlength="255"
            placeholder="Name Of Applicant"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="phone"
            label="Phone"
            :value="old('phone', ($editing ? $loanApplications->phone : ''))"
            placeholder="Phone"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="amount"
            label="Amount"
            :value="old('amount', ($editing ? $loanApplications->amount : ''))"
            step="1"
            placeholder="Amount"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.text
            name="pan_number"
            label="Pan Number"
            :value="old('pan_number', ($editing ? $loanApplications->pan_number : ''))"
            maxlength="255"
            placeholder="Pan Number"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.partials.label
            name="pan_image"
            label="PanCard Image"
        ></x-inputs.partials.label
        ><br />

        <input
            type="file"
            name="pan_image"
            id="pan_image"
            class="form-control-file"
        />

        @if($editing && $loanApplications->pan_image)
        <div class="mt-2">
            <a
                href="{{ \Storage::url($loanApplications->pan_image) }}"
                target="_blank"
                ><i class="icon ion-md-download"></i>&nbsp;Download</a
            >
        </div>
        @endif @error('pan_image') @include('components.inputs.partials.error')
        @enderror
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.text
            name="adhar_number"
            label="Adhar Number"
            :value="old('adhar_number', ($editing ? $loanApplications->adhar_number : ''))"
            maxlength="255"
            placeholder="Adhar Number"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.partials.label
            name="adhar_image"
            label="AdharCard Image"
        ></x-inputs.partials.label
        ><br />

        <input
            type="file"
            name="adhar_image"
            id="adhar_image"
            class="form-control-file"
        />

        @if($editing && $loanApplications->adhar_image)
        <div class="mt-2">
            <a
                href="{{ \Storage::url($loanApplications->adhar_image) }}"
                target="_blank"
                ><i class="icon ion-md-download"></i>&nbsp;Download</a
            >
        </div>
        @endif @error('adhar_image')
        @include('components.inputs.partials.error') @enderror
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.partials.label name="bank_statement" label="Bank Statement"></x-inputs.partials.label><br />
        <input type="file" name="bank_statement" id="bank_statement" class="form-control-file" />
        @if($editing && $loanApplications->bank_statement)
            <div class="mt-2">
                <a href="{{ \Storage::url($loanApplications->bank_statement) }}" target="_blank">
                    <i class="icon ion-md-download"></i>&nbsp;Download
                </a>
            </div>
        @endif
        @error('bank_statement') @include('components.inputs.partials.error') @enderror
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.partials.label name="salary_slip" label="Salary Slip"></x-inputs.partials.label><br />
        <input type="file" name="salary_slip" id="salary_slip" class="form-control-file" />
        @if($editing && $loanApplications->salary_slip)
            <div class="mt-2">
                <a href="{{ \Storage::url($loanApplications->salary_slip) }}" target="_blank">
                    <i class="icon ion-md-download"></i>&nbsp;Download
                </a>
            </div>
        @endif
        @error('salary_slip') @include('components.inputs.partials.error') @enderror
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.partials.label name="electricity_bill" label="Electricity Bill"></x-inputs.partials.label><br />
        <input type="file" name="electricity_bill" id="electricity_bill" class="form-control-file" />
        @if($editing && $loanApplications->electricity_bill)
            <div class="mt-2">
                <a href="{{ \Storage::url($loanApplications->electricity_bill) }}" target="_blank">
                    <i class="icon ion-md-download"></i>&nbsp;Download
                </a>
            </div>
        @endif
        @error('electricity_bill') @include('components.inputs.partials.error') @enderror
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="pincode"
            label="Pincode"
            :value="old('pincode', ($editing ? $loanApplications->pincode : ''))"
            placeholder="Pincode"
            required
        ></x-inputs.text>
    </x-inputs.group>

@php
    $selected = old('status', ($editing ? $loanApplications->status : 'pending')); 
    $userRole = auth()->user()->role; // Get the current user's role
@endphp

<x-inputs.group class="w-full">
    @if($userRole === 'admin')
        <!-- Show dropdown only for admins -->
        <x-inputs.select name="status" label="Status">
            <option value="pending" {{ $selected == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="inreview" {{ $selected == 'inreview' ? 'selected' : '' }}>In Review</option>
            <option value="completed" {{ $selected == 'completed' ? 'selected' : '' }}>Completed</option>
            <option value="rejected" {{ $selected == 'rejected' ? 'selected' : '' }}>Rejected</option>
        </x-inputs.select>
    @else
        <!-- Hide dropdown & set a default hidden input for non-admin users -->
        <input type="hidden" name="status" value="pending">
    @endif
</x-inputs.group>


    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.select name="loan_type_id" label="Loan Type" required>
            @php $selected = old('loan_type_id', ($editing ? $loanApplications->loan_type_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Loan Type</option>
            @foreach($loanTypes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.select name="bank_id" label="Bank" required>
            @php $selected = old('bank_id', ($editing ? $loanApplications->bank_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Bank</option>
            @foreach($banks as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

 @php
    $userRole = auth()->user()->role; // Get the current user's role
@endphp

<x-inputs.group class="w-full">
    @if($userRole === 'admin')
        <!-- Show input only for admins -->
        <x-inputs.text
            name="reason_of_rejection"
            label="Reason Of Rejection"
            :value="old('reason_of_rejection', ($editing ? $loanApplications->reason_of_rejection : ''))"
            placeholder="Provide a reason if rejecting the loan"
        ></x-inputs.text>
    @else
        <!-- Hide input & store an empty value for non-admins -->
        <input type="hidden" name="reason_of_rejection" value="">
    @endif
</x-inputs.group>

</div>
