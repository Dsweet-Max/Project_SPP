<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\User;
use Illuminate\Http\Request;

class ApprovingController extends Controller
{
    public function editStatus($id)
    {
        return view('pembayaran.index')->with([
            'pembayaran' => Pembayaran::find($id)
        ]);
    }
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required'
        ]);
        $pembayaran = Pembayaran::find($id);
        $pembayaran->fill($request->all());
        $pembayaran->update();
        return redirect()->intended('pembayaran')->with('success', 'Your data has been updated');
    }
    public function editLevel($id)
    {
        return view('users.user')->with([
            'user' => User::find($id)
        ]);
    }
    public function updateLevel(Request $request, $id)
    {
        $request->validate([
            'level' => '',
        ]);
        $user = User::find($id);
        $user->fill($request->all());
        $user->update();
        return redirect()->intended('dataAkun')->with('success', 'Level Updated');
    }
}