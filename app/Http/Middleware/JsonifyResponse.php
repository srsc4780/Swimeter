<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class JsonifyResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     * @throws \Throwable
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if ($request->expectsJson() && ! ($response instanceof JsonResponse)) {
            $data = null;
            $statusCode = 200;

            if ($response instanceof RedirectResponse) {
                $data = [
                    'redirect' => $response->getTargetUrl(),
                ];
            } elseif ($response instanceof Response) {
                $content = $response->getOriginalContent();

                if ($content instanceof View) {
                    /** @var array $sections */
                    $sections = $content->renderSections();

                    $data = [
                        'title' => ($sections['page-h1'] ?? $sections['page-title']) ?? '',
                        'body_id' => $sections['page-body'] ?? null,
                        'modal_size' => $sections['modal-size'] ?? null,
                        'html' => $sections['contents'],
                    ];
                }

                $statusCode = $response->status();
            }

            if (! is_null($data)) {
                $headers = $response->headers->all();

                unset (
                    $headers['content-type'], $headers['content-length'],
                    $headers['cache-control'], $headers['date'], $headers['location']
                );

                if (isset($headers['x-message']) && ! isset($data['message'])) {
                    $data['message'] = $headers['x-message'];
                }

                if (isset($headers['x-status']) && $statusCode == 200) {
                    $statusCode = $headers['x-status'];
                }

                return response()->json($data, $statusCode, $headers);
            }
        }

        return $response;
    }
}
