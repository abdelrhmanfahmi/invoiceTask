<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class InvoiceController extends Controller
{
    public function getCountryWithMaximumAmount(){
        $max = DB::table('invoices')
        ->join('invoice_items' , 'invoice_items.InvoiceId' , 'invoices.InvoiceId')
        ->select('invoices.BillingCountry' , DB::raw('SUM(invoice_items.UnitPrice) AS total'))
        ->groupBy('invoices.BillingCountry')
        ->get();
        dd($max);

        // $max = DB::table('invoices')
        // ->join('invoice_items' , 'invoice_items.InvoiceId' , 'invoices.InvoiceId')
        // ->select(DB::raw('COUNT(invoice_items.InvoiceId) AS total'))
        // ->groupBy('invoice_items.InvoiceId')
        // ->get();
        // dd($max);

    }
}
