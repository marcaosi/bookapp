<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected $entity = null;
    protected $validations = [];
    protected $msg_validations = [
        "integer" => "O campo :attributte deve ser um número.",
        "string" => "O campo :attribute deve ser um texto.",
        "required" => "O campo :attribute é obrigatório",
        "unique" => "O campo :attribute já está em uso."
    ];

    public function index(Request $req, $id = null){
        $found = [];
        $status_code = Response::HTTP_OK;

        if(is_null($id)){
            $found = $this->entity::paginate();

        }else{
            $found = $this->entity::where("id", "=", $id)->get();
            if(is_null($found)){
                $status_code = Response::HTTP_NOT_FOUND;
            }
        }

        return new JsonResponse($found, $status_code);
    }

    public function create(Request $req){
        $this->validate($req, $this->validations, $this->msg_validations);

        $object = new $this->entity();
        $object->fill($req->all());
        $object->save();

        return new JsonResponse($object, Response::HTTP_CREATED);
    }

    public function update(Request $req, $id){
        $this->validate($req, $this->validations, $this->msg_validations);

        $object = $this->entity::find($id);

        if(is_null($object)){
            return new JsonResponse(null, Response::HTTP_NOT_FOUND);
        }

        $object->fill($req->all());
        $object->save();

        return new JsonResponse($object, Response::HTTP_OK);
    }

    public function remove(Request $req, $id){
        $object = $this->entity::find($id);

        if(is_null($object)){
            return new JsonResponse(null, Response::HTTP_NOT_FOUND);
        }

        $object->delete();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
