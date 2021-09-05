<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PromoRequest;

use Illuminate\Support\Facades\Storage;

use App\Models\Image;
use App\Models\Promo;

class PromoController extends Controller
{
    public function promoList() {
        return view(
            'admin.promo-list',
            ['promo' => Promo::all()]
        );
    }

    public function promoAdd() {
        return view(
            'admin.promo-add'
        );
    }

    public function promoAddSubmit(PromoRequest $req) {
        $image = $req->file('image');
        $storedFile = Storage::putFile('images', $image);
        $cover = new Image;
        $cover->name = pathinfo($storedFile)['basename'];
        $cover->save();

        $promo = new Promo;
        $promo->name = $req->input('name');
        $promo->description = $req->input('description');
        $promo->link = $req->input('link');
        $promo->link_name = $req->input('link-name');
        $promo->image_id = $cover->id;
        $promo->sort = 1;
        $promo->save();

        return view(
            'admin.promo-list',
            ['promo' => Promo::all()]
        );
    }

    public function promoEdit($id) {
        $promo = Promo::find($id);

        return view('admin.promo-edit', ['promo' => $promo]);
    }

    public function promoEditSubmit($id, PromoRequest $req) {
        $promo = Promo::find($id);
        $image = $req->file('image');
        if ($image) {
            $imageId = $promo->image_id;
            $oldImage = Image::find($imageId);
            $newImage = Storage::putFileAs('images', $image, $oldImage->name);
        }

        $promo->name = $req->input('name');
        $promo->description = $req->input('description');
        $promo->link = $req->input('link');
        $promo->link_name = $req->input('link-name');
        $promo->sort = 1;
        $promo->save();

        return view(
            'admin.promo-list',
            ['promo' => Promo::all()]
        );
    }

    public function promoDelete($id) {
        $promo = Promo::find($id);
        $imageId = $promo->image_id;
        $image = Image::find($imageId);
        Storage::delete('images/'.$image->name);

        $image->delete();
        $promo->delete();

        return view(
            'admin.promo-list',
            ['promo' => Promo::all()]
        );
    }
}
