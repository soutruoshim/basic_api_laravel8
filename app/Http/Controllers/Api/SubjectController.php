<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function Index(){
        $sclass = Sclass::latest()->get();
        return response()->json($sclass);
   }
   public function Store(Request $request){
         $validateData = $request->validate(
             [
                 'class_name' => 'required|unique:sclasses|max:25'
             ]
             );  
             Sclass::insert([
                 'class_name'=>$request->class_name
             ]);

             return response('Sclass insert success');

   }

   public function Edit($id){
         $sclass = Sclass::findOrFail($id);
         return response()->json($sclass);
   }
   public function Update(Request $request, $id){
        Sclass::findOrFail($id)->update([
            'class_name'=>$request->class_name
        ]);
        return response()->json('Sclass update success');
   }
   public function Delete($id){
        Sclass::findOrFail($id)->delete();
        return response()->json('Sclass delete success');
   }
}
