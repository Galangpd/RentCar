<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $cars = Car::latest()->get();
        
        return view('home.index', compact('cars'));
    }
    public function contact()
    {
        return view('home.contact');
    }
    public function contactStore(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'pesan' => 'required',
        ]);

        Message::create($data);

        return redirect()->back()->with([
            'message' => 'Pesan Anda berhasil dikirim',
            'alert-type' => 'success'
        ]);
    }
    public function detail(Car $car)
    {
        return view('home.detail', compact('car'));
    }
}
