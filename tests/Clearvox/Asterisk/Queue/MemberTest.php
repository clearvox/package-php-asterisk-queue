<?php

use Clearvox\Asterisk\Queue\Member;

class MemberTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Member
     */
    public $member;

    public function setUp()
    {
        $this->member = new Member('Local/1000');
    }

    public function testGetInterface()
    {
        $this->assertEquals('Local/1000', $this->member->getInterface());
    }

    public function testToString()
    {
        $this->member
            ->setMemberName('John Smith')
            ->setPenalty(10)
            ->setRingInUse(true)
            ->setStateInterface('SIP/2000');

        $this->assertEquals(
            'member => Local/1000,10,John Smith,SIP/2000,yes',
            $this->member->toString()
        );
    }
}