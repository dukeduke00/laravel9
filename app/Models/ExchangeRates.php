<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExchangeRates extends Model
{

    const CURRENCY_USD = 'usd';
    const CURRENCY_EUR = 'eur';
    const CURRENCY_RUB = 'rub';
    const CURRENCY_BAM = 'bam';

    const AVAILABLE_CURRENCIES = [
        self::CURRENCY_USD, self::CURRENCY_EUR, self::CURRENCY_RUB, self::CURRENCY_BAM,
    ];



    protected $table = 'exchange_rates';

    protected $fillable = [
        'currency', 'value',
    ];
    public static function getCurrencyForToday($currency)
    {
        return self::where('currency', $currency)
            ->whereDate('created_at', Carbon::now())
            ->first();
    }


}
