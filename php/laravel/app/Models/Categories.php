<?php

namespace App\Models;

use Database\Factories\CategoriesFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 *
 *
 * @property int $id
 * @property string $name 分类名称
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static CategoriesFactory factory($count = null, $state = [])
 * @method static Builder<static>|Categories newModelQuery()
 * @method static Builder<static>|Categories newQuery()
 * @method static Builder<static>|Categories query()
 * @method static Builder<static>|Categories whereCreatedAt($value)
 * @method static Builder<static>|Categories whereId($value)
 * @method static Builder<static>|Categories whereName($value)
 * @method static Builder<static>|Categories whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Categories extends Model
{
    /** @use HasFactory<CategoriesFactory> */
    use HasFactory;
}
