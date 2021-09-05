<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeamRequest;
use App\Http\Requests\TeamEditRequest;
use Illuminate\Support\Facades\Storage;

use App\Models\Image;
use App\Models\Team;

class TeamController extends Controller
{
    public function teamAdd(TeamRequest $req) {
        $file = $req->file('avatar');
        $storedFile = Storage::putFile('images', $file);
        $avatar = new Image;
        $avatar->name = pathinfo($storedFile)['basename'];
        $avatar->save();

        $team = new Team;
        $team->name = $req->input('name');
        $team->position = $req->input('position')   ;
        $team->avatar_id = $avatar->id;
        $team->sort = 1;
        $team->save();
    }

    public function teamList() {
        return view(
            'admin.team-list',
            ['team' => Team::all()]
        );
    }

    public function teamEdit($id) {
        $team = Team::find($id);

        return view('admin.team-edit', ['team' => $team->find($id)]);
    }

    public function teamEditSubmit($teamId, TeamEditRequest $req) {
        $team = Team::find($teamId);
        $file = $req->file('avatar');
        if ($file) {
            $avatarId = $team->avatar_id;
            $oldAvatar = Image::find($avatarId);
            $newAvatar = Storage::putFileAs('images', $file, $oldAvatar->name);
        }

        $team->name = $req->input('name');
        $team->position = $req->input('position');
        $team->save();
    }

    public function teamDelete($teamId) {
        $team = Team::find($teamId);
        $avatarId = $team->avatar_id;
        $avatar = Image::find($avatarId);
        Storage::delete('images/'.$avatar->name);

        $avatar->delete();
        $team->delete();
    }
}
