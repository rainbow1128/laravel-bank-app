<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanApplication extends Model
{
    
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'loan_application';
    
    protected $fillable = [
        'name',
        'amount',
        'repayment_period',
        // 'repayment_mode',
    ];

    protected $attributes = [
        // 'name',
        'interest_rate' => 0.02,
        // 'total_amount_due' => 0,
    ];

    protected $total_amount_due;

    // public function setTotalAmountDue($total_amount_due){
    //     $this-> total_amount_due = $total_amount_due;
    // }
}
