<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chirp;
use PDF;
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
     * [home description]
     * @return [type] [description]
     */
    public function home()
    {
        return view('home');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function chirp()
    {
        $chirps = Chirp::with('author')
            ->orderBy('id', 'desc')
            ->get();
          
        return view('chirp', ['chirps' => $chirps]);
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
    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function generatePDF()

    {

        $data = ['title' => 'Welcome to HDTuto.com'];

        $pdf = PDF::loadView('myPDF', $data);


        return $pdf->download('hdtuto.pdf');

    }
}
