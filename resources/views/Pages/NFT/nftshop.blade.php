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
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')

@endpush