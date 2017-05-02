<?php

namespace FrontOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Image
 *
 * @ORM\Table(name="image")
 * @ORM\Entity(repositoryClass="FrontOfficeBundle\Repository\ImageRepository")
 */
class Image
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="filename", type="string", length=255)
     */
    private $filename;

    /**
     * @var string
     *
     * @ORM\Column(name="filename1", type="string", length=255, nullable=true)
     */
    private $filename1;

    /**
     * @var string
     *
     * @ORM\Column(name="filename2", type="string", length=255, nullable=true)
     */
    private $filename2;

    /**
     * @var string
     *
     * @ORM\Column(name="filename3", type="string", length=255, nullable=true)
     */
    private $filename3;

     /**
     * @var string
     *
     * @ORM\Column(name="filename4", type="string", length=255, nullable=true)
     */
    private $filename4;

     /**
     * @var string
     *
     * @ORM\Column(name="filename5", type="string", length=255, nullable=true)
     */
    private $filename5;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="FrontOfficeBundle\Entity\Article", inversedBy="images")
     * @ORM\JoinColumn(name="article_id", referencedColumnName="id", nullable=true)
     */
    private $article;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set filename
     *
     * @param string $filename
     *
     * @return Image
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set filename1
     *
     * @param string $filename1
     *
     * @return Image
     */
    public function setFilename1($filename1)
    {
        $this->filename1 = $filename1;

        return $this;
    }

    /**
     * Get filename1
     *
     * @return string
     */
    public function getFilename1()
    {
        return $this->filename1;
    }

    /**
     * Set filename2
     *
     * @param string $filename2
     *
     * @return Image
     */
    public function setFilename2($filename2)
    {
        $this->filename2 = $filename2;

        return $this;
    }

    /**
     * Get filename2
     *
     * @return string
     */
    public function getFilename2()
    {
        return $this->filename2;
    }

    /**
     * Set filename3
     *
     * @param string $filename3
     *
     * @return Image
     */
    public function setFilename3($filename3)
    {
        $this->filename3 = $filename3;

        return $this;
    }

    /**
     * Get filename3
     *
     * @return string
     */
    public function getFilename3()
    {
        return $this->filename3;
    }

    /**
     * Set article
     *
     * @param \FrontOfficeBundle\Entity\Article $article
     *
     * @return Image
     */
    public function setArticle(\FrontOfficeBundle\Entity\Article $article = null)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return \FrontOfficeBundle\Entity\Article
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * Set filename4
     *
     * @param string $filename4
     *
     * @return Image
     */
    public function setFilename4($filename4)
    {
        $this->filename4 = $filename4;

        return $this;
    }

    /**
     * Get filename4
     *
     * @return string
     */
    public function getFilename4()
    {
        return $this->filename4;
    }

    /**
     * Set filename5
     *
     * @param string $filename5
     *
     * @return Image
     */
    public function setFilename5($filename5)
    {
        $this->filename5 = $filename5;

        return $this;
    }

    /**
     * Get filename5
     *
     * @return string
     */
    public function getFilename5()
    {
        return $this->filename5;
    }
}
