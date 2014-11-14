<?php

namespace FireflyIII\Shared\Toolkit;

/**
 * Class Navigation
 *
 * @package FireflyIII\Shared\Toolkit
 */
class Navigation
{
    /**
     * @return bool
     * @throws \Firefly\Exception\FireflyException
     */
    public function next()
    {
        /*
         * Get the start date and the range from the session
         */

        $filter = new Filter;

        $range = $filter->setSessionRangeValue();
        $start = \Session::get('start');

        /*
         * Add some period to $start.
         */
        $next = $filter->next($range, clone $start);

        /*
         * Save in session:
         */
        \Session::put('start', $next);

        return true;
    }

    /**
     * @return bool
     * @throws \Firefly\Exception\FireflyException
     */
    public function prev()
    {
        /*
         * Get the start date and the range from the session
         */
        $filter = new Filter;

        $range = $filter->setSessionRangeValue();
        $start = \Session::get('start');

        /*
         * Substract some period to $start.
         */
        $prev = $filter->previous($range, clone $start);

        /*
         * Save in session:
         */
        \Session::put('start', $prev);

        return true;
    }
} 