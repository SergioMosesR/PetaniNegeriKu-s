<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BeritaDinas;
use App\Models\Comment;
use App\Models\DetailKomunitas;
use App\Models\Komunitas;
use App\Models\Pembelanjaan;
use App\Models\Post;
use App\Models\PostKomunitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetaniController extends Controller
{

    public function ProfilePetani()
    {
        return view('Petani.profile');
    }

    public function DashboardPetani()
    {
        return view('Petani.dashboard');
    }

    public function Pending()
    {
        $pending = Pembelanjaan::where('status', 'pending')
            ->where('id_penjual', Auth::user()->id)
            ->get();
        return view('Petani.pending', compact('pending'));
    }

    public function ProccessPending($id)
    {
        $pending = Pembelanjaan::findOrFail($id);

        $post = Post::findOrFail($pending->id_post);
        $qty = $post->qty - $pending->qty;

        $post->qty = $qty;
        $post->save();

        $pending->status = 'confirmed';
        $pending->save();

        return back()->with('success', 'Process Successfully');
    }

    public function DeletePending($id)
    {
        $pending = Pembelanjaan::findOrFail($id);
        $pending->delete();

        return back()->with('success', 'Pending Order Deleted');
    }

    public function BeritaDinas()
    {
        $BeritaDinas = BeritaDinas::paginate(5);
        return view('Petani.berita', compact('BeritaDinas'));
    }

    public function DetailBerita($id)
    {
        $BeritaDinas = BeritaDinas::findOrFail($id);
        return view('Petani.detailBerita', compact('BeritaDinas'));
    }

    public function Notification()
    {
        return view('Petani.notification');
    }

    public function Komunitas()
    {
        
        return view('Petani.komunitas');
    }

    public function DetailKomunitas($id)
    {
        $comment = Comment::where('id_komunitas', $id)->get();
        $post = PostKomunitas::where('id_komunitas', $id)->get();
        $komunitas = DetailKomunitas::where('id_komunitas', $id)->where('id_user', Auth::user()->id)->first();
        return view('Petani.detailKomunitas', compact('komunitas', 'post', 'comment'));
    }

    public function CreatePost(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        $postKomunitas = new PostKomunitas();
        $postKomunitas->id_komunitas = $request->id_komunitas;
        $postKomunitas->id_user = Auth::user()->id;
        $postKomunitas->title = $validated['title'];
        $postKomunitas->content = $validated['content'];
        $postKomunitas->image = $imageName;
        $postKomunitas->save();
        return back()->with('success', 'Create Post Success');
    }

    public function MakeComment(Request $request)
    {
        $comment = new Comment();
        $comment->id_komunitas = $request->id_komunitas;
        $comment->id_user = Auth::user()->id;
        $comment->content = $request->content;

        $comment->save();
        return back()->with('success', 'Berhasil membuat Comment');
    }
}
