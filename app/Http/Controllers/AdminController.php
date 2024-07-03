<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;

class AdminController extends Controller
{
    public function user()
    {
        $data= User::all();
        return view("admin.user", compact("data"));
    }

    public function foodmenu()
    {
        $data= Food::all();
        return view("admin.foodmenu", compact("data"));
    }
    public function uploadfood(Request $request)
    {
        $data= new Food;
        $image= $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage', $imagename);
        $data->image= $imagename;
        $data->title= $request->title;
        $data->price= $request->price;
        $data->description= $request->description;
        $data->save();
        return redirect()->back();
    }
    public function deleteuser($id)
    {
        $data= User::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function deletfoodemenu($id)
    {
        $data= Food::find( $id );
        $data->delete();
        return redirect()->back();
    }
    public function updateview($id)
    {
        $data= Food::find( $id );
        $data->delete();
        return view("admin.updateview", compact("data"));
    }
    public function update($id, Request $request)
    {
        $data= Food::find( $id );
        $image= $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage', $imagename);
        $data->image= $imagename;
        $data->title= $request->title;
        $data->price= $request->price;
        $data->description= $request->description;
        $data->save();
        return redirect()->back();
    }
}

