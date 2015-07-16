<?php
namespace Clearvox\Asterisk\Queue;

class SoundConfig
{
    /**
     * @var string
     */
    protected $youAreNext;

    /**
     * @var string
     */
    protected $thereAre;

    /**
     * @var string
     */
    protected $callsWaiting;

    /**
     * @var string
     */
    protected $holdTime;

    /**
     * @var string
     */
    protected $minute;

    /**
     * @var string
     */
    protected $minutes;

    /**
     * @var string
     */
    protected $seconds;

    /**
     * @var string
     */
    protected $thankYou;

    /**
     * @var string
     */
    protected $reportHold;

    /**
     * @return string
     */
    public function getYouAreNext()
    {
        return $this->youAreNext;
    }

    /**
     * @param string $youAreNext
     * @return SoundConfig
     */
    public function setYouAreNext($youAreNext)
    {
        $this->youAreNext = $youAreNext;
        return $this;
    }

    /**
     * @return string
     */
    public function getThereAre()
    {
        return $this->thereAre;
    }

    /**
     * @param string $thereAre
     * @return SoundConfig
     */
    public function setThereAre($thereAre)
    {
        $this->thereAre = $thereAre;
        return $this;
    }

    /**
     * @return string
     */
    public function getCallsWaiting()
    {
        return $this->callsWaiting;
    }

    /**
     * @param string $callsWaiting
     * @return SoundConfig
     */
    public function setCallsWaiting($callsWaiting)
    {
        $this->callsWaiting = $callsWaiting;
        return $this;
    }

    /**
     * @return string
     */
    public function getHoldTime()
    {
        return $this->holdTime;
    }

    /**
     * @param string $holdTime
     * @return SoundConfig
     */
    public function setHoldTime($holdTime)
    {
        $this->holdTime = $holdTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getMinute()
    {
        return $this->minute;
    }

    /**
     * @param string $minute
     * @return SoundConfig
     */
    public function setMinute($minute)
    {
        $this->minute = $minute;
        return $this;
    }

    /**
     * @return string
     */
    public function getMinutes()
    {
        return $this->minutes;
    }

    /**
     * @param string $minutes
     * @return SoundConfig
     */
    public function setMinutes($minutes)
    {
        $this->minutes = $minutes;
        return $this;
    }

    /**
     * @return string
     */
    public function getSeconds()
    {
        return $this->seconds;
    }

    /**
     * @param string $seconds
     * @return SoundConfig
     */
    public function setSeconds($seconds)
    {
        $this->seconds = $seconds;
        return $this;
    }

    /**
     * @return string
     */
    public function getThankYou()
    {
        return $this->thankYou;
    }

    /**
     * @param string $thankYou
     * @return SoundConfig
     */
    public function setThankYou($thankYou)
    {
        $this->thankYou = $thankYou;
        return $this;
    }

    /**
     * @return string
     */
    public function getReportHold()
    {
        return $this->reportHold;
    }

    /**
     * @param string $reportHold
     * @return SoundConfig
     */
    public function setReportHold($reportHold)
    {
        $this->reportHold = $reportHold;
        return $this;
    }

    public function toString()
    {
        $string = '';

        $objectVars = get_object_vars($this);
        ksort($objectVars);

        foreach ($objectVars as $prop => $value) {
            if (!is_null($value)) {
                $string .= 'queue-' . strtolower($prop) . ' = ' . $this->$prop . PHP_EOL;
            }
        }

        return $string;
    }
}