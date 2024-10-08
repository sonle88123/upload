<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string  $code_content_category
 * @property string  $title_content_category
 * @property boolean $is_delete
 * @property int     $created_at
 * @property int     $updated_at
 */
class ContentCategory extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'content_category';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_content_category';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code_content_category', 'title_content_category', 'sort', 'is_delete'
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
        'code_content_category' => 'string', 'title_content_category' => 'string', 'is_delete' => 'boolean', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
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
