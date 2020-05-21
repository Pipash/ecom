<?php


namespace App\Model;
use Illuminate\Database\Eloquent\Model;


class Item extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Item';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['Id'];


    /**
     * Get mapped Items
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        $this->primaryKey = 'ItemNumber';
        return $this->belongsToMany('App\Model\Category', 'Item_category_relations', 'ItemNumber', 'categoryId');
    }
}
