<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function isShowed(Request $request)
    {
        Member::find($request->id)->update([
            'is_showed'   => $request->state,
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Success Change Visibility Status!',
        ]);
    }
}
