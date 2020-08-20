<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Carbon\Carbon;
use App\AnotherReservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnotherQRCodeFileController extends Controller
{
    public function create(User $user, AnotherReservation $anotherReservation)
    {
        $currentDate = Carbon::now('Asia/Manila');

        return view('admin.qrcode.anotherCreateFile', compact(
            'anotherReservation',
            'currentDate', 
            'user' 
        ));
    }

    public function update(Request $request, AnotherReservation $anotherReservation, User $user)
    {
        $data = request()->validate([
            'is_paid'           => '',
            'qr_password'       => 'required',
            'qrcode_issued_at'  => ''
        ], [
            'qr_password.required' => 'The QR Code is required.',
        ]);

        $qr = User::with('another_reservation')
            ->join('another_reservations', 'another_reservations.user_id', '=', 'users.id')
            ->select('another_reservations.qr_password', 'users.id')
            ->get();

        foreach ($qr as $qr_pasword) {
            $qr_pasword;
        }

        $qr_password = $qr_pasword->qr_password;

        if ($request->qr_password === $qr_password) {
    
            $user->another_reservation()->where('is_paid', 'Half Payment')->update($data);

            return redirect('/admin/customer/' . $anotherReservation->id . '/access')->with('success', 'Customer ' . $anotherReservation->user->first_name . ' payment done successfully.');
        } else {
            return redirect('/admin/customers/' . $anotherReservation->user->id . '/access/qrerror');
        }
    }

    public function anotherChoice(User $user)
    {
        return view('admin.qrcode.choice', compact('user'));
    }
}
