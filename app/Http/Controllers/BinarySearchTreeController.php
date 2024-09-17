<?php

namespace App\Http\Controllers;

use App\Services\BinarySearchTreeService;
use Illuminate\Http\Request;

class BinarySearchTreeController extends Controller
{
    protected $bstService;

    public function __construct(BinarySearchTreeService $bstService){
        $this->bstService = $bstService;
    }


    public function insert(Request $request){
        $value = $request->input('value');
        $rootId = $request->input('root_id');

        $node = $this->bstService->insert($value, $rootId);

        return response()->json($node);
    }

    public function search(Request $request){
        $value = $request->input('value');
        $rootId = $request->input('root_id');

        $node = $this->bstService->search($value, $rootId);

        if($node){
            return response()->json($node);
        }else{
            return response()->json(['message' => 'Value not found'], 404);
        }
    }
}
