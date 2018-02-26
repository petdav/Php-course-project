<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
    protected $fillable = ['title', 'body'];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function addComment($body)
    {
        $this->comments()->create(['body' => $body]);
    }
    public static function getStats()
    {
        return self::selectRaw('EXTRACT(MONTH FROM created_at) as month,
			EXTRACT(YEAR FROM created_at) as year,
			count(*) as count')
			->groupBy('year', 'month')
			->get();
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}