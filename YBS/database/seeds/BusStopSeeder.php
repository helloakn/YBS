<?php

use Illuminate\Database\Seeder;

use App\Models\Township;

class BusStopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tws = new Township();
        $tws->name = 'test';
        $tws->lat = 16.7844129;
        $tws->lag = 16.7844129;
        $tws->save();

        /*
        //
//ALTER TABLE Bus_Stop AUTO_INCREMENT = 1
        $map = explode("|","{16.9197,96.0642}|{16.8967,96.0641}|{16.8919,96.0629}|{16.8901,96.0623}|{16.8894,96.0622}|{16.887,96.0616}|{16.8819,96.0613}|{16.876,96.0628}|{16.8741,96.0515}|{16.8793,96.0507}|{16.8848,96.0498}|{16.889,96.0513}|{16.9228,96.0548}|{16.9197,96.0642}");
        $bstop = explode("|","Shwe Lin Pan Lan Sone|Koe-Sae-Chauk Gate Haung|Shwe Thee Lay|Sae-Ngar Zay Lay|Gate Haung|Kan Baw Za|Tayar-Tone Gate Haung|Yone Shae|Mee Khwat Zay|Chauk Tha Ma|Shwe Myin Pyan|Ah Hta Ka Thone|Awine|Shwe Lin Pan Lan Sone");
        $index = 0;
        foreach ($map as $m) {
            
            $m  = str_replace("{", "", $m);
            $m  = str_replace("}", "", $m);
            $m = explode(",",$m);
            //echo $m[0];

            DB::table('Bus_Stop')->insert([
                'name' => $bstop[$index],
                'lat' => $m[0],
                'lag' => $m[1],
            ]);
            $index = $index + 1;
        }


        $map = explode("|","{16.9359,96.18}|{16.9345,96.1802}|{16.9313,96.1806}|{16.9272,96.1823}|{16.9247,96.1794}|{16.9233,96.1762}|{16.922,96.1718}|{16.9217,96.1697}|{16.921,96.1674}|{16.9186,96.163}|{16.9131,96.1652}|{16.911,96.1659}|{16.9072,96.1661}|{16.904,96.1654}|{16.9013,96.1641}|{16.899,96.1622}|{16.8968,96.1595}|{16.8929,96.1546}|{16.8903,96.1536}|{16.8818,96.1551}|{16.8786,96.1559}|{16.8742,96.1567}|{16.8672,96.1544}|{16.8669,96.1526}|{16.8668,96.1434}|{16.8659,96.1418}|{16.8676,96.1373}|{16.8667,96.1287}|{16.8663,96.126}|{16.8632,96.1224}|{16.8613,96.1205}|{16.8612,96.1184}|{16.8602,96.1129}|{16.8595,96.1094}|{16.8545,96.0891}|{16.8568,96.0823}|{16.8585,96.0775}|{16.86,96.0732}|{16.8615,96.0689}|{16.8626,96.0642}|{16.8644,96.0549}|{16.8648,96.0526}|{16.8683,96.0442}|{16.8724,96.0383}|{16.8745,96.0332}|{16.8781,96.0243}|{16.8784,96.0231}|{16.8742,96.033}|{16.8723,96.0379}|{16.868,96.0442}|{16.8646,96.0525}|{16.8641,96.0549}|{16.8622,96.0641}|{16.8614,96.0684}|{16.8599,96.0729}|{16.8584,96.0773}|{16.8567,96.0821}|{16.8544,96.0889}|{16.8594,96.1091}|{16.8601,96.1129}|{16.8611,96.1184}|{16.8612,96.1207}|{16.8631,96.1224}|{16.8661,96.1261}|{16.8665,96.1287}|{16.8674,96.1374}|{16.8647,96.1412}|{16.8668,96.1525}|{16.8673,96.1548}|{16.8741,96.1569}|{16.8781,96.1562}|{16.8818,96.1556}|{16.8872,96.1544}|{16.8927,96.1552}|{16.8965,96.1594}|{16.899,96.1623}|{16.9015,96.1644}|{16.9042,96.1656}|{16.907,96.1662}|{16.9107,96.166}|{16.9131,96.1655}|{16.9173,96.1637}|{16.9189,96.1633}|{16.9207,96.1679}|{16.9213,96.1699}|{16.9216,96.1719}|{16.9229,96.1764}|{16.9243,96.1794}|{16.9265,96.1821}|{16.9313,96.1809}|{16.9344,96.1804}|{16.9359,96.1803}");
        $bstop = explode("|","Sae-Chauk Kwae|Shwe La Min|Parami|Min Htoo Kyaw|Sal Myaung|Hmaw Kyun|Kar Gyi Gate|Dhamar Yon|Kyaung Lan|Chauk Kwae|Kan Tharyar|Ou Zanar|Eindar|Thu Nandar|Waziyar|Thandar|Ga-gyi Zay|Myauk Okkalar Awine|Kyauk Yae Twin|Phone Gyi Lan|Hnit Zay|Ngar Lan|Lan Wa/ Nawaday|Nawaday|Myaing Hay Wun|Shit Mile|Ye Baw Haung|Kyaik Wine|Ye Yan Aung|Thamine Lan Son|Kyway Tit|U Ba Han|Zay Butar|Bayint Naung Lan Sone|Tat Htate|Set Hmu Zone|Bogyoke|Ah Sint Myint|Nawaday|Paya Lan|Sauk Lote Yae|Out Htate|Toe Chae|B.O.C|Thama Kone|Dagon Ayar A Way Pyay|Dagon Ayar A Way Pyay|Thama Kone|B.O.C|Toe Chae|Out Htate|Sauk Lote Yae|Paya Lan|Nawaday|Ah Sint Myint|Bogyoke|Set Hmu Zone|Tat Htate|Bayint Naung Lan Sone|Zay Butar|U Ba Han|Kyway Tit|Thamine Lan Son|Ye Yan Aung|Kyaik Wine|Ye Baw Haung|Shit Mile|Nawaday|Lan Wa/ Nawaday|Ngar Lan|Hnit Zay|Phone Gyi Lan|Kyauk Yae Twin|Myauk Okkalar Awine|Ga-gyi Zay|Thandar|Waziyar|Thu Nandar|Eindar|Ou Zanar|Kan Tharyar|Ayar|Chauk Kwae|Kyaung Lan|Dhamar Yon|Kar Gyi Gate|Hmaw Kyun|Sal Myaung|Min Htoo Kyaw|Parami|Shwe La Min|Sae-Chauk Kwae");
        $index = 0;
        foreach ($map as $m) {
            
            $m  = str_replace("{", "", $m);
            $m  = str_replace("}", "", $m);
            $m = explode(",",$m);
            //echo $m[0];

            $count = DB::table('Bus_Stop')
                     ->where('name', '=',$bstop[$index])
                     ->count();
            if($count==0){
                DB::table('Bus_Stop')->insert([
                    'name' => $bstop[$index],
                    'lat' => $m[0],
                    'lag' => $m[1],
                ]);
            }
            
            $index = $index + 1;
        }

*/

    }
}
