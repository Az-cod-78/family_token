<?php

namespace App\Http\Controllers\Nft;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Models\Page;

class NftrentController extends Controller
{
    public function index()
    {
        $pageTitle = 'NFT E-Shop';
        return view('Pages.NFT.nftshop', compact('pageTitle'));
    }
}
