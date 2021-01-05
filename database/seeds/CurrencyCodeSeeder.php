<?php

use App\CurrencyCode;
use Illuminate\Database\Seeder;

class CurrencyCodeSeeder extends Seeder
{
    const CurrencyCodes = [
        [
            'code_n' => '008',
            'code_c' => 'ALL',
            'name' => 'Lek'
        ],
        [
            'code_n' => '012',
            'code_c' => 'DZD',
            'name' => 'Əlcəzair dinarı'
        ],
        [
            'code_n' => '032',
            'code_c' => 'ARS',
            'name' => 'Argentina pesosu'
        ],
        [
            'code_n' => '036',
            'code_c' => 'AUD',
            'name' => 'Avstraliya Dolları'
        ],
        [
            'code_n' => '044',
            'code_c' => 'BSD',
            'name' => 'Baham dolları'
        ],
        [
            'code_n' => '048',
            'code_c' => 'BHD',
            'name' => 'Bəhreyn dinarı'
        ],
        [
            'code_n' => '050',
            'code_c' => 'BDT',
            'name' => 'Taka'
        ],
        [
            'code_n' => '051',
            'code_c' => 'AMD',
            'name' => 'Erməni dramı'
        ],
        [
            'code_n' => '052',
            'code_c' => 'BBD',
            'name' => 'Barbados dolları'
        ],
        [
            'code_n' => '060',
            'code_c' => 'BMD',
            'name' => 'Bermud dolları'
        ],
        [
            'code_n' => '064',
            'code_c' => 'BTN',
            'name' => 'Nqultrum'
        ],
        [
            'code_n' => '068',
            'code_c' => 'BOB',
            'name' => 'Boliviano'
        ],
        [
            'code_n' => '072',
            'code_c' => 'BWP',
            'name' => 'Pula'
        ],
        [
            'code_n' => '084',
            'code_c' => 'BZD',
            'name' => 'Beliz dolları'
        ],
        [
            'code_n' => '090',
            'code_c' => 'SBD',
            'name' => 'Solomon adaları dolları'
        ],
        [
            'code_n' => '096',
            'code_c' => 'BND',
            'name' => 'Bruney dolları'
        ],
        [
            'code_n' => '104',
            'code_c' => 'MMK',
            'name' => 'Kyat'
        ],
        [
            'code_n' => '108',
            'code_c' => 'BIF',
            'name' => 'Burundi frankı'
        ],
        [
            'code_n' => '116',
            'code_c' => 'KHR',
            'name' => 'Riel'
        ],
        [
            'code_n' => '124',
            'code_c' => 'CAD',
            'name' => 'Kanada dolları'
        ],
        [
            'code_n' => '132',
            'code_c' => 'CVE',
            'name' => 'Eskudo Kabo-Verde'
        ],
        [
            'code_n' => '136',
            'code_c' => 'KYD',
            'name' => 'Kayman adaları dolları'
        ],
        [
            'code_n' => '144',
            'code_c' => 'LKR',
            'name' => 'Şri-Lanka rupisi'
        ],
        [
            'code_n' => '152',
            'code_c' => 'CLP',
            'name' => 'Çili pesosu'
        ],
        [
            'code_n' => '156',
            'code_c' => 'CNY',
            'name' => 'Çin yuanı'
        ],
        [
            'code_n' => '170',
            'code_c' => 'COP',
            'name' => 'Kolumbiya pesosu'
        ],
        [
            'code_n' => '174',
            'code_c' => 'KMF',
            'name' => 'Frank Komor adaları'
        ],
        [
            'code_n' => '188',
            'code_c' => 'CRC',
            'name' => 'Kostarika kolonu'
        ],
        [
            'code_n' => '191',
            'code_c' => 'HRK',
            'name' => 'Kuna'
        ],
        [
            'code_n' => '192',
            'code_c' => 'CUP',
            'name' => 'Kuba pesosu'
        ],
        [
            'code_n' => '203',
            'code_c' => 'CZK',
            'name' => 'Çex kronu'
        ],
        [
            'code_n' => '208',
            'code_c' => 'DKK',
            'name' => 'Danimarka kronu'
        ],
        [
            'code_n' => '214',
            'code_c' => 'DOP',
            'name' => 'Dominikan pesosu'
        ],
        [
            'code_n' => '222',
            'code_c' => 'SVC',
            'name' => 'Salvador kolonu'
        ],
        [
            'code_n' => '230',
            'code_c' => 'ETB',
            'name' => 'Efiopiya bırı'
        ],
        [
            'code_n' => '232',
            'code_c' => 'ERN',
            'name' => 'Nakfa'
        ],
        [
            'code_n' => '238',
            'code_c' => 'FKP',
            'name' => 'Folklend adaları funtu'
        ],
        [
            'code_n' => '242',
            'code_c' => 'FJD',
            'name' => 'Fici dolları'
        ],
        [
            'code_n' => '262',
            'code_c' => 'DJF',
            'name' => 'Cibuti frankı'
        ],
        [
            'code_n' => '270',
            'code_c' => 'GMD',
            'name' => 'Dalasi'
        ],
        [
            'code_n' => '292',
            'code_c' => 'GIP',
            'name' => 'Hibraltar funtu'
        ],
        [
            'code_n' => '320',
            'code_c' => 'GTQ',
            'name' => 'Ketsal'
        ],
        [
            'code_n' => '324',
            'code_c' => 'GNF',
            'name' => 'Qvineya frankı'
        ],
        [
            'code_n' => '328',
            'code_c' => 'GYD',
            'name' => 'Qayana dolları'
        ],
        [
            'code_n' => '332',
            'code_c' => 'HTG',
            'name' => 'Qurd'
        ],
        [
            'code_n' => '340',
            'code_c' => 'HNL',
            'name' => 'Lempira'
        ],
        [
            'code_n' => '344',
            'code_c' => 'HKD',
            'name' => 'Honkonq dolları'
        ],
        [
            'code_n' => '348',
            'code_c' => 'HUF',
            'name' => 'Forint'
        ],
        [
            'code_n' => '352',
            'code_c' => 'ISK',
            'name' => 'İsland kronu'
        ],
        [
            'code_n' => '356',
            'code_c' => 'INR',
            'name' => 'Hindistan rupisi'
        ],
        [
            'code_n' => '360',
            'code_c' => 'IDR',
            'name' => 'İndoneziya rupiası'
        ],
        [
            'code_n' => '364',
            'code_c' => 'IRR',
            'name' => 'İran rialı'
        ],
        [
            'code_n' => '368',
            'code_c' => 'IQD',
            'name' => 'İrak dinarı'
        ],
        [
            'code_n' => '376',
            'code_c' => 'ILS',
            'name' => 'İsrail şekeli'
        ],
        [
            'code_n' => '388',
            'code_c' => 'JMD',
            'name' => 'Yamay dolları'
        ],
        [
            'code_n' => '392',
            'code_c' => 'JPY',
            'name' => 'Yapon yeni'
        ],
        [
            'code_n' => '398',
            'code_c' => 'KZT',
            'name' => 'Qazaxıstan tengəsi'
        ],
        [
            'code_n' => '400',
            'code_c' => 'JOD',
            'name' => 'İordan dinarı'
        ],
        [
            'code_n' => '404',
            'code_c' => 'KES',
            'name' => 'Keniya şillinqi'
        ],
        [
            'code_n' => '408',
            'code_c' => 'KPW',
            'name' => 'Şimali Koreya vonu'
        ],
        [
            'code_n' => '410',
            'code_c' => 'KRW',
            'name' => 'Cənubi Korea vonu'
        ],
        [
            'code_n' => '414',
            'code_c' => 'KWD',
            'name' => 'Küveyt dinarı'
        ],
        [
            'code_n' => '417',
            'code_c' => 'KGS',
            'name' => 'Qırğız somu'
        ],
        [
            'code_n' => '418',
            'code_c' => 'LAK',
            'name' => 'Kip'
        ],
        [
            'code_n' => '422',
            'code_c' => 'LBP',
            'name' => 'Livan funtu'
        ],
        [
            'code_n' => '426',
            'code_c' => 'LSL',
            'name' => 'Loti'
        ],
        [
            'code_n' => '430',
            'code_c' => 'LRD',
            'name' => 'Liberiya dolları'
        ],
        [
            'code_n' => '434',
            'code_c' => 'LYD',
            'name' => 'Liviya dinarı'
        ],
        [
            'code_n' => '446',
            'code_c' => 'MOP',
            'name' => 'Pataka'
        ],
        [
            'code_n' => '454',
            'code_c' => 'MWK',
            'name' => '(Malaviya) kvaçası'
        ],
        [
            'code_n' => '458',
            'code_c' => 'MYR',
            'name' => 'Malayziya rinqqiti'
        ],
        [
            'code_n' => '462',
            'code_c' => 'MVR',
            'name' => 'Rufiya'
        ],
        [
            'code_n' => '478',
            'code_c' => 'MRO',
            'name' => 'Uqiya'
        ],
        [
            'code_n' => '480',
            'code_c' => 'MUR',
            'name' => 'Mavriki rupisi'
        ],
        [
            'code_n' => '484',
            'code_c' => 'MXN',
            'name' => 'Yeni Meksika pesosu'
        ],
        [
            'code_n' => '496',
            'code_c' => 'MNT',
            'name' => 'Tuqrik'
        ],
        [
            'code_n' => '498',
            'code_c' => 'MDL',
            'name' => 'Moldav leyi'
        ],
        [
            'code_n' => '504',
            'code_c' => 'MAD',
            'name' => 'Mərakeş dirhəmi'
        ],
        [
            'code_n' => '512',
            'code_c' => 'OMR',
            'name' => 'Oman rialı'
        ],
        [
            'code_n' => '516',
            'code_c' => 'NAD',
            'name' => 'Namibiya dolları'
        ],
        [
            'code_n' => '524',
            'code_c' => 'NPR',
            'name' => 'Nepal rupisi'
        ],
        [
            'code_n' => '532',
            'code_c' => 'ANG',
            'name' => 'Niderland antik quldeni'
        ],
        [
            'code_n' => '533',
            'code_c' => 'AWG',
            'name' => 'Aruban quldeni'
        ],
        [
            'code_n' => '548',
            'code_c' => 'VUV',
            'name' => 'Vatu'
        ],
        [
            'code_n' => '554',
            'code_c' => 'NZD',
            'name' => 'Yeni Zelandiya dolları'
        ],
        [
            'code_n' => '558',
            'code_c' => 'NIO',
            'name' => 'Qızıl Kordoba'
        ],
        [
            'code_n' => '566',
            'code_c' => 'NGN',
            'name' => 'Nayra'
        ],
        [
            'code_n' => '578',
            'code_c' => 'NOK',
            'name' => 'Norveç kronu'
        ],
        [
            'code_n' => '586',
            'code_c' => 'PKR',
            'name' => 'Pakistan rupisi'
        ],
        [
            'code_n' => '590',
            'code_c' => 'PAB',
            'name' => 'Balboa'
        ],
        [
            'code_n' => '598',
            'code_c' => 'PGK',
            'name' => 'Kin'
        ],
        [
            'code_n' => '600',
            'code_c' => 'PYG',
            'name' => 'Quarani'
        ],
        [
            'code_n' => '604',
            'code_c' => 'PEN',
            'name' => 'Yeni sol'
        ],
        [
            'code_n' => '608',
            'code_c' => 'PHP',
            'name' => 'Filippin pesosu'
        ],
        [
            'code_n' => '634',
            'code_c' => 'QAR',
            'name' => 'Qatar rialı'
        ],
        [
            'code_n' => '643',
            'code_c' => 'RUB',
            'name' => 'Rusiya rublu'
        ],
        [
            'code_n' => '646',
            'code_c' => 'RWF',
            'name' => 'Ruanda frankı'
        ],
        [
            'code_n' => '654',
            'code_c' => 'SHP',
            'name' => 'Müqəddəs Yelena Adası'
        ],
        [
            'code_n' => '678',
            'code_c' => 'STD',
            'name' => 'Dobra'
        ],
        [
            'code_n' => '682',
            'code_c' => 'SAR',
            'name' => 'Səudiyyə Ərəbistanı rialı'
        ],
        [
            'code_n' => '690',
            'code_c' => 'SCR',
            'name' => 'Seyşel rupisi'
        ],
        [
            'code_n' => '694',
            'code_c' => 'SLL',
            'name' => 'Leone'
        ],
        [
            'code_n' => '702',
            'code_c' => 'SGD',
            'name' => 'Sinqapur dolları'
        ],
        [
            'code_n' => '704',
            'code_c' => 'VND',
            'name' => 'Donq'
        ],
        [
            'code_n' => '706',
            'code_c' => 'SOS',
            'name' => 'Somali şillinqi'
        ],
        [
            'code_n' => '710',
            'code_c' => 'ZAR',
            'name' => 'Cənubi Afrika randı'
        ],
        [
            'code_n' => '728',
            'code_c' => 'SSP',
            'name' => 'Cənubi Sudan funtu'
        ],
        [
            'code_n' => '748',
            'code_c' => 'SZL',
            'name' => 'Lilanqeni'
        ],
        [
            'code_n' => '752',
            'code_c' => 'SEK',
            'name' => 'İsveç kronu'
        ],
        [
            'code_n' => '756',
            'code_c' => 'CHF',
            'name' => 'İsveçrə frankı'
        ],
        [
            'code_n' => '760',
            'code_c' => 'SYP',
            'name' => 'Suriya funtu'
        ],
        [
            'code_n' => '764',
            'code_c' => 'THB',
            'name' => 'Bat'
        ],
        [
            'code_n' => '776',
            'code_c' => 'TOP',
            'name' => 'Paanqa'
        ],
        [
            'code_n' => '780',
            'code_c' => 'TTD',
            'name' => 'Trinidad və Tobaqo'
        ],
        [
            'code_n' => '784',
            'code_c' => 'AED',
            'name' => 'Dirhəm (BƏƏ)'
        ],
        [
            'code_n' => '788',
            'code_c' => 'TND',
            'name' => 'Tunis dinarı'
        ],
        [
            'code_n' => '800',
            'code_c' => 'UGX',
            'name' => 'Uqanda şillinqi'
        ],
        [
            'code_n' => '807',
            'code_c' => 'MKD',
            'name' => 'Denar'
        ],
        [
            'code_n' => '818',
            'code_c' => 'EGP',
            'name' => 'Misir funtu'
        ],
        [
            'code_n' => '826',
            'code_c' => 'GBP',
            'name' => 'İngilis funt sterlinqi'
        ],
        [
            'code_n' => '834',
            'code_c' => 'TZS',
            'name' => 'Tanzaniya şillinqi'
        ],
        [
            'code_n' => '840',
            'code_c' => 'USD',
            'name' => 'ABŞ dolları'
        ],
        [
            'code_n' => '858',
            'code_c' => 'UYU',
            'name' => 'Uruqvay pesosu'
        ],
        [
            'code_n' => '860',
            'code_c' => 'UZS',
            'name' => 'Uzbekistan Somu'
        ],
        [
            'code_n' => '882',
            'code_c' => 'WST',
            'name' => 'Tala'
        ],
        [
            'code_n' => '886',
            'code_c' => 'YER',
            'name' => 'Yəmən rialı'
        ],
        [
            'code_n' => '894',
            'code_c' => 'ZMK',
            'name' => 'Kvaça (Zambiya)'
        ],
        [
            'code_n' => '901',
            'code_c' => 'TWD',
            'name' => 'Yeni Tayvan dolları'
        ],
        [
            'code_n' => '931',
            'code_c' => 'CUC',
            'name' => 'Konvertasiya edilən peso'
        ],
        [
            'code_n' => '932',
            'code_c' => 'AZN',
            'name' => 'Azərbaycan manatı'
        ],
        [
            'code_n' => '933',
            'code_c' => 'BYN',
            'name' => 'Belarus rublu'
        ],
        [
            'code_n' => '934',
            'code_c' => 'TMT',
            'name' => 'Yeni Türkmən manatı'
        ],
        [
            'code_n' => '936',
            'code_c' => 'GHS',
            'name' => 'Qana sedi'
        ],
        [
            'code_n' => '937',
            'code_c' => 'VEF',
            'name' => 'Bolivar fuertesi'
        ],
        [
            'code_n' => '938',
            'code_c' => 'SDG',
            'name' => 'Sudan funtu'
        ],
        [
            'code_n' => '940',
            'code_c' => 'UYI',
            'name' => 'Uruqvay pesosu indekslənən vahidlərdə'
        ],
        [
            'code_n' => '941',
            'code_c' => 'RSD',
            'name' => 'Serb dinarı'
        ],
        [
            'code_n' => '943',
            'code_c' => 'MZN',
            'name' => 'Mozambik metikalı'
        ],
        [
            'code_n' => '946',
            'code_c' => 'RON',
            'name' => 'Yeni rumın leyi'
        ],
        [
            'code_n' => '949',
            'code_c' => 'TRY',
            'name' => 'Türk lirəsi'
        ],
        [
            'code_n' => '950',
            'code_c' => 'XAF',
            'name' => 'KFA VEAS frankı'
        ],
        [
            'code_n' => '951',
            'code_c' => 'XCD',
            'name' => 'Şərqi-karib dolları'
        ],
        [
            'code_n' => '952',
            'code_c' => 'XOF',
            'name' => 'KFA VSEAO frankı'
        ],
        [
            'code_n' => '953',
            'code_c' => 'XPF',
            'name' => 'KFP frankı'
        ],
        [
            'code_n' => '960',
            'code_c' => 'XDR',
            'name' => 'SDR (Xüsusi hüquqi a)'
        ],
        [
            'code_n' => '968',
            'code_c' => 'SRD',
            'name' => 'Surinam dolları'
        ],
        [
            'code_n' => '969',
            'code_c' => 'MGA',
            'name' => 'Malaqasiya ariarisi'
        ],
        [
            'code_n' => '970',
            'code_c' => 'COU',
            'name' => 'Həqiqi dəyər vahidi'
        ],
        [
            'code_n' => '971',
            'code_c' => 'AFN',
            'name' => 'Əfqani'
        ],
        [
            'code_n' => '972',
            'code_c' => 'TJS',
            'name' => 'Tacik somonisi'
        ],
        [
            'code_n' => '973',
            'code_c' => 'AOA',
            'name' => 'Kvanza'
        ],
        [
            'code_n' => '975',
            'code_c' => 'BGN',
            'name' => 'Bolqar levı'
        ],
        [
            'code_n' => '976',
            'code_c' => 'CDF',
            'name' => 'Konqo frankı'
        ],
        [
            'code_n' => '977',
            'code_c' => 'BAM',
            'name' => 'Konvertasiya edilən mark'
        ],
        [
            'code_n' => '978',
            'code_c' => 'EUR',
            'name' => 'Avro'
        ],
        [
            'code_n' => '980',
            'code_c' => 'UAH',
            'name' => 'Ukrayna qrivnası'
        ],
        [
            'code_n' => '981',
            'code_c' => 'GEL',
            'name' => 'Gürcü larisi'
        ],
        [
            'code_n' => '985',
            'code_c' => 'PLN',
            'name' => 'Zlotı'
        ],
        [
            'code_n' => '986',
            'code_c' => 'BRL',
            'name' => 'Braziliya realı'
        ]
    ];


    /** Run the database seeds. @return void */
    public function run()
    {
        foreach (self::CurrencyCodes as $currencyCode) {
            CurrencyCode::query()->firstOrCreate(
                [
                    'code_n' => $currencyCode['code_n'],
                    'code_c' => $currencyCode['code_c'],
                ],
                [
                    'name' => $currencyCode['name']
                ]
            );
        }
    }
}
