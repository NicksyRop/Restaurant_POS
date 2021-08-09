<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
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
            $html .= '<button class="btn btn-primary btn-sm btn-table" data-id="'.$table->id.'">
            <img  class="img-fluid" src=" '.url('/images/round-table.svg').'" alt="image tabel"/>
            <br>

            <span>'.$table->name.'</span>

            </button>';
            $html .= '</div>';
        }

        return $html;
    }

    public function getMenu($id){

        $menus = Menu::where('category_id',$id)->get();

        $html = '';
        foreach ($menus as $menu){

            $html .= '
            <div class="col-md-3 text-eenter">

                <a href="" class="btn btn-outline-secondary" data-id=" '.$menu->id.'">

                    <img class="img-fluid" src="'.url('/menu_images/'.$menu->image).'">
                    <br>
                    '.$menu->menu.'

                <br>

                '.number_format( $menu->price).'

                </a>

            <div>

            ';
        }

        return $html;
    }
}
