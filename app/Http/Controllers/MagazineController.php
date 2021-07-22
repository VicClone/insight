<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MagazineRequest;
use Illuminate\Support\Facades\Storage;

use App\Models\Magazine;
use App\Models\Image;
use App\Models\File;

class MagazineController extends Controller
{
    public function magazineAdd(MagazineRequest $req) {
        $cover = $req->file('cover');
        $file = $req->file('file');
        $storedCover = Storage::putFile('images', $cover);
        $storedFile = Storage::putFile('files', $file);

        $cover = new Image;
        $cover->name = pathinfo($storedCover)['basename'];
        $cover->save();

        $magazineFile = new File;
        $magazineFile->name = pathinfo($storedCover)['basename'];
        $magazineFile->save();

        $magazine = new Magazine;
        $magazine->name = $req->input('name');
        $magazine->number = $req->input('number');
        $magazine->year = $req->input('year');
        $magazine->cover_id = $cover->id;
        $magazine->file_id = $magazineFile->id;
        $magazine->save();
    }

    public function magazineList() {
        return view(
            'admin.magazine-list',
            ['magazines' => Magazine::all()]
        );
    }
}
