<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Company
 *
 * @ORM\Table("founder")
 * @ORM\Entity(repositoryClass="AppBundle\Doctrine\Repository\FounderRepository")
 */
class Founder {
    
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
     * @ORM\Column(name="firstName", type="string")
     */
    private $firstName;
    
    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string")
     */
    private $lastName;
    
    /**
     * @ORM\ManyToMany(targetEntity="Company", mappedBy="managers")
     **/
    private $companies;
    
    public function __construct() {
        $this->companies = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
}
