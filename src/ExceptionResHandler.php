<?php

namespace Oktorino\Midresapi;



trait ExceptionResHandler
{
  /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function toException(\Exception $exception, $content)
    {
        $errors=[];
        $code = $content["status_code"];
        if($message=$exception->getMessage())
            $errors["message"]=$message;

        if($code >= 500){
            if($file=$exception->getFile())
                $errors["file"]=$file;

            if($line=$exception->getLine())
                $errors["line"]=$line;

            $content["message"]="Something went wrong !!!";

            $content["errors"][]=$errors;
        } 

        if($exception instanceof \Illuminate\Validation\ValidationException){
            $validation = $this->validationException($exception);
            $content["errors"] =[
                "validation"=>$validation
            ];    
        }
    
        
        return response()->json($content, $content['status_code']);
    }
}