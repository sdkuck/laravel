<?php

namespace App\Http\Controllers\CMP;

use App\User;
use App\Http\Controllers\Controller;

class DINController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  string  $din
     * @param  string  $flag
     * @return Response
     */
    public function showDINs($din=null,$flag=null)
    {
      if (is_null($din)) {
        $dins = \DB::select('select din, dinflag, pcode, intended_use from sys_cmp.vw_inventory');
      }
      else if (is_null($flag)) {
        $dins = \DB::select('select din, dinflag, pcode, intended_use from sys_cmp.vw_inventory where din = ?', [$din]);
      }
      else {
        $dins = \DB::select('select din, dinflag, pcode, intended_use from sys_cmp.vw_inventory where din = ? and dinflag = ?', [$din,$flag]);
      }
      return $dins;
    }
}
