@extends('layouts/contentLayoutMaster')

@section('title', 'Dashboard Analytics')
@section('page-style')
    <style>
        .avatar svg {
            height: 20px;
            width: 20px;
            font-size: 1.45rem;
            flex-shrink: 0;
        }

        .dark-layout .avatar svg {
            color: #fff;
        }

        .cursor {
            cursor: pointer;
        }

        .revenue-div-border-style {
            border: 2px solid;
            border-left: 0;
            border-top: 0;
            border-bottom: 0;
        }

        .revenue-title-border-style {
            border: 1px solid red;
            border-top: 0;
            border-right: 0;
            border-left: 0;
            padding-bottom: 3px;
        }
    </style>
@endsection

@section('content')

    <section id="dashboard-card">
        <div class="row match-height">
            <div onclick="location.href='{{ route('admin.users.index') }}'" class="col-lg-4 col-sm-6 col-12">
                <div class="card cursor-pointer">
                    <div class="card-header">
                        <div>
                            <h2 class="font-weight-bolder mb-0">{{ $totalUsers ?? 0 }}</h2>
                            <h6 class="card-text">Total </h6>
                        </div>
                        <div class="avatar bg-light-primary p-50 m-0">
                            <div class="avatar-content">
                                <i data-feather='truck'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div onclick="location.href='" class="col-lg-4 col-sm-6 col-12">
                <div class="card cursor-pointer">
                    <div class="card-header">
                        <div>
                            <h2 class="font-weight-bolder mb-0">{{ $totalVendors ?? 0 }}</h2>
                            <h6 class="card-text">Total</h6>
                        </div>
                        <div class="avatar bg-light-primary p-50 m-0">
                            <div class="avatar-content">
                                <i data-feather='cpu'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div onclick="location.href='" class="col-lg-4 col-sm-6 col-12">
                <div class="card cursor-pointer">
                    <div class="card-header">
                        <div>
                            <h2 class="font-weight-bolder mb-0">{{ $totalPincodes ?? 0 }}</h2>
                            <h6 class="card-text">Total</h6>
                        </div>
                        <div class="avatar bg-light-primary p-50 m-0">
                            <div class="avatar-content">
                                <i data-feather='cpu'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div onclick="location.href='" class="col-lg-4 col-sm-6 col-12">
                <div class="card cursor-pointer">
                    <div class="card-header">
                        <div>
                            <h2 class="font-weight-bolder mb-0">{{ $totalClothes ?? 0 }}</h2>
                            <h6 class="card-text">Total</h6>
                        </div>
                        <div class="avatar bg-light-primary p-50 m-0">
                            <div class="avatar-content">
                                <i data-feather='cpu'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div onclick="location.href='" class="col-lg-4 col-sm-6 col-12">
                <div class="card cursor-pointer">
                    <div class="card-header">
                        <div>
                            <h2 class="font-weight-bolder mb-0">{{ $totalServices ?? 0 }}</h2>
                            <h6 class="card-text">Total</h6>
                        </div>
                        <div class="avatar bg-light-primary p-50 m-0">
                            <div class="avatar-content">
                                <i data-feather='cpu'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div onclick="location.href='" class="col-lg-4 col-sm-6 col-12">
                <div class="card cursor-pointer">
                    <div class="card-header">
                        <div>
                            <h2 class="font-weight-bolder mb-0">{{ $totalBanners ?? 0 }}</h2>
                            <h6 class="card-text">Total</h6>
                        </div>
                        <div class="avatar bg-light-primary p-50 m-0">
                            <div class="avatar-content">
                                <i data-feather='cpu'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('page-script')
@endsection
