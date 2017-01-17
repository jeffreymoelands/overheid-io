<?php
namespace Jeffreymoelands\OverheidIo\Traits;

trait QueryBuilder
{

    private $query = [];


    /**
     * Set query size
     *
     * @param int $size
     *
     * @return $this
     */
    public function size($size = 100)
    {
        $this->query['size'] = $size;

        return $this;
    }


    /**
     * Set query page
     *
     * @param $page
     *
     * @return $this
     */
    public function page($page)
    {
        $this->query['page'] = $page;

        return $this;
    }


    /**
     * Set query order
     *
     * @param string $ordering
     *
     * @return $this
     */
    public function order($ordering = 'desc')
    {
        $this->query['ordering'] = $ordering;

        return $this;
    }


    /**
     * Set query fields
     *
     * @param array $fields
     *
     * @return $this
     */
    public function fields(array $fields)
    {
        $this->query['fields'] = $fields;

        return $this;
    }


    /**
     * Set query filters
     *
     * @param array $filters
     *
     * @return $this
     */
    public function filters(array $filters)
    {
        $this->query['filters'] = $filters;

        return $this;
    }


    /**
     * Set query string
     *
     * @param $query
     *
     * @return $this
     */
    public function query($query)
    {
        $this->query['query'] = $query;

        return $this;
    }


    /**
     * Set query fields
     *
     * @param array $queryfields
     *
     * @return $this
     */
    public function queryfields(array $queryfields)
    {
        $this->query['queryfields'] = $queryfields;

        return $this;
    }


    /**
     * Get query array
     *
     * @return array
     */
    public function getQuery()
    {
        return $this->query;
    }
}