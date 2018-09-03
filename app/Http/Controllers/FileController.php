<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * @DateOfCreation 		3 Sept 2018
     * @ShortDescription	Show the file upload form.
     * @return 				file upload view
     */
    public function fileUpload()
    {
        //load file upload form
        return view('fileUpload');
    }
    /**
     * @DateOfCreation      3 Sept 2018
     * @ShortDescription    upload the file.
     *
     * @return \Illuminate\Http\Response
     */
    public function fileUploadPost(Request $request)
    {
        // apply validation
        $request->validate([
            'file' => 'required',
		]);
        //get file name
        $fileName = time().'.'.request()->file->getClientOriginalExtension();
        //move file to specified directory
        request()->file->move(public_path('files'), $fileName);
        //display success message
        return response()->json(['success'=>'You have successfully upload file.']);
    }
}
