<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chirp;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chirps = Chirp::with('author')
            ->orderBy('id', 'desc')
            ->get();
          
        return view('home', ['chirps' => $chirps]);
    }
    /**
     * [actOnChirp description]
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function actOnChirp(Request $request, $id)
    {
        $action = $request->get('action');
        switch ($action) {
            case 'Like':
                Chirp::where('id', $id)->increment('likes_count');
                break;
            case 'Unlike':
                Chirp::where('id', $id)->decrement('likes_count');
                break;
        }
        return '';
    }
}
