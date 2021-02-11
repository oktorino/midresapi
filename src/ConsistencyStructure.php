<?php

namespace Oktorino\Midresapi;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ConsistencyStructure 
{
   use ExceptionHandler;
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    
    public function handle($request, Closure $next)
    {
        $request->headers->set('Accept', 'application/json');
        $response = $next($request);

        $content = [
            'status_code' => $response->getStatusCode(),
            'success'     => $response->getStatusCode() == 200 ? true : false,
            'message'     => $response->getStatusCode() == 200 ? "ok" : "failed",
            'data'        => null,       
        ];

        if($datas=is_array($response->getOriginalContent())){
            $datas =  $response->getOriginalContent();
            if(isset($datas["message"])){
                $content["message"]=$datas["message"];
            }

            if(isset($datas["data"]))
                $content["data"]=$datas["data"];

        }else{

            if($response->getOriginalContent() instanceof \Illuminate\Database\Eloquent\Collection)
                $content["data"]=$response->getOriginalContent();
            else
                $content["message"]=$response->getOriginalContent();        
        }
      
        if($exception=$response->exception)
            return $this->toException($exception, $content);

        return $response->setContent($content);

    }
}
