<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::paginate(5);
        return view('management.menu')->with('menus',$menus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('management.menucreate')->with('categories',Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
           'menu' => 'required',
           'price' => 'required|numeric',
           'category_id' =>'required|numeric',

       ]);

       //if no image is given
       $imageName = 'noImage.png';

    //if image is given

       if($request->image){

        $request->validate([


            'image' =>'nullable|file|image|mimes:jpeg,jpg,png|max:2500'

        ]);

        $imageName = date('mdYHis').uniqid().'.'.$request->image->extension();
        $request->image->move(public_path('menu_images'),$imageName);

       }

       $menu = new Menu();
       $menu->menu = $request->menu;
       $menu->price = $request->price;
       $menu->category_id = $request->category_id;
       $menu->image = $imageName;
       $menu->description = $request->description;

       $menu->save();


       notify()->success('Menu added successfully');

       return redirect()->route('menu.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::find($id);

        return view('management.menuedit')->with('menu',$menu)->with('categories',Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'menu' => 'required',
            'price' => 'required|numeric',
            'category_id' =>'required|numeric',

        ]);

        $menu = Menu::find($id);

        //check if image is provided first validate image

        if($request->image){
            $request->validate([


                'image' =>'nullable|file|image|mimes:jpeg,jpg,png|max:2500'

            ]);

            if($menu->image != 'noImage.png'){
                //get the name  of the image of the mnenu image then delete
                $imageName = $menu->image;

                unlink(public_path('menu_images'.'/'.$imageName));

            }

            // after deleting the existing image asign anew name and move to folder agai
            $imageName = date('mdYHis').uniqid().'.'.$request->image->extension();
            $request->image->move(public_path('menu_images'),$imageName);

        }else{

            //if image is not provided retain the oringinal image

            $imageName = $menu->image;
        }

        $menu->menu = $request->menu;
        $menu->price = $request->price;
        $menu->category_id = $request->category_id;
        $menu->description = $request->description;
        $menu->image = $imageName;
        $menu->save();

        notify()->success('Menu item updated successfully');

        return redirect()->route('menu.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
