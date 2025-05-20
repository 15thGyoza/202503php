<?php

namespace App\Models;

use Database\Factories\PostTagFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 *
 *
 * @property int $id
 * @property int $post_id
 * @property int $tag_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static PostTagFactory factory($count = null, $state = [])
 * @method static Builder<static>|PostTag newModelQuery()
 * @method static Builder<static>|PostTag newQuery()
 * @method static Builder<static>|PostTag query()
 * @method static Builder<static>|PostTag whereCreatedAt($value)
 * @method static Builder<static>|PostTag whereId($value)
 * @method static Builder<static>|PostTag wherePostId($value)
 * @method static Builder<static>|PostTag whereTagId($value)
 * @method static Builder<static>|PostTag whereUpdatedAt($value)
 * @mixin Eloquent
 */
class PostTag extends Model
{
    /** @use HasFactory<PostTagFactory> */
    use HasFactory;
}
