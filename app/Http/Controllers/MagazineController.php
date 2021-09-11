<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MagazineRequest;
use App\Http\Requests\MagazineEditRequest;
use Illuminate\Support\Facades\Storage;

use App\Models\Magazine;
use App\Models\Image;
use App\Models\File;

class MagazineController extends Controller
{
    public function magazineAdd(MagazineRequest $req) {
        $cover = $req->file('cover');
        $file = $req->file('file');
        $storedCover = Storage::disk('public')->putFile('images', $cover);
        $storedFile = Storage::disk('public')->putFile('files', $file);

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

        return view(
            'admin.magazine-list',
            ['magazines' => Magazine::all()]
        );
    }

    public function magazineList() {
        return view(
            'admin.magazine-list',
            ['magazines' => Magazine::all()]
        );
    }

    public function magazineEdit($id) {
        $magazine = Magazine::find($id);

        return view('admin.magazine-edit', ['magazine' => $magazine->find($id)]);
    }

    public function magazineEditSubmit($magazineId, MagazineEditRequest $req) {
        $magazine = Magazine::find($magazineId);

        $cover = $req->file('cover');
        $file = $req->file('file');

        if ($cover) {
            $coverId = $magazine->cover_id;
            $oldCover = Image::find($coverId);
            $newCover = Storage::disk('public')->putFileAs('images', $cover, $oldCover->name);
        }

        if ($file) {
            $fileId = $magazine->file_id;
            $oldFile = File::find($fileId);
            $newFile = Storage::disk('public')->putFileAs('files', $file, $oldFile->name);
        }

        $magazine->name = $req->input('name');
        $magazine->number = $req->input('number');
        $magazine->year = $req->input('year');
        $magazine->save();

        return view(
            'admin.magazine-list',
            ['magazines' => Magazine::all()]
        );
    }

    public function magazineDelete($magazineId) {
        $magazine = Magazine::find($magazineId);

        $coverId = $magazine->cover_id;
        $cover = Image::find($coverId);

        $fileId = $magazine->file_id;
        $file = File::find($fileId);

        Storage::delete('images/'.$cover->name);
        Storage::delete('file/'.$file->name);

        $cover->delete();
        $file->delete();
        $magazine->delete();

        return view(
            'admin.magazine-list',
            ['magazines' => Magazine::all()]
        );
    }
}
