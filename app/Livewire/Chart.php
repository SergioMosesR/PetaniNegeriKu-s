<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\User;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;
use Livewire\Component;
use Livewire\WithPagination;

class Chart extends Component
{
    public function render()
    {
        // Create a new instance of the Chart class with the actual injected chart instance
        $charts = (new \App\Charts\Chart(app(LarapexChart::class)))->build();

        return view('livewire.chart', [
            'charts' => $charts,
        ]);
    }
}
