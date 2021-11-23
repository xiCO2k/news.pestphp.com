<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Preview;

use App\Contracts\Actions\Resources\ProvidesArticleResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Wink\WinkPost;

final class PreviewController extends Controller
{
    public function __invoke(
        Request $request,
        WinkPost $article,
        ProvidesArticleResource $articleResourceProvider
    ): Response {
        return Inertia::render('Article', [
            'article' => $articleResourceProvider->handle($article, $request),
        ]);
    }
}
