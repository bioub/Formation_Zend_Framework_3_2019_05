<?php


namespace Application\Filter;


use Zend\Filter\AbstractFilter;
use Zend\Filter\Exception;

class DateTimeFilter extends AbstractFilter
{

    /**
     * Returns the result of filtering $value
     *
     * @param mixed $value
     * @return mixed
     * @throws Exception\RuntimeException If filtering $value is impossible
     */
    public function filter($value)
    {
        try {
            return new \DateTime($value);
        } catch (\Exception $e) {
            return null;
        }
    }
}