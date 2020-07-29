<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RepublicRequest;
use App\Republic;
use App\Locator;

class RepublicController extends Controller
{
    public function createRepublic (RepublicRequest $request) {
        $republic = new Republic;
        $republic = createRepublic($request);
        return response()->json($republic);

    }

    public function showRepublic ($id){
        $republic= Republic::findOrFail($id);
        return response()->json($republic);
    }
    
    public function listRepublic (){
        $republic = Republic::all();
        return response()->json([$republic]);
    }

    public function updateRepublic( RepublicRequest $request,$id ){
        $republic= Republic::findOrFail($id);
        $republic->updateRepublic($request);
        
        return response()->json($republic);
    }

    public function deleteRepublic($id){
        Republic::destroy($id);
        return response()->json(['República deletada']);

    }

    public function tenant($id){
        $republic = Republic::findOrFail($id);
        $tenants = $republic->tenant_id->get();
        return response()->json($tenants);
    }

    public function locator($id){
        $republic  = Republic::findOrFail($id);
        return response()->json($republic->locator_id);
    }
}

