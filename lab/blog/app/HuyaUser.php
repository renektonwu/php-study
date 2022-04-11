<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use ScoutElastic\Builders\FilterBuilder;
use ScoutElastic\Builders\SearchBuilder;
use Laravel\Scout\Searchable;
use ScoutElastic\SearchRule;

class HuyaUser extends Model
{
    use Searchable;

    protected $mapping = [
        'properties' => [
            'nickname' => [
                'type' => 'text',
                'analyzer' => 'default',
                'search_analyzer' => 'default',
            ],
            'score' => [
                'type' => 'integer',
            ],
        ],
    ];

    /**
     * Get the search rules.
     *
     * @return array
     */
    public function getSearchRules()
    {
        return isset($this->searchRules) && count($this->searchRules) > 0 ?
            $this->searchRules : [SearchRule::class];
    }

    /**
     * Execute the search.
     *
     * @param string $query
     * @param callable|null $callback
     * @return \ScoutElastic\Builders\FilterBuilder|\ScoutElastic\Builders\SearchBuilder
     */
    public static function search($query, $callback = null)
    {
        $softDelete = static::usesSoftDelete() && config('scout.soft_delete', false);

        if ($query === '*') {
            return new FilterBuilder(new static, $callback, $softDelete);
        } else {
            return new SearchBuilder(new static, $query, $callback, $softDelete);
        }
    }
}
