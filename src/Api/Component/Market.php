<?php

namespace Jaytaph\Spacetraders\Api\Component;

class Market {
    public string $symbol;
    /** @var Export[] */
    public array $exports;
    /** @var Import[] */
    public array $imports;
    /** @var Exchange[] */
    public array $exchange;
    /** @var Transaction[] */
    public array $transactions;
    /** @var Tradegood[] */
    public array $tradegoods;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->symbol = $data['symbol'];
        $result->exports = array_map(function ($export) {
            return Export::fromJson($export);
        }, $data['exports']);
        $result->imports = array_map(function ($import) {
            return Import::fromJson($import);
        }, $data['imports']);
        $result->exchange = array_map(function ($exchange) {
            return Exchange::fromJson($exchange);
        }, $data['exchange']);
        $result->transactions = array_map(function ($transaction) {
            return Transaction::fromJson($transaction);
        }, $data['transactions']);
        $result->tradegoods = array_map(function ($tradegood) {
            return Tradegood::fromJson($tradegood);
        }, $data['tradeGoods']);

        return $result;
    }
}
