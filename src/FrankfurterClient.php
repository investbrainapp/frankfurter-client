<?php

declare(strict_types=1);

namespace Investbrain\Frankfurter;

use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class FrankfurterClient
{
    protected string $baseUrl;

    protected \Illuminate\Http\Client\PendingRequest $client;

    public function __construct()
    {
        $this->baseUrl = config('frankfurter.base_url');
        $this->client = Http::baseUrl($this->baseUrl);
    }

    public function setSymbols(string|array $symbols): void
    {
        $this->client->withQueryParameters(['symbols' => Arr::wrap($symbols)]);
    }

    public function setBaseCurrency(string $currency): void
    {
        $this->client->withQueryParameters(['base' => $currency]);
    }

    public function latest(): array
    {
        return $this->client->get('latest')->json();
    }

    public function historical(string|\DateTime $date): array
    {
        return $this->client->get(Carbon::parse($date)->format('Y-m-d'))->json();
    }

    public function timeSeries(string|\DateTime $start, mixed $end = null): array
    {
        $end = is_null($end) ? null : Carbon::parse($end)->format('Y-m-d');

        return $this->client->get(Carbon::parse($start)->format('Y-m-d').'..'.$end)->json();
    }

    public function currencies(): array
    {
        return $this->client->get('currencies')->json();
    }
}
