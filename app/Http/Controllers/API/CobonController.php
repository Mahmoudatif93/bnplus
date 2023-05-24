<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;
use App\Cobon;
class CobonController extends Controller
{
        use ApiResourceTrait;
        public function cobons()
    {
        $cobons = Cobon::with('package')->with('companies')->with('cards')->get();
        return $this->apiResponse($cobons, 200);
    }

}
