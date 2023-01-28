@extends($activeTemplate.'layouts.master')
@section('content')

    <div class="bg--light">
        <div class="dashboard-inner container pt-120 pb-120">
            <div class="mb-4">
                <div class="row mb-4">
                    <div class="col-lg-8">
                        <h3 class="mb-2">@lang('NFT E-Shop')</h3>
                    </div>
                </div>
                <div class="row gy-4">
                    {{-- @include($activeTemplate.'partials.plan', ['plans' => $plans]) --}}
                    <div class="col-sm-4">
                        <div class="card text-center">
                          <div class="card-body">
                            <h4 class="card-title">Pool 1 - Deposit Wallet</h4>
                            <p class="card-text">Unlimited</p>
                            <h2>$2.00</h2>
                            <p class="card-text">EVERY POOL 1 FOR LIFETIME</p>
                            <div class="row mt-3 mb-3">
                                <div class="col-sm-6">
                                    <span>Investment</span>
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
                                    <span>Total Return</span>
                                </div>
                                <div class="col-sm-6">
                                    <p>Unlimited</p>
                                </div>
                            </div>
                            <a href="#" class="cmn--btn plan-btn btn mt-2">Invest Noow</a>
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
                                    <span>Investment</span>
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
                                    <span>Total Return</span>
                                </div>
                                <div class="col-sm-6">
                                    <p>capital + 20 USD</p>
                                </div>
                            </div>
                            <a href="#" class="cmn--btn plan-btn btn mt-2">Invest Noow</a>
                          </div>
                        </div>
                    </div>
                    <form>
                        <label for="name">NFT Name:</label>
                        <input type="text" id="name" name="name"><br>
            
                        <label for="price">Price in FT:</label>
                        <input type="text" id="price" name="price"><br>
            
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')

@endpush