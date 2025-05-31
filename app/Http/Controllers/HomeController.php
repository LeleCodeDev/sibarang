<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BorrowRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('layout.homepage');
    }

    public function indexHome()
    {
        $user = Auth::user();
        $username = $user->name;

        $totalPeminjaman = BorrowRequest::where('borrower_id', $user->id)->count();

        $sedangDipinjam = BorrowRequest::where('borrower_id', $user->id)
            ->where('status', 'approved')
            ->where('return_date', '>=', Carbon::now())
            ->count();

        $telahDikembalikan = BorrowRequest::where('borrower_id', $user->id)
            ->where('status', 'returned')
            ->count();

        $terlambat = BorrowRequest::where('borrower_id', $user->id)
            ->where('status', 'approved')
            ->where('return_date', '<', Carbon::now())
            ->count();

        $recentBorrowings = BorrowRequest::where('borrower_id', $user->id)
            ->with('requestItems.item')
            ->latest()
            ->take(5)
            ->get();

            // dd($recentBorrowings);

        return view('Peminjam.home', compact(
            'username',
            'totalPeminjaman',
            'sedangDipinjam',
            'telahDikembalikan',
            'terlambat',
            'recentBorrowings'
        ));
    }
}
