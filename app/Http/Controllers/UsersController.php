<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Index of Users Resource
     */

    public function index()
    {
        try {
            $response['users'] = User::all();
        } catch (QueryException $qex) {
//            return response()->json(['error' => 'Server Error'], 500);
            return response()->json(['error' => $qex->getMessage()], 500);
        }
        return response()->json($response, 200);
    }
    /**
     * gets Authenticated User (profile)
     */
    public function show()
    {
        $user = Auth::user();
        return response()->json($user, 200);
    }


    /**
     * Update User Data
     */

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        try{
            // Check if user has access or no
            if ($id != $user->id) {
                return response()->json(['error' => 'Permission Denied'], 401);
            }

            $user->update($request->all());

        }catch (QueryException $qex) {
            return response()->json(['error' => $qex->getMessage()], 500);
        }
        return response()->json([$user], 200);
    }




}
