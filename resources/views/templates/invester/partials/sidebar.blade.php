@php
    $promotionCount = App\Models\PromotionTool::count();
@endphp
<script src="https://cdn.jsdelivr.net/npm/web3@1.3.0/dist/web3.min.js"></script>
    <script>
      window.addEventListener('load', async () => {
        // Check if web3 is available
        if (typeof web3 !== 'undefined') {
          // Use the web3 provider from MetaMask
          const web3 = new Web3(Web3.givenProvider);
          try {
            // Get the user's wallet address
            const accounts = await web3.eth.getAccounts();
            const address = accounts[0];
            // Get the user's wallet balance in wei
            const balanceWei = await web3.eth.getBalance(address);
            // Convert wei to ether
            const balanceEther = web3.utils.fromWei(balanceWei, 'ether');
            // Display the balance on the page
            document.getElementById("wallet-balance").innerHTML = balanceEther + " ETH";
          } catch (error) {
            console.error(error);
          }
        } else {
          console.log('web3 is not available');
        }
      });
    </script>
<div class="dashboard-sidebar" id="dashboard-sidebar">
    <button class="btn-close dash-sidebar-close d-xl-none"></button>
    <a href="{{ route('home') }}" class="logo"><img src="{{ asset(getImage(getFilePath('logoIcon').'/logo_2.png')) }}" alt="images"></a>
    <div class="bg--lights">
        <div class="profile-info">
            {{-- <p class="fs--13px mb-3 fw-bold">@lang('METAMASK BALANCE')</p>
            <div id="wallet-balance"></div> --}}
            <p class="fs--13px mb-3 fw-bold">@lang('ACCOUNT BALANCE')</p>
            <h4 class="usd-balance text--base mb-2 fs--30">{{ showAmount(auth()->user()->deposit_wallet) }} <sub class="top-0 fs--13px">{{ $general->cur_text }} <small>(@lang('Deposit Wallet'))</small> </sub></h4>
            <p class="btc-balance fw-medium fs--18px">{{ showAmount(auth()->user()->interest_wallet) }} <sub class="top-0 fs--13px">{{ $general->cur_text }} <small>(@lang('Rent Generated'))</small></sub></p>
            <div class="mt-4 d-flex flex-wrap gap-2">
                <a href="{{ route('user.deposit.index') }}" class="btn btn--base btn--smd">@lang('Buy FT')</a>
                <style>
                  .disabled-button {
                    pointer-events: none;
                    opacity: 0.6;
                  }
                </style>
                
                @php
                  $currentDay = date('j');
                @endphp
                
                @if ($currentDay == 1 || $currentDay == 15)
                  <a href="{{ route('user.withdraw') }}" class="btn btn--secondary btn--smd">@lang('Withdraw')</a>
                @else
                  <a href="#" class="btn btn--secondary btn--smd disabled-button">@lang('Withdraw')</a>
                @endif
            </div>
        </div>
    </div>
    <ul class="sidebar-menu">
        <li><a href="{{ route('user.home') }}" class="{{ menuActive('user.home') }}"><img src="{{ asset($activeTemplateTrue.'/images/icon/dashboard.png') }}" alt="icon"> @lang('Dashboard')</a></li>
        <li><a href="{{ route('user.invest.statistics') }}" class="{{ menuActive(['user.invest.statistics', 'user.invest.log', 'plan']) }}"><img src="{{ asset($activeTemplateTrue.'/images/icon/investment.png') }}" alt="icon"> @lang('Rented NFTs')</a></li>
        {{-- <li><a href="{{ route('user.deposit.index') }}" class="{{ menuActive('user.deposit*') }}"><img src="{{ asset($activeTemplateTrue.'/images/icon/wallet.png') }}" alt="icon"> @lang('Deposit')</a></li>
        <li><a href="{{ route('user.withdraw') }}" class="{{ menuActive('user.withdraw*') }}"><img src="{{ asset($activeTemplateTrue.'/images/icon/withdraw.png') }}" alt="icon"> @lang('Withdraw')</a></li> --}}
        @if($general->b_transfer)
        <li><a href="{{ route('user.transfer.balance') }}" class="{{ menuActive('user.transfer.balance') }}"><img src="{{ asset($activeTemplateTrue.'/images/icon/balance-transfer.png') }}" alt="icon"> @lang('Transfer Balance')</a></li>
        @endif
        <li><a href="{{ route('user.transactions') }}" class="{{ menuActive('user.transactions') }}"><img src="{{ asset($activeTemplateTrue.'/images/icon/transaction.png') }}" alt="icon"> @lang('Transactions')</a></li>
        <li><a href="{{ route('user.referrals') }}" class="{{ menuActive('user.referrals') }}"><img src="{{ asset($activeTemplateTrue.'/images/icon/referral.png') }}" alt="icon"> @lang('Referrals')</a></li>
        @if($general->promotional_tool && $promotionCount)
        <li><a href="{{ route('user.promotional.banner') }}" class="{{ menuActive('user.promotional.banner') }}"><img src="{{ asset($activeTemplateTrue.'/images/icon/promotion.png') }}" alt="icon"> @lang('Promotional Banner')</a></li>
        @endif

        <li><a href="{{ route('ticket.index') }}" class="{{ menuActive(['ticket', 'ticket.view', 'ticket.open']) }}"><img src="{{ asset($activeTemplateTrue.'/images/icon/ticket.png') }}" alt="icon"> @lang('Support Ticket')</a></li>
        <li><a href="{{ route('user.twofactor') }}" class="{{ menuActive('user.twofactor') }}"><img src="{{ asset($activeTemplateTrue.'/images/icon/2fa.png') }}" alt="icon"> @lang('2FA')</a></li>
        <li><a href="{{ route('user.kyc.form') }}" class="{{ menuActive('user.kyc.form') }}"><img src="{{ asset($activeTemplateTrue.'/images/icon/2fa.png') }}" alt="icon"> @lang('KYC-Form')</a></li>
        {{-- <li><a href="{{ route('user.profile.setting') }}" class="{{ menuActive('user.profile.setting') }}"><img src="{{ asset($activeTemplateTrue.'/images/icon/profile.png') }}" alt="icon"> @lang('Profile')</a></li>
        <li><a href="{{ route('user.change.password') }}" class="{{ menuActive('user.change.password') }}"><img src="{{ asset($activeTemplateTrue.'/images/icon/password.png') }}" alt="icon"> @lang('Change Password')</a></li>
        <li><a href="{{ route('user.logout') }}" class="{{ menuActive('user.logout') }}"><img src="{{ asset($activeTemplateTrue.'/images/icon/logout.png') }}" alt="icon"> @lang('Logout')</a></li> --}}
    </ul>
</div>
