@extends('layouts.master')
@push('css')
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row gy-4">
        <div class="col-md-12 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-4">Syarat dan Ketentuan :</h5>

                    @if ($syarat->isEmpty())
                        <span>Tidak ada data</span>
                    @else
                        {!!$syarat[0]->syarat_ketentuan!!}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-4">Tata Tertib :</h5>
                    @if ($tata_tertib->isEmpty())
                        <span>Tidak ada data</span>
                    @else
                        {!!$tata_tertib[0]->tata_tertib!!}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-4">Tata Cara Pemesanan :</h5>

                    @if ($cara_booking->isEmpty())
                    <span>Tidak ada data</span>
                @else
                    {!!$cara_booking[0]->cara_booking!!}
                @endif
                </div>
            </div>
        </div>
        {{-- <div class="col-md-12 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-4">Tata Tertib :</h5>
                    {!!$tata_tertib[0]->tata_tertib!!}
                </div>
            </div>
        </div> --}}
    </div>
</div>

@endsection


@push('js')

@endpush
