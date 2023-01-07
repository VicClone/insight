<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\Storage;

use App\Models\Image;
use App\Models\File;
use App\Models\Promo;
use App\Models\Article;
use App\Models\Team;
use App\Models\Magazine;
use App\Models\Headline;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home() {
        $promos = Promo::all();
        $popularArticles = Article::where('is_popular', 1)->get();
        $team = Team::all();

        foreach ($promos as $promo) {
            $imageId = $promo->image_id;
            $image = Image::find($imageId);
            $filename = $image->name;
            $promo['img'] = $filename;
        }

        foreach ($team as $item) {
            $imageId = $item->avatar_id;
            $image = Image::find($imageId);
            $filename = $image->name;
            $item['img'] = $filename;
        }

        foreach ($popularArticles as $article) {
            $magazine = Magazine::find($article->magazine_id);
            $article['number'] = $magazine->number;
            $article['year'] = $magazine->year;
            $article['authors'] = $article->authors->sortBy('sort')->pluck('name')->join(', ');
        }

        return view(
            'pages.home',
            [
                'promo' => $promos,
                'articles' => $popularArticles,
                'team' => $team->sortBy('sort')
            ]
        );
    }

    public function archive() {
        $magazines = Magazine::all();
        $years = [];

        foreach($magazines as $magazine) {
            array_push($years, $magazine->year);
        }

        $yearsUnique = array_unique($years);
        natsort($yearsUnique);
        $yearsUnique = array_reverse($yearsUnique);
        $result = [];

        foreach($yearsUnique as $year) {
            $magazines = Magazine::where('year', $year)->get();

            foreach($magazines as $magazine) {
                $imageId = $magazine->cover_id;
                $image = Image::find($imageId);
                $filename = $image->name;
                $magazine['img'] = $filename;
            }

            $result[$year] = $magazines->sortBy('sort');
        }

        return view(
            'pages.archive',
            [
                'magazinesByYears' => $result
            ]
        );
    }

    public function magazine($magazineId) {
        $magazine = Magazine::find($magazineId);
        $articles = Article::where('magazine_id', $magazineId)->get();
        $headlines = Headline::where('magazine_id', $magazineId)->get()->sortBy('sort');

        $imageId = $magazine->cover_id;
        $image = Image::find($imageId);
        $imagename = $image->name;
        $magazine['img'] = $imagename;

        $fileId = $magazine->file_id;
        $file = File::find($fileId);
        $filename = $file->name;
        $magazine['file'] = $filename;

        foreach ($articles as $article) {
            $fileId = $article->file_id;
            $file = File::find($fileId);
            $filename = $file->name;
            $article['file'] = $filename;
            $article['authors'] = $article->authors->sortBy('sort')->pluck('name')->join(', ');
        }

        foreach($headlines as $headline) {
            $headline['articles'] = $articles->where('headline_id', $headline->id)->sortBy('sort');
        }

        return view(
            'pages.magazine',
            [
                'magazine' => $magazine,
                'articles' => $articles,
                'headlines' => $headlines
            ]
        );
    }

    public function article($articleId) {
        $article = Article::find($articleId);
        $fileId = $article->file_id;
        $file = File::find($fileId);
        $filename = $file->name;
        $article['file'] = $filename;

        $authors = $article->authors->sortBy('sort');

        foreach ($authors as $author) {
            $imageId = $author->image_id;
            $image = Image::find($imageId);
            $author['image'] = $image->name;
        }

        $article['authors'] = $authors;

        return view(
            'pages.article',
            [
                'article' => $article
            ]
        );
    }

    public function team($teamId) {
        $team = Team::find($teamId);

        if ($team->show_interview == 0) {
            return $this->home();
        }

        $avatarId = $team->avatar_id;
        $avatar = Image::find($avatarId);
        $team['avatar'] = $avatar->name;

        return view(
            'pages.interview',
            [
                'team' => $team
            ]
        );
    }
}
