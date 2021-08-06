<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;

class CashierController extends Controller
{
    public function getTables(){
        $tables = Table::all();

        $html = '';

        foreach($tables as $table){

            $html .= '<div class="col-12">';


                 $html .= $table->name;


            $html .= '</div>';
        }

        return $html;
    }
}
