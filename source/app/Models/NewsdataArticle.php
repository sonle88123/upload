<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $endpoint
 * @property string $article_id
 * @property string $original_title
 * @property string $original_link
 * @property string $original_keywords
 * @property string $original_creator
 * @property string $original_video_url
 * @property string $original_description
 * @property string $original_content
 * @property string $original_pubdate
 * @property string $original_image_url
 * @property string $original_source_id
 * @property string $original_source_priority
 * @property string $original_source_url
 * @property string $original_source_icon
 * @property string $original_language
 * @property string $original_country
 * @property string $original_category
 * @property string $original_ai_tag
 * @property string $original_sentiment
 * @property string $original_sentiment_stats
 * @property string $original_ai_region
 * @property string $original_ai_org
 * @property string $code_model_ai
 * @property string $img1_url
 * @property string $img1_cap
 * @property string $img2_url
 * @property string $img2_cap
 * @property string $img3_url
 * @property string $img3_cap
 * @property int    $created_at
 * @property int    $updated_at
 */
class NewsdataArticle extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'newsdata_article';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_newsdata_article';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'endpoint', 'article_id', 'original_title', 'original_link', 'original_keywords', 'original_creator', 'original_video_url', 'original_description', 'original_content', 'original_content_lenght', 'original_pubdate', 'original_image_url', 'original_source_id', 'original_source_priority', 'original_source_url', 'original_source_icon', 'original_language', 'original_country', 'original_category', 'original_ai_tag', 'original_sentiment', 'original_sentiment_stats', 'original_ai_region', 'original_ai_org', 'tag_array', 'id_tag_array', 'code_model_ai', 'web_link', 'img1_url', 'img1_cap', 'img2_url', 'img2_cap', 'img3_url', 'img3_cap'
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
        'endpoint' => 'string', 'article_id' => 'string', 'original_title' => 'string', 'original_link' => 'string', 'original_keywords' => 'string', 'original_creator' => 'string', 'original_video_url' => 'string', 'original_description' => 'string', 'original_content' => 'string', 'original_content_lenght' => 'integer', 'original_pubdate' => 'string', 'original_image_url' => 'string', 'original_source_id' => 'string', 'original_source_priority' => 'string', 'original_source_url' => 'string', 'original_source_icon' => 'string', 'original_language' => 'string', 'original_country' => 'string', 'original_category' => 'string', 'original_ai_tag' => 'string', 'original_sentiment' => 'string', 'original_sentiment_stats' => 'string', 'original_ai_region' => 'string', 'original_ai_org' => 'string', 'tag_array' => 'string', 'id_tag_array' => 'string', 'code_model_ai' => 'string', 'web_link' => 'string', 'img1_url' => 'string', 'img1_cap' => 'string', 'img2_url' => 'string', 'img2_cap' => 'string', 'img3_url' => 'string', 'img3_cap' => 'string', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
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
