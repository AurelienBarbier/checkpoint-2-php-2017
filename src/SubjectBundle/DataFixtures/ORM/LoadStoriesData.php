<?php

namespace SubjectBundle\DataFixtures\ORM;

use CommitStripBundle\Entity\Card;
use CommitStripBundle\Entity\Story;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadStoriesData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $stories = array(
            array(
                "titre" => 'Un de plus',
                "cards" => array(
                    array(
                        "picture" => "http://wcs-fontainebleau.fr/preprod/checkpoint/chapter_1.png",
                        "nbcard" => 1
                        ),
                    array(
                        "picture" => "http://wcs-fontainebleau.fr/preprod/checkpoint/chapter_2.png",
                        "nbcard" => 2
                        ),
                    array(
                        "picture" => "http://wcs-fontainebleau.fr/preprod/checkpoint/chapter_3.png",
                        "nbcard" => 3
                        ),
                    array(
                        "picture" => "http://wcs-fontainebleau.fr/preprod/checkpoint/chapter_4.png",
                        "nbcard" => 4
                        ),
                    ),
                ),

            array(
                "titre" => 'Un de plus II',
                "cards" => array(
                    array(
                        "picture" => "http://wcs-fontainebleau.fr/preprod/checkpoint/chapter_1.png",
                        "nbcard" => 1
                        ),
                    array(
                        "picture" => "http://wcs-fontainebleau.fr/preprod/checkpoint/chapter_2.png",
                        "nbcard" => 2
                        ),
                    array(
                        "picture" => "http://wcs-fontainebleau.fr/preprod/checkpoint/chapter_3.png",
                        "nbcard" => 3
                        ),
                    array(
                        "picture" => "http://wcs-fontainebleau.fr/preprod/checkpoint/chapter_4.png",
                        "nbcard" => 4
                        ),
                    ),
                ),
            );

        foreach ($stories as $story){

            $o_story = new Story();
            $o_story->setTitre($story['titre']);
            $manager->persist($o_story);

            foreach ($story['cards'] as $card){
                $o_card = new Card();
                $o_card->setPicture($card['picture']);
                $o_card->setNbcard($card['nbcard']);
                $o_card->setStory($o_story);
                $manager->persist($o_card);
            }
        }
        $manager->flush();
    }
}