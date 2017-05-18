<?php

namespace Tikematic;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'code', 'status', 'total', 'currency', 'vat', 'pending_lock',
    ];

    /**
     * Get transaction's items.
     *
     * @return hasMany
     */
    public function items() {
        return $this->hasMany('Tikematic\TransactionItem');
    }

    /**
     * Get transaction's payer.
     *
     * @return hasMany
     */
    public function payer() {
        return $this->belongsTo('Tikematic\User');
    }
}
