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
    public function AllEntri()
    {
        $entri = Entri::latest()->get();
        return view('admin.entri.entri_all', compact('entri'));
    }

    public function AddEntri()
    {
        return view('admin.entri.entri_add');
    }

    public function StoreEntri(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'email' => 'required',
            'home_file' => 'required',
            

        ], [

            'title.required' => 'Portfolio Name is Required',
            'email.required' => 'Portfolio Titile is Required',
        ]);

        $image = $request->file('home_file');

        foreach ($image as $home_file) {

            // $name_gen = hexdec(uniqid()) . '.' . $home_file->getClientOriginalExtension(); // 3434343443.jpg


            // $image = 'upload/entri_file/' . $name_gen;

            Entri::insert([
                'title' => $request->title,
                'email' => $request->email,
                'home_file' => $home_file->store('entries'),
                
                'created_at' => Carbon::now(),

            ]);
            $notification = array(
                'message' => 'Portfolio Inserted Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.entri')->with($notification);
        }
    }

    public function Download (Entri $entri) {
        return response()->download(storage_path('app/'. $entri->home_file));
    }

    public function EditEntri($id)
    {
        $entri = Entri::findOrFail($id);
        return view('admin.entri.entri_edit', compact('entri'));
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