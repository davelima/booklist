<?php

namespace App\Controller\Frontend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Service\Google\Books as GoogleBooks;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="home-front")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        return $this->render('frontend/default/index.html.twig', [
            'hello' => 'World'
        ]);
    }

    /**
     * @Route("/user-data/", name="get-user-data")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function userDataAction(Request $request)
    {
        $data = [
            'name' => 'Dave',
            'avatar' => 'http://via.placeholder.com/150x150'
        ];

        return $this->json($data);
    }

    /**
     * @Route("/user-books/", name="get-user-books")
     * @Method({"GET"})
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function userBooksAction(Request $request)
    {
        $data = [];

        if (! $request->get('id')) {
            for ($i = 0; $i <= 10; $i++) {
                $data[] = [
                    'title' => "Book title #{$i}",
                    'cover' => 'http://via.placeholder.com/150x200',
                    'id' => $i
                ];
            }
        } else {
            $data = [
                'title' => 'This is the book title',
                'description' => 'This is the book description',
                'id' => $request->get('id'),
                'cover' => 'http://via.placeholder.com/150x200'
            ];
        }

        return $this->json($data);
    }

    /**
     * @Route("/user-books/", name="add-user-book")
     * @Method({"POST"})
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function addBook(Request $request)
    {
        $mockResponse = [
            'message' => 'Book added'
        ];

        return $this->json($mockResponse);
    }

    /**
     * @Route("/books/search/", name="search-books")
     * @Method({"GET"})
     *
     * @param GoogleBooks $books
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function searchBooks(GoogleBooks $books, Request $request)
    {
        return $this->json($books->search($request->get('q')));
    }
}
