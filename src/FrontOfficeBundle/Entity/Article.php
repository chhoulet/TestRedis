<?php

namespace FrontOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="FrontOfficeBundle\Repository\ArticleRepository")
 */
class Article
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var text
     *
     * @ORM\Column(name="text1", type="text", length=12550)
     */
    private $text1;

    /**
     * @var text
     *
     * @ORM\Column(name="text2", type="text", length=12550, nullable=true)
     */
    private $text2;

    /**
     * @var text
     *
     * @ORM\Column(name="text3", type="text", length=12550, nullable=true)
     */
    private $text3;

    /**
     * @var text
     *
     * @ORM\Column(name="text4", type="text", length=12550, nullable=true)
     */
    private $text4;

    /**
     * @var text
     *
     * @ORM\Column(name="text5", type="text", length=12550, nullable=true)
     */
    private $text5;

    /**
     * @var integer
     *
     * @ORM\Column(name="active", type="integer")
     */
    private $active=1;

    /**
     * @var integer
     *
     * @ORM\Column(name="origin", type="integer")
     */
    private $origin=1;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreated", type="date")
     */
    private $dateCreated;

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="FrontOfficeBundle\Entity\Image", mappedBy="article", cascade={"persist","remove"})
     */
    private $images;


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
     * Set text1
     *
     * @param string $text1
     *
     * @return Article
     */
    public function setText1($text1)
    {
        $this->text1 = $text1;

        return $this;
    }

    /**
     * Get text1
     *
     * @return string
     */
    public function getText1()
    {
        return $this->text1;
    }

    /**
     * Set text2
     *
     * @param string $text2
     *
     * @return Article
     */
    public function setText2($text2)
    {
        $this->text2 = $text2;

        return $this;
    }

    /**
     * Get text2
     *
     * @return string
     */
    public function getText2()
    {
        return $this->text2;
    }

    /**
     * Set text3
     *
     * @param string $text3
     *
     * @return Article
     */
    public function setText3($text3)
    {
        $this->text3 = $text3;

        return $this;
    }

    /**
     * Get text3
     *
     * @return string
     */
    public function getText3()
    {
        return $this->text3;
    }

    /**
     * Set text4
     *
     * @param string $text4
     *
     * @return Article
     */
    public function setText4($text4)
    {
        $this->text4 = $text4;

        return $this;
    }

    /**
     * Get text4
     *
     * @return string
     */
    public function getText4()
    {
        return $this->text4;
    }

    /**
     * Set text5
     *
     * @param string $text5
     *
     * @return Article
     */
    public function setText5($text5)
    {
        $this->text5 = $text5;

        return $this;
    }

    /**
     * Get text5
     *
     * @return string
     */
    public function getText5()
    {
        return $this->text5;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     *
     * @return Article
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }
   

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add image
     *
     * @param \FrontOfficeBundle\Entity\Image $image
     *
     * @return Article
     */
    public function addImage(\FrontOfficeBundle\Entity\Image $image)
    {
        $this->images[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \FrontOfficeBundle\Entity\Image $image
     */
    public function removeImage(\FrontOfficeBundle\Entity\Image $image)
    {
        $this->images->removeElement($image);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set active
     *
     * @param integer $active
     *
     * @return Article
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return integer
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set origin
     *
     * @param integer $origin
     *
     * @return Article
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;

        return $this;
    }

    /**
     * Get origin
     *
     * @return integer
     */
    public function getOrigin()
    {
        return $this->origin;
    }
}
