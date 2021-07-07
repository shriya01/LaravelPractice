<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\User;

class MyDatatablesController extends Controller
{
    /**
     * Displays front end view
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('datatables');
    }

    /**
     * Process ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getData()
    {
        //creates datatables based on the ajax request
        return DataTables::of(User::query())->make(true);
    }
}
