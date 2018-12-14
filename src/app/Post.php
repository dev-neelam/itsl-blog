<?php
/**
 * Created by PhpStorm.
 * User: neelam
 * Date: 13/12/18
 * Time: 5:40 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'description', 'author'];
}