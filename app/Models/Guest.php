<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Guest
 *
 * @property int $id
 * @property int $agenda_id
 * @property int $user_id
 * @property string $gender
 * @property string $name
 * @property string $district
 * @property string $money
 * @property string $item
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Guest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Guest newQuery()
 * @method static \Illuminate\Database\Query\Builder|Guest onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Guest query()
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereAgendaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereItem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Guest withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Guest withoutTrashed()
 * @mixin \Eloquent
 */
class Guest extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'gender',
        'district',
        'money',
        'item',
    ];
}
