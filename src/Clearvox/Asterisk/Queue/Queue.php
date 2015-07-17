<?php
namespace Clearvox\Asterisk\Queue;

class Queue
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $musicClass;

    /**
     * @var string
     */
    protected $announce;

    /**
     * @var string
     */
    protected $strategy;

    const STRATEGY_RINGALL = 'ringall';
    const STRATEGY_LEASTRECENT = 'leastrecent';
    const STRATEGY_FEWESTCALLS = 'fewestcalls';
    const STRATEGY_RANDOM = 'random';
    const STRATEGY_RRMEMORY = 'rrmemory';
    const STRATEGY_LINEAR = 'linear';
    const STRATEGY_WRANDOM = 'wrandom';

    /**
     * @var int
     */
    protected $serviceLevel;

    /**
     * @var string
     */
    protected $context;

    /**
     * @var int
     */
    protected $penaltyMembersLimit;

    /**
     * @var int
     */
    protected $timeout;

    /**
     * @var int
     */
    protected $retry;

    /**
     * @var int
     */
    protected $timeoutPriority;

    /**
     * @var int
     */
    protected $weight;

    /**
     * @var int
     */
    protected $wrapUpTime;

    /**
     * @var boolean
     */
    protected $autoFill;

    /**
     * @var string
     */
    protected $autoPause;

    const AUTOPAUSE_NO = 'no';
    const AUTOPAUSE_YES = 'yes';
    const AUTOPAUSE_ALL = 'all';

    /**
     * @var int
     */
    protected $autoPauseDelay;

    /**
     * @var boolean
     */
    protected $autoPauseUnavailable;

    /**
     * @var int
     */
    protected $maxLength;


    /**
     * @var boolean
     */
    protected $interfaceVariables;

    /**
     * @var boolean
     */
    protected $queueEntryVariables;

    /**
     * @var boolean
     */
    protected $queueVariables;

    /**
     * @var string
     */
    protected $memberMacro;

    /**
     * @var string
     */
    protected $memberGoSub;

    /**
     * @var int
     */
    protected $announceFrequency;

    /**
     * @var int
     */
    protected $minimumAnnounceFrequency;

    /**
     * @var int
     */
    protected $periodicAnnounceFrequency;

    /**
     * @var boolean
     */
    protected $randomPeriodicAnnounce;

    /**
     * @var boolean
     */
    protected $relativePeriodicAnnounce;

    /**
     * @var string
     */
    protected $announceHoldTime;

    const ANNOUNCE_HOLD_TIME_YES  = 'yes';
    const ANNOUNCE_HOLD_TIME_NO   = 'no';
    const ANNOUNCE_HOLD_TIME_ONCE = 'once';

    /**
     * @var string
     */
    protected $announceHoldPosition;

    const ANNOUNCE_HOLD_POSITION_YES   = 'yes';
    const ANNOUNCE_HOLD_POSITION_NO    = 'no';
    const ANNOUNCE_HOLD_POSITION_LIMIT = 'limit';
    const ANNOUNCE_HOLD_POSITION_MORE  = 'more';

    /**
     * @var boolean
     */
    protected $announceToFirstUser;

    /**
     * @var int
     */
    protected $announcePositionLimit;

    /**
     * @var int
     */
    protected $announceRoundSeconds;

    /**
     * @var SoundConfig
     */
    protected $queueSoundConfig;

    /**
     * @var array
     */
    protected $periodicAnnounce = array();

    /**
     * @var string
     */
    protected $monitorFormat;

    /**
     * @var string
     */
    protected $monitorType;

    /**
     * @var array
     */
    protected $members = array();

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Get the name set for this queue.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getMusicClass()
    {
        return $this->musicClass;
    }

    /**
     * @param string $musicClass
     * @return Queue
     */
    public function setMusicClass($musicClass)
    {
        $this->musicClass = $musicClass;
        return $this;
    }

    /**
     * @return string
     */
    public function getAnnounce()
    {
        return $this->announce;
    }

    /**
     * @param string $announce
     * @return Queue
     */
    public function setAnnounce($announce)
    {
        $this->announce = $announce;
        return $this;
    }

    /**
     * @return string
     */
    public function getStrategy()
    {
        return $this->strategy;
    }

    /**
     * @param string $strategy
     * @return Queue
     */
    public function setStrategy($strategy)
    {
        $this->strategy = $strategy;
        return $this;
    }

    /**
     * @return int
     */
    public function getServiceLevel()
    {
        return $this->serviceLevel;
    }

    /**
     * @param int $serviceLevel
     * @return Queue
     */
    public function setServiceLevel($serviceLevel)
    {
        $this->serviceLevel = $serviceLevel;
        return $this;
    }

    /**
     * @return string
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param string $context
     * @return Queue
     */
    public function setContext($context)
    {
        $this->context = $context;
        return $this;
    }

    /**
     * @return int
     */
    public function getPenaltyMembersLimit()
    {
        return $this->penaltyMembersLimit;
    }

    /**
     * @param int $penaltyMembersLimit
     * @return Queue
     */
    public function setPenaltyMembersLimit($penaltyMembersLimit)
    {
        $this->penaltyMembersLimit = $penaltyMembersLimit;
        return $this;
    }

    /**
     * @return int
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * @param int $timeout
     * @return Queue
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
        return $this;
    }

    /**
     * @return int
     */
    public function getRetry()
    {
        return $this->retry;
    }

    /**
     * @param int $retry
     * @return Queue
     */
    public function setRetry($retry)
    {
        $this->retry = $retry;
        return $this;
    }

    /**
     * @return int
     */
    public function getTimeoutPriority()
    {
        return $this->timeoutPriority;
    }

    /**
     * @param int $timeoutPriority
     * @return Queue
     */
    public function setTimeoutPriority($timeoutPriority)
    {
        $this->timeoutPriority = $timeoutPriority;
        return $this;
    }

    /**
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param int $weight
     * @return Queue
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @return int
     */
    public function getWrapUpTime()
    {
        return $this->wrapUpTime;
    }

    /**
     * @param int $wrapUpTime
     * @return Queue
     */
    public function setWrapUpTime($wrapUpTime)
    {
        $this->wrapUpTime = $wrapUpTime;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isAutoFill()
    {
        return $this->autoFill;
    }

    /**
     * @param boolean $autoFill
     * @return Queue
     */
    public function setAutoFill($autoFill)
    {
        $this->autoFill = $autoFill;
        return $this;
    }

    /**
     * @return string
     */
    public function getAutoPause()
    {
        return $this->autoPause;
    }

    /**
     * @param string $autoPause
     * @return Queue
     */
    public function setAutoPause($autoPause)
    {
        $this->autoPause = $autoPause;
        return $this;
    }

    /**
     * @return int
     */
    public function getAutoPauseDelay()
    {
        return $this->autoPauseDelay;
    }

    /**
     * @param int $autoPauseDelay
     * @return Queue
     */
    public function setAutoPauseDelay($autoPauseDelay)
    {
        $this->autoPauseDelay = $autoPauseDelay;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isAutoPauseUnavailable()
    {
        return $this->autoPauseUnavailable;
    }

    /**
     * @param boolean $autoPauseUnavailable
     * @return Queue
     */
    public function setAutoPauseUnavailable($autoPauseUnavailable)
    {
        $this->autoPauseUnavailable = $autoPauseUnavailable;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxLength()
    {
        return $this->maxLength;
    }

    /**
     * @param int $maxLength
     * @return Queue
     */
    public function setMaxLength($maxLength)
    {
        $this->maxLength = $maxLength;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isInterfaceVariables()
    {
        return $this->interfaceVariables;
    }

    /**
     * @param boolean $interfaceVariables
     * @return Queue
     */
    public function setInterfaceVariables($interfaceVariables)
    {
        $this->interfaceVariables = $interfaceVariables;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isQueueEntryVariables()
    {
        return $this->queueEntryVariables;
    }

    /**
     * @param boolean $queueEntryVariables
     * @return Queue
     */
    public function setQueueEntryVariables($queueEntryVariables)
    {
        $this->queueEntryVariables = $queueEntryVariables;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isQueueVariables()
    {
        return $this->queueVariables;
    }

    /**
     * @param boolean $queueVariables
     * @return Queue
     */
    public function setQueueVariables($queueVariables)
    {
        $this->queueVariables = $queueVariables;
        return $this;
    }

    /**
     * @return string
     */
    public function getMemberMacro()
    {
        return $this->memberMacro;
    }

    /**
     * @param string $memberMacro
     * @return Queue
     */
    public function setMemberMacro($memberMacro)
    {
        $this->memberMacro = $memberMacro;
        return $this;
    }

    /**
     * @return string
     */
    public function getMemberGoSub()
    {
        return $this->memberGoSub;
    }

    /**
     * @param string $memberGoSub
     * @return Queue
     */
    public function setMemberGoSub($memberGoSub)
    {
        $this->memberGoSub = $memberGoSub;
        return $this;
    }

    /**
     * @return int
     */
    public function getAnnounceFrequency()
    {
        return $this->announceFrequency;
    }

    /**
     * @param int $announceFrequency
     * @return Queue
     */
    public function setAnnounceFrequency($announceFrequency)
    {
        $this->announceFrequency = $announceFrequency;
        return $this;
    }

    /**
     * @return int
     */
    public function getMinimumAnnounceFrequency()
    {
        return $this->minimumAnnounceFrequency;
    }

    /**
     * @param int $minimumAnnounceFrequency
     * @return Queue
     */
    public function setMinimumAnnounceFrequency($minimumAnnounceFrequency)
    {
        $this->minimumAnnounceFrequency = $minimumAnnounceFrequency;
        return $this;
    }

    /**
     * @return int
     */
    public function getPeriodicAnnounceFrequency()
    {
        return $this->periodicAnnounceFrequency;
    }

    /**
     * @param int $periodicAnnounceFrequency
     * @return Queue
     */
    public function setPeriodicAnnounceFrequency($periodicAnnounceFrequency)
    {
        $this->periodicAnnounceFrequency = $periodicAnnounceFrequency;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isRandomPeriodicAnnounce()
    {
        return $this->randomPeriodicAnnounce;
    }

    /**
     * @param boolean $randomPeriodicAnnounce
     * @return Queue
     */
    public function setRandomPeriodicAnnounce($randomPeriodicAnnounce)
    {
        $this->randomPeriodicAnnounce = $randomPeriodicAnnounce;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isRelativePeriodicAnnounce()
    {
        return $this->relativePeriodicAnnounce;
    }

    /**
     * @param boolean $relativePeriodicAnnounce
     * @return Queue
     */
    public function setRelativePeriodicAnnounce($relativePeriodicAnnounce)
    {
        $this->relativePeriodicAnnounce = $relativePeriodicAnnounce;
        return $this;
    }

    /**
     * @return string
     */
    public function getAnnounceHoldTime()
    {
        return $this->announceHoldTime;
    }

    /**
     * @param string $announceHoldTime
     * @return Queue
     */
    public function setAnnounceHoldTime($announceHoldTime)
    {
        $this->announceHoldTime = $announceHoldTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getAnnounceHoldPosition()
    {
        return $this->announceHoldPosition;
    }

    /**
     * @param string $announceHoldPosition
     * @return Queue
     */
    public function setAnnounceHoldPosition($announceHoldPosition)
    {
        $this->announceHoldPosition = $announceHoldPosition;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isAnnounceToFirstUser()
    {
        return $this->announceToFirstUser;
    }

    /**
     * @param boolean $announceToFirstUser
     * @return Queue
     */
    public function setAnnounceToFirstUser($announceToFirstUser)
    {
        $this->announceToFirstUser = $announceToFirstUser;
        return $this;
    }

    /**
     * @return int
     */
    public function getAnnouncePositionLimit()
    {
        return $this->announcePositionLimit;
    }

    /**
     * @param int $announcePositionLimit
     * @return Queue
     */
    public function setAnnouncePositionLimit($announcePositionLimit)
    {
        $this->announcePositionLimit = $announcePositionLimit;
        return $this;
    }

    /**
     * @return int
     */
    public function getAnnounceRoundSeconds()
    {
        return $this->announceRoundSeconds;
    }

    /**
     * @param int $announceRoundSeconds
     * @return Queue
     */
    public function setAnnounceRoundSeconds($announceRoundSeconds)
    {
        $this->announceRoundSeconds = $announceRoundSeconds;
        return $this;
    }

    /**
     * @return SoundConfig
     */
    public function getQueueSoundConfig()
    {
        return $this->queueSoundConfig;
    }

    /**
     * @param SoundConfig $queueSoundConfig
     * @return Queue
     */
    public function setQueueSoundConfig(SoundConfig $queueSoundConfig)
    {
        $this->queueSoundConfig = $queueSoundConfig;
        return $this;
    }

    /**
     * @return array
     */
    public function getPeriodicAnnounce()
    {
        return $this->periodicAnnounce;
    }

    /**
     * @param array $periodicAnnounce
     * @return Queue
     */
    public function setPeriodicAnnounce($periodicAnnounce)
    {
        $this->periodicAnnounce = $periodicAnnounce;
        return $this;
    }

    /**
     * @return string
     */
    public function getMonitorFormat()
    {
        return $this->monitorFormat;
    }

    /**
     * @param string $monitorFormat
     * @return Queue
     */
    public function setMonitorFormat($monitorFormat)
    {
        $this->monitorFormat = $monitorFormat;
        return $this;
    }

    /**
     * @return string
     */
    public function getMonitorType()
    {
        return $this->monitorType;
    }

    /**
     * @param string $monitorType
     * @return Queue
     */
    public function setMonitorType($monitorType)
    {
        $this->monitorType = $monitorType;
        return $this;
    }

    /**
     * Add a member to this queue.
     *
     * @param Member $member
     * @return $this
     */
    public function addMember(Member $member)
    {
        $this->members[] = $member;
        return $this;
    }

    /**
     * Get all members on this queue.
     *
     * @return array
     */
    public function getMembers()
    {
        return $this->members;
    }

    public function toString()
    {
        $ignore = [
            'name',
        ];

        $differences = [
            'autopauseUnavailable'      => 'autopauseunvail',
            'maxLength'                 => 'maxlen',
            'interfaceVariables'        => 'setinterfacevar',
            'queueEntryVariables'       => 'setqueueentryvar',
            'queueVariables'            => 'setqueuevar',
            'announceFrequency'         => 'announce-frequency',
            'minimumAnnounceFrequency'  => 'min-announce-frequency',
            'periodicAnnounceFrequency' => 'periodic-announce-frequency',
            'randomPeriodicAnnounce'    => 'random-periodic-announce',
            'relativePeriodicAnnounce'  => 'relative-periodic-announce',
            'announceHoldTime'          => 'announce-holdtime',
            'announceHoldPosition'      => 'announce-position',
            'announceToFirstUser'       => 'announce-to-first-user',
            'announcePositionLimit'     => 'announce-position-limit',
            'announceRoundSeconds'      => 'announce-round-seconds',
            'periodicAnnounce'          => 'periodic-announce',
            'monitorFormat'             => 'monitor-format',
            'monitorType'               => 'monitor-type'
        ];

        $propValue = function($property, $value) use ($ignore, $differences){
            // Is part of ignore, just return empty string
            if(in_array($property, $ignore)) {
                return '';
            }

            // Get the setting key, if its part of differences, use the defined difference
            if(array_key_exists($property, $differences)) {
                $key = $differences[$property];
            } else {
                $key = strtolower($property);
            }

            // Its an array, split the values with ,
            if(is_array($value) && !empty($value)) {
                if($value[0] instanceof Member) {
                    return implode(PHP_EOL, array_map(function(Member $member) {
                        return $member->toString();
                    }, $value)) . PHP_EOL;
                } else {
                    return $key . '=' . implode(',', $value) . PHP_EOL;
                }
            }

            // Its an instance of a sound config, let that convert the string
            if($value instanceof SoundConfig) {
                return $value->toString();
            }

            if(is_bool($value)) {
                return $key . '=' . ($value ? 'yes' : 'no') . PHP_EOL;
            }

            // Its a basic value, use that
            if (!empty($value)) {
                return $key . '=' . $value . PHP_EOL;
            }

            // No value set return empty string
            return '';
        };

        // Get the properties and their values from this instance.
        $objectVars = get_object_vars($this);
        ksort($objectVars);

        // Start string output
        $string = "[{$this->name}]" . PHP_EOL;

        // Go through each and build the config line for that property/value
        foreach ($objectVars as $prop => $value) {
            $string .= $propValue($prop, $value);
        }

        return $string;
    }
}