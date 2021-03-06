<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Company
 *
 * @ORM\Table("company")
 * @ORM\Entity(repositoryClass="AppBundle\Doctrine\Repository\CompanyRepository")
 */
class Company {
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    
    /**
     * @var integer
     *
     * @ORM\Column(name="idno", type="integer")
     */
    private $idno;
    
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string")
     */
    private $title;
    
     /**
     * @var string
     *
     * @ORM\Column(name="address", type="string")
     */
    private $address;
    
     /**
     * @var string
     *
     * @ORM\Column(name="director", type="string")
     */
    private $director;
    
    
    /** 
     * @ORM\Column(name="registrationDate", type="datetime") 
     */
    private $registrationDate;
    
    /**
     * @ORM\ManyToMany(targetEntity="Founder", inversedBy="companies")
     * @ORM\JoinTable(name="companies_founders")
     **/
    private $founders;
    
    /**
     * @ORM\ManyToMany(targetEntity="Manager", inversedBy="companies")
     * @ORM\JoinTable(name="companies_managers")
     **/
    private $managers;
    
    
    public function __construct() {
        $this->founders = new \Doctrine\Common\Collections\ArrayCollection();
        $this->managers = new \Doctrine\Common\Collections\ArrayCollection();
    }
     

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
     * Set idno
     *
     * @param integer $idno
     * @return Company
     */
    public function setIdno($idno)
    {
        $this->idno = $idno;

        return $this;
    }

    /**
     * Get idno
     *
     * @return integer 
     */
    public function getIdno()
    {
        return $this->idno;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Company
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
     * Set address
     *
     * @param string $address
     * @return Company
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set director
     *
     * @param string $director
     * @return Company
     */
    public function setDirector($director)
    {
        $this->director = $director;

        return $this;
    }

    /**
     * Get director
     *
     * @return string 
     */
    public function getDirector()
    {
        return $this->director;
    }
}
