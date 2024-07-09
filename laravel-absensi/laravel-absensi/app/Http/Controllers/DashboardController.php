<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Izin;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $hariIni = date('Y-m-d');
        $bulanIni = date('m') * 1;
        $tahunIni = date('Y');
        $user_id = Auth::user()->id;
        $absensi = Absensi::where('user_id', $user_id)->first();

        $absensiHariIni = Absensi::where('user_id', $user_id)
            ->whereDate('created_at', $hariIni)
            ->first();

        $historiBulanIni = Absensi::where('user_id', $user_id)
            ->whereMonth('created_at', $bulanIni)
            ->whereYear('created_at', $tahunIni)
            ->orderBy('created_at')
            ->get();

        $rekabAbsensi = Absensi::selectRaw('COUNT(user_id) as jmlHadir, COALESCE(SUM(IF(TIME(created_at) > "07:00", 1, 0)), 0) as jmlTerlambat')
            ->where('user_id', $user_id)
            ->whereMonth('created_at', $bulanIni)
            ->whereYear('created_at', $tahunIni)
            ->first();

        $leaderboard = Absensi::join('users', 'absensis.user_id', '=', 'users.id')
            ->select('absensis.*', 'users.name', 'users.email')
            ->whereDate('absensis.created_at', $hariIni)
            ->orderBy('absensis.created_at')
            ->get();

        $rekabIzin = Izin::selectRaw('SUM(IF(status="i", 1,0)) as jmlIzin, SUM(IF(status="s",1,0)) as jmlSakit')
            ->where('user_id', $user_id)
            ->whereMonth('created_at', $bulanIni)
            ->whereYear('created_at', $tahunIni)
            ->where('status_approved', 1)
            ->first();

        $namaBulan = ["", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

        return view('dashboard.index', compact('absensi', 'absensiHariIni', 'historiBulanIni', 'namaBulan', 'bulanIni', 'tahunIni', 'rekabAbsensi', 'leaderboard', 'rekabIzin'));
    }
}
