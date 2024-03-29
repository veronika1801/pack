<?php

namespace Middlewares;

class SpecialCharsMiddleware
{
   public function handle($request)
   {
       foreach ($request->all() as $key => $value) {
           $request->set($key, is_string($value) ? htmlspecialchars($value) : $value);
       }
       return $request;
   }
}