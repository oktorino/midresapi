<?php

namespace Oktorino\Midresapi;


trait ExceptionHandler
{
    
    /**
     * Handling Validation 442
     *
     * @param  \Illuminate\Validation\ValidationException  $request
     * @return mixed
     */

    private function validationException( \Illuminate\Validation\ValidationException $exception)
    {
        $errors = $exception->errors();
    
        $datas=[];
        $message="";
        foreach($errors as $messages){
            foreach($messages as $msg){
                $datas[]=$msg;
            }
        }
     
        $errors = collect($datas);

        return $errors;
    }
}