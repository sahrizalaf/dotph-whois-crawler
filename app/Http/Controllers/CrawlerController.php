<?php

namespace App\Http\Controllers;

use Goutte\Client;
use GuzzleHttp\Promise\Promise;

class CrawlerController extends Controller
{
    public function crawl(string $domain)
    {
       try {
           $client = new \GuzzleHttp\Client();
           $response = $client->request('GET', "https://whois.dot.ph/?utf8=%E2%9C%93&search=$domain&button=");
           $body = (string) $response->getBody();
           $dom = new \DOMDocument();
           @$dom->loadHTML($body);

           $divAboutWhois = $dom->getElementById('about-whois');

           if($divAboutWhois){
               $searchForDivResultWhois = $divAboutWhois->getElementsByTagName('div');
               $found = false;

               foreach($searchForDivResultWhois as $div){
                    if($div->getAttribute('id') == 'result-whois'){
                        $found = true;
                        break;
                    }
               }

               return response()->json($found);
           }

       } catch(\Exception $e) {
           echo "Error crawling : " . $e->getMessage() . "\n";
       }
    }
}
