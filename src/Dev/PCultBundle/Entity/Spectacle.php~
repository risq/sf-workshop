<?php

namespace Dev\PCultBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Spectacle
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Dev\PCultBundle\Entity\SpectacleRepository")
 */
class Spectacle
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="MetteurEnScene", type="string", length=255)
     */
    private $metteurEnScene;

    /**
     * @var string
     *
     * @ORM\Column(name="Synopsis", type="text")
     */
    private $synopsis;

    /**
     * @var string
     *
     * @ORM\Column(name="Image", type="string", length=255)
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity="Dev\PCultBundle\Entity\Representation", mappedBy="spectacle")
     */
    private $representations;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Spectacle
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set synopsis
     *
     * @param string $synopsis
     * @return Spectacle
     */
    public function setSynopsis($synopsis)
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    /**
     * Get synopsis
     *
     * @return string 
     */
    public function getSynopsis()
    {
        return $this->synopsis;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Spectacle
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set metteurEnScene
     *
     * @param string $metteurEnScene
     * @return Spectacle
     */
    public function setMetteurEnScene($metteurEnScene)
    {
        $this->metteurEnScene = $metteurEnScene;

        return $this;
    }

    /**
     * Get metteurEnScene
     *
     * @return string 
     */
    public function getMetteurEnScene()
    {
        return $this->metteurEnScene;
    }

    public function __toString() {
        return $this->nom . ' - ' . $this->metteurEnScene;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->representations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add representations
     *
     * @param \Dev\PCultBundle\Entity\Representation $representations
     * @return Spectacle
     */
    public function addRepresentation(\Dev\PCultBundle\Entity\Representation $representations)
    {
        $this->representations[] = $representations;

        return $this;
    }

    /**
     * Remove representations
     *
     * @param \Dev\PCultBundle\Entity\Representation $representations
     */
    public function removeRepresentation(\Dev\PCultBundle\Entity\Representation $representations)
    {
        $this->representations->removeElement($representations);
    }

    /**
     * Get representations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRepresentations()
    {
        return $this->representations;
    }
}
