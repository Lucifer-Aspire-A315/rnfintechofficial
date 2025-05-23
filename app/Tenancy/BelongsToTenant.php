<?php
namespace App\Tenancy;

use App\Models\User;
use App\Tenancy\TenantScope;
use Illuminate\Support\Facades\Auth;

trait BelongsToTenant
{
    public static function bootBelongsToTenant()
    {
        static::addGlobalScope(new TenantScope());

        static::creating(function ($model) {
            if (Auth::check() && Auth::user()->role !== 'admin') {
                $model->user_id = Auth::id();
            }
        });
    }

    public function tenant()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
