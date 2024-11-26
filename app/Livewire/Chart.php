<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\User;

class Chart extends Component
{
    public $data = [];

    public function render()
    {
        // Ambil data posts berdasarkan wilayah yang diambil dari user_id
        $posts = Post::with('user')
            ->whereHas('user', function ($query) {
                $query->where('region', 'Jawa Tengah'); // Filter wilayah Semarang
            })
            ->get();

        // Data untuk chart berdasarkan qty dan unit
        $commodities = [];
        foreach ($posts as $post) {
            $unit_value = 0;
            switch ($post->unit) {
                case 'kg':
                    $unit_value = $post->qty;
                    break;
                case 'kwt':
                    $unit_value = $post->qty * 100; // 1 kwt = 100 kg
                    break;
                case 'ton':
                    $unit_value = $post->qty * 1000; // 1 ton = 1000 kg
                    break;
            }

            if (!isset($commodities[$post->title])) {
                $commodities[$post->title] = 0;
            }

            $commodities[$post->title] += $unit_value;
        }

        // Persiapkan data untuk chart
        $this->data = [
            'labels' => array_keys($commodities),
            'datasets' => [
                [
                    'label' => 'Quantity of Commodities in Semarang',
                    'data' => array_values($commodities),
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 1
                ]
            ]
        ];

        return view('livewire.chart');
    }
}
