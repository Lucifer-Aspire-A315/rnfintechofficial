<?php
namespace App\Mail;

use App\Models\LoanApplications;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LoanApplicationUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $loanApplication;
    public $recipientType;
    public $updatedFields;

    public function __construct(LoanApplications $loanApplication, $recipientType, $updatedFields)
    {
        $this->loanApplication = $loanApplication;
        $this->recipientType = $recipientType;
        $this->updatedFields = $updatedFields;
    }

    public function build()
    {
        $subject = ($this->recipientType === 'admin')
            ? 'Loan Application Updated (Admin Notification)'
            : 'Your Loan Application has been Updated';

        return $this->subject($subject)
                    ->view('emails.loan_application_updated')
                    ->with([
                        'recipientType' => $this->recipientType,
                        'updatedFields' => $this->updatedFields
                    ]);
    }
}
