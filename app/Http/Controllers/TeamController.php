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
    public function teamList() {
        return view(
            'admin.team-list',
            ['team' => Team::all()]
        );
    }

    public function teamAdd(TeamRequest $req) {
        $file = $req->file('avatar');
        $storedFile = Storage::disk('public')->put('images', $file);
        $avatar = new Image;
        $avatar->name = pathinfo($storedFile)['basename'];
        $avatar->save();

        $team = new Team;
        $team->name = $req->input('name');
        $team->position = $req->input('position');
        $team->avatar_id = $avatar->id;
        $team->sort = $req->input('sort');
        $team->link = $req->input('link');
        $team->show_interview = $req->input('show-interview') ? 1 : 0;
        $team->description = $req->input('description');
        $team->interview = $req->input('interview');
        $team->save();

        return $this->teamList();
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
            Storage::disk('public')->delete("images/$oldAvatar->name");
            $oldAvatar->delete();

            $storedFile = Storage::disk('public')->put('images', $file);
            $avatar = new Image;
            $avatar->name = pathinfo($storedFile)['basename'];
            $avatar->save();

            $team->avatar_id = $avatar->id;
        }

        $team->name = $req->input('name');
        $team->position = $req->input('position');
        $team->sort = $req->input('sort');
        $team->link = $req->input('link');
        $team->show_interview = $req->input('show-interview') ? 1 : 0;
        $team->description = $req->input('description');
        $team->interview = $req->input('interview');
        $team->save();

        return $this->teamList();
    }

    public function teamDelete($teamId) {
        $team = Team::find($teamId);
        $avatarId = $team->avatar_id;
        $avatar = Image::find($avatarId);
        Storage::disk('public')->delete("images/$avatar->name");

        $avatar->delete();
        $team->delete();
    }
}
