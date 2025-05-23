<?php

namespace App\Models;

use App\Tenancy\BelongsToTenant;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoanApplications extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;
    use BelongsToTenant;

    protected $fillable = [
        'user_id',
        'name_of_applicant',
        'phone',
        'amount',
        'pan_number',
        'pan_image',
        'adhar_number',
        'adhar_image',
        'bank_statement',
        'salary_slip',
        'electricity_bill',
        'pincode',
        'status',
        'reason_of_rejection',
        'loan_type_id',
        'bank_id',
        
    ];

    protected $searchableFields = ['*'];

    protected $table = 'loan_applications';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function loanType()
    {
        return $this->belongsTo(LoanType::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
