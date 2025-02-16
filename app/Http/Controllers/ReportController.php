<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        // Mengambil semua data penjualan
        $sales = Sale::with('contact')->get();

        // Menghitung jumlah berdasarkan status penjualan
        $amountStatusCounts = [
            'Pending' => $sales->where('status', 'Pending')->sum('amount'),
            'Completed' => $sales->where('status', 'Completed')->sum('amount'),
            'Canceled' => $sales->where('status', 'Canceled')->sum('amount'),
        ];

        // Mengambil label status untuk diagram
        $amountStatusLabels = array_keys($amountStatusCounts);
        $amountStatusValues = array_values($amountStatusCounts);

        // Menghitung total jumlah penjualan per kontak
        $salesByContact = $sales->groupBy('contact_id')->map(function ($group) {
            return [
                'contact_name' => $group->first()->contact->name,
                'total_amount' => $group->sum('amount'),
                'status_counts' => [
                    'Pending' => $group->where('status', 'Pending')->sum('amount'),
                    'Completed' => $group->where('status', 'Completed')->sum('amount'),
                    'Canceled' => $group->where('status', 'Canceled')->sum('amount'),
                ],
            ];
        });

        return view('reports.index', compact('amountStatusLabels', 'amountStatusValues', 'salesByContact'));
    }
}