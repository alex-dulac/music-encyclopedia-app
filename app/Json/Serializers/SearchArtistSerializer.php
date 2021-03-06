<?php

namespace App\Json\Serializers;

use App\Services\IocRoutine;

class SearchArtistSerializer
{
    use IocRoutine;

    public function serialize(array $searchResults)
    {
        if ($searchResults['count'] === 0) {
            return false;
        }

        $artists = [];

        foreach ($searchResults['artists'] as $searchResult) {
            $tags = [];
            $country = '';

            if (isset($searchResult['tags'])) {
                foreach ($searchResult['tags'] as $tag) {
                    $tags[] = $tag['name'];
                }
            }

            if (isset($searchResult['country'])) {
                $country = $this->getCountryService()->getCountryNameFromCountryCode($searchResult['country']);
            }

            $artists[] = [
                'id' => $searchResult['id'],
                'name' => $searchResult['name'],
                'country' => $country ?? '',
                'establishedYear' => $searchResult['life-span']['begin'] ?? null,
                'disbandedYear' => $searchResult['life-span']['ended'] ?? null,
                'tags' => $tags
            ];
        }

        return $artists;
    }

}
