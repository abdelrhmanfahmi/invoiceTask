<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    protected $table = "invoice_items";
    protected $fillable = [
        'InvoiceLineId',
        'InvoiceId',
        'UnitPrice',
        'Quantity'
    ];

    public function invoices(){
        return $this->hasMany('App\Invoice' , 'InvoiceId');
    }
}
