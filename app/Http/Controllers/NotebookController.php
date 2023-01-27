<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notebook;

class NotebookController extends Controller
{
    public function index() {

        $paginator = Notebook::paginate(request('limit'));
        return $paginator;
    }

    public function show($id) {
        $result = 1;
        $notebook = Notebook::find($id);
        if ($notebook) {
            $result = $notebook;
        } else {
            $result = response([
                "code" =>  404,
                "message" => "No note found with id = " . $id
            ], 404);            
        }
        return $result;
    }

    public function create(Request $request) {

        $note = new Notebook;
            
        $note->id = $request->id;
        $note->full_name = $request->full_name;
        $note->company = $request->company;
        $note->phone = $request->phone;
        $note->email = $request->email;
        $note->birth_date = $request->birth_date;
        $note->photo = $request->photo;
        
        try {
            $note->save();
            $result = $note;
        } catch(\Illuminate\Database\QueryException $e){
            $result = response([
                "code" =>  $e->errorInfo[1],
                "message" => $e->errorInfo[2]
            ], 400);
        }
        return $result;
    }

    public function update(Request $request) {

        $note = Notebook::find($request->id);
        if ($note) {
            if ($request->full_name) {
                $note->full_name = $request->full_name;
            }
            if ($request->company) {
                $note->company = $request->company;
            }
            if ($request->phone) {
                $note->phone = $request->phone;
            }
            if ($request->email) {
                $note->email = $request->email;
            }
            if ($request->birth_date) {
                $note->birth_date = $request->birth_date;
            }
            if ($request->photo) {
                $note->photo = $request->photo;
            }

            try {
                $note->save();
                $result = $note;
            } catch(\Illuminate\Database\QueryException $e){
                $result = response([
                    "code" =>  $e->errorInfo[1],
                    "message" => $e->errorInfo[2]
                ], 400);
            }
        } else {
            $result = response([
                "code" =>  404,
                "message" => "No note found with id = " . $request->id
            ], 404);
        }
        return $result;
    }

    public function deleteOne($id)
    {
        $result = false;
        $note = Notebook::find($id);
        if($note) {
            try {
                $result = Notebook::query()->where("id","=", $id)->first()->delete();//
            } catch(\Illuminate\Database\QueryException $e){
                $result = response([
                    "code" =>  $e->errorInfo[1],
                    "message" => $e->errorInfo[2]
                ], 400);
            }
    	} else {
            $result = response([
                "code" =>  404,
                "message" => "No note found with id = " . $id
            ], 404);
        }
        return $result;
    }
}
