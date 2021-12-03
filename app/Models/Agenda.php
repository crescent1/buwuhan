<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Agenda
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda newQuery()
 * @method static \Illuminate\Database\Query\Builder|Agenda onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda query()
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Agenda withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Agenda withoutTrashed()
 * @mixin \Eloquent
 */
class Agenda extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'date',
    ];
}
