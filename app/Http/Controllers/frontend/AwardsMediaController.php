<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\AwardMedia;
use Illuminate\Http\Request;

class AwardsMediaController extends Controller
{
    public function awards()
    {
        $award_medias = AwardMedia::orderBy("year","desc")->whereNull('deleted_at')->get();

        return view('frontend.awards-media',[
            'award_medias' => $award_medias
        ]);
    }
}
