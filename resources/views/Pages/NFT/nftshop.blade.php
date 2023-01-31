@extends($activeTemplate.'layouts.master')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/web3@1.3.0/dist/web3.min.js"></script>
<div class="bg--light">
    <div class="dashboard-inner container pt-120 pb-120">
        <div class="mb-4">
            <div class="row mb-4">
                <div class="col-lg-8">
                    <h3 class="mb-2">@lang('NFT E-Shop')</h3>
                </div>
                            <h2>$2.00</h2>
                            <p class="card-text">Will expire after 90 days</p>
                            <div class="row mt-3 mb-3">
                                <div class="col-sm-6">
                                    <span>Total Rented</span>
                                </div>
                                <div class="col-sm-6">
                                    <p>$24.00</p>
                                </div>
                            </div>
                            <div class="row mt-3 mb-3">
                                <div class="col-sm-6">
                                    <span>Max. Earn</span>
                                </div>
                                <div class="col-sm-6">
                                    <p>Unlimited</p>
                                </div>
                            </div>
                            <div class="row mt-3 mb-3">
                                <div class="col-sm-6">
                                    <span>Profit</span>
                                </div>
                                <div class="col-sm-6">
                                    <p>Unlimited</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h4 class="card-title">Rent NFT</h4>
                            <p class="card-text">Total 20 USD ROI</p>
                            <h2>$2.00</h2>
                            <p class="card-text">EVERY POOL 1 FOR 10 Pool 1</p>
                            <div class="row mt-3 mb-3">
                                <div class="col-sm-6">
                                    <span>Total Rented</span>
                                </div>
                                <div class="col-sm-6">
                                    <p>$1.00 - $33,333.00</p>
                                </div>
                            </div>
                            <div class="row mt-3 mb-3">
                                <div class="col-sm-6">
                                    <span>Max. Earn</span>
                                </div>
                                <div class="col-sm-6">
                                    <p>20 USD</p>
                                </div>
                            </div>
                            <div class="row mt-3 mb-3">
                                <div class="col-sm-6">
                                    <span>Profit</span>
                                </div>
                                <div class="col-sm-6">
                                    <p>capital + 20 USD</p>
                                </div>
                            </div>
                </div>
                <form action="{{route('nft.purchase')}}" method="post">
                    @csrf
                    <label for="name">NFT Name:</label>
                    <input type="text" id="name" name="name"><br>

                    <label for="package">Package:</label>
                    <input type="text" id="package" name="package"><br>

                    <input type="submit" value="Submit" onClick="openMetaMask()">
                </form>

                <div id="error"></div>

            </div>
        </div>
    </div>
</div>

<script src="{{asset('web3.min.js')}}"></script>

<script>
// function openMetaMask() {
//     if (typeof web3 !== 'undefined') {
//         // Get the values of the form fields
//         var nftName = document.getElementById("name").value;
//         var package = document.getElementById("package").value;
//         var price = package * 24; // 24 dollars per package

//         // Open MetaMask and show the price in the selected currency
//         web3.eth.sendTransaction({
//             from: web3.eth.accounts[0],
//             to: "0xEe2a880F58f5BE27dB79390ab7D245F0909081e9",
//             value: web3.toWei(price, "ether")
//         }, function(error, result) {
//             if (error) {
//                 console.log(error);
//                 document.getElementById("error").innerHTML =
//                     "Transaction failed. Please check MetaMask and try again.";
//             } else {
//                 console.log(result);
//                 document.getElementById("error").innerHTML =
//                     "Transaction successful. Your transaction hash is: " + result;
//             }
//         });
//     } else {
//         document.getElementById("error").innerHTML =
//             "MetaMask is not available. Please install MetaMask and try again.";
//     }
// }
// 
</script>
@endsection