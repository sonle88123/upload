<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int     $id_request
 * @property int     $order
 * @property int     $id_content_category
 * @property int     $location
 * @property int     $created_at
 * @property int     $updated_at
 * @property string  $prompt
 * @property string  $code_model_ai
 * @property string  $response
 * @property string  $url
 * @property boolean $is_delete
 */
class ImageResource extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'image_resource';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_image_resource';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_request', 'prompt', 'code_model_ai', 'order', 'response', 'id_content_category', 'url', 'location', 'is_delete'
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
        'id_request' => 'int', 'prompt' => 'string', 'code_model_ai' => 'string', 'order' => 'int', 'response' => 'string', 'id_content_category' => 'int', 'url' => 'string', 'location' => 'int', 'is_delete' => 'boolean', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
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
