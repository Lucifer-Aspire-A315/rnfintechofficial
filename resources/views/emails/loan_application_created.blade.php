<!DOCTYPE html>
<html>
<head>
    <title>Loan Application Notification</title>
</head>
<body>
    <h2>
        @if ($recipientType === 'admin')
            New Loan Application Recived
        @else
            Your Loan Application is Submitted
        @endif
    </h2>

    <p>
        @if ($recipientType === 'admin')
            A new loan application has been submitted by <strong>{{ Auth::guard('web')->user()->name ?? 'Unknown User' }}</strong> 
            for <strong>{{ $loanApplication->name_of_applicant }}</strong>.
        @else
            Hello {{ $loanApplication->name_of_applicant }}, your loan application of ₹{{ number_format($loanApplication->amount, 2) }} has been received.
        @endif
    </p>

    <p><strong>Loan Amount:</strong> ₹{{ number_format($loanApplication->amount, 2) }}</p>
    <p><strong>Phone:</strong> {{ $loanApplication->phone }}</p>
    <p><strong>Application Status:</strong> Pending</p>
    <p><strong>Loan Type:</strong> {{ $loanApplication->loanType->name }}</p>
    <p><strong>Bank:</strong> {{ $loanApplication->bank->name }}</p>

    <br>
    <p>Thank you,<br> RNFINTECH Team</p>
</body>
</html>
