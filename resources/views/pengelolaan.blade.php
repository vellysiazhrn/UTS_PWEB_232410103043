@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 mt-4">
    <h2 class="mb-4">Pengelolaan</h2>

    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="fas fa-box me-2"></i>Stok Bahan</h5>
                    <button class="btn btn-sm btn-pink">
                        <i class="fas fa-plus me-1"></i>Tambah Bahan
                    </button>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Warna</th>
                                <th>Stok</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($bahan as $item)
                        <tr>
                            <td>{{ $item['nama'] }}</td>
                            <td>{{ $item['kategori'] }}</td>
                            <td>{{ $item['warna'] }}</td>
                            <td>{{ $item['stok'] }}</td>
                            <td>
                                @php
                                    $statusClass = match($item['status']) {
                                        'Tersedia' => 'badge-completed',
                                        'Hampir Habis' => 'badge-pending',
                                        'Habis' => 'badge-danger',
                                        default => '',
                                    };
                                @endphp
                                <span class="badge {{ $statusClass }}">{{ $item['status'] }}</span>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="fas fa-tasks me-2"></i>Proyek Rajut</h5>
                    <button class="btn btn-sm btn-pink">
                        <i class="fas fa-plus me-1"></i>Tambah Proyek
                    </button>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Nama</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proyek as $item)
                            <tr>
                                <td>{{ $item['nama'] }}</td>
                                <td>
                                    <span class="badge 
                                        {{ $item['status'] === 'Selesai' ? 'badge-completed' : 
                                           ($item['status'] === 'Proses' ? 'badge-progress' : 'badge-pending') }}">
                                        {{ $item['status'] }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="fas fa-shopping-bag me-2"></i>Data Pesanan</h5>
                    <button class="btn btn-sm btn-pink">
                        <i class="fas fa-plus me-1"></i>Tambah Pesanan
                    </button>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Customer</th>
                                <th>Produk</th>
                                <th>Deadline</th>
                                <th>Status</th>
                                <th>Catatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesanan as $item)
                            <tr>
                                <td>{{ $item['customer'] }}</td>
                                <td>{{ $item['produk'] }}</td>
                                <td>{{ $item['deadline'] }}</td>
                                <td>
                                    <span class="badge 
                                        {{ $item['status'] === 'Selesai' ? 'badge-completed' : 'badge-progress' }}">
                                        {{ $item['status'] }}
                                    </span>
                                </td>
                                <td>{{ $item['catatan'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>

@endsection
