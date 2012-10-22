<?php

namespace Kunstmaan\NodeBundle\Tests\Entity;

use Kunstmaan\NodeBundle\Entity\NodeVersion;
use Kunstmaan\NodeBundle\Entity\NodeTranslation;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2012-09-18 at 11:53:49.
 */
class NodeVersionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var NodeVersion
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new NodeVersion();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Kunstmaan\NodeBundle\Entity\NodeVersion::setNodeTranslation
     * @covers Kunstmaan\NodeBundle\Entity\NodeVersion::getNodeTranslation
     */
    public function testSetGetNodeTranslation()
    {
        $nodeTrans = new NodeTranslation();
        $this->object->setNodeTranslation($nodeTrans);
        $this->assertEquals($nodeTrans, $this->object->getNodeTranslation());
    }

    /**
     * @covers Kunstmaan\NodeBundle\Entity\NodeVersion::getType
     * @covers Kunstmaan\NodeBundle\Entity\NodeVersion::setType
     */
    public function testSetGetType()
    {
        $this->object->setType(NodeVersion::DRAFT_VERSION);
        $this->assertEquals(NodeVersion::DRAFT_VERSION, $this->object->getType());
    }

    /**
     * @covers Kunstmaan\NodeBundle\Entity\NodeVersion::setOwner
     * @covers Kunstmaan\NodeBundle\Entity\NodeVersion::getOwner
     */
    public function testSetGetOwner()
    {
        $this->object->setOwner('owner');
        $this->assertEquals('owner', $this->object->getOwner());
    }

    /**
     * @covers Kunstmaan\NodeBundle\Entity\NodeVersion::setCreated
     * @covers Kunstmaan\NodeBundle\Entity\NodeVersion::getCreated
     */
    public function testSetGetCreated()
    {
        $created = new \DateTime();
        $this->object->setCreated($created);
        $this->assertEquals($created, $this->object->getCreated());
    }

    /**
     * @covers Kunstmaan\NodeBundle\Entity\NodeVersion::setUpdated
     * @covers Kunstmaan\NodeBundle\Entity\NodeVersion::getUpdated
     */
    public function testSetGetUpdated()
    {
        $updated = new \DateTime();
        $this->object->setUpdated($updated);
        $this->assertEquals($updated, $this->object->getUpdated());
    }

    /**
     * @covers Kunstmaan\NodeBundle\Entity\NodeVersion::preUpdate
     * @todo   Implement testPreUpdate().
     */
    public function testPreUpdate()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    /**
     * @covers Kunstmaan\NodeBundle\Entity\NodeVersion::setRef
     * @covers Kunstmaan\NodeBundle\Entity\NodeVersion::getRefId
     * @covers Kunstmaan\NodeBundle\Entity\NodeVersion::getRefEntityName
     * @covers Kunstmaan\NodeBundle\Entity\NodeVersion::setRefId
     * @covers Kunstmaan\NodeBundle\Entity\NodeVersion::setRefEntityName
     */
    public function testGetSetRef()
    {
        $entity = new TestEntity(1);
        $this->object->setRef($entity);
        $this->assertEquals(1, $this->object->getRefId());
        $this->assertEquals('Kunstmaan\NodeBundle\Tests\Entity\TestEntity', $this->object->getRefEntityName());
    }

    /**
     * @covers Kunstmaan\NodeBundle\Entity\NodeVersion::getDefaultAdminType
     */
    public function testGetDefaultAdminType()
    {
        $this->assertNull($this->object->getDefaultAdminType());
    }

    /**
     * @covers Kunstmaan\NodeBundle\Entity\NodeVersion::getRef
     * @todo   Implement testGetRef().
     */
    public function testGetRef()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
}
