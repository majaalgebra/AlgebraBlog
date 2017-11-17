<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
	 * The atributes that are mass assignable
	 *
	 * @var array
	 */
	 protected $fillable = ['user_id','title','content'];
	 
	 
	 /**
	 * The Eloquent users model name
	 *
	 * @var string
	 */
	 protected static $usersModel = 'app\Models\Users';
	 
	 
	 /**
	 * The Eloquent comments model name
	 *
	 * @var string
	 */
	 protected static $commentsModel = 'app\Models\Comment';
	 
	 
	 /**
	 * Returns the user relationship
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	 public function user()
	 {
		return $this->belongsTo(static::$usersModel,'user_id');
	 }
	 
	 
	 /**
	 * Returns the commments relationship
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	 public function comments()
	 {
		return $this->hasMany(static::$commentsModel,'post_id');
	 }
	 
	 
	 /**
	 * Save Post
	 *
	 * @param array $post
	 * @return void
	 */
	 public function savePost($post=array())
	 {
		return $this->fill($post)->save();
	 }
	 
	 
	 /**
	 * Update Post
	 *
	 * @param array $post
	 * @return void
	 */
	 public function updatePost($post=array())
	 {
		return $this->update($post);
	 }	 
	 	 
}