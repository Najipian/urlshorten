<?php
/**
 * Created by IntelliJ IDEA.
 * User: Amr
 * Date: 9/27/2017
 * Time: 9:13 AM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = 'links';
    protected $fillable = array('url','hash');
    public $timestamps = false;
}
