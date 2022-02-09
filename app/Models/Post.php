<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property Category $category
 * @property User $author
 */
class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = [ 'category', 'author' ];

    /* protected $fillable = [
        'category_id',
        'title',
        'slug',
        'excerpt',
        'body',
    ]; */

    // protected $fillable = [];

    protected function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, string $search) {
            $query->where(function($query) use ($search) {
                // Using a closure "solve the problem" of the WHERE clause, wrapping a parenthesis around the LIKE clauses (grouping)

                $query
                    ->where('title', 'like', '%' . $search . '%')
                    ->orWhere('title', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters['category'] ?? false, function($query, string $category) {
          return $query->whereHas('category', function($query) use ($category) {
              return $query->where('slug', $category);
           });
        });

        $query->when($filters['author'] ?? false, function($query, string $author) {
          return $query->whereHas('author', function($query) use ($author) {
              return $query->where('username', $author);
           });
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
