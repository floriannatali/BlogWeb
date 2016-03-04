<?php
/**
 * Created by PhpStorm.
 * User: florian
 * Date: 04/03/16
 * Time: 09:18
 */

namespace AppBundle\Model;


use Symfony\Component\Validator\Constraints as Assert;

class Article
{

    /**
     * @Assert\NotBlank
     * @Assert\Length(min="2", max="50")
     *
     */
    private $title;
    /**
     * @Assert\NotBlank
     * @Assert\Length(min="10", max="500")
     *
     */
    private $content;

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }
}