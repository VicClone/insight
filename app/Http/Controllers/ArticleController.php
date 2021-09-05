<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\ArticleEditRequest;

use App\Models\Magazine;
use App\Models\Article;
use App\Models\Image;
use App\Models\File;

class ArticleController extends Controller
{
    public function articleAdd($magazideId) {
        $magazine = Magazine::find($magazideId);

        return view('admin.article-add', ['magazine' => $magazine]);
    }

    public function articleAddSubmit(ArticleRequest $req) {
        $file = $req->file('file');
        $storedFile = Storage::putFile('files', $file);

        $articleFile = new File;
        $articleFile->name = pathinfo($storedFile)['basename'];
        $articleFile->save();

        $article = new Article;
        $article->magazine_id = $req->input('magazine-id');
        $article->name = $req->input('name');
        $article->authors = $req->input('authors');
        $article->link_doi = $req->input('doi-link');
        $article->is_popular = boolval($req->input('is-popular'));
        $article->annotation = $req->input('annotation');
        $article->sort = 1;
        $article->file_id = $articleFile->id;
        $article->save();
    }

    public function articleList($magazineId) {
        $articles = Article::where('magazine_id', $magazineId)->get();

        return view(
            'admin.article-list',
            ['articles' => $articles]
        );
    }

    public function articleEdit($magazideId, $articleId) {
        $article = Article::find($articleId);
        $magazine = Magazine::find($magazideId);

        return view(
            'admin.article-edit',
            [
                'article' => $article,
                'magazine' => $magazine,
            ]
        );
    }

    public function articleEditSubmit($articleId, ArticleEditRequest $req) {
        $article = Article::find($articleId);
        $magazine = Magazine::find($article->magazine_id);

        $file = $req->file('file');

        if ($file) {
            $fileId = $article->file_id;
            $oldFile = File::find($fileId);
            $newFile = Storage::putFileAs('file', $file, $oldFile->name);
        }

        $article->name = $req->input('name');
        $article->authors = $req->input('authors');
        $article->link_doi = $req->input('doi-link');
        $article->is_popular = boolval($req->input('is-popular'));
        $article->annotation = $req->input('annotation');
        $article->sort = 1;

        $article->save();

        return view(
            'admin.article-edit',
            [
                'article' => $article,
                'magazine' => $magazine,
            ]
        );
    }

    public function articleDelete($articleId) {
        $article = Article::find($articleId);

        $fileId = $article->file_id;
        $file = File::find($fileId);

        Storage::delete('file/'.$file->name);

        $file->delete();
        $article->delete();
    }
}
