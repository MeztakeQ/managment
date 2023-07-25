<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Entri;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

use Image;

class EntriController extends Controller
{
    public function index(): \Illuminate\Http\Response
    {
        return response()->view('admin.entri.entri_all', [
            'items' => Entri::query()->orderBy('id', 'DESC')->get(),
        ]);
    }

    public function create()
    {
        return response()->view('admin.entri.entri_add');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required',
            'email' => 'required',
            'home_file.*' => 'required|mimes:pdf,xlx,csv,txt,docx,jpg,bmp,png,rar,zip',
        ], [

            'title.required' => 'Portfolio Name is Required',
            'email.required' => 'Portfolio Titile is Required',
        ]);

        foreach ($data['home_file'] as $file) {
            $entri = new Entri($data);
            $entri->original_name = $file->getClientOriginalName();
            $entri->home_file = $file->store('entries');
            $entri->size = $file->getSize();
            $entri->save();

            $notification = [
                'message' => 'Portfolio Inserted Successfully',
                'alert-type' => 'success'
            ];
        }
        return redirect()->route('all.entri')->with($notification);
    }

    public function download(Entri $entri): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        return response()->download(storage_path('app/' . $entri->home_file), $entri->getName());
    }

    public function edit(Entri $entri): \Illuminate\Http\Response
    {
        return response()->view('admin.entri.entri_edit', compact('entri'));
    }


    public function UpdateEntri(Request $request)
    {

        $entri_id = $request->id;

        if ($request->file('home_file')) {
            $image = $request->file('home_file');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 3434343443.jpg


            $save_url = 'upload/entri_file/' . $name_gen;

            Entri::findOrFail($entri_id)->update([
                'title' => $request->title,
                'email' => $request->email,
                'home_file' => $save_url,

            ]);
            $notification = array(
                'message' => 'Portfolio Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.entri')->with($notification);

        } else {

            Entri::findOrFail($entri_id)->update([
                'title' => $request->title,
                'email' => $request->email,


            ]);
            $notification = array(
                'message' => 'Portfolio Updated without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.entri')->with($notification);

        } // end Else

    } // End Method


    // public function DownloadEntri(Request $request){

    //     $request->validate([

    //         'title' => 'required',

    //         'email' => 'required',

    //         'home_file' => 'required',

    //     ], [

    //         'title.required' => 'Portfolio Name is Required',

    //         'email.required' => 'Portfolio Titile is Required',

    //     ]);

    //     $image = $request->file('home_file');

    //     foreach ($image as $home_file) {

    //         $name_gen = hexdec(uniqid()) . '.' . $home_file->getClientOriginalExtension();

    //         $save_url = 'upload/entri_file/' . $name_gen;

    //         Entri::insert([

    //             'title' => $request->title,

    //             'email' => $request->email,

    //             'home_file' => $save_url,

    //             'created_at' => Carbon::now(),

    //         ]);

    //         $notification = array(

    //             'message' => 'Portfolio Inserted Successfully',

    //             'alert-type' => 'success'

    //         );

    //         return redirect()->route('all.entri')->with($notification);

    //     }
    // }


}
