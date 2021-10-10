<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Donation
 *
 * @property $id
 * @property $donation_amount
 * @property $id_institution
 * @property $id_user
 * @property $created_at
 * @property $updated_at
 *
 * @property Institution $institution
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Donation extends Model
{

    static $rules = [
		'donation_amount' => 'required',
		'id_institution' => 'required',
		'id_user' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['donation_amount','id_institution','id_user'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function institution()
    {
        return $this->hasOne('App\Models\Institution', 'id', 'id_institution');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }

}
