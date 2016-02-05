<?php

use Clearvox\Asterisk\Queue\Queue;

class QueueTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Queue
     */
    public $queue;

    public function setUp()
    {
        $this->queue = new Queue('support');
    }

    public function testGetName()
    {
        $this->assertEquals('support', $this->queue->getName());
    }

    public function testSimpleQueueString()
    {
        $this->queue
            ->setTimeout(15)
            ->setContext('example-context')
            ->setAnnounce('beep')
            ->setAnnounceHoldPosition(Queue::ANNOUNCE_HOLD_POSITION_YES);

        $expected  = "[support]" . PHP_EOL;
        $expected .= "announce=beep" . PHP_EOL;
        $expected .= "announce-position=yes" . PHP_EOL;
        $expected .= "context=example-context" . PHP_EOL;
        $expected .= "timeout=15" . PHP_EOL;

        $this->assertEquals($expected, $this->queue->toString());
    }

    public function testQueueWithMembers()
    {
        $mockMember = $this->getMock('Clearvox\Asterisk\Queue\Member', [], ['SIP/1000']);
        $mockMember
            ->method('toString')
            ->willReturn('member => SIP/1000');

        $mockMember2 = $this->getMock('Clearvox\Asterisk\Queue\Member', [], ['SIP/2000@agents']);
        $mockMember2
            ->method('toString')
            ->willReturn('member => SIP/2000@agents,10,John Smith');

        $this->queue
            ->setTimeout(15)
            ->addMember($mockMember)
            ->addMember($mockMember2);

        $expected  = "[support]" . PHP_EOL;
        $expected .= "member => SIP/1000" . PHP_EOL;
        $expected .= "member => SIP/2000@agents,10,John Smith" . PHP_EOL;
        $expected .= "timeout=15" . PHP_EOL;

        $this->assertEquals($expected, $this->queue->toString());
    }

    public function testQueueWithSoundConfig()
    {
        $mockConfig = $this->getMock('Clearvox\Asterisk\Queue\SoundConfig');
        $mockConfig
            ->method('toString')
            ->willReturn('queue-youarenext=queue-youarenext' . PHP_EOL);

        $this->queue
            ->setWrapUpTime(15)
            ->setQueueSoundConfig($mockConfig);

        $expected  = "[support]" . PHP_EOL;
        $expected .= "queue-youarenext=queue-youarenext" . PHP_EOL;
        $expected .= "wrapuptime=15" . PHP_EOL;

        $this->assertEquals($expected, $this->queue->toString());
    }

    public function testQueueWithRingInUse()
    {
        $this->queue
            ->setRingInUse(Queue::RING_IN_USE_YES);

        $expected  = "[support]" . PHP_EOL;
        $expected .= "ringinuse=yes" . PHP_EOL;

        $this->assertEquals($expected, $this->queue->toString());
    }
}