<?php

namespace Kunstmaan\MediaBundle\Tests\Helper\File;

use Kunstmaan\MediaBundle\Entity\Media;
use Kunstmaan\MediaBundle\Helper\File\PdfHandler;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2014-05-16 at 12:10:35.
 */
class PdfHandlerTest extends \PHPUnit_Framework_TestCase
{
    /** @var PdfHandler */
    protected $object;

    protected $pdfTransformer;

    /** @var string */
    protected $filesDir;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     *
     * @covers Kunstmaan\MediaBundle\Helper\File\PdfHandler::__construct
     * @covers Kunstmaan\MediaBundle\Helper\File\PdfHandler::setPdfTransformer
     */
    protected function setUp()
    {
        $this->pdfTransformer = $this->getMock('Kunstmaan\MediaBundle\Helper\Transformer\PreviewTransformerInterface');

        $this->filesDir = realpath(__DIR__ . '/../../Files');

        $this->object = new PdfHandler();
        $this->object->setPdfTransformer($this->pdfTransformer);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Kunstmaan\MediaBundle\Helper\File\PdfHandler::getType
     */
    public function testGetType()
    {
        $this->assertEquals(PdfHandler::TYPE, $this->object->getType());
    }

    /**
     * @covers Kunstmaan\MediaBundle\Helper\File\PdfHandler::canHandle
     */
    public function testCanHandlePdfFiles()
    {
        $media = new Media();
        $media->setContent(new File($this->filesDir . '/sample.pdf'));
        $media->setContentType('application/pdf');

        $this->assertTrue($this->object->canHandle($media));
    }

    /**
     * @covers Kunstmaan\MediaBundle\Helper\File\PdfHandler::canHandle
     */
    public function testCannotHandleNonPdfFiles()
    {
        $media = new Media();
        $media->setContentType('image/jpg');

        $this->assertFalse($this->object->canHandle($media));
        $this->assertFalse($this->object->canHandle(new \stdClass()));
    }

    /**
     * @covers Kunstmaan\MediaBundle\Helper\File\PdfHandler::saveMedia
     */
    public function testSaveMedia()
    {
        $media = new Media();
        $this->object->saveMedia($media);
    }

    /**
     * @covers Kunstmaan\MediaBundle\Helper\File\PdfHandler::getImageUrl
     * @covers Kunstmaan\MediaBundle\Helper\File\PdfHandler::setWebPath
     */
    public function testGetImageUrl()
    {
        $this->pdfTransformer
            ->expects($this->any())
            ->method('getPreviewFilename')
            ->will($this->returnValue('/media.pdf.jpg'));

        $media = new Media();
        $media->setUrl('/path/to/media.pdf');
        $this->assertNull($this->object->getImageUrl($media, '/basepath'));

        $previewFilename = sys_get_temp_dir() . '/media.pdf.jpg';
        $fileSystem = new Filesystem();
        $fileSystem->touch($previewFilename);
        $media->setUrl('/media.pdf');
        $this->object->setWebPath(sys_get_temp_dir());
        $this->assertEquals('/media.pdf.jpg', $this->object->getImageUrl($media, ''));
        $fileSystem->remove($previewFilename);
    }
}