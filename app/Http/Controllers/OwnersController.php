<?php

namespace App\Http\Controllers;

use App\Models\Owners;
use Illuminate\Http\Request;

class OwnersController extends Controller
{
    public function __construct()
    {
       // $this->middleware('checkAdmin');
    }

    public function index(Request $request){
        $name=$request->session()->get('owner_name');
        $surname=$request->session()->get('owner_surname');
        $owners=Owners::with('cars');
        if($name!= null){
            $owners->where('name','like',"%$name%");
        }
        if($surname !=null){
            $owners->where('surname','like',"%$surname%");
        }
        $owners= $owners->orderBy('name')->get();
        return view("owners.list",[
            "owners"=>$owners,
            'name'=>$name,
            'surname'=>$surname
        ]);
    }

    public function create(){
        return view("owners.create");
    }
    public function store(Request $request){
        $owner=new Owners();
        $owner->name=$request->name;
        $owner->surname=$request->surname;
        $owner->save();
        return redirect()->route("index");

    }
    public function update($id){
        $owner=Owners::find($id);
        return view("owners.update",[
            "owner"=>$owner
        ]);

    }
    public function save(Request $request,$id){
        $owner=Owners::find($id);
        $owner->name=$request->name;
        $owner->surname=$request->surname;
        $owner->save();
        return redirect()->route("index");
    }
    public function delete($id){
        Owners::destroy($id);
        return redirect()->route("index");
    }
    public function search(Request $request){
        $request->session()->put('owner_name',$request->name);
        $request->session()->put('owner_surname',$request->surname);
       return redirect()->route('index');
    }
}
