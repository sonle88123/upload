<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int     $code_model_ai
 * @property int     $type
 * @property int     $created_at
 * @property int     $updated_at
 * @property string  $title_model_ai
 * @property string  $api_key
 * @property boolean $is_delete
 */
class ModelAI extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'model_ai';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_model_ai';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code_model_ai', 'title_model_ai', 'type', 'api_key', 'sort', 'is_delete'
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
        'code_model_ai' => 'int', 'title_model_ai' => 'string', 'type' => 'int', 'api_key' => 'string', 'is_delete' => 'boolean', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
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
