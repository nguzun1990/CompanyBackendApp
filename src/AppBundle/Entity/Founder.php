<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Company
 *
 * @ORM\Table("manager")
 * @ORM\Entity(repositoryClass="AppBundle\Doctrine\Repository\ManagerRepository")
 */
class Manager {
    
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
     * @ORM\ManyToMany(targetEntity="Company", mappedBy="founders")
     **/
    private $founders;
    
    public function __construct() {
        $this->founders = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
}
