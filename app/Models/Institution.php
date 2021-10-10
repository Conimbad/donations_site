<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Institution
 *
 * @property $id
 * @property $name_institution
 * @property $country
 * @property $created_at
 * @property $updated_at
 *
 * @property Donation[] $donations
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Institution extends Model
{
    
    static $rules = [
		'name_institution' => 'required',
		'country' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name_institution','country'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function donations()
    {
        return $this->hasMany('App\Models\Donation', 'id_institution', 'id');
    }
    

}
