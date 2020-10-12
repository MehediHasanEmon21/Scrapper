<?php

namespace App\Http\Controllers;

// use Goutte\Client;
// use GuzzleHttp\Client as GuzzleClient;
// use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;

class GoutteController extends Controller
{
    public function doWebScraping()
    {
        // $goutteClient = new Client();
        // $guzzleClient = new GuzzleClient(array(
        //     'timeout' => 60,
        //     'verify' => false
        // ));
        // $goutteClient->setClient($guzzleClient);
        // $crawler = $goutteClient->request('GET', 'https://singerbd.com/');
        // $crawler->filter('.price-container .price')->each(function ($node) {
        //     dd($node->text());
        // });

        //url
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://singerbd.com/');



        $html = ''.$res->getBody();

        $crawler = new Crawler($html);

        //loop through the data
        $items = $crawler->filter('.product-item')->each(function (Crawler $node, $i) {
            $item = [];
            $item['image'] =  $node->filter('img')->attr('src');
            $item['url'] =  $node->filter('.product-item-link')->attr('href');
            $item['name'] = $node->filter('.product-item-link')->text();
            $item['model'] = $node->filter('.product_model_name_home')->text();
            $item['price'] = $node->filter('.price-wrapper')->attr('data-price-amount');
            return $item;
        });


        return view('test',compact('items'));





    }
}
