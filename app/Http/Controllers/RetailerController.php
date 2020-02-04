<?php

namespace App\Http\Controllers;

use App\Retailer;
use Illuminate\Http\Request;

class RetailerController extends Controller
{

    public function index()
    {
        return view('retailer.listRetailer');
    }


    public function show(Retailer $retailer, $id)
    {
        $retailer = Retailer::find($id);
        return view('retailer.viewRetailer', compact('retailer'));
    }

   public function fetch(Request $request){
       if($request->ajax()) {
           $data = Retailer::where('name', 'LIKE', $request->country.'%')->get();
           $output = '';
           if (count($data)>0) {
               $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
               foreach ($data as $row){
                   $output .= '<li class="list-group-item" id="'.$row->id.'">'.$row->name.'</li>';
               }
               $output .= '</ul>';
           }
           else {
               $output .= '<li class="list-group-item">'.'Nenhum encontrado'.'</li>';
           }

           return $output;
       }
   }

    public function retailerRegistration(){
        return view('retailer.retailerRegistration');
    }

    public function retailerRegister(Request $request){

        $this->validate($request, [
            'name'=> 'required',
            'description' => 'required',
            'website' => 'required',
        ]);

        $retailer = new Retailer;

        $retailer->name = $request->name;
        $retailer->description = $request->description;
        $retailer->website = $request->website;

        if ($request->hasFile('logo')){
            $uploadedImage = $request->file('logo');
            $imageName = time() . '.' . $request->logo->extension();
            $destinationPath = public_path('/images/retailerImages/');
            $uploadedImage->move($destinationPath, $imageName);
            $retailer->logo = $imageName;
        }

        $retailer->save();

        return redirect('/retailer/list');
    }

    public function getRetailers()
    {
        $retailers = Retailer::all();

        return json_encode($retailers);
    }

    public function update(Request $request){

        $retailer = Retailer::find($request->retailer_id);

        $retailer->name = $request->name;
        $retailer->description = $request->description;
        $retailer->website = $request->website;
        $retailer->save();
        return redirect('/retailer/list');
    }






}
