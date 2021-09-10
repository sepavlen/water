<?php

namespace App\src\services;

use App\src\entities\Error;
use App\src\helpers\ErrorHelper;
use App\src\repositories\ErrorRepository;
use Illuminate\Http\Request;

class ErrorService
{
    public $repository;

    public function __construct(ErrorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function checkRequestErrors (Request $request)
    {
        if ($request->has('st') && $request->st){
            $error = $this->repository->getErrorByParams([
                'machine_number' => $request->n,
                'code' => $request->st,
                'status' => Error::STATUS_ACTIVE,
            ]);
            if (!$error){
                $this->setStatusInactive($request);
                $this->save($request);
            }
        } else {
            $this->setStatusInactive($request);
        }
    }

    public function save (Request $request, $error = false)
    {
        if (!$error){
            $error = $this->repository->error();
        }
        $this->load($error, $request);
        $error->save();
    }

    public function setStatusInactive (Request $request)
    {
        $this->repository->setStatusInactive($request->n);
    }

    public function load (Error &$error, $request)
    {
        $error->machine_number = $request->n;
        $error->code = $request->st;
        $error->status = Error::STATUS_ACTIVE;
        $error->description = ErrorHelper::getRequestErrors($request->st);
    }
    
    public function getActiveErrors () 
    {
        return $this->repository->getActiveErrors();
    }
    
}