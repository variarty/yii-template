<?php
namespace common\entities\user;

/**
 * User name value object.
 * @author Artem Rasskosov
 */

class Name
{
    /**
     * @var string $first
     */
    private $first;

    /**
     * @var string $last
     */
    private $last;

    /**
     * Name constructor.
     *
     * @param string $first
     * @param string $last
     */
    public function __construct($first, $last)
    {
        $this->first = $first;
        $this->last = $last;
    }

    /**
     * Name getter
     *
     * @return string
     */
    public function getFirst()
    {
        return $this->first;
    }

    /**
     * Surname getter
     *
     * @return string
     */
    public function getLast()
    {
        return $this->last;
    }

    /**
     * First + Last name.
     *
     * @return string
     */
    public function getFullName()
    {
        return trim($this->first . ' ' . $this->last);
    }
}
