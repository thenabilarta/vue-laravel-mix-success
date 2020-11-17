@extends('layouts.app')

@section('content')

    <div class="block-header">
        <h2>@lang('dashboard::dashboard.module')</h2>
    </div>

    <div class="row dashboard-row">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div id="app">
                    <index></index>
                </div>
            </div>
        </div>

    </div>

@endsection

@push('css-up')

@endpush
@push('scripts')

    <script src="{!! Module::asset('panel:js/panel.js') !!}"></script>
    <script src="{!! Module::asset('panel:js/panel-vue.js') !!}"></script>

@endpush

@push('scripts')

    <script src="{!! Module::asset('dashboard:js/BAP_Dashboard.js') !!}"></script>

@endpush