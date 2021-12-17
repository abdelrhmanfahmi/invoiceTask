<?php

namespace App\Http\Controllers;

use App\InvoiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\elementType;

class InvoiceController extends Controller
{
    public function getCountryWithMaximumAmount(){
        $max = DB::table('invoices')
        ->join('invoice_items' , 'invoice_items.InvoiceId' , 'invoices.InvoiceId')
        ->select('invoices.BillingCountry' , DB::raw('SUM(invoice_items.UnitPrice) AS total'))
        ->groupBy('invoices.BillingCountry')
        ->get();

        $arrayData=[];
        $finalArray=[];

        foreach($max as $m){
            array_push($arrayData , $m);
        }
        
        $maxTotal = max(array_column($arrayData, 'total'));

        foreach ( $arrayData as $element ) {
            if ( $maxTotal == $element->total ) {
                array_push($finalArray , $element);
            }
        }

        dd($finalArray);
    }
}
