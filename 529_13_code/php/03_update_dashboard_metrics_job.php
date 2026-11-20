<?php

class UpdateDashboardMetricsJob
{
    public function handle()
    {
        $metrics = [
            'users' => User::count(),
            'revenue' => Order::sum('total'),
        ];

        cache()->put('dashboard.metrics', $metrics, now()->addMinutes(5));
    }
}
