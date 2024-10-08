<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int     $id_user
 * @property int     $request_type
 * @property int     $method
 * @property int     $created_at
 * @property int     $updated_at
 * @property string  $prompt
 * @property string  $code_model_ai
 * @property string  $endpoint
 * @property string  $postfields
 * @property string  $response
 * @property boolean $is_delete
 */
class RequestModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'request';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_request';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user', 'request_type', 'prompt', 'code_model_ai', 'method', 'endpoint', 'postfields', 'response', 'id_content_category', 'is_delete'
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
        'id_user' => 'int', 'request_type' => 'int', 'prompt' => 'string', 'code_model_ai' => 'string', 'method' => 'int', 'endpoint' => 'string', 'postfields' => 'string', 'response' => 'string', 'id_content_category' => 'int', 'is_delete' => 'boolean', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
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
