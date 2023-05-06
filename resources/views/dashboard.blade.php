@extends('layouts.master')
@push('css')
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row gy-4">
        <!-- Gamification Card -->
        <div class="col-md-12 col-lg-8">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-md-6 order-2 order-md-1">
                        <div class="card-body">
                            <h4 class="card-title pb-xl-2">Congratulations <strong> John!</strong>🎉
                            </h4>
                            <p class="mb-0">You have done <span class="fw-semibold">68%</span>😎
                                more sales today.</p>
                            <p>Check your new badge in your profile.</p>
                            <a href="javascript:;" class="btn btn-primary">View Profile</a>
                        </div>
                    </div>
                    <div class="col-md-6 text-center text-md-end order-1 order-md-2">
                        <div class="card-body pb-0 px-0 px-md-4 ps-0">
                            <img src="../../assets/img/illustrations/illustration-john-light.png"
                                height="180" alt="View Profile"
                                data-app-light-img="illustrations/illustration-john-light.png"
                                data-app-dark-img="illustrations/illustration-john-dark.html">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Gamification Card -->

        <!-- Statistics Total Order -->
        <div class="col-lg-2 col-sm-6">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                        <div class="avatar">
                            <div class="avatar-initial bg-label-primary rounded">
                                <i class="mdi mdi-cart-plus mdi-24px"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <p class="mb-0 text-success me-1">+22%</p>
                            <i class="mdi mdi-chevron-up text-success"></i>
                        </div>
                    </div>
                    <div class="card-info mt-4 pt-1 mt-lg-1 mt-xl-4">
                        <h5 class="mb-2">155k</h5>
                        <p class="text-muted mb-lg-2 mb-xl-3">Total Orders</p>
                        <div class="badge bg-label-secondary rounded-pill">Last 4 Month</div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Statistics Total Order -->

        <!-- Sessions line chart -->
        <div class="col-lg-2 col-sm-6">
            <div class="card h-100">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-end mb-1 flex-wrap gap-2">
                        <h4 class="mb-0 me-2">$38.5k</h4>
                        <p class="mb-0 text-success">+62%</p>
                    </div>
                    <span class="d-block mb-2 text-muted">Sessions</span>
                </div>
                <div class="card-body">
                    <div id="sessions"></div>
                </div>
            </div>
        </div>
        <!--/ Sessions line chart -->

        <!-- Total Transactions & Report Chart -->
        <div class="col-12 col-xl-8">
            <div class="card">
                <div class="row">
                    <div class="col-md-7 col-12 order-2 order-md-0">
                        <div class="card-header">
                            <h5 class="mb-0">Total Transactions</h5>
                        </div>
                        <div class="card-body">
                            <div id="totalTransactionChart"></div>
                        </div>
                    </div>
                    <div class="col-md-5 col-12 border-start">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-1">Report</h5>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="totalTransaction"
                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical mdi-24px"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end"
                                        aria-labelledby="totalTransaction">
                                        <a class="dropdown-item"
                                            href="javascript:void(0);">Refresh</a>
                                        <a class="dropdown-item"
                                            href="javascript:void(0);">Share</a>
                                        <a class="dropdown-item"
                                            href="javascript:void(0);">Update</a>
                                    </div>
                                </div>
                            </div>
                            <p class="text-muted mb-0">Last month transactions $234.40k</p>
                        </div>
                        <div class="card-body pt-3">
                            <div class="row">
                                <div class="col-6 border-end">
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="avatar">
                                            <div class="avatar-initial bg-label-success rounded">
                                                <div class="mdi mdi-trending-up mdi-24px"></div>
                                            </div>
                                        </div>
                                        <p class="text-muted my-2">This Week</p>
                                        <h6 class="mb-0 fw-semibold">+82.45%</h6>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="avatar">
                                            <div class="avatar-initial bg-label-primary rounded">
                                                <div class="mdi mdi-trending-down mdi-24px"></div>
                                            </div>
                                        </div>
                                        <p class="text-muted my-2">This Week</p>
                                        <h6 class="mb-0 fw-semibold">-24.86%</h6>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="d-flex justify-content-around">
                                <div>
                                    <p class="text-muted mb-1">Performance</p>
                                    <h6 class="mb-0 fw-semibold">+94.15%</h6>
                                </div>
                                <button class="btn btn-primary" type="button">view report</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Total Transactions & Report Chart -->

        <!-- Performance Chart -->
        <div class="col-12 col-xl-4 col-md-6">
            <div class="card">
                <div class="card-header pb-1">
                    <div class="d-flex justify-content-between">
                        <h5 class="mb-1">Performance</h5>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="performanceDropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical mdi-24px"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end"
                                aria-labelledby="performanceDropdown">
                                <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                                <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body pb-0">
                    <div id="performanceChart"></div>
                </div>
            </div>
        </div>
        <!--/ Performance Chart -->
    </div>
</div>

@endsection


@push('js')

@endpush
