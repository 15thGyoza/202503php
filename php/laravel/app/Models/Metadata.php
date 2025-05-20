<?php

namespace App\Models;

use Database\Factories\MetadataFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 *
 *
 * @property int $id
 * @property int $like_count 被喜欢数量
 * @property int $view_count 被查看次数
 * @property int $comment_count 评论数
 * @property int $share_count 被分享数量
 * @property int $favorite_count 被收藏数量
 * @property int $post_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Post $post
 * @method static MetadataFactory factory($count = null, $state = [])
 * @method static Builder<static>|Metadata newModelQuery()
 * @method static Builder<static>|Metadata newQuery()
 * @method static Builder<static>|Metadata query()
 * @method static Builder<static>|Metadata whereCommentCount($value)
 * @method static Builder<static>|Metadata whereCreatedAt($value)
 * @method static Builder<static>|Metadata whereFavoriteCount($value)
 * @method static Builder<static>|Metadata whereId($value)
 * @method static Builder<static>|Metadata whereLikeCount($value)
 * @method static Builder<static>|Metadata wherePostId($value)
 * @method static Builder<static>|Metadata whereShareCount($value)
 * @method static Builder<static>|Metadata whereUpdatedAt($value)
 * @method static Builder<static>|Metadata whereViewCount($value)
 * @mixin Eloquent
 */
class Metadata extends Model
{
    /** @use HasFactory<MetadataFactory> */
    use HasFactory;

    protected $fillable = [
        'like_count',
        'view_count',
        'comment_count',
        'share_count',
        'favorite_count',
        'post_id',
    ];

    /**
     * A metadata belongs to a post.
     *
     * @return BelongsTo
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}

