<?php
namespace App\Mail;

use App\Models\LoanApplications;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LoanApplicationCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $loanApplication;
    public $recipientType; // 'admin' or 'user'

    public function __construct(LoanApplications $loanApplication, $recipientType)
    {
        $this->loanApplication = $loanApplication;
        $this->recipientType = $recipientType;
    }

    public function build()
    {
        $subject = ($this->recipientType === 'admin')
            ? 'New Loan Application Received (Admin Notification)'
            : 'Your Loan Application has been Submitted';

        return $this->subject($subject)
                    ->view('emails.loan_application_created')
                    ->with([
                        'recipientType' => $this->recipientType
                    ]);
    }
}
