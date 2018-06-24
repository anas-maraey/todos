<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodosController extends Controller
{

    /**
     * Display TODOs for a user
     */

    public function index()
    {
        $user = Auth::user();
        try {
            $response['todos'] = Todos::with(array('user'=>function($query){
                $query->select('id', 'name', 'email');
            }))->where('user_id', '=', $user->id)->get();
        } catch (QueryException $qex) {
//            return response()->json(['error' => 'Server Error'], 500);
            return response()->json(['error' => $qex->getMessage()], 500);
        }
        return response()->json( $response, 200);
    }

    /**
     * Show a TODO
     */

    public function show(Request $request, $id)
    {
        $user = Auth::user();
        try{
            $todo = Todos::find($id);
            if (! $todo) {
                return response()->json(['error' => 'TODO Not Found!'], 404);
            }

            // Check whether a user can access a todo or no
            if ($todo->user_id != $user->id) {
                return response()->json(['error' => 'Permission Denied'], 401);
            }

        }catch (QueryException $qex) {
            return response()->json(['error' => $qex->getMessage()], 500);
        }
        return response()->json([$todo], 200);
    }

    /**
     * Create a new TODO
     * request header must contain the access token
     * request body {"title": "title_goes_here"}
     */

    public function create(Request $request)
    {
        $user = Auth::user();
        try{

            $todo = Todos::create([
                'title' => $request->get('title'),
                'user_id' => $user->id
            ]);
        } catch (QueryException $qex) {
            return response()->json(['error' => $qex->getMessage()], 500);
        }
        return response()->json([$todo], 201);
    }

    /**
     * update
     */

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        try{
            $todo = Todos::find($id);
            if (! $todo) {
                return response()->json(['error' => 'TODO Not Found!'], 404);
            }

            // Check whether a user can access a todo or no
            if ($todo->user_id != $user->id) {
                return response()->json(['error' => 'Permission Denied'], 401);
            }

            $todo->update($request->all());

        }catch (QueryException $qex) {
            return response()->json(['error' => $qex->getMessage()], 500);
        }
        return response()->json([$todo], 200);
    }


    /**
     * Delete a todo
     */

    public function delete(Request $request, $id)
    {
        $user = Auth::user();
        try{
            $todo = Todos::find($id);
            if (! $todo) {
                return response()->json(['error' => 'TODO Not Found!'], 404);
            }

            // Check whether a user can access a todo or no
            if ($todo->user_id != $user->id) {
                return response()->json(['error' => 'Permission Denied'], 401);
            }

            $todo->delete();

        }catch (QueryException $qex) {
            return response()->json(['error' => $qex->getMessage()], 500);
        }
        return response()->json(['message' => 'Deleted!'], 200);
    }


}
