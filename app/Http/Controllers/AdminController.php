<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function user()
    {
        $data=User::all();
        return view("admin.user", compact("data"));
    }

    public function deleteuser($id)
    {
        $data=user::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function foodmenu()
    {
        $data = food::all();

        return view('admin.foodmenu',compact("data"));
    }

    public function upload(Request $request)
    {
        $data = new food;

        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage', $imagename);
        $data->image = $imagename;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->save();
        return redirect()->back();
    }

    public function deletemenu($id)
    {
        $data = food::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function updateview($id)
    {
        $data = food::find($id);
        return view("admin.updateview", compact("data"));
    }

    public function update($id, Request $request)
    {
        $data = food::find($id);
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage', $imagename);
        $data->image = $imagename;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->save();
        return redirect()->back();
    }

    public function reservation(Request $request)
    {
        $data = new Reservation();
      
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->guest = $request->guest;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->message = $request->message;
        $data->save();

        return redirect()->back();
    }

    public function viewreservation()
    {
        $data = Reservation::all();
        return view("admin.adminreservation", compact("data"));
    }

}
