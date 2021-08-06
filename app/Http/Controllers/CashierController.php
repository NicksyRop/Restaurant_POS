<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Table;
use Illuminate\Http\Request;

class CashierController extends Controller
{

    public function index(){

        return view('cashier.index')->with('categories',Category::all());
    }
    public function getTables(){
        $tables = Table::all();

        $html = '';

        foreach($tables as $table){

            $html .= '<div class="col-md-2">';
            $html .= '<button class="btn btn-primary btn-sm">
            <img  class="img-fluid" src=" '.url('/images/round-table.svg').'" alt="image tabel"/>
            <br>

            <span>'.$table->name.'</span>

            </button>';
            $html .= '</div>';
        }

        return $html;
    }
}
