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
            <h4 class="card-title pb-xl-2">Selamat Datang <strong> {{ Auth::user()->name }}</strong>🎉</h4>
            {{-- <p class="mb-0">You have done <span class="fw-semibold">68%</span>😎 more sales today.</p> --}}
            <p>Berhasil login 😎</p>
          </div>
        </div>
        <div class="col-md-6 text-center text-md-end order-1 order-md-2">
          <div class="card-body pb-0 px-0 px-md-4 ps-0">
            <img src="../../assets/img/illustrations/illustration-john-light.png" height="180" alt="View Profile" data-app-light-img="illustrations/illustration-john-light.png" data-app-dark-img="illustrations/illustration-john-dark.html">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Gamification Card -->
</div>
</div>

@endsection


@push('js')

@endpush
