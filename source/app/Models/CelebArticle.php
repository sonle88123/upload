<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $id_profile
 * @property int    $id_celeb_article_prompt
 * @property int    $feature_image
 * @property int    $image1
 * @property int    $image2
 * @property int    $created_at
 * @property int    $updated_at
 * @property string $code_profile
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $fnews_link
 * @property string $tag_array
 * @property string $id_tag_array
 */
class CelebArticle extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'celeb_article';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_celeb_article';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_profile', 'code_profile', 'id_celeb_article_prompt', 'title', 'description', 'content', 'fnews_link', 'feature_image', 'tag_array', 'id_tag_array', 'image1', 'image2'
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
        'id_profile' => 'int', 'code_profile' => 'string', 'id_celeb_article_prompt' => 'int', 'title' => 'string', 'description' => 'string', 'content' => 'string', 'fnews_link' => 'string', 'feature_image' => 'int', 'tag_array' => 'string', 'id_tag_array' => 'string', 'image1' => 'int', 'image2' => 'int', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
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
