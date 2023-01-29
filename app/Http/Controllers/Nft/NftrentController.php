<?php

namespace App\Http\Controllers\Nft;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Models\Page;
use Web3\Web3;
use Web3\Contract;
use Web3\Providers\HttpProvider;
use Web3\RequestManagers\HttpRequestManager;

class NftrentController extends Controller
{
    public function index(Request $request)
    {
       
        $pageTitle = 'NFT E-Shop';
        
        return view('Pages.NFT.nftshop', compact('pageTitle'));
    }
    public function purchase(Request $request)
{
    $nftName = $request->input('name');
    $package = $request->input('package');
    $price = $package * 24; // 24 dollars per package

    // Connect to the Binance Smart Chain network
    $web3 = new Web3(new HttpProvider(new HttpRequestManager("https://restless-wider-sailboat.bsc-testnet.discover.quiknode.pro/909a45380f909abe8c3f55065b06014a0a9e69f0/")));
    // Create an instance of the contract
    $contractAddress = "0xea417362aa8add9a38be9b3933f47cf48d45a93e";
    $abi = '[{"inputs":[{"internalType":"address","name":"_tokenAddress","type":"address"}],
    "stateMutability":"nonpayable","type":"constructor"},
    {"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"user","type":"address"},
    {"indexed":false,"internalType":"uint256","name":"amount","type":"uint256"}],
    "name":"Collect","type":"event"},
    {"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"previousOwner","type":"address"},
    {"indexed":true,"internalType":"address","name":"newOwner","type":"address"}],"name":"OwnershipTransferred","type":"event"},
    {"inputs":[{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"collect","outputs":[],"stateMutability":"nonpayable","type":"function"},
    {"inputs":[],"name":"owner","outputs":[{"internalType":"address","name":"","type":"address"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"renounceOwnership","outputs":[],"stateMutability":"nonpayable","type":"function"},
    {"inputs":[],"name":"tokenAddress","outputs":[{"internalType":"address","name":"","type":"address"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"tokenBalance","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"newOwner","type":"address"}],"name":"transferOwnership","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"tokenHolder","type":"address"}],"name":"userBalance","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"}]';
    $contract = new Contract($web3->provider, $abi);
    $contract->at($contractAddress);
    // Get the user's account address
    $fromAddress = $web3->eth->accounts[0];
    // dd($fromAddress);
// dd($fromAddress);
    // Get the owner's account address
    $toAddress = "0xEe2a880F58f5BE27dB79390ab7D245F0909081e9";

    // Convert the price to wei
    $weiPrice = $web3->utils->toWei($price, 'ether');

// Get the contract instance using the ABI and contract address
$contract = new Contract($web3->provider, $abi);
$contractInstance = $contract->at($contractAddress);

// Get the current user address
$userAddress = $web3->eth->accounts[0];

// Prepare the transaction to call the 'purchase' function of the contract
$transaction = $contractInstance->methods->purchase($nftName, $weiPrice)->send([
'from' => $userAddress,
'gas' => '1000000'
]);

// Check if the transaction was successful
if ($transaction->hasError()) {
return redirect()->back()->with('error', 'Transaction failed. Please check MetaMask and try again.');
} else {
return redirect()->back()->with('success', 'Transaction successful. Your transaction hash is: '.$transaction->getTransactionHash());
}

}
}