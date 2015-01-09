<?php

namespace Blog\ArticlesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Blog\ArticlesBundle\Entity\ArticleRepository")
 */
class Article {
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var integer
     * @ORM\Column(name="nombre_likes", type="integer")
     */
    private $nombreLikes;

    /**
     * @var string
     * @ORM\Column(name="is_liked", type="string")
     */
    private $isLiked;

    /**
     * @var Datetime
     * @ORM\Column(name="date_like", type="datetime", nullable=true)
     */
    private $dateLike;

    /**
     * @var integer
     * @ORM\Column(name="auteur_id", type="integer")
     */
    private $auteurId;

    /**
     * @var string
     * @ORM\Column(name="content", type="string")
     */
    private $content;

    /**
     * Get numero
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Article
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    
        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set nombreLikes
     *
     * @param int $nombreLikes
     * @return Article
     */
    public function setNombreLikes($nombreLikes)
    {
        $this->nombreLikes = $nombreLikes;
    
        return $this;
    }

    /**
     * Get nombreLikes
     * @return integer 
     */
    public function getNombreLikes()
    {
        return $this->nombreLikes;
    }

    /**
     * Set isLiked
     * @param string $isLiked
     * @return Article
     */
    public function setIsLiked($isLiked)
    {
        $this->isLiked = $isLiked;
    
        return $this;
    }

    /**
     * Get isLiked
     * @return string 
     */
    public function getIsLiked()
    {
        return $this->isLiked;
    }

    /**
     * Set dateLike
     * @param \DateTime $dateLike
     * @return Article
     */
    public function setDateLike(\DateTime $dateLike = null)
    {
        $this->dateLike = $dateLike;
    
        return $this;
    }

    /**
     * Get dateLike
     *
     * @return \DateTime 
     */
    public function getDateLike()
    {
        return $this->dateLike;
    }

    /**
     * Set auteurId
     * @param integer $auteurId
     * @return Article
     */
    public function setAuteurId($auteurId)
    {
        $this->auteurId = $auteurId;
    
        return $this;
    }

    /**
     * Get auteur Id
     * @return integer
     */
    public function getAuteurId()
    {
        return $this->auteurId;
    }

    /**
     * Set content
     * @param integer $content
     * @return Article
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
}
