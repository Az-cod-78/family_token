@extends($activeTemplate.'layouts.master')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-4 text-center">
        <div class="form-group">
            <h3>Enter Amount Here</h3>
            <input type="text" class="form-control" name="amount" id="inp_amount" aria-describedby="helpId"
                placeholder="Enter Amount In USD">
        </div>
        <button type="button" onClick="startProcess()" class="btn btn-success">Pay Now</button>
    </div>
</div>

@endsection
@push('js')

@endpush
<script>
    function startProcess() {
        if (document.getElementsByName("amount")[0].value > 0) {
            console.log($('#inp_amount').val())

            // run metamsk functions here
            EThAppDeploy.loadEtherium();
        } else {
            alert('Please Enter Valid Amount');
        }
    }


    EThAppDeploy = {
        loadEtherium: async () => {
            if (typeof window.ethereum !== 'undefined') {
                EThAppDeploy.web3Provider = ethereum;
                EThAppDeploy.requestAccount(ethereum);
            } else {
                alert(
                    "Not able to locate an Ethereum connection, please install a Metamask wallet"
                );
            }
        },
        /****
         * Request A Account
         * **/
        requestAccount: async (ethereum) => {
            ethereum
                .request({
                    method: 'eth_requestAccounts'
                })
                .then((resp) => {
                    //do payments with activated account
                    EThAppDeploy.payNow(ethereum, resp[0]);
                })
                .catch((err) => {
                    // Some unexpected error.
                    console.log(err);
                });
        },
        /***
         *
         * Do Payment
         * */
        payNow: async (ethereum, from) => {
            var amount = $('#inp_amount').val();
            ethereum
                .request({
                    method: 'eth_sendTransaction',
                    params: [{
                        from: from,
                        to: "0x83F631C87e686d9f6147aC5EFF02c736ddF92bFe",
                        value: '0x' + ((amount * 1000000000000000000).toString(16)),
                    }, ],
                })
                .then((txHash) => {
                    if (txHash) {
                        console.log(txHash);
                        // storeTransaction(txHash, amount);
                    } else {
                        console.log("Something went wrong. Please try again");
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    }
    /***
     *
     * @param Transaction id
     *
     */
    // function storeTransaction(txHash, amount) {
    //     $.ajax({
    //         url: "{{ route('user.metamask.transaction.create') }}",
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         type: 'POST',
    //         data: {
    //             txHash: txHash,
    //             amount: amount,
    //         },
    //         success: function (response) {
    //             // reload page after success
    //             window.location.reload();
    //         }
    //     });
    // }

</script>
<script src="{{asset('web3.min.js')}}"></script>
