<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller
{
    public function Index(){
        $sclass = Section::latest()->get();
        return response()->json($sclass);
    }
    public function Store(Request $request){
            $validateData = $request->validate(
                [
                    'class_name' => 'required|unique:sclasses|max:25'
                ]
                );  
                Section::insert([
                    'class_name'=>$request->class_name
                ]);

                return response('Sclass insert success');

    }

    public function Edit($id){
            $sclass = Section::findOrFail($id);
            return response()->json($sclass);
    }
    public function Update(Request $request, $id){
            Section::findOrFail($id)->update([
                'class_name'=>$request->class_name
            ]);
            return response()->json('Sclass update success');
    }
    public function Delete($id){
        Section::findOrFail($id)->delete();
        return response()->json('Sclass delete success');
    }
}
