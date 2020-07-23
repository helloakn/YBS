<?php

use Illuminate\Database\Seeder;

use App\Models\Township;
use App\Models\Bus_Line;
use App\Models\Bus_Line_Route;
use App\Models\Bus_Stop;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function insertBusLine($number,$color){
        $busLine = Bus_Line::where('bus_line_number','=',$number)->where('bus_line_color','=',$color)->first();
        if($busLine){
            //old
            return $busLine->id;
        }
        else{
            //new
            $busLine = new Bus_Line();
            $busLine->bus_line_number = $number;
            $busLine->bus_line_color = $color;
            $busLine->save();
            return $busLine->id;
        }
    }
    public function insertBusLineRoute($busLine,$busStop,$index){
        $busLineRoute = Bus_Line_Route::where('bus_line_id','=',$busLine)->where('bus_stop_id','=',$busStop)->first();
        if($busLineRoute){
            //old
            echo "already has bus line route ". $busLineRoute->id . "\n";
        }
        else{
            //new
            $busLineRoute = new Bus_Line_Route();
            $busLineRoute->type = $index==0 ? 0 : 1;
            $busLineRoute->bus_line_id = $busLine;
            $busLineRoute->bus_stop_id = $busStop;
            $busLineRoute->quee_no = $index + 1;
            $busLineRoute->save();
            echo "inserted bus line route ". $busLineRoute->id . "\n";
        }
    }

    public function insertBusStop($busline,$map,$bStop){

        $map = explode("|",$map);
        $bStop = explode("|",$bStop);
        
        $index = 0;
        foreach ($map as $m) {
            
            $m  = str_replace("{", "", $m);
            $m  = str_replace("}", "", $m);
            $m = explode(",",$m);

            $busStop = Bus_Stop::where('name','=',$bStop[$index])->first();
            //echo $busStop;
            if($busStop){
                //new
                echo "old bus stop\n";
                $this->insertBusLineRoute($busline,$busStop->id,$index);
            }
            else{
                //old
                echo "new bus stop\n";
                $busStop = new Bus_Stop();
                $busStop->name = $bStop[$index];
                $busStop->lat = $m[0];
                $busStop->lag = $m[1];
                $busStop->save();
                $this->insertBusLineRoute($busline,$busStop->id,$index);
            }
            $index = $index + 1;
        }
    }
    public function run()
    {
        
        $busline = $this->insertBusLine("40","blue");
        $map = "{17.0012,96.0669}|{16.9909,96.0705}|{16.9893,96.071}|{16.9867,96.0718}|{16.983,96.071}|{16.9826,96.0724}|{16.9821,96.0744}|{16.9816,96.076}|{16.9812,96.0772}|{16.9798,96.0769}|{16.9767,96.076}|{16.9723,96.076}|{16.969,96.077}|{16.966,96.0782}|{16.9635,96.0784}|{16.9616,96.0777}|{16.9586,96.0767}|{16.9568,96.0763}|{16.9563,96.0809}|{16.9519,96.082}|{16.9491,96.0827}|{16.9471,96.0831}|{16.9442,96.0843}|{16.9409,96.0857}|{16.9392,96.0867}|{16.9374,96.0866}|{16.9337,96.0876}|{16.9338,96.0933}|{16.9338,96.1019}|{16.9297,96.1006}|{16.9253,96.0982}|{16.9218,96.0975}|{16.918,96.0972}|{16.9154,96.0971}|{16.9121,96.0971}|{16.9065,96.0976}|{16.9038,96.0972}|{16.9008,96.0954}|{16.8985,96.0953}|{16.8958,96.0944}|{16.8902,96.0958}|{16.8864,96.0974}|{16.8849,96.0978}|{16.8818,96.0989}|{16.8796,96.0997}|{16.8753,96.1016}|{16.8715,96.1042}|{16.8642,96.1067}|{16.8625,96.1075}|{16.8513,96.1094}|{16.8482,96.1109}|{16.8433,96.1122}|{16.8409,96.1126}|{16.8378,96.1134}|{16.8335,96.116}|{16.8335,96.1195}|{16.8298,96.1217}|{16.8246,96.1229}|{16.8197,96.1219}|{16.8147,96.1219}|{16.8125,96.1219}|{16.8092,96.1219}|{16.8043,96.1222}|{16.8011,96.1222}|{16.7979,96.1222}|{16.7934,96.1228}|{16.7918,96.1229}|{16.7891,96.1239}|{16.7823,96.1277}|{16.7815,96.1301}|{16.7784,96.1357}|{16.7784,96.1358}|{16.7815,96.1302}|{16.7824,96.1278}|{16.7886,96.1244}|{16.7917,96.1232}|{16.7935,96.123}|{16.7979,96.1223}|{16.801,96.1221}|{16.8042,96.1222}|{16.8092,96.122}|{16.8124,96.122}|{16.8147,96.122}|{16.8192,96.1219}|{16.8245,96.1231}|{16.8293,96.1221}|{16.8333,96.1207}|{16.8337,96.1163}|{16.8369,96.1137}|{16.8407,96.1128}|{16.8436,96.1124}|{16.8481,96.1113}|{16.8515,96.1096}|{16.8568,96.1086}|{16.8645,96.1068}|{16.8717,96.1045}|{16.8757,96.1016}|{16.8796,96.0998}|{16.8816,96.0992}|{16.8848,96.0979}|{16.8863,96.0975}|{16.8902,96.096}|{16.8959,96.0947}|{16.8986,96.0956}|{16.9007,96.0956}|{16.9042,96.0976}|{16.9065,96.0979}|{16.9127,96.0974}|{16.9155,96.0974}|{16.9173,96.0975}|{16.9226,96.0979}|{16.9255,96.0986}|{16.9299,96.1011}|{16.9338,96.102}|{16.9338,96.0944}|{16.934,96.0879}|{16.9374,96.087}|{16.9389,96.087}|{16.9411,96.0859}|{16.944,96.0848}|{16.9472,96.0834}|{16.949,96.0829}|{16.9519,96.0822}|{16.9565,96.081}|{16.957,96.0764}|{16.9585,96.0769}|{16.9615,96.0779}|{16.964,96.0786}|{16.9659,96.0784}|{16.9688,96.0773}|{16.973,96.076}|{16.9765,96.0763}|{16.9795,96.077}|{16.9813,96.0775}|{16.982,96.0761}|{16.9823,96.0745}|{16.9829,96.0724}|{16.9832,96.071}|{16.9868,96.072}|{16.9893,96.0714}|{16.991,96.0708}|{17.0012,96.0672}";
        $bStop = "Auk Gate|Aung Myittar|Aung Chan Thar|Nyein Chan Yae|Na-gyi Kwae|Yone Shae|Koe Thone Lone|Sin Hnat Kaung|Thone Htate|Nga Mauk Zay|Yae Chan Sin|Nawarat|Kyaw Swar|Taw Win|Shwe Nyar Maung|Kar Gyi Gate|Say Khan|Htan Chauk Pin|Kar Lay Gate|Shit-Sae-Tit Gate|Pyaw Bwal|Zin Yaw|Palae Lan|Phone Gyi Kyaung Kwae|Tadar Htate|Tit-Koe-Koe Gate Haung|Sae-Lay Lan Sone|Butar Zay|Danyin Gone Lan Sone|Bo Chan|Ywar Thit|Aung San Zay|Kyaung Gate|Tit Gate|Saung Hnit|Phot Kan Zay|Japan Lan|Pyi Taw Thar|Ywarma|Sayardaw Gyi|Min Zedi|Lay-sae-shit Gate|Pauk Taw Wa|Nyaung Pin|Myo Thit Zay|Padauk Lan|Kyoe Kone Lan Sone|Bayint Naung Zay/ Zay Pwae Yon|Bayint Naung Lan Sone|Buya|Sit Kyawe Yae/ Shaw Yawe|Padauk Chaung/Thiri Mingalar Market|O One|Butar Yon Lan|Chaung Wa|Ywarma Kwae|Yae Kyaung|Thinbaw Kyin|Sinmalite|Nat Sin Lan|Kannar Zay|Kyee Myin Daing Nya Zay|Sar Taik|Thal Kwin|Home Lan|Thiri Mingalar Zay|Kwin Kyaung|Sin Min Zay|Thit Taw|Htaw Li Kwae|Thakhin Mya Pan Chan|Thakhin Mya Pan Chan|Htaw Li Kwae|Thit Taw|Sin Min Zay|Kwin Kyaung|Thiri Mingalar Zay|Home Lan|Thal Kwin|Sar Taik|Kyee Myin Daing Nya Zay|Kannar Zay|Nat Sin Lan|Sinmalite|Thinbaw Kyin|Yae Kyaung|Ywarma Kwae|Chaung Wa|Butar Yon Lan|O One|Padauk Chaung/Thiri Mingalar Market|Sit Kyawe Yae/ Shaw Yawe|Buya|Bayint Naung Lan Sone|Bayint Naung Zay/ Zay Pwae Yon|Kyoe Kone Lan Sone|Padauk Lan|Myo Thit Zay|Nyaung Pin|Pauk Taw Wa|Lay-sae-shit Gate|Min Zedi|Sayardaw Gyi|Ywarma|Pyi Taw Thar|Japan Lan|Phot Kan Zay|Saung Hnit|Tit Gate|Kyaung Gate|Aung San Zay|Ywar Thit|Bo Chan|Danyin Gone Lan Sone|Butar Zay|Sae-Lay Lan Sone|Tit-Koe-Koe Gate Haung|Tadar Htate|Phone Gyi Kyaung Kwae|Palae Lan|Zin Yaw|Pyaw Bwal|Shit-Sae-Tit Gate|Kar Lay Gate|Htan Chauk Pin|Say Khan|Kar Gyi Gate|Shwe Nyar Maung|Taw Win|Kyaw Swar|Nawarat|Yae Chan Sin|Nga Mauk Zay|Thone Htate|Sin Hnat Kaung|Koe Thone Lone|Yone Shae|Na-gyi Kwae|Nyein Chan Yae|Aung Chan Thar|Aung Myittar|Auk Gate";
        $this->insertBusStop($busline,$map,$bStop);

        $busline = $this->insertBusLine("21","blue");
        $map = "{16.9486,96.0137}|{16.9221,96.0545}|{16.9226,96.0697}|{16.9304,96.0828}|{16.9317,96.085}|{16.9332,96.0878}|{16.9337,96.0938}|{16.9338,96.1019}|{16.9297,96.1006}|{16.9253,96.0982}|{16.9218,96.0975}|{16.918,96.0972}|{16.9154,96.0971}|{16.9121,96.0971}|{16.9065,96.0976}|{16.9038,96.0972}|{16.9014,96.0968}|{16.9007,96.0975}|{16.9019,96.1027}|{16.9009,96.1063}|{16.8988,96.1053}|{16.897,96.1049}|{16.8923,96.1056}|{16.8879,96.1075}|{16.8857,96.1096}|{16.8786,96.1124}|{16.8748,96.1163}|{16.8695,96.1195}|{16.8657,96.1207}|{16.8625,96.1217}|{16.8585,96.1232}|{16.8558,96.1235}|{16.8514,96.1243}|{16.8461,96.1255}|{16.8405,96.1268}|{16.8375,96.1274}|{16.8338,96.1286}|{16.8308,96.1294}|{16.828,96.1303}|{16.8173,96.1333}|{16.812,96.1348}|{16.8082,96.136}|{16.8054,96.1367}|{16.7911,96.1409}|{16.7873,96.1421}|{16.7816,96.1442}|{16.7786,96.1449}|{16.7752,96.1449}|{16.7747,96.142}|{16.7752,96.1449}|{16.7779,96.145}|{16.783,96.1436}|{16.7864,96.1424}|{16.7903,96.1413}|{16.7995,96.1386}|{16.8067,96.1365}|{16.8119,96.135}|{16.8179,96.1333}|{16.828,96.1304}|{16.8309,96.1299}|{16.8343,96.1288}|{16.8373,96.1279}|{16.8405,96.127}|{16.8455,96.126}|{16.8518,96.1246}|{16.8557,96.1239}|{16.8585,96.1232}|{16.8613,96.1222}|{16.8648,96.1211}|{16.8695,96.1197}|{16.875,96.1166}|{16.8784,96.113}|{16.8844,96.1104}|{16.8889,96.1072}|{16.8922,96.1059}|{16.8969,96.1051}|{16.8987,96.1057}|{16.9009,96.1067}|{16.9026,96.103}|{16.9008,96.0975}|{16.9014,96.097}|{16.9042,96.0976}|{16.9065,96.0979}|{16.9127,96.0974}|{16.9155,96.0974}|{16.9173,96.0975}|{16.9226,96.0979}|{16.9255,96.0986}|{16.9299,96.1011}|{16.9338,96.102}|{16.9339,96.0939}|{16.9337,96.0881}|{16.9325,96.0854}|{16.9309,96.083}|{16.9228,96.0693}|{16.9228,96.0548}|{16.9488,96.0139}";
        $bStop = "A Nout Paing Takke Tho|Awine|Mile Hnat-sae|Ayar Myay|Tit-Koe-Koe|Sae-Lay Lan Sone|Butar Zay|Danyin Gone Lan Sone|Bo Chan|Ywar Thit|Aung San Zay|Kyaung Gate|Tit Gate|Saung Hnit|Phot Kan Zay|Japan Lan|Pyi Taw Thar/ G.T.I Htate|Pyi Taw Thar|Thayet Taw|Bo Kone|Hight Pak|Ma Nya Ka|Insein Say Yon Gyi|Insein Pan Chan|B.O.C|Kyoe Kone|B.P.I|Kha Wae Chan|Kalar Kyaung|Thamine Lan Son|Paya Lan|Oakyin|Bartar|Than Lan|Thukha|Butar Yon Lan|Sin Yae Twin|San Yeik Nyein|Hledan|Saik Pyoe Yay|Hantharwaddy|Mahar Myaing|Myaynigone|Halpin|Bago Kalat|Sein Gyun|Sanpya|Phone Gyi Lan|Maw Tin|Phone Gyi Lan|Sanpya|Sein Gyun|Bago Kalat|Halpin|Myaynigone|Mahar Myaing|Hantharwaddy|Saik Pyoe Yay|Hledan|San Yeik Nyein|Sin Yae Twin|Butar Yon Lan|Thukha|Than Lan|Bartar|Oakyin|Paya Lan|Thamine Lan Son|Kalar Kyaung|Kha Wae Chan|B.P.I|Kyoe Kone|B.O.C|Insein Pan Chan|Insein Say Yon Gyi|Ma Nya Ka|Hight Pak|Bo Kone|Thayet Taw|Pyi Taw Thar|Pyi Taw Thar/ G.T.I Htate|Japan Lan|Phot Kan Zay|Saung Hnit|Tit Gate|Kyaung Gate|Aung San Zay|Ywar Thit|Bo Chan|Danyin Gone Lan Sone|Butar Zay|Sae-Lay Lan Sone|Tit-Koe-Koe|Ayar Myay|Mile Hnat-sae|Awine|A Nout Paing Takke Tho";
        $this->insertBusStop($busline,$map,$bStop);

        $busline = $this->insertBusLine("39","blue");
        $map = "{17.0012,96.0672}|{17.005,96.0825}|{17.0055,96.0834}|{17.0035,96.0849}|{17.0015,96.0864}|{16.9989,96.0882}|{16.9943,96.0914}|{16.9889,96.0926}|{16.9835,96.0932}|{16.9788,96.0934}|{16.9743,96.0944}|{16.9721,96.0947}|{16.9688,96.0952}|{16.9647,96.0962}|{16.9615,96.0967}|{16.9578,96.0973}|{16.9519,96.0998}|{16.9507,96.1003}|{16.9447,96.1026}|{16.9429,96.1026}|{16.9414,96.1026}|{16.9338,96.1019}|{16.9297,96.1006}|{16.9253,96.0982}|{16.9218,96.0975}|{16.918,96.0972}|{16.9154,96.0971}|{16.9121,96.0971}|{16.9065,96.0976}|{16.9038,96.0972}|{16.9014,96.0968}|{16.8981,96.0991}|{16.8946,96.1018}|{16.8916,96.1042}|{16.8881,96.1057}|{16.8857,96.1096}|{16.8786,96.1124}|{16.8748,96.1163}|{16.8695,96.1195}|{16.8657,96.1207}|{16.8631,96.1215}|{16.8585,96.1232}|{16.8558,96.1235}|{16.8514,96.1243}|{16.8461,96.1255}|{16.8405,96.1268}|{16.8375,96.1274}|{16.8338,96.1286}|{16.8308,96.1294}|{16.828,96.1303}|{16.8173,96.1333}|{16.812,96.1348}|{16.8082,96.136}|{16.8054,96.1367}|{16.7911,96.1409}|{16.7873,96.1421}|{16.783,96.1436}|{16.7779,96.145}|{16.7749,96.1424}|{16.7786,96.1449}|{16.7816,96.1442}|{16.7864,96.1424}|{16.7903,96.1413}|{16.7995,96.1386}|{16.8067,96.1365}|{16.8119,96.135}|{16.8179,96.1333}|{16.828,96.1304}|{16.8309,96.1299}|{16.8343,96.1288}|{16.8373,96.1279}|{16.8405,96.127}|{16.8455,96.126}|{16.8518,96.1246}|{16.8557,96.1239}|{16.8607,96.1225}|{16.8648,96.1211}|{16.8695,96.1197}|{16.875,96.1166}|{16.8784,96.113}|{16.8844,96.1104}|{16.8882,96.1059}|{16.8916,96.1044}|{16.8948,96.1021}|{16.898,96.0994}|{16.9014,96.097}|{16.9042,96.0976}|{16.9065,96.0979}|{16.9127,96.0974}|{16.9155,96.0974}|{16.9173,96.0975}|{16.9226,96.0979}|{16.9255,96.0986}|{16.9299,96.1011}|{16.9338,96.102}|{16.9411,96.1028}|{16.9428,96.1028}|{16.9441,96.1029}|{16.9511,96.1004}|{16.9516,96.1001}|{16.9582,96.0975}|{16.9611,96.0971}|{16.964,96.0965}|{16.9681,96.0958}|{16.9716,96.095}|{16.9737,96.0946}|{16.9786,96.0937}|{16.9839,96.0935}|{16.9889,96.0929}|{16.9944,96.0917}|{16.999,96.0884}|{17.0015,96.0865}|{17.0036,96.0851}|{17.0057,96.0832}|{17.0051,96.0824}|{17.0012,96.0669}";
        $bStop = "Auk Gate|Kyaung Shae|Tar Sone|Kwet Thit|Padonmar|Computer|Nwar Chan|Thabarwa|Thardukan|Ponnya|Oak Pho|Than Phyu|Ye Chauk|Gate Haung|Shwe Pyi Thar Kwae|Sit Tat|Kyaung Lan|Kan Tharyar|Myin Hlae Gate|Phone Gyi Kyaung|Sauk Lote Yae|Danyin Gone Lan Sone|Bo Chan|Ywar Thit|Aung San Zay|Kyaung Gate|Tit Gate|Saung Hnit|Phot Kan Zay|Japan Lan|Pyi Taw Thar/ G.T.I Htate|Ywarma|Aye Theikdi/ Thayet Taw|Insein Say Yon Gyi|Insein Gon Tadar/ Hino Gade|B.O.C|Kyoe Kone|B.P.I|Kha Wae Chan|Kalar Kyaung|Thamine Lan Son|Paya Lan|Oakyin|Bartar|Than Lan|Thukha|Butar Yon Lan|Sin Yae Twin|San Yeik Nyein|Hledan|Saik Pyoe Yay|Hantharwaddy|Mahar Myaing|Myaynigone|Halpin|Bago Kalat|Sein Gyun|Sanpya|Maw Tin|Sanpya|Sein Gyun|Bago Kalat|Halpin|Myaynigone|Mahar Myaing|Hantharwaddy|Saik Pyoe Yay|Hledan|San Yeik Nyein|Sin Yae Twin|Butar Yon Lan|Thukha|Than Lan|Bartar|Oakyin|Thamine Lan Son|Kalar Kyaung|Kha Wae Chan|B.P.I|Kyoe Kone|B.O.C|Insein Gon Tadar/ Hino Gade|Insein Say Yon Gyi|Aye Theikdi/ Thayet Taw|Ywarma|Pyi Taw Thar/ G.T.I Htate|Japan Lan|Phot Kan Zay|Saung Hnit|Tit Gate|Kyaung Gate|Aung San Zay|Ywar Thit|Bo Chan|Danyin Gone Lan Sone|Sauk Lote Yae|Phone Gyi Kyaung|Myin Hlae Gate|Kan Tharyar|Kyaung Lan|Sit Tat|Shwe Pyi Thar Kwae|Gate Haung|Ye Chauk|Than Phyu|Oak Pho|Ponnya|Thardukan|Thabarwa|Nwar Chan|Computer|Padonmar|Kwet Thit|Tar Sone|Kyaung Shae|Auk Gate";
        $this->insertBusStop($busline,$map,$bStop);

        $busline = $this->insertBusLine("62","green");
        $map = "{16.8807671,96.2501934}|{16.8282263,96.1881472}";
        $bStop = "Chauk Sal Hnit ( 62 )|Zawana";
        $this->insertBusStop($busline,$map,$bStop);

        $busline = $this->insertBusLine("5","red");
        $map = "{16.8425,96.2785}|{16.8323,96.2764}|{16.8324,96.27}|{16.8272,96.2691}|{16.8233,96.2677}|{16.8214,96.2661}|{16.8072,96.2325}|{16.8034,96.2242}|{16.8064,96.219}|{16.8065,96.2168}|{16.8051,96.2137}|{16.8039,96.2106}|{16.8039,96.2059}|{16.804,96.2019}|{16.8046,96.1957}|{16.8025,96.1966}|{16.7996,96.1967}|{16.7965,96.1955}|{16.7937,96.1938}|{16.7899,96.1918}|{16.7862,96.1899}|{16.7825,96.1867}|{16.7827,96.1838}|{16.7845,96.1748}|{16.7817,96.1743}|{16.7786,96.1752}|{16.7764,96.1748}|{16.7803,96.1745}|{16.7844,96.175}|{16.7826,96.1828}|{16.7818,96.188}|{16.7856,96.19}|{16.7898,96.1922}|{16.7937,96.1942}|{16.7964,96.1953}|{16.7996,96.1969}|{16.8024,96.1967}|{16.8045,96.1955}|{16.8039,96.2018}|{16.8037,96.2059}|{16.8036,96.2109}|{16.8047,96.2136}|{16.8064,96.2168}|{16.8066,96.2194}|{16.803,96.2238}|{16.8068,96.2323}|{16.8207,96.2659}|{16.8236,96.2681}|{16.8271,96.2694}|{16.8321,96.2702}|{16.8321,96.2766}|{16.8425,96.2795}";
        $bStop ="Shit-sae-koe Kwae|Kanaung Kwae|Moke Oo (Yuzana Garden)|Padauk Kwae|Sae-Tit Lan|Thone-Sae-Hnit Gate|Asean|Sauk Lote Yae|Tayar-Shit Taung|Thaketa Awine|Shit Gate|Myayni|Kyaung Kwae/ Htuu Par Yone|Anawmar|Kyauk Taing|Myayni Lan|Tat Phwet|Tit Zay Kwae|Thadar Yon|Wet Su|Yan Aung|Thinbaw Kyin|Warso|Sar Taik|Pazundaung Zay|Nyaung Tan|Masalar Set/ Gandi|Pazundaung Zay|Sar Taik|Warso|Thinbaw Kyin|Yan Aung|Wet Su|Thadar Yon|Tit Zay Kwae|Tat Phwet|Myayni Lan|Kyauk Taing|Anawmar|Kyaung Kwae/ Htuu Par Yone|Myayni|Shit Gate|Thaketa Awine|Tayar-Shit Taung|Sauk Lote Yae|Asean|Thone-Sae-Hnit Gate|Sae-Tit Lan|Padauk Kwae|Moke Oo (Yuzana Garden)|Kanaung Kwae|Shit-sae-koe Kwae";
        $this->insertBusStop($busline,$map,$bStop);

        $busline = $this->insertBusLine("10","pink");
        $map = "{16.8046,96.2255}|{16.8034,96.2242}|{16.8013,96.2256}|{16.7994,96.2241}|{16.7938,96.2195}|{16.7913,96.2174}|{16.7909,96.2146}|{16.7911,96.2118}|{16.7915,96.21}|{16.7918,96.2077}|{16.7918,96.2066}|{16.793,96.2035}|{16.7939,96.2014}|{16.7953,96.1982}|{16.7965,96.1955}|{16.7996,96.1969}|{16.8024,96.1967}|{16.8045,96.1954}|{16.8157,96.1901}|{16.8231,96.1834}|{16.8262,96.1866}|{16.8276,96.1878}|{16.8326,96.188}|{16.8353,96.1866}|{16.837,96.1858}|{16.8416,96.1832}|{16.8445,96.1813}|{16.8468,96.1796}|{16.8496,96.1777}|{16.8521,96.176}|{16.8548,96.1735}|{16.8562,96.1719}|{16.8543,96.1684}|{16.851,96.1622}|{16.8507,96.1577}|{16.8569,96.1567}|{16.8626,96.1554}|{16.8673,96.1548}|{16.8741,96.1569}|{16.8781,96.1562}|{16.8818,96.1556}|{16.8872,96.1544}|{16.8927,96.1552}|{16.8937,96.1576}|{16.8864,96.1639}|{16.8855,96.1677}|{16.8873,96.171}|{16.8893,96.1751}|{16.8913,96.1788}|{16.8925,96.181}|{16.8935,96.1831}|{16.8947,96.1852}|{16.8955,96.1871}|{16.8974,96.1907}|{16.8985,96.1925}|{16.9005,96.1965}|{16.9012,96.1979}|{16.9022,96.2001}|{16.9049,96.2042}|{16.9103,96.2136}|{16.9105,96.2129}|{16.9045,96.2047}|{16.9027,96.2}|{16.9016,96.198}|{16.9008,96.1963}|{16.8987,96.1926}|{16.8979,96.1906}|{16.8959,96.1869}|{16.8949,96.185}|{16.8939,96.183}|{16.8929,96.181}|{16.8917,96.1786}|{16.8897,96.1749}|{16.8877,96.1708}|{16.886,96.1676}|{16.8866,96.1643}|{16.8938,96.1577}|{16.8929,96.1546}|{16.8903,96.1536}|{16.8818,96.1551}|{16.8786,96.1559}|{16.8742,96.1567}|{16.8672,96.1544}|{16.8616,96.1553}|{16.8583,96.156}|{16.8501,96.1583}|{16.8508,96.1619}|{16.8538,96.1682}|{16.856,96.172}|{16.8549,96.173}|{16.8518,96.1757}|{16.8494,96.1774}|{16.8467,96.1794}|{16.8444,96.1811}|{16.8418,96.183}|{16.8369,96.1857}|{16.8352,96.1865}|{16.8325,96.1878}|{16.8281,96.1882}|{16.8262,96.1864}|{16.8232,96.1834}|{16.8156,96.1897}|{16.8047,96.195}|{16.8025,96.1966}|{16.7996,96.1967}|{16.7964,96.1953}|{16.7952,96.1981}|{16.7937,96.2009}|{16.7928,96.2031}|{16.7913,96.2064}|{16.7916,96.2074}|{16.7912,96.2096}|{16.791,96.2113}|{16.7905,96.2145}|{16.7906,96.2168}|{16.7932,96.2196}|{16.7991,96.2243}|{16.8008,96.2259}|{16.803,96.2238}";
        $bStop = "Lelyar Gate Yinn|Sauk Lote Yae|Tadar Htate|Sauk Lote Yae|Sae-Thone Gate|Gate Wa|Khan Ma|Lay-sae-koe Asane Gate|Kyel Ngar Pwint|Waizayantar|Ngar Kwae|Yoke Shin Yon|Htu Par Yon|Anawmar|Tit Zay Kwae|Tat Phwet|Myayni Lan|Kyauk Taing|Thuwunna Lan Sone|Athin Taik|Khap Chee Yar|Zawana|Thayet Taw|Aung Yadanar|(Sae-Lay/ Sae-Ngar) Lan Sone|Padaythar|Yone Shae|Taung Okkalar Sar Taik|Inwa|Nandawun Zay|Ta Kaung|Kaytu Marlar Kwae|Nyaung Pin|Mit Zu Lan|Chaw Twin Kone|Kabar Aye Paya/ Paya Lan|Sar Taik|Lan Wa/ Nawaday|Ngar Lan|Hnit Zay|Phone Gyi Lan|Kyauk Yae Twin|Myauk Okkalar Awine|Gate Haung|Gandar Yon|Khay Mar|Phyo Sabei|Kyaung Kwae|Kyan Mar Yae|Lay-sae-lay Lan Sone|Kyaung Lay Shae|Banyardala|Ba Htoo Zay|Kyar Hmat Taing|Lay-sae-chauk Lan Sone|Sein Pan|Zay Lay|Gate Haung|Moke Wa|Awine|Awine|Moke Wa|Gate Haung|Zay Lay|Sein Pan|Lay-sae-chauk Lan Sone|Kyar Hmat Taing|Ba Htoo Zay|Banyardala|Kyaung Lay Shae|Lay-sae-lay Lan Sone|Kyan Mar Yae|Kyaung Kwae|Phyo Sabei|Khay Mar|Gandar Yon|Gate Haung|Myauk Okkalar Awine|Kyauk Yae Twin|Phone Gyi Lan|Hnit Zay|Ngar Lan|Lan Wa/ Nawaday|Sar Taik|Kabar Aye Paya/ Paya Lan|Chaw Twin Kone|Mit Zu Lan|Nyaung Pin|Kaytu Marlar Kwae|Ta Kaung|Nandawun Zay|Inwa|Taung Okkalar Sar Taik|Yone Shae|Padaythar|(Sae-Lay/ Sae-Ngar) Lan Sone|Aung Yadanar|Thayet Taw|Zawana|Khap Chee Yar|Athin Taik|Thuwunna Lan Sone|Kyauk Taing|Myayni Lan|Tat Phwet|Tit Zay Kwae|Anawmar|Htu Par Yon|Yoke Shin Yon|Ngar Kwae|Waizayantar|Kyel Ngar Pwint|Lay-sae-koe Asane Gate|Khan Ma|Gate Wa|Sae-Thone Gate|Sauk Lote Yae|Tadar Htate|Sauk Lote Yae";
        $this->insertBusStop($busline,$map,$bStop);

        $busline = $this->insertBusLine("4","red");
        $map = "{16.8207,96.2659}|{16.8236,96.2681}|{16.8272,96.2691}|{16.8324,96.27}|{16.8324,96.2648}|{16.8352,96.2555}|{16.8366,96.2494}|{16.8386,96.2441}|{16.8349,96.2426}|{16.8283,96.2406}|{16.8206,96.2379}|{16.8158,96.2364}|{16.8072,96.2325}|{16.8013,96.2256}|{16.8032,96.2235}|{16.8066,96.2194}|{16.8065,96.2168}|{16.8051,96.2137}|{16.8039,96.2106}|{16.8039,96.2059}|{16.804,96.2019}|{16.8046,96.1957}|{16.8025,96.1966}|{16.7996,96.1967}|{16.7965,96.1955}|{16.7937,96.1938}|{16.7899,96.1918}|{16.7862,96.1899}|{16.7825,96.1867}|{16.7738,96.1774}|{16.7764,96.1748}|{16.7766,96.171}|{16.7765,96.1686}|{16.7768,96.1638}|{16.7769,96.1607}|{16.7739,96.1596}|{16.7741,96.1631}|{16.7741,96.1656}|{16.774,96.1684}|{16.7739,96.1706}|{16.7738,96.1742}|{16.7737,96.1777}|{16.7818,96.188}|{16.7856,96.19}|{16.7898,96.1922}|{16.7937,96.1942}|{16.7964,96.1953}|{16.7996,96.1969}|{16.8024,96.1967}|{16.8045,96.1955}|{16.8039,96.2018}|{16.8037,96.2059}|{16.8036,96.2109}|{16.8047,96.2136}|{16.8064,96.2168}|{16.8064,96.219}|{16.803,96.2233}|{16.8008,96.2259}|{16.8069,96.2323}|{16.815,96.2367}|{16.82,96.2383}|{16.8282,96.2407}|{16.8349,96.2429}|{16.8379,96.2439}|{16.8367,96.25}|{16.8351,96.2546}|{16.8322,96.2651}|{16.8321,96.2702}|{16.8271,96.2694}|{16.8233,96.2677}|{16.8214,96.2661}";
        $bStop = "Thone-Sae-Hnit Gate|Sae-Tit Lan|Padauk Kwae|Moke Oo (Yuzana Garden)|Ma Wa Ta Yone Shae/Oh Eain|Mya Nandar|Yadanar Lan|Thein Kyaung|Chauk-sae-ngar Yat Kwet|Sauk Lote Yae|Alo Taw Pyae|Thit Sait|Asean|Tadar Htate|Sauk Lote Yae|Tayar-Shit Taung|Thaketa Awine|Shit Gate|Myayni|Kyaung Kwae/ Htuu Par Yone|Anawmar|Kyauk Taing|Myayni Lan|Tat Phwet|Tit Zay Kwae|Thadar Yon|Wet Su|Yan Aung|Thinbaw Kyin|Ocean|Masalar Set/ Gandi|Lan Ngar Sae|Lay-sae-chauk Lan|Pansodan|Bar lan|Sule Pan Chan|Pansodan|Bokalay Zay|Lay-sae-chauk Lan|Lan Ngar Sae|Gandee|Ocean|Thinbaw Kyin|Yan Aung|Wet Su|Thadar Yon|Tit Zay Kwae|Tat Phwet|Myayni Lan|Kyauk Taing|Anawmar|Kyaung Kwae/ Htuu Par Yone|Myayni|Shit Gate|Thaketa Awine|Tayar-Shit Taung|Sauk Lote Yae|Tadar Htate|Asean|Thit Sait|Alo Taw Pyae|Sauk Lote Yae|Chauk-sae-ngar Yat Kwet|Thein Kyaung|Yadanar Lan|Mya Nandar|Ma Wa Ta Yone Shae/Oh Eain|Moke Oo (Yuzana Garden)|Padauk Kwae|Sae-Tit Lan|Thone-Sae-Hnit Gate";
        $this->insertBusStop($busline,$map,$bStop);

        $busline = $this->insertBusLine("9","pink");
        $map = "{16.8206,96.2379}|{16.8158,96.2364}|{16.8121,96.2324}|{16.8127,96.229}|{16.8106,96.2244}|{16.8084,96.2202}|{16.8065,96.2168}|{16.8051,96.2137}|{16.8039,96.2106}|{16.8039,96.2059}|{16.804,96.2019}|{16.8046,96.1957}|{16.8025,96.1966}|{16.7996,96.1967}|{16.7965,96.1955}|{16.7937,96.1942}|{16.7899,96.1918}|{16.7862,96.1899}|{16.7825,96.1867}|{16.7827,96.1838}|{16.7919,96.1745}|{16.7945,96.1756}|{16.7964,96.1767}|{16.7994,96.1758}|{16.8042,96.1756}|{16.8077,96.1762}|{16.8095,96.1769}|{16.8072,96.1801}|{16.8099,96.1835}|{16.814,96.1883}|{16.8151,96.1907}|{16.8045,96.1955}|{16.8039,96.2018}|{16.8037,96.2059}|{16.8036,96.2109}|{16.8047,96.2136}|{16.8064,96.2168}|{16.8081,96.2204}|{16.8095,96.2232}|{16.8126,96.2291}|{16.8119,96.2319}|{16.815,96.2367}|{16.82,96.2383}";
        $bStop = "Alo Taw Pyae|Thit Sait|Than Lan|Paya Lay|Thone-Sae-Lay Kar Gyi Gate|Ta Sal Zay|Thaketa Awine|Shit Gate|Myayni|Kyaung Kwae/ Htuu Par Yone|Anawmar|Kyauk Taing|Myayni Lan|Tat Phwet|Tit Zay Kwae|Thadar Yon|Wet Su|Yan Aung|Thinbaw Kyin|Warso|Mingalar Zay|Yuzana Plaza/ Lan Kyal|Aung Mingalar|Thida|Kyauk Myaung Zay|Tamwe Zay/ Tamwe Bali|Tamwe Bali|Arthawka|Zay Lay|Kaw Set|Thuwunna Lan Sone|Kyauk Taing|Anawmar|Kyaung Kwae/ Htuu Par Yone|Myayni|Shit Gate|Thaketa Awine|Ta Sal Zay|Thone-Sae-Lay Kar Gyi Gate|Paya Lay|Than Lan|Thit Sait|Alo Taw Pyae";
        $this->insertBusStop($busline,$map,$bStop);

        $busline = $this->insertBusLine("33","pink");
        $map = "{16.6333,96.3273}|{16.634,96.325}|{16.6384,96.3253}|{16.6407,96.3239}|{16.6445,96.3237}|{16.6481,96.3212}|{16.6498,96.3199}|{16.6565,96.3186}|{16.6626,96.3213}|{16.6676,96.3216}|{16.6734,96.3207}|{16.6764,96.3195}|{16.6793,96.3174}|{16.6807,96.3158}|{16.682,96.3141}|{16.6831,96.3119}|{16.6858,96.3094}|{16.69,96.3075}|{16.696,96.3059}|{16.6987,96.3048}|{16.7055,96.2973}|{16.7078,96.2955}|{16.7113,96.2941}|{16.7135,96.2923}|{16.7162,96.2907}|{16.7188,96.2893}|{16.7229,96.2852}|{16.7241,96.2835}|{16.7263,96.2801}|{16.729,96.2739}|{16.7301,96.2727}|{16.7395,96.2686}|{16.7456,96.2653}|{16.751,96.2614}|{16.7551,96.2585}|{16.7578,96.2566}|{16.7791,96.247}|{16.7787,96.2442}|{16.8008,96.2259}|{16.8032,96.2235}|{16.8066,96.2194}|{16.8065,96.2168}|{16.8051,96.2137}|{16.8039,96.2106}|{16.8039,96.2059}|{16.804,96.2019}|{16.8046,96.1957}|{16.8025,96.1966}|{16.7996,96.1967}|{16.7964,96.1953}|{16.7937,96.1938}|{16.7899,96.1918}|{16.7862,96.1899}|{16.7825,96.1867}|{16.7827,96.1838}|{16.7918,96.1747}|{16.7941,96.1729}|{16.7994,96.1758}|{16.7963,96.1767}|{16.7945,96.1756}|{16.7919,96.1745}|{16.7826,96.1828}|{16.7818,96.188}|{16.7856,96.19}|{16.7898,96.1922}|{16.7937,96.1942}|{16.7965,96.1955}|{16.7996,96.1969}|{16.8024,96.1967}|{16.8045,96.1955}|{16.8039,96.2018}|{16.8037,96.2059}|{16.8036,96.2109}|{16.8047,96.2136}|{16.8064,96.2168}|{16.8064,96.219}|{16.803,96.2233}|{16.8013,96.2256}|{16.7784,96.2439}|{16.7787,96.2472}|{16.7577,96.2565}|{16.7551,96.2581}|{16.7509,96.2611}|{16.7455,96.265}|{16.7398,96.268}|{16.7306,96.2725}|{16.7285,96.2741}|{16.7262,96.2798}|{16.7237,96.2833}|{16.7227,96.2849}|{16.7187,96.289}|{16.716,96.2904}|{16.7133,96.2921}|{16.7111,96.2939}|{16.7078,96.2952}|{16.7053,96.297}|{16.6986,96.3046}|{16.6958,96.3056}|{16.69,96.3072}|{16.6856,96.3093}|{16.6831,96.3116}|{16.6818,96.3139}|{16.6806,96.3155}|{16.679,96.3173}|{16.6761,96.3194}|{16.6734,96.3205}|{16.6676,96.3213}|{16.6628,96.321}|{16.6565,96.3182}|{16.6499,96.3195}|{16.6481,96.3209}|{16.6446,96.3233}|{16.6408,96.3236}|{16.6384,96.3249}|{16.634,96.325}|{16.6333,96.3273}";
        $bStop = "Kyauk Tan|Zay Kwae|Gat Tae Kwae|Pal Hlaw Pho|Aung Chan Thar|Si Saing|Chan Myae Thar Yar|Pa Da Kyi|Mway Paya|Nyaung Wine|Saik Pyoe Yay|Hta Ma Ni Koun Htate|Hta Ma Ni Phone Gyi Kyaung Shae|Alal Ywar|Gate Haung|Gate Tit|Aung Ta Pyay|Nee Pyinyar Takke Tho (G.T.U)|Ko Tin Maung Chan Wa|Paya Lay|Hta Ma Lon|Ngar Su|Saw Bwar|Nat Sin Koun|Gate Wa|Kyaik Inn|San Set|Sit See Taw|Nat Sin Ta-Yar|Paya Kone Lan Sone|Paya Shae|Sae-Shit Kone|Aung Chan Thar|Sal Myaung|Thama College|Kyar Paya|Mee Point|Lat Hmat Gate|Tadar Htate|Sauk Lote Yae|Tayar-Shit Taung|Thaketa Awine|Shit Gate|Myayni|Kyaung Kwae/ Htuu Par Yone|Anawmar|Kyauk Taing|Myayni Lan|Tat Phwet|Tit Zay Kwae|Thadar Yon|Wet Su|Yan Aung|Thinbaw Kyin|Warso|Mingalar Zay|Mingalar Mon Zay|Thida|Aung Mingalar|Yuzana Plaza/ Lan Kyal|Mingalar Zay|Warso|Thinbaw Kyin|Yan Aung|Wet Su|Thadar Yon|Tit Zay Kwae|Tat Phwet|Myayni Lan|Kyauk Taing|Anawmar|Kyaung Kwae/ Htuu Par Yone|Myayni|Shit Gate|Thaketa Awine|Tayar-Shit Taung|Sauk Lote Yae|Tadar Htate|Lat Hmat Gate|Mee Point|Kyar Paya|Thama College|Sal Myaung|Aung Chan Thar|Sae-Shit Kone|Paya Shae|Paya Kone Lan Sone|Nat Sin Ta-Yar|Sit See Taw|San Set|Kyaik Inn|Gate Wa|Nat Sin Koun|Saw Bwar|Ngar Su|Hta Ma Lon|Paya Lay|Ko Tin Maung Chan Wa|Nee Pyinyar Takke Tho (G.T.U)|Aung Ta Pyay|Gate Tit|Gate Haung|Alal Ywar|Hta Ma Ni Phone Gyi Kyaung Shae|Hta Ma Ni Koun Htate|Saik Pyoe Yay|Nyaung Wine|Mway Paya|Pa Da Kyi|Chan Myae Thar Yar|Si Saing|Aung Chan Thar|Pal Hlaw Pho|Gat Tae Kwae|Zay Kwae|Kyauk Tan";
        $this->insertBusStop($busline,$map,$bStop);

        $busline = $this->insertBusLine("61","blue");
        $map = "{16.8701,96.0122}|{16.8784,96.0231}|{16.8742,96.033}|{16.8723,96.0379}|{16.8722,96.0416}|{16.874,96.0517}|{16.8757,96.0632}|{16.8769,96.0713}|{16.8775,96.0751}|{16.878,96.0787}|{16.8833,96.094}|{16.8849,96.0978}|{16.8818,96.0989}|{16.8796,96.0997}|{16.8753,96.1016}|{16.8715,96.1042}|{16.8642,96.1067}|{16.8594,96.1091}|{16.8601,96.1129}|{16.8611,96.1184}|{16.8612,96.1207}|{16.8631,96.1224}|{16.8661,96.1261}|{16.8665,96.1287}|{16.8674,96.1374}|{16.8647,96.1412}|{16.8561,96.1411}|{16.8531,96.1406}|{16.848,96.1364}|{16.8444,96.1357}|{16.837,96.1342}|{16.8321,96.1325}|{16.8173,96.1333}|{16.812,96.1348}|{16.8082,96.136}|{16.8054,96.1367}|{16.8038,96.1382}|{16.8051,96.1434}|{16.8061,96.1473}|{16.8044,96.1517}|{16.8054,96.1544}|{16.8025,96.1562}|{16.7981,96.1571}|{16.7891,96.1572}|{16.7829,96.1589}|{16.7775,96.1587}|{16.7762,96.1589}|{16.7855,96.1595}|{16.789,96.1574}|{16.7971,96.1569}|{16.8011,96.1582}|{16.8055,96.1544}|{16.8044,96.1515}|{16.8061,96.1474}|{16.8038,96.1388}|{16.8067,96.1365}|{16.8119,96.135}|{16.8179,96.1333}|{16.8325,96.1328}|{16.8392,96.1348}|{16.8443,96.1358}|{16.8479,96.1366}|{16.8536,96.141}|{16.856,96.1414}|{16.8659,96.1418}|{16.8676,96.1373}|{16.8667,96.1287}|{16.8663,96.126}|{16.8632,96.1224}|{16.8613,96.1205}|{16.8612,96.1184}|{16.8602,96.1129}|{16.8595,96.1094}|{16.8645,96.1068}|{16.8717,96.1045}|{16.8757,96.1016}|{16.8796,96.0998}|{16.8816,96.0992}|{16.8848,96.0979}|{16.8834,96.0937}|{16.8783,96.0785}|{16.8778,96.0751}|{16.8772,96.0713}|{16.8759,96.0634}|{16.8741,96.0522}|{16.8725,96.0416}|{16.8724,96.0383}|{16.8745,96.0332}|{16.8781,96.0243}|{16.8701,96.0122}";
        $bStop = "Nee Pyinyar Takke Tho|Dagon Ayar A Way Pyay|Thama Kone|B.O.C|Sanay Ma|Mee Khwat Zay|Yone Shae|Ngar Htate|Thone Htate|Tit Htate|Insein Kannar|Pauk Taw Wa|Nyaung Pin|Myo Thit Zay|Padauk Lan|Kyoe Kone Lan Sone|Bayint Naung Zay/ Zay Pwae Yon|Bayint Naung Lan Sone|Zay Butar|U Ba Han|Kyway Tit|Thamine Lan Son|Ye Yan Aung|Kyaik Wine|Ye Baw Haung|Shit Mile|Khun-hnat Mile|A.D|Kyaung Kwae|Chauk Mile Khawe|Tadar Phyu|Marlar|Saik Pyoe Yay|Hantharwaddy|Mahar Myaing|Myaynigone|Myaynigone|Wizaya Plaza|Link Lan|Oak Lan|Shwe Gon Daing|Shwe Gon Daing|Bahan Thone Lan|Kyauk Taing|Youk Lan|Yoke Shin Yon|Sule Myodaw Khan Ma|Youk Lan|Kyauk Taing|Bahan Thone Lan|Yae Khae Saing|Shwe Gon Daing|Oak Lan|Link Lan|Myaynigone|Mahar Myaing|Hantharwaddy|Saik Pyoe Yay|Marlar|Tadar Phyu|Chauk Mile Khawe|Kyaung Kwae|A.D|Khun-hnat Mile|Shit Mile|Ye Baw Haung|Kyaik Wine|Ye Yan Aung|Thamine Lan Son|Kyway Tit|U Ba Han|Zay Butar|Bayint Naung Lan Sone|Bayint Naung Zay/ Zay Pwae Yon|Kyoe Kone Lan Sone|Padauk Lan|Myo Thit Zay|Nyaung Pin|Pauk Taw Wa|Insein Kannar|Tit Htate|Thone Htate|Ngar Htate|Yone Shae|Mee Khwat Zay|Sanay Ma|B.O.C|Thama Kone|Dagon Ayar A Way Pyay|Nee Pyinyar Takke Tho";
        $this->insertBusStop($busline,$map,$bStop);

        $busline = $this->insertBusLine("22","blue");
        $map = "{16.9486,96.0137}|{16.9221,96.0545}|{16.9056,96.0481}|{16.9027,96.047}|{16.8999,96.0458}|{16.8971,96.0446}|{16.8949,96.0438}|{16.8999,96.0458}|{16.8904,96.0402}|{16.8871,96.0381}|{16.8843,96.0369}|{16.8824,96.036}|{16.8794,96.0347}|{16.8742,96.033}|{16.8723,96.0379}|{16.8722,96.0416}|{16.874,96.0517}|{16.8757,96.0632}|{16.8769,96.0713}|{16.8775,96.0751}|{16.878,96.0787}|{16.8833,96.094}|{16.8854,96.0981}|{16.8863,96.1006}|{16.8869,96.1025}|{16.8879,96.1075}|{16.8751,96.1113}|{16.861,96.1148}|{16.8554,96.1161}|{16.849,96.1179}|{16.8452,96.1188}|{16.8406,96.1201}|{16.8373,96.1212}|{16.8345,96.1219}|{16.8317,96.1233}|{16.8295,96.124}|{16.8257,96.125}|{16.822,96.1258}|{16.8182,96.1264}|{16.8164,96.1259}|{16.8145,96.1259}|{16.8128,96.1259}|{16.8098,96.1259}|{16.8064,96.1257}|{16.8007,96.1261}|{16.7972,96.1261}|{16.7935,96.1266}|{16.7905,96.128}|{16.7874,96.1296}|{16.7852,96.1314}|{16.7829,96.1333}|{16.7784,96.1358}|{16.7831,96.1333}|{16.7855,96.1312}|{16.7876,96.1296}|{16.7907,96.128}|{16.7938,96.1266}|{16.7981,96.1263}|{16.8004,96.1262}|{16.8064,96.1258}|{16.8098,96.126}|{16.8121,96.126}|{16.8146,96.1261}|{16.8163,96.126}|{16.8178,96.1266}|{16.8222,96.1259}|{16.826,96.1252}|{16.8289,96.1243}|{16.8314,96.1236}|{16.8344,96.122}|{16.8371,96.1213}|{16.84,96.1206}|{16.8452,96.1192}|{16.8483,96.1183}|{16.8553,96.1165}|{16.861,96.1149}|{16.8748,96.1115}|{16.887,96.1025}|{16.8863,96.1003}|{16.8851,96.0972}|{16.8834,96.0937}|{16.8783,96.0785}|{16.8778,96.0751}|{16.8772,96.0713}|{16.8759,96.0634}|{16.8741,96.0522}|{16.8725,96.0416}|{16.8724,96.0383}|{16.8745,96.0332}|{16.8795,96.0351}|{16.8823,96.0363}|{16.8845,96.0373}|{16.8872,96.0385}|{16.8902,96.0403}|{16.8996,96.046}|{16.895,96.044}|{16.8973,96.0451}|{16.8996,96.046}|{16.9026,96.0472}|{16.9055,96.0484}|{16.9228,96.0548}|{16.9488,96.0139}";
        $bStop = "A Nout Paing Takke Tho|Awine|Yoe Gyi|Yoe Lay|Kyaung Shae|Gate Haung|Zay Lan|Kyaung Shae|Kyaung Lan|Bago Lan|Zay Lay|Sae-Hnit Thama|Arr Man|Thama Kone|B.O.C|Sanay Ma|Mee Khwat Zay|Yone Shae|Ngar Htate|Thone Htate|Tit Htate|Insein Kannar|Pauk Taw Wa|Htaung Boo Wa|Insein Zay|Insein Pan Chan|Myo Thit|Thamine Lan Son|Oakyin|Thiri Myaing|Than Lan|Kamayut|Butar Yon Lan|Ywarma Kwae|Site Kar Gate|B.R.B|Khaing Shwe Wah|Pyi Yeik Mon|Ye Win|Hantharwaddy|Nat Sin Lan|Salin Kwin|Kyee Myin Daing Nya Zay|Kyee Myin Daing Butar|Kyaung Shae|Home Lan|White Taw|Sin Min Zay|Chan Mar Phee|Ahlone Sar Taik|Jama Khar Nar|Thakhin Mya Pan Chan|Jama Khar Nar|Ahlone Sar Taik|Chan Mar Phee|Sin Min Zay|White Taw|Home Lan|Kyaung Shae|Kyee Myin Daing Butar|Kyee Myin Daing Nya Zay|Salin Kwin|Nat Sin Lan|Hantharwaddy|Ye Win|Pyi Yeik Mon|Khaing Shwe Wah|B.R.B|Site Kar Gate|Ywarma Kwae|Butar Yon Lan|Kamayut|Than Lan|Thiri Myaing|Oakyin|Thamine Lan Son|Myo Thit|Insein Zay|Htaung Boo Wa|Pauk Taw Wa|Insein Kannar|Tit Htate|Thone Htate|Ngar Htate|Yone Shae|Mee Khwat Zay|Sanay Ma|B.O.C|Thama Kone|Arr Man|Sae-Hnit Thama|Zay Lay|Bago Lan|Kyaung Lan|Kyaung Shae|Zay Lan|Gate Haung|Kyaung Shae|Yoe Lay|Yoe Gyi|Awine|A Nout Paing Takke Tho";
        $this->insertBusStop($busline,$map,$bStop);

    }
}
