<?php

namespace App\Services;

use Google\Analytics\Data\V1beta\BetaAnalyticsDataClient;
use Google\Analytics\Data\V1beta\Dimension;
use Google\Analytics\Data\V1beta\Metric;

class GoogleAnalyticsService
{
    protected $propertyId;
    protected $client;

    public function __construct()
    {
        $this->propertyId = env('GA4_PROPERTY_ID'); // Set this in your .env
        $this->client = new BetaAnalyticsDataClient([
            'credentials' => storage_path('app/ga-credentials.json'), // Place your JSON here
        ]);
    }

    public function getRealtimeAnalytics()
    {
        $response = $this->client->runRealtimeReport([
            'property' => 'properties/' . $this->propertyId,
            'dimensions' => [
                new Dimension(['name' => 'country']),
            ],
            'metrics' => [
                new Metric(['name' => 'activeUsers']),
            ],
        ]);

        $realtimeUsers = 0;
        $topCountries = [];

        foreach ($response->getRows() as $row) {
            $dimensions = $row->getDimensionValues();
            $metrics = $row->getMetricValues();

            $realtimeUsers += (int)$metrics[0]->getValue();

            $topCountries[] = [
                'country' => $dimensions[0]->getValue(),
                'activeUsers' => (int)$metrics[0]->getValue(),
            ];
        }

        $topCountries = collect($topCountries)
            ->groupBy('country')
            ->map(function ($items) {
                return [
                    'country' => $items[0]['country'],
                    'activeUsers' => $items->sum('activeUsers'),
                ];
            })
            ->sortByDesc('activeUsers')
            ->take(5)
            ->values()
            ->toArray();

        return [
            'realtimeUsers' => array_sum(array_column($topCountries, 'activeUsers')),
            'activePages' => [], // Not available in Realtime API
            'topCountries' => $topCountries,
        ];
    }
}