<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table= "invoices";
    protected $fillable = [
        'InvoiceId',
        'CustomerId',
        'InvoiceDate',
        'BillingAddress',
        'BillingCity	',
        'BillingState',
        'BillingCountry',
        'BillingPostalCode'
    ];

    public function customers(){
        return $this->hasMany('App\Customer' , 'CustomerId');
    }
}
