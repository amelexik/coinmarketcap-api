<?php

namespace coinmarketcap\api;

use coinmarketcap\api\tools\Request;

/**
 * CoinMarketCap API Wrapper.
 *
 * @category CoinMarketCap API
 * @author Dmytro Zarezenko <dmytro.zarezenko@gmail.com>
 * @copyright (c) 2017, Dmytro Zarezenko
 *
 * @git https://github.com/amelexik/coinmarketcap-api
 * @license http://opensource.org/licenses/MIT
 */
class CoinMarketCap {

    const API_URL = "https://api.coinmarketcap.com/v2/";

    /**
     * Returns Ticker data.
     *
     * @param int $start record limit start
     * @param int $limit only returns the top limit results.
     * @param string $convert return price, 24h volume, and market cap in terms
     *           of another currency.
     *        Valid values are:
     *           "AUD", "BRL", "CAD", "CHF", "CNY", "EUR", "GBP", "HKD", "IDR",
     *           "INR", "JPY", "KRW", "MXN", "RUB"
     *
     * @return array
     */
    public static function getTicker($start = 1, $limit = 10, $convert = "USD") {
        return Request::exec(self::API_URL . "ticker/", [
            'start' => $start,
            'limit' => $limit,
            'convert' => $convert
        ]);
    }

    /**
     * Returns specified currency Ticker data.
     *
     * @param string $currency Currency name.
     * @param string $convert return price, 24h volume, and market cap in terms
     *           of another currency.
     *        Valid values are:
     *           "AUD", "BRL", "CAD", "CHF", "CNY", "EUR", "GBP", "HKD", "IDR",
     *           "INR", "JPY", "KRW", "MXN", "RUB"
     *
     * @return array
     */
    public static function getCurrencyTicker($currency = "bitcoin", $convert = "USD") {
        return Request::exec(self::API_URL . "ticker/{$currency}/", [
            'convert' => $convert
        ]);
    }

    /**
     * Returns global data.
     *
     * @param string $convert return price, 24h volume, and market cap in terms
     *           of another currency.
     *        Valid values are:
     *           "AUD", "BRL", "CAD", "CHF", "CNY", "EUR", "GBP", "HKD", "IDR",
     *           "INR", "JPY", "KRW", "MXN", "RUB"
     *
     * @return array
     */
    public static function getGlobalData($convert = "USD") {
        return Request::exec(self::API_URL . "global/", [
            'convert' => $convert
        ]);
    }

    /**
     * Демонстрирует все действующие листинги криптовалют в одном вызове
     * https://coinmarketcap.com/ru/api/#endpoint_listings
     * @return array
     */
    public static function getListings(){
        return Request::exec(self::API_URL . "listings/");
    }

}
