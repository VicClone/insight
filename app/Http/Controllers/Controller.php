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

        $imageId = $magazine->cover_id;
        $image = Image::find($imageId);
        $filename = $image->name;
        $magazine['img'] = $filename;

        foreach ($articles as $article) {
            $fileId = $article->file_id;
            $file = File::find($fileId);
            $filename = $file->name;
            $article['file'] = $filename;
        }

        return view(
            'pages.magazine',
            [
                'magazine' => $magazine,
                'articles' => $articles
            ]
        );
    }

    public function article($articleId) {
        $article = Article::find($articleId);
        $fileId = $article->file_id;
        $file = File::find($fileId);
        $filename = $file->name;
        $article['file'] = $filename;

        return view(
            'pages.article',
            [
                'article' => $article
            ]
        );
    }
}
