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
use App\Models\Author;

class ArticleController extends Controller
{
    public function articleAdd($magazideId) {
        $magazine = Magazine::find($magazideId);
        $authors = Author::all();

        return view('admin.article-add',
            [
                'magazine' => $magazine,
                'authors' => $authors
            ]
        );
    }

    public function articleAddSubmit(ArticleRequest $req) {
        $file = $req->file('file');
        $storedFile = Storage::disk('public')->putFile('files', $file);

        $articleFile = new File;
        $articleFile->name = pathinfo($storedFile)['basename'];
        $articleFile->save();

        $article = new Article;
        $article->magazine_id = $req->input('magazine-id');
        $article->name = $req->input('name');
        $article->link_doi = $req->input('doi-link');
        $article->is_popular = boolval($req->input('is-popular'));
        $article->annotation = $req->input('annotation');
        $article->sort = 1;
        $article->file_id = $articleFile->id;

        $article->save();

        $article->authors()->attach($req->input('authors'));

        $magazineId = $req->input('magazine-id');

        return $this->articleList($magazineId);
    }

    public function articleList($magazineId) {
        $articles = Article::where('magazine_id', $magazineId)->get();
        $magazine = Magazine::find($magazineId);

        return view(
            'admin.article-list',
            [
                'articles' => $articles,
                'magazineId' => $magazineId,
                'magazine' => $magazine
            ]
        );
    }

    public function articleEdit($magazideId, $articleId) {
        $article = Article::find($articleId);
        $magazine = Magazine::find($magazideId);
        $authors = Author::all();

        $articleAuthors = [];

        foreach ($article->authors as $author) {
            array_push($articleAuthors, $author->id);
        }

        return view(
            'admin.article-edit',
            [
                'article' => $article,
                'magazine' => $magazine,
                'authors' => $authors,
                'articleAuthors' => $articleAuthors
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
            $newFile = Storage::disk('public')->putFileAs('file', $file, $oldFile->name);
        }

        $article->name = $req->input('name');
        $article->link_doi = $req->input('doi-link');
        $article->is_popular = boolval($req->input('is-popular'));
        $article->annotation = $req->input('annotation');
        $article->sort = 1;

        $article->save();

        $article->authors()->sync($req->input('authors'));

        $magazineId = $req->input('magazine-id');

        return $this->articleList($magazine->id);
    }

    public function articleDelete($articleId) {
        $article = Article::find($articleId);
        $magazine = Magazine::find($article->magazine_id);

        $fileId = $article->file_id;
        $file = File::find($fileId);

        Storage::delete('file/'.$file->name);

        $authors = [];

        foreach ($article->authors as $author) {
            array_push($authors, $author->id);
        }

        $article->authors()->detach($authors);

        $file->delete();
        $article->delete();

        return $this->articleList($magazine->id);
    }
}
