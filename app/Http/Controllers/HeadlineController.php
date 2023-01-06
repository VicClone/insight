<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HeadlineRequest;
use App\Http\Requests\HeadlineEditRequest;

use App\Models\Magazine;
use App\Models\Headline;
use App\Models\Article;

class HeadlineController extends Controller
{
    public function headlineList($magazineId) {
        $headlines = Headline::where('magazine_id', $magazineId)->get();
        $magazine = Magazine::find($magazineId);

        return view(
            'admin.headlines-list',
            [
                'headlines' => $headlines,
                'magazineId' => $magazineId,
                'magazine' => $magazine
            ]
        );
    }

    public function headlineAdd($magazineId) {
        $magazine = Magazine::find($magazineId);
        $articles = Article::where('magazine_id', $magazineId)->get();

        return view('admin.headline-add',
            [
                'magazine' => $magazine,
                'articles' => $articles
            ]
        );
    }

    public function headlineAddSubmit(HeadlineRequest $req)
    {
        $headline = new Headline;
        $magazineId = $req->input('magazine-id');
        $headline->magazine_id = $magazineId;
        $headline->title = $req->input('title');
        $headline->sort = $req->input('sort');

        $headline->save();

        foreach ($req->input('articles') as $articleId) {
            $article = Article::find($articleId);
            $article->headline()->associate($headline);
            $article->save();
        }

        return $this->headlineList($magazineId);
    }

    public function headlineEdit($magazineId, $headlineId) {
        $magazine = Magazine::find($magazineId);
        $headline = Headline::find($headlineId);
        $articles = Article::where('magazine_id', $magazineId)->get();
        $headlineArticles = [];

        foreach ($headline->articles as $article) {
            array_push($headlineArticles, $article->id);
        }

        return view('admin.headline-edit',
            [
                'magazine' => $magazine,
                'headline' => $headline,
                'articles' => $articles,
                'headlineArticles' => $headlineArticles
            ]
        );
    }

    public function headlineEditSubmit($headlineId, HeadlineEditRequest $req) {
        $headline = Headline::find($headlineId);
        $magazine = Magazine::find($headline->magazine_id);
        $magazineId = $magazine->id;

        $headline->title = $req->input('title');
        $headline->sort = $req->input('sort');
        $headlineArticlesOld = $headline->articles()->get();

        foreach ($headlineArticlesOld as $headlineArticle) {
            $headlineArticle->headline()->dissociate();
            $headlineArticle->save();
        }

        $headlineArticles = [];

        foreach ($req->input('articles') as $articleId) {
            $article = Article::find($articleId);
            $article->headline()->associate($headline);
            $article->save();
        }

        return $this->headlineList($magazineId);
    }

    public function headlineDelete($headlineId) {
        $headline = Headline::find($headlineId);
        $magazine = Magazine::find($headline->magazine_id);
        $magazineId = $magazine->id;

        $headline->delete();

        return $this->headlineList($magazineId);
    }
}
