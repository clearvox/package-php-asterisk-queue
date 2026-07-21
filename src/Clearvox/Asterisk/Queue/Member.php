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

    /**
     * @var int
     */
    protected $wrapupTime;

    /**
     * @var bool
     */
    protected $paused;

    public function __construct(
        $interface,
        $penalty = null,
        $memberName = null,
        $stateInterface = null,
        $ringInUse = null,
        $wrapupTime = null,
        $paused = null
    ) {
        $this->interface      = $interface;
        $this->penalty        = $penalty;
        $this->memberName     = $memberName;
        $this->stateInterface = $stateInterface;
        $this->ringInUse      = $ringInUse;
        $this->wrapupTime     = $wrapupTime;
        $this->paused         = $paused;
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

    /**
     * @return null
     */
    public function getWrapupTime()
    {
        return $this->wrapupTime;
    }

    /**
     * @param null $wrapupTime
     * @return Member
     */
    public function setWrapupTime($wrapupTime)
    {
        $this->wrapupTime = $wrapupTime;
        return $this;
    }

    /**
     * @return null
     */
    public function getPaused()
    {
        return $this->paused;
    }

    /**
     * @param boolean $paused
     * @return Member
     */
    public function setPaused($paused)
    {
        $this->paused = (boolean)$paused;
        return $this;
    }

    public function toString()
    {
        // Asterisk's static member fields, in positional order, are:
        // interface,penalty,membername,state_interface,ringinuse,wrapuptime,paused
        // Fields below the highest one actually set must be emitted (even if empty)
        // to keep every later field in its correct position.
        if (!is_null($this->paused)) {
            $line[0] = ($this->paused ? '1' : '0');
            $line[1] = null;
            $line[2] = null;
            $line[3] = null;
            $line[4] = null;
            $line[5] = null;
        }

        if (!is_null($this->wrapupTime)) {
            $line[1] = $this->wrapupTime;
            $line[2] = null;
            $line[3] = null;
            $line[4] = null;
            $line[5] = null;
        }

        if(!is_null($this->ringInUse)) {
            $line[2] = ($this->ringInUse ? 'yes' : 'no');
            $line[3] = null;
            $line[4] = null;
            $line[5] = null;
        }

        if (!is_null($this->stateInterface)) {
            $line[3] = $this->stateInterface;
            $line[4] = null;
            $line[5] = null;
        }

        if (!is_null($this->memberName)) {
            $line[4] = $this->memberName;
            $line[5] = null;
        }

        if (!is_null($this->penalty)) {
            $line[5] = $this->penalty;
        }

        $line[6] = $this->interface;

        return 'member => ' . implode(',', array_reverse($line));
    }
}