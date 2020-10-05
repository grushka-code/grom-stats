<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Запись в блоге, имеет одного(в т.з. не указано) автора и одну родительскую папку
 * Доступные статусы страницы: Создана, На проверке, Допущена, Заблокированна
 * Class Page
 * @package App\Models
 * @property string $title
 * @property string $slug
 * @property string $text
 * @property string $status_label
 * @property string $status_title
 * @property User $author
 * @property Directory $directory
 * @property integer $status
 */
class Page extends Model
{
    use HasFactory;

    const STATUS_CREATED = 1;
    const STATUS_ON_REVIEW = 2;
    const STATUS_APPROVED = 3;
    const STATUS_BLOCKED = 4;

    private $statusLabels = [
        self::STATUS_CREATED => 'info',
        self::STATUS_ON_REVIEW => 'warning',
        self::STATUS_APPROVED => 'success',
        self::STATUS_BLOCKED => 'danger',
    ];

    public $statusTitles = [
        self::STATUS_CREATED => 'Created',
        self::STATUS_ON_REVIEW => 'On Review',
        self::STATUS_APPROVED => 'Approved',
        self::STATUS_BLOCKED => 'Blocked',
    ];

    public $fillable = [
        'title',
        'slug',
        'text',
        'directory_id',
        'author_id',
        'status'
    ];


    public function getStatusLabelAttribute()
    {
        return $this->statusLabels[$this->status];
    }

    public function getStatusTitleAttribute()
    {
        return $this->statusTitles[$this->status];
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function directory()
    {
        return $this->belongsTo(Directory::class);
    }


}
