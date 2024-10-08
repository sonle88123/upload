<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $id_user
 * @property int    $likes
 * @property int    $followers
 * @property int    $posts
 * @property int    $engagement
 * @property int    $reach
 * @property int    $impressions
 * @property int    $created_at
 * @property int    $updated_at
 * @property string $fb_uid
 * @property string $page_id
 * @property string $page_name
 * @property string $access_token
 * @property string $assistant_id
 * @property string $assistant_name
 * @property string $assistant_background
 * @property string $assistant_context
 * @property string $category
 * @property string $avatar
 * @property string $cover
 */
class FacebookPages extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'facebook_pages';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_facebook_page';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user', 'fb_uid', 'page_id', 'page_name', 'access_token', 'assistant_id', 'assistant_name', 'assistant_background', 'assistant_context', 'category', 'avatar', 'cover', 'likes', 'followers', 'posts', 'engagement', 'reach', 'impressions'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_user' => 'int', 'fb_uid' => 'string', 'page_id' => 'string', 'page_name' => 'string', 'access_token' => 'string', 'assistant_id' => 'string', 'assistant_name' => 'string', 'assistant_background' => 'string', 'assistant_context' => 'string', 'category' => 'string', 'avatar' => 'string', 'cover' => 'string', 'likes' => 'int', 'followers' => 'int', 'posts' => 'int', 'engagement' => 'int', 'reach' => 'int', 'impressions' => 'int', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = true;

    protected $dateFormat = 'Y-m-d H:i:s';

    // Scopes...

    // Functions ...

    // Relations ...
}
