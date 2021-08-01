<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidateMailgun
{
    public function handle(Request $request, Closure $next)
    {
        if (!$this->hasRequiredFields($request)) {
            abort(403, 'Missing mailgun headers');
        }

        if (!$this->validateMailgunToken($request)) {
            abort(403, 'Mailgun token does not match signing key');
        }

        return $next($request);
    }

    public function validateMailgunToken(Request $request): bool
    {
        $hash = hash_hmac(
            'sha256',
            $request->input('timestamp') . $request->input('token'),
            config('services.mailgun.webhook_signing_key'),
            false);

        return $hash === $request->input('signature');
    }

    public function hasRequiredFields($request): bool
    {
        return $request->filled(['token', 'timestamp', 'signature']);
    }
}
