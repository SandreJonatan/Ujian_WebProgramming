@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold tracking-tight text-gray-900">Sales Report</h1>

    <div class="flex justify-between mt-6">
        <div class="w-1/2 pr-2">
            <h2 class="text-2xl font-semibold">Amount Status</h2>
            <canvas id="amountStatusChart" class="chart"></canvas>
        </div>
        <div class="w-1/2 pl-2">
            <h2 class="text-2xl font-semibold">Total Sales by Contact</h2>
            <canvas id="salesByContactChart" class="chart"></canvas>
        </div>
    </div>
</div>

<style>
    .chart {
        max-width: 100%; /* Memastikan chart tidak melebihi lebar kontainer */
        height: auto; /* Menjaga responsivitas */
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Diagram Amount Status
    const amountStatusCtx = document.getElementById('amountStatusChart').getContext('2d');
    const amountStatusChart = new Chart(amountStatusCtx, {
        type: 'bar',
        data: {
            labels: @json($amountStatusLabels),
            datasets: [{
                label: 'Jumlah Amount',
                data: @json($amountStatusValues),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Diagram Total Penjualan per Kontak
    const salesByContactCtx = document.getElementById('salesByContactChart').getContext('2d');
    const salesByContactChart = new Chart(salesByContactCtx, {
        type: 'pie',
        data: {
            labels: @json($salesByContact->pluck('contact_name')),
            datasets: [{
                label: 'Total Amount',
                data: @json($salesByContact->pluck('total_amount')),
                backgroundColor: [
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 159, 64, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Total Sales by Contact'
                }
            }
        }
    });
</script>
@endsection