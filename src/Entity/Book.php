<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="books")
 * @ORM\Entity
 */
class Book
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @ORM\Column(type="string", length=128)
     */
    public $title;

    /**
     * @ORM\Column(type="string")
     */
    public $description;

    /**
     * @ORM\ManyToMany(targetEntity="Category")
     * @ORM\JoinTable(name="books_categories",
     *      joinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="book_id", referencedColumnName="id")}
     *      )
     */
    public $category;

    /**
     * @ORM\ManyToMany(targetEntity="Author")
     * @ORM\JoinTable(name="books_authors",
     *      joinColumns={@ORM\JoinColumn(name="author_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="book_id", referencedColumnName="id")}
     *      )
     */
    public $author;

    /**
     * @ORM\OneToOne(targetEntity="Publisher")
     */
    public $publisher;

    /**
     * @ORM\Column(type="string", length=25)
     */
    public $cover;

    /**
     * @ORM\Column(type="string", length=10)
     */
    public $isbn10;

    /**
     * @ORM\Column(type="string", length=13)
     */
    public $isbn13;

    /**
     * @ORM\Column(type="datetime")
     */
    public $publishDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    public $googleBooksLink;

    /**
     * @ORM\Column(type="string", length=4)
     */
    public $language;
}
