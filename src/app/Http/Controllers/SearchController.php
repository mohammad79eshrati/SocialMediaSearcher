<?php

namespace App\Http\Controllers;

use App\Models\Instagram;
use App\Models\News;
use App\Models\Twitter;
use Date;
use Decimal\Decimal;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // example of request
        // search?body=search_keyword&source=source_keyword&start_date=2023-01-01&end_date=2023-01-31
        $query = $this->prepareElasticQuery($request);

        // Search in the News index
//        $newsResults = News::search($query)->get();


        // Search in the Instagram index
        $instagramResults = Instagram::search($query)->get();

        // Search in the Twitter index
//        $twitterResults = Twitter::search($query)->get();


//        return compact( 'twitterResults','newsResults','instagramResults');
        return compact( 'instagramResults');
    }

    public function prepareElasticQuery(Request $request): bool|string
    {
        $bodyKeyword = $request->input('body');
        $sourceKeyword = $request->input('source');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

// Build the Elasticsearch query array
        $query = [
            'query' => [
                'bool' => [

                ],
            ],
        ];

// Add the 'match' clause for 'body' if search keyword is provided
        if ($bodyKeyword) {
            $query['query']['bool']['must'][] = [
                'match' => [
                    'body' => $bodyKeyword,
                ],
            ];
        }

// Add the 'match' clause for 'source' if source keyword is provided
        if ($sourceKeyword) {
            $query['query']['bool']['must'][] = [
                'match' => [
                    'source' => $sourceKeyword,
                ],
            ];
        }

// Add the 'range' clause for 'created_at' if start and end dates are provided
        if ($startDate && $endDate) {

            $query['query']['bool']['filter'][] = [

                'range' => [
                    'created_at' => [
                        'gte' => $startDate ,
                        'lte' => $endDate
                    ],
                ],
            ];
        }

// Convert the array to JSON

        return json_encode($query, JSON_PRETTY_PRINT);
    }
}
