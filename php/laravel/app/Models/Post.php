<?php

namespace App\Models;

use Database\Factories\PostFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 *
 *
 * @property int $id
 * @property string $title 标题
 * @property string $content 内容
 * @property int $author_id
 * @property string $slug 网址
 * @property int $status 状态 0:草稿 1:发布 2:隐藏 / 默认初始为1
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Author $author
 * @property-read Metadata|null $metadata
 * @property-read Collection<int, Tag> $tags
 * @property-read int|null $tags_count
 * @method static \Database\Factories\PostFactory factory($count = null, $state = [])
 * @method static Builder<static>|Post newModelQuery()
 * @method static Builder<static>|Post newQuery()
 * @method static Builder<static>|Post query()
 * @method static Builder<static>|Post whereAuthorId($value)
 * @method static Builder<static>|Post whereContent($value)
 * @method static Builder<static>|Post whereCreatedAt($value)
 * @method static Builder<static>|Post whereId($value)
 * @method static Builder<static>|Post whereSlug($value)
 * @method static Builder<static>|Post whereStatus($value)
 * @method static Builder<static>|Post whereTitle($value)
 * @method static Builder<static>|Post whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Post extends Model
{
    /** @use HasFactory<PostFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'author_id',
        'slug',
        'status',
    ];

    /**
     * A post belongs to an author.
     *
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        // return $this->belongsTo(Author::class, 'author_id', 'id');
        // 这里的 author_id 是 Post 表中的外键, id 是 Author 表中的主键
        // $post = Post::find(1);
        // $post->author; // 这样就能拿到文章 ID 为 1 的作者的对象(作者的所有信息)
        // $post->author->name; // 这样就能拿到文章 ID 为 1 的作者的名字
        return $this->belongsTo(Author::class);
    }

    /**
     * A post has one metadata.
     *
     * @return HasOne
     */
    public function metadata(): HasOne
    {
        // return $this->hasOne(Metadata::class, 'post_id', 'id');
        // 这里的 post_id 是 Metadata 表中的外键, id 是 Post 表中的主键
        // $post = Post::find(1);
        // $post->metadata; // 这样就能拿到文章 ID 为 1 的元数据的对象(元数据的所有信息)
        // $post->metadata->keywords; // 这样就能拿到文章 ID 为 1 的元数据的关键词
        return $this->hasOne(Metadata::class);
    }

    /**
     * A post has many tags.
     *
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id')->withTimestamps();
        // 'post_tags' 是 pivot 表的名称
        // 'post_id' 是 post_tags 表中关联 Post 的外键
        // 'tag_id' 是 post_tags 表中关联 Tag 的外键
        // withTimestamps() 会自动维护 pivot 表中的 created_at 和 updated_at 字段
    }
}
