<?php

namespace Middlewares;


class TrimMiddleware
{
   public function handle($request)
   {
       foreach ($request->all() as $key => $value) {
           $request->set($key, is_string($value) ? trim($value) : $value);
       }
       return $request;
   }
}