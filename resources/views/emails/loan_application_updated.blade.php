<!DOCTYPE html>
<html>
<head>
    <title>Loan Application Update Notification</title>
</head>
<body>
    <h2>
        @if ($recipientType === 'admin')
            Loan Application Updated
        @else
            Your Loan Application has been Updated
        @endif
    </h2>

    <p>
        @if ($recipientType === 'admin')
            The loan application for <strong>{{ $loanApplication->name_of_applicant }}</strong> 
            has been updated by <strong>{{ Auth::user()->name }}</strong>.
        @else
            Hello {{ $loanApplication->name_of_applicant }}, your loan application of 
            ₹{{ number_format($loanApplication->amount, 2) }} has been updated.
        @endif
    </p>

    <h3>Updated Fields:</h3>
    <ul>
        @forelse ($updatedFields as $field => $values)
            <li>
                <strong>{{ ucwords(str_replace('_', ' ', $field)) }}:</strong>
                <span style="color: red;">{{ $values['old'] }}</span> → 
                <span style="color: green;">{{ $values['new'] }}</span>
            </li>
        @empty
            <p>No significant changes were made.</p>
        @endforelse
    </ul>

    <p><strong>Loan Amount:</strong> ₹{{ number_format($loanApplication->amount, 2) }}</p>
    <p><strong>Phone:</strong> {{ $loanApplication->phone }}</p>
    <p><strong>Application Status:</strong> {{ ucfirst($loanApplication->status) }}</p>
    <p><strong>Loan Type:</strong> {{ $loanApplication->loanType->name }}</p>
    <p><strong>Bank:</strong> {{ $loanApplication->bank->name }}</p>

    <br>
    <p>Thank you,<br> RNFINTECH Team</p>
</body>
</html>
