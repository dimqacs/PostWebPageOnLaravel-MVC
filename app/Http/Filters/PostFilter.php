<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    public const TITLE = 'title';

    public const CONTENT = 'content';

    public const LIKE = 'like';

    public const CATEGORY_ID = 'category_id';

    public const IMAGE = 'image';


    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::CONTENT => [$this, 'content'],
            self::LIKE => [$this, 'like'],
            self::CATEGORY_ID => [$this, 'category_id'],
            self::IMAGE => [$this, 'image']
        ];
    }

    public function title(Builder $builder, $value): void
    {
        $builder->where('title', 'like', '%' . $value . '%');
    }

    public function content(Builder $builder, $value): void
    {
        $builder->where('content', 'like', '%' . $value . '%');
    }

    public function image(Builder $builder, $value): void
    {
        $builder->where('image', 'like', '%' . $value . '%');
    }

    public function like(Builder $builder, $value): void
    {
        $builder->where('like', $value);
    }

    public function category_id(Builder $builder, $value): void
    {
        $builder->where('category_id', $value);
    }
}
