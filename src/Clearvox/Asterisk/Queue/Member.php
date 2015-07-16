<?php
namespace Clearvox\Asterisk\Queue;

class Member
{
    /**
     * @var string
     */
    protected $interface;

    /**
     * @var int
     */
    protected $penalty;

    /**
     * @var string
     */
    protected $memberName;

    /**
     * @var string
     */
    protected $stateInterface;

    /**
     * @var bool
     */
    protected $ringInUse;

    public function __construct(
        $interface,
        $penalty = null,
        $memberName = null,
        $stateInterface = null,
        $ringInUse = null
    ) {
        $this->interface      = $interface;
        $this->penalty        = $penalty;
        $this->memberName     = $memberName;
        $this->stateInterface = $stateInterface;
        $this->ringInUse      = $ringInUse;
    }

    public function getInterface()
    {
        return $this->interface;
    }

    /**
     * @return null
     */
    public function getPenalty()
    {
        return $this->penalty;
    }

    /**
     * @param null $penalty
     * @return Member
     */
    public function setPenalty($penalty)
    {
        $this->penalty = $penalty;
        return $this;
    }

    /**
     * @return null
     */
    public function getMemberName()
    {
        return $this->memberName;
    }

    /**
     * @param null $memberName
     * @return Member
     */
    public function setMemberName($memberName)
    {
        $this->memberName = $memberName;
        return $this;
    }

    /**
     * @return null
     */
    public function getStateInterface()
    {
        return $this->stateInterface;
    }

    /**
     * @param null $stateInterface
     * @return Member
     */
    public function setStateInterface($stateInterface)
    {
        $this->stateInterface = $stateInterface;
        return $this;
    }

    /**
     * @return null
     */
    public function getRingInUse()
    {
        return $this->ringInUse;
    }

    /**
     * @param boolean $ringInUse
     * @return Member
     */
    public function setRingInUse($ringInUse)
    {
        $this->ringInUse = (boolean)$ringInUse;
        return $this;
    }

    public function toString()
    {
        if(!is_null($this->ringInUse)) {
            $line[0] = ($this->ringInUse ? 'yes' : 'no');
            $line[1] = null;
            $line[2] = null;
            $line[3] = null;
        }

        if (!is_null($this->stateInterface)) {
            $line[1] = $this->stateInterface;
            $line[2] = null;
            $line[3] = null;
        }

        if (!is_null($this->memberName)) {
            $line[2] = $this->memberName;
            $line[3] = null;
        }

        if (!is_null($this->penalty)) {
            $line[3] = $this->penalty;
        }

        $line[4] = $this->interface;

        return 'member => ' . implode(',', array_reverse($line));
    }
}