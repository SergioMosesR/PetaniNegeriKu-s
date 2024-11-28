<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Undangan;
use Illuminate\Http\Request;

class DinasController extends Controller
{
    public function Dashboard()
    {
        // Fetch posts grouped by region and komoditas, sum the qty for each group
        $data = Post::selectRaw('region, komoditas, SUM(qty) as total_qty')
            ->join('users', 'posts.user_id', '=', 'users.id') // Join with users table to get region
            ->groupBy('region', 'komoditas')
            ->get();

        // Group data by region
        $regions = $data->groupBy('region'); // Group by region
        $chartData = [];

        foreach ($regions as $region => $posts) {
            $totalQtyInRegion = $posts->sum('total_qty'); // Total qty in the region
            $chartData[$region] = [];

            foreach ($posts as $post) {
                // Calculate percentage based on total qty
                $percentage = ($post->total_qty / $totalQtyInRegion) * 100;
                $chartData[$region][] = [
                    'komoditas' => $post->komoditas,
                    'percentage' => $percentage
                ];
            }
        }

        return view('Dinas.dashboard', compact('chartData'));
    }
    public function BeritaDinas()
    {
        return view('Dinas.berita');
    }

    public function Undangan()
    {
        return view('Dinas.undangan');
    }

    public function DetailUndangan($id)
    {
        $undangan = Undangan::findOrFail($id);
        return view('Dinas.detailUndangan', ['undangan' => $undangan]);
    }
}
