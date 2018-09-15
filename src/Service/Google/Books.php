<?php

namespace App\Service\Google;

use GuzzleHttp\Client;
use Symfony\Component\VarDumper\VarDumper; // @TODO remove this

class Books
{

    /**
     * Google Books Search Volumes endpoint
     */
    const VOLUMES_ENDPOINT = 'https://www.googleapis.com/books/v1/volumes';

    /**
     * Max results on book searching
     */
    const MAX_RESULTS = 5;

    /**
     * @var Client
     */
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function search($term)
    {
        $term = urlencode($term);

        $request = $this->client->get(self::VOLUMES_ENDPOINT . "?q={$term}&maxResults=" . self::MAX_RESULTS);

        if ($request->getStatusCode() === 200) {

            $searchResults = json_decode($request->getBody()->getContents());

            $result = [
                'books' => []
            ];

            foreach ($searchResults->items as $book) {
                $identifiers = [];
                $categories = [];
                $imageLinks = [];
                $authors = [];
                $publisher = null;
                $description = null;

                if (isset($book->volumeInfo->industryIdentifiers)) {
                    $identifiers = $book->volumeInfo->industryIdentifiers;
                }

                if (isset($book->volumeInfo->publisher)) {
                    $publisher = $book->volumeInfo->publisher;
                }

                if (isset($book->volumeInfo->description)) {
                    $description = $book->volumeInfo->description;
                }

                if (isset($book->volumeInfo->categories)) {
                    $categories = $book->volumeInfo->categories;
                }

                if (isset($book->volumeInfo->imageLinks->thumbnail)) {
                    $imageLinks = $book->volumeInfo->imageLinks;
                }

                if (isset($book->volumeInfo->authors)) {
                    $authors = $book->volumeInfo->authors;
                }

                $result['books'][] = [
                    'title' => $book->volumeInfo->title,
                    'identifiers' => $identifiers,
                    'authors' => $authors,
                    'imageLinks' => $imageLinks,
                    'publisher' => $publisher,
                    'publishedDate' => $book->volumeInfo->publishedDate,
                    'description' => $description,
                    'categories' => $categories,
                    'language' => $book->volumeInfo->language,
                    'googleBooksLink' => $book->selfLink
                ];
            }
        }

        return $result;
    }
}
