<?php


namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'category';

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
     * Get mapped categories
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function parents()
    {
        return $this->belongsToMany('App\Model\Category', 'catetory_relations', 'categoryId', 'ParentcategoryId', 'Id', 'Id');
    }

    public function children()
    {
        return $this->belongsToMany('App\Model\Category', 'catetory_relations', 'ParentcategoryId', 'categoryId', 'Id', 'Id');
    }

    /**
     * Get mapped Items
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function items()
    {
        return $this->belongsToMany('App\Model\Item', 'Item_category_relations', 'categoryId', 'ItemNumber', 'Id', 'Number');
    }

    /**
     * Recursive children
     *
     * @return mixed
     */
    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }

    /**
     * Recursive parent
     *
     * @return mixed
     */
    /*public function parentRecursive()
    {
        return $this->parent()->with('parentRecursive');
    }*/

    /**
     * Get mapped Products
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    /*public function products()
    {
        return $this->hasMany('App\Model\Product');
    }*/

    /*public function childProducts()
    {

        return $this->hasManyThrough(
            'App\Model\Product',
            'App\Model\Category',
            'parent_id',
            'category_id'
        );
    }*/

    /**
     * Get the product details through product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    /*public function productDetails()
    {
        return $this->hasManyThrough(
            'App\Model\ProductDetails', 'App\Model\Product'
        );
    }*/
}
