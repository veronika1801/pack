<?php

namespace Middlewares;

use exception;

class CsrfMiddleware
{
    public function handle($request): void
    {
        if ($request->method !== 'post') {
            return;
        }
        
        if (empty($request->get('csrf_token')) ||
            $request->get('csrf_token') !== $this->getSessionCsrfToken()) {
            throw new exception('request not authorized');
        }
    }
    
    private function getsessioncsrftoken()
    {
        // Пример реализации для сессий в PHP:
        return $_SESSION['csrf_token'];
    }
}

