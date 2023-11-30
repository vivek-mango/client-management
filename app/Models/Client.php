<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_name',
        'company_email',
        'client_type',
        'date_of_birth',
        'company_registration_number',
        'contact_name',
        'contact_email',
    ];

    /**
     * Define a one-to-many relationship with the ClientReferral model for referrals.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function referrals()
    {
        return $this->hasMany(ClientReferral::class, 'client_id');
    }

    /**
     * Define a one-to-many relationship with the ProductMaster model for products.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(ProductMaster::class, 'seller_id');
    }



}
