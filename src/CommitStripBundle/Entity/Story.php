<?php

namespace CommitStripBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Story
 *
 * @ORM\Table(name="story")
 * @ORM\Entity(repositoryClass="CommitStripBundle\Repository\StoryRepository")
 */
class Story
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     *  @ORM\OneToMany(targetEntity="Card", mappedBy="story")
     */
    private $cards;


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
     * Set titre
     *
     * @param string $titre
     *
     * @return Story
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
     * Constructor
     */
    public function __construct()
    {
        $this->cards = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add card
     *
     * @param \CommitStripBundle\Entity\Card $card
     *
     * @return Story
     */
    public function addCard(\CommitStripBundle\Entity\Card $card)
    {
        $this->cards[] = $card;

        return $this;
    }

    /**
     * Remove card
     *
     * @param \CommitStripBundle\Entity\Card $card
     */
    public function removeCard(\CommitStripBundle\Entity\Card $card)
    {
        $this->cards->removeElement($card);
    }

    /**
     * Get cards
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCards()
    {
        return $this->cards;
    }
}
