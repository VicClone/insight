<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AuthorRequest;
use App\Http\Requests\AuthorEditRequest;

use App\Models\Image;
use App\Models\Author;

class AuthorController extends Controller
{
    public function authorAdd() {
        return view('admin.author-add');
    }

    public function authorAddSubmit(AuthorRequest $req) {
        $image = $req->file('image');
        $storedImage = Storage::disk('public')->putFile('images', $image);

        $authorsImage = new Image;
        $authorsImage->name = pathinfo($storedImage)['basename'];
        $authorsImage->save();

        $article = new Author;
        $article->name = $req->input('name');
        $article->image_id = $authorsImage->id;
        $article->save();

        return $this->authorList();
    }

    public function authorList() {
        $authors = Author::all();

        return view(
            'admin.author-list',
            ['authors' => $authors]
        );
    }

    public function authorEdit($id) {
        $author = Author::find($id);

        return view('admin.author-edit', ['author' => $author]);
    }

    public function authorEditSubmit($authorId, AuthorEditRequest $req) {
        $author = Author::find($authorId);

        $image = $req->file('image');

        if ($image) {
            $imageId = $author->image_id;
            $oldImage = Image::find($imageId);
            $newImage = Storage::disk('public')->putFileAs('images', $image, $oldImage->name);
        }

        $author->name = $req->input('name');
        $author->save();

        return $this->authorList();
    }

    public function authorDelete($authorId) {
        $author = Author::find($authorId);

        $imageId = $author->image_id;
        $image = Image::find($imageId);

        Storage::delete('images/'.$image->name);

        $image->delete();
        $author->delete();

        return $this->authorList();
    }
}
