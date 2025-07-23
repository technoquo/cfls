<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index()
    {
        $downloads = Download::whereStatus(1)
                    ->orderBy('created_at', 'desc')
                    ->get();
        return view('downloads.index', compact('downloads'));
    }
}
