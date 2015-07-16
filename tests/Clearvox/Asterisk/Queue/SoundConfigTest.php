<?php

use Clearvox\Asterisk\Queue\SoundConfig;

class SoundConfigTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var SoundConfig
     */
    public $soundConfig;

    public function setUp()
    {
        $this->soundConfig = new SoundConfig();
    }

    public function testAllOptions()
    {
        $this->soundConfig
            ->setCallsWaiting('new-callswaiting')
            ->setHoldTime('new-holdtime')
            ->setMinute('new-minute')
            ->setMinutes('new-minutes')
            ->setReportHold('new-report-hold')
            ->setSeconds('new-seconds')
            ->setThankYou('new-thankyou')
            ->setThereAre('new-thereare')
            ->setYouAreNext('new-youarenext');

        $expected  = "queue-callswaiting = new-callswaiting" . PHP_EOL;
        $expected .= "queue-holdtime = new-holdtime" . PHP_EOL;
        $expected .= "queue-minute = new-minute" . PHP_EOL;
        $expected .= "queue-minutes = new-minutes" . PHP_EOL;
        $expected .= "queue-reporthold = new-report-hold" . PHP_EOL;
        $expected .= "queue-seconds = new-seconds" . PHP_EOL;
        $expected .= "queue-thankyou = new-thankyou" . PHP_EOL;
        $expected .= "queue-thereare = new-thereare" . PHP_EOL;
        $expected .= "queue-youarenext = new-youarenext" . PHP_EOL;

        $this->assertEquals($expected, $this->soundConfig->toString());
    }
}