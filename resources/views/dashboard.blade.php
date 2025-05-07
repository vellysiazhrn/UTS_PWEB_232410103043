@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row mb-4">
    <div class="col-md-6">
        <h1><i class="fas fa-home me-2" style="color: var(--cia-turquoise);"></i>Welcome Back, {{ $username }}!</h1>
        <p class="text-muted">Let's check how your crochet projects are going today</p>
    </div>
    <div class="col-md-6 text-md-end">
        <button class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>New Project
        </button>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-3 mb-3">
        <div class="dashboard-stat">
            <h3>Orders</h3>
            <div class="count">{{ $stats['orders'] }}</div>
            <p class="mb-0">{{ $stats['newOrders'] }} new this week</p>
            <i class="fas fa-shopping-bag"></i>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="dashboard-stat pink">
            <h3>Active Projects</h3>
            <div class="count">{{ $stats['activeProjects'] }}</div>
            <p class="mb-0">{{ $stats['dueThisWeek'] }} due this week</p>
            <i class="fas fa-heart"></i>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="dashboard-stat purple">
            <h3>Yarn Stock</h3>
            <div class="count">{{ $stats['yarnStock'] }}</div>
            <p class="mb-0 low-stock">{{ $stats['lowStockItems'] }} running low</p>
            <i class="fas fa-feather-alt"></i>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="dashboard-stat">
            <h3>Monthly Revenue</h3>
            <div class="count">Rp {{ number_format($stats['monthlyRevenue']) }}</div>
            <p class="mb-0">↑ {{ $stats['revenueChange'] }}% from last month</p>
            <i class="fas fa-coins"></i>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-lg-7 mb-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-tasks me-2"></i>Ongoing Projects</h5>
                <a href="/projects" class="btn btn-sm btn-outline-turquoise">View All</a>
            </div>
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    @foreach ($projects as $project)
                        <div class="list-group-item border-0 d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">{{ $project['name'] }}</h6>
                                <p class="text-muted mb-0 small">Due: {{ \Carbon\Carbon::parse($project['due'])->format('F j, Y') }}</p>
                            </div>
                            <div class="text-end">
                                <span class="badge {{ $project['status'] === 'Not Started' ? 'order-status-pending' : 'order-status-progress' }}">
                                    {{ $project['status'] }}
                                </span>
                                <div class="progress mt-2" style="width: 100px;">
                                    <div class="progress-bar {{ $project['status'] === 'Not Started' ? 'progress-bar-pink' : 'progress-bar-purple' }}" role="progressbar" style="width: {{ $project['progress'] }}%"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-5 mb-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-exclamation-triangle me-2"></i>Low Stock Alert</h5>
                <a href="/inventory" class="btn btn-sm btn-outline-turquoise">View Inventory</a>
            </div>
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    @foreach ($materials as $material)
                        @if ($material['stock'] <= 5)
                            <div class="list-group-item border-0 material-{{ $material['type'] }}">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1">{{ $material['name'] }}</h6>
                                        <p class="text-muted mb-0 small">Only {{ $material['stock'] }} {{ $material['type'] === 'accessory' ? 'pairs' : 'skeins' }} left</p>
                                    </div>
                                    <button class="btn btn-sm btn-pink">Order</button>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-calendar-check me-2"></i>Upcoming Deadlines</h5>
            </div>
            <div class="card-body">
                <div class="timeline">
                    @foreach ($deadlines as $d)
                        <div class="timeline-item">
                            <h6>{{ $d['title'] }}</h6>
                            <p class="text-muted mb-0">Due {{ $d['due'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 mb-3">
        <div class="card">
            <div class="card-header purple">
                <h5 class="mb-0"><i class="fas fa-chart-bar me-2"></i>Monthly Sales</h5>
            </div>
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="salesChart" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('salesChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                datasets: [{
                    label: 'Penjualan(Rp)',
                    data: {!! json_encode($salesData) !!},
                    backgroundColor: [
                        'rgba(125, 211, 200, 0.7)',
                        'rgba(242, 123, 177, 0.7)',
                        'rgba(216, 178, 224, 0.7)',
                        'rgba(125, 211, 200, 0.7)',
                        'rgba(242, 123, 177, 0.7)'
                    ],
                    borderColor: [
                        'rgba(125, 211, 200, 1)',
                        'rgba(242, 123, 177, 1)',
                        'rgba(216, 178, 224, 1)',
                        'rgba(125, 211, 200, 1)',
                        'rgba(242, 123, 177, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    });
</script>
@endsection
