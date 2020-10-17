<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Запись в блоге, имеет (одного?? в т.з. не указано) автора и одну родительскую папку
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
 * @property integer $type
 */
class Page extends Model
{
    use HasFactory;

    const STATUS_CREATED = 1;
    const STATUS_ON_REVIEW = 2;
    const STATUS_APPROVED = 3;
    const STATUS_BLOCKED = 4;

    const TYPE_PAGE = 1;
    const TYPE_NEWS = 2;
    const TYPE_ANNOUNCE = 3;

    /**
     * @var string[]
     */
    private $statusLabels = [
        self::STATUS_CREATED => 'info',
        self::STATUS_ON_REVIEW => 'warning',
        self::STATUS_APPROVED => 'success',
        self::STATUS_BLOCKED => 'danger',
    ];

    /**
     * @var string[]
     */
    private $typeLabels = [
        self::TYPE_PAGE => 'primary',
        self::TYPE_NEWS => 'info',
        self::TYPE_ANNOUNCE => 'success',
    ];

    private $statusTitles = [
        self::STATUS_CREATED => 'Created',
        self::STATUS_ON_REVIEW => 'On Review',
        self::STATUS_APPROVED => 'Approved',
        self::STATUS_BLOCKED => 'Blocked',
    ];

    private $typeTitles = [
        self::TYPE_PAGE => 'Page',
        self::TYPE_NEWS => 'News',
        self::TYPE_ANNOUNCE => 'Announce',
    ];

    public $fillable = [
        'title',
        'slug',
        'text',
        'directory_id',
        'author_id',
        'status',
        'type',
    ];

    public function getStatusLabelAttribute()
    {
        return $this->getStatusLabels()[$this->status];
    }

    public function getTypeTitleAttribute()
    {
        return $this->getTypeTitles()[$this->type];
    }

    public function getTypeLabelAttribute()
    {
        return $this->getTypeLabels()[$this->type];
    }

    public function getStatusTitleAttribute()
    {
        return $this->getStatusTitles()[$this->status];
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function directory()
    {
        return $this->belongsTo(Directory::class);
    }

    /**
     * @return string[]
     */
    public function getTypeTitles(): array
    {
        return $this->typeTitles;
    }

    /**
     * @return string[]
     */
    public function getStatusTitles(): array
    {
        return $this->statusTitles;
    }

    /**
     * @return string[]
     */
    public function getTypeLabels(): array
    {
        return $this->typeLabels;
    }

    /**
     * @return string[]
     */
    public function getStatusLabels(): array
    {
        return $this->statusLabels;
    }

    public function scopeApproved(Builder $builder)
    {
        return $builder->where('status', '=', Page::STATUS_APPROVED);
    }

    public function scopeByDirectory(Builder $builder, $directoryId)
    {
        return $builder->where('directory_id', '=', $directoryId);
    }

}
