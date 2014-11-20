<?php

namespace Dev\PCultBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Representation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Dev\PCultBundle\Entity\RepresentationRepository")
 */
class Representation
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
     * @var \DateTime
     *
     * @ORM\Column(name="jour", type="date")
     */
    private $jour;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure", type="time")
     */
    private $heure;

    /**
     * @ORM\ManyToOne(targetEntity="Dev\PCultBundle\Entity\Spectacle", inversedBy="representations")
     * @ORM\JoinColumn(name="spectacle_id", referencedColumnName="id")
     */
    private $spectacle;

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
     * Set jour
     *
     * @param \DateTime $jour
     * @return Representation
     */
    public function setJour($jour)
    {
        $this->jour = $jour;

        return $this;
    }

    /**
     * Get jour
     *
     * @return \DateTime 
     */
    public function getJour()
    {
        return $this->jour;
    }

    /**
     * Set heure
     *
     * @param \DateTime $heure
     * @return Representation
     */
    public function setHeure($heure)
    {
        $this->heure = $heure;

        return $this;
    }

    /**
     * Get heure
     *
     * @return \DateTime 
     */
    public function getHeure()
    {
        return $this->heure;
    }


    /**
     * Set spectacle
     *
     * @param \Dev\PCultBundle\Entity\Spectacle $spectacle
     * @return Representation
     */
    public function setSpectacle(\Dev\PCultBundle\Entity\Spectacle $spectacle = null)
    {
        $this->spectacle = $spectacle;

        return $this;
    }

    /**
     * Get spectacle
     *
     * @return \Dev\PCultBundle\Entity\Spectacle 
     */
    public function getSpectacle()
    {
        return $this->spectacle;
    }
}
