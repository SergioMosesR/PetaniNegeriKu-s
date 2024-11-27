<?php

namespace App\Charts;

use App\Models\User;
use App\Models\Post;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use ArielMejiaDev\LarapexCharts\PieChart;

class Chart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        // Inject the actual instance of LarapexChart here
        $this->chart = $chart;
    }

    public function build(): PieChart
    {
        // Get distinct regions from the users table
        $regions = User::distinct()->pluck('region')->toArray();

        // Initialize an array to hold chart data
        $chartData = [];
        $labels = [];
        $values = [];

        // Loop through each region and fetch the posts for each region
        foreach ($regions as $region) {
            // Fetch the users in this region
            $usersInRegion = User::where('region', $region)->pluck('id')->toArray();

            // Fetch posts associated with the users in the region
            $posts = Post::whereIn('user_id', $usersInRegion)->get();

            // Group the posts by commodity and sum the quantities
            $commodityCounts = $posts->groupBy('commodity')->map(function ($group) {
                return $group->sum('qty');  // Sum the quantities for each commodity
            });

            // Extract labels and values
            $labels = $commodityCounts->keys()->toArray();
            $values = $commodityCounts->values()->toArray();

            // Merge the region data into the chartData
            $chartData[] = [
                'region' => $region,
                'labels' => $labels,
                'values' => $values,
            ];
        }

        // You can now pass $chartData to your view and generate charts per region.
        // Assuming you want to generate a pie chart for each region
        $pieCharts = [];

        foreach ($chartData as $data) {
            $pieCharts[] = $this->chart->pieChart()
                ->setTitle('Distribusi Komoditas di ' . $data['region'])
                ->addData($data['values']) // Pie chart data
                ->setLabels($data['labels']);
        }

        // Returning an array of PieChart instances
        return $pieCharts;
    }
}
