<?php

namespace SLBR\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Expression extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'expressions';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'U';

    protected $guarded = [];

    protected $fillable = ['text', 'char', 'contributor', 'moderator_id'];

    public static $rules = array(
	  "save" => array(
	    'text' => 'required|min:3',
	    'char'    => 'required|min:1|max:1',
	    'contributor' => 'required|min:2'
	  ),
	  "create" => array(
	    'text'              => 'unique:expressions',
	  ),
	  "update" => array(
	  	'text'              => 'unique:expressions',
	  )
	);

	public function definitions()
	{
		return $this->hasMany('Definition');
	}

}
