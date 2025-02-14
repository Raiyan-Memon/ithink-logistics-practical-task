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
                            <h6 class="card-text">Total Users</h6>
                        </div>
                        <div class="avatar bg-light-primary p-50 m-0">
                            <div class="avatar-content">
                                <i data-feather='user'></i>
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
