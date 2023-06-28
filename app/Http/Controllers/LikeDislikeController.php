<?php

namespace App\Http\Controllers;
use App\Models\LikesDislike;
use Auth;
use Illuminate\Http\Request;

class LikeDislikeController extends Controller
{
    public function like($id){
        $isExitst = LikesDislike::where('post_id','=',$id)->where('user_id','=',Auth::user()->id)->first();

        if($isExitst){
            if($isExitst->type == 'like'){
                return back();
            }else{
                LikesDislike::where('id',$isExitst->id)->update([
                    'type' => 'like',
                ]);
                return back();
            }
            return back();
        }else{
            LikesDislike::create([
                'post_id' => $id,
                'user_id' => Auth()->user()->id,
                'type' => 'like'
            ]);
        }
        return back();
    }

    public function dislike($id){
        $isExitst = LikesDislike::where('post_id','=',$id)->where('user_id','=',Auth::user()->id)->first();

        if($isExitst){
            if($isExitst->type == 'dislike'){
                return back();
            }else{
                LikesDislike::where('id',$isExitst->id)->update([
                    'type' => 'dislike',
                ]);
                return back();
            }
            return back();
        }else{
        LikesDislike::create([
            'post_id' => $id,
            'user_id' => Auth()->user()->id,
            'type' => 'dislike'
        ]);
        return back();
        }
    }
}
