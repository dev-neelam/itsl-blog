<?php
/**
 * Created by PhpStorm.
 * User: neelam
 * Date: 13/12/18
 * Time: 5:40 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table    = 'comments';

    public static function getPostComments($post_id)
    {
        return Comment::query()
            ->where('post_id', $post_id)
            ->count();
    }
}