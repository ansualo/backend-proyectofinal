<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('plants')->insert([
            [
                "common_name" => "Chinese Evergreen",
                "scientific_name" => "Aglaonema 'Silver Queen'",
                "sunlight" => "Part Shade/Full Shade",
                "watering" => "Average",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_01_Chinese_Evergreen.jpg",
            ],
            [
                "common_name" => "Aloe",
                "scientific_name" => "Aloe Vera",
                "sunlight" => "Full Sun",
                "watering" => "Minimun",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_02_Aloe_Vera.jpg",
            ],
            [
                "common_name" => "Elephant's ear",
                "scientific_name" => "Colocasia esculenta",
                "sunlight" => "Full sun/Part Shade",
                "watering" => "Average",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_03_Elephant's_ear.jpg",
            ],
            [
                "common_name" => "Anthurium",
                "scientific_name" => "Anthurium Andraeanum",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_04_Anthurium.jpg",
            ],
            [
                "common_name" => "Asparagus fern",
                "scientific_name" => "Asparagus Setaceus",
                "sunlight" => "Part Shade",
                "watering" => "Frequent",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_05_Asparagus_Fern.png",
            ],
            [
                "common_name" => "Cast Iron Plant",
                "scientific_name" => "Aspidistra Elatior",
                "sunlight" => "Part Shade/Full Shade",
                "watering" => "Average",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_06_Cast_Iron_Plant.jpg",
            ],
            [
                "common_name" => "Bird's Nest Fern",
                "scientific_name" => "Asplenium Nidus 'Antiquum' ",
                "sunlight" => "Full Sun/Part Shade",
                "watering" => "Average",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_07_Bird's_Nest_Fern.jpg",
            ],
            [
                "common_name" => "Rex Begonia",
                "scientific_name" => "Begonia Rex-Cultorum",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_08_Rex_Begonia.jpg",
            ],
            [
                "common_name" => "Boston fern",
                "scientific_name" => "Nephrolepis Exaltata",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_09_Boston_Fern.jpg",
            ],
            [
                "common_name" => "Bird of paradise",
                "scientific_name" => "Strelitzia Reginae",
                "sunlight" => "Full sun",
                "watering" => "Average",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_10_Bird_of_paradise.jpg",
            ],
            [

                "common_name" => "Angel Wings",
                "scientific_name" => "Caladium Bicolor",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_11_Angel_Wings.jpg",
            ],
            [
                "common_name" => "Peacock Plant",
                "scientific_name" => "Calathea makoyana",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_12_Peacock_Plant.jpg",
            ],
            [
                "common_name" => "Zebra Plant",
                "scientific_name" => "Calathea zebrina",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_13_Zebra_Plant.jpg",
            ],
            [
                "common_name" => "Chinese Money Plant",
                "scientific_name" => "Pilea peperomioides",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Low",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_14_Chinese_Money_Plant.jpg",
            ],
            [
                "common_name" => "Croton",
                "scientific_name" => "Codiaeum Variegatum",
                "sunlight" => "Full Sun/Part Shade",
                "watering" => "Average",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_15_Croton.jpg",
            ],
            [
                "common_name" => "Spider Plant",
                "scientific_name" => "Chlorophytum",
                "sunlight" => "Part Shade/Full Shade",
                "watering" => "Average",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_16_Spider_Plant.jpg",
            ],
            [
                "common_name" => "Dracaena",
                "scientific_name" => "Dracaena Fragans",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_17_Dracaena.jpg",
            ],
            [
                "common_name" => "English Ivy",
                "scientific_name" => "Hedera Helix",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Frequent",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_18_English_Ivy.jpg",
            ],
            [
                "common_name" => "Pothos",
                "scientific_name" => "Epipremnum Aureum 'Neon'",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_19_Pothos.jpg",
            ],
            [
                "common_name" => "Fishbone cactus",
                "scientific_name" => "Epiphyllum Anguliger",
                "sunlight" => "Indirect Sun",
                "watering" => "Low",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_20_Fishbone_Cactus.png",
            ],

            [
                "common_name" => "Weeping Fig",
                "scientific_name" => "Ficus Benjamina",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_21_Weeping_Fig.jpg",
            ],
            [
                "common_name" => "Fiddle-Leaf Fig",
                "scientific_name" => "Ficus Lyrata",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_22_Fiddle_Leaf_Fig.jpg",
            ],
            [
                "common_name" => "Flaming Sword",
                "scientific_name" => "Vriesea splendens",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_23_Flaming_Sword.jpg",
            ],
            [
                "common_name" => "Wax Plant",
                "scientific_name" => "Hoya carnosa",
                "sunlight" => "Full Sun/Part Sun",
                "watering" => "Average",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_24_Wax_Plant.jpg",
            ],
            [
                "common_name" => "Kentia palm",
                "scientific_name" => "Howea forsteriana",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_25_Kentia_Palm+.jpg",
            ],
            [
                "common_name" => "Maidenhair fern",
                "scientific_name" => "Adiantum Capillus-Veneris",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_26_Maidenh_Fern.png",
            ],
            [
                "common_name" => "Prayer Plant",
                "scientific_name" => "Maranta Leuconeura",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_27_Prayer_Plant.jpg",
            ],

            [
                "common_name" => "Swiss Cheese Plant",
                "scientific_name" => "Monstera Deliciosa",
                "sunlight" => "Full Sun/Part Sun",
                "watering" => "Average",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_28_Swiss_Cheese_Plant.jpg",
            ],
            [
                "common_name" => "Orchid",
                "scientific_name" => "Phalaenopsis",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_29_Orchid.jpg",
            ],
            [
                "common_name" => "Guiana Chestnut",
                "scientific_name" => "Pachira aquatica",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_30_Guiana_Chestnut.jpg",
            ],
            [
                "common_name" => "Watermelon Peperomia",
                "scientific_name" => "Peperomia Argyreia",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_31_Watermelon_Peperomia.jpg",
            ],
            [
                "common_name" => "Philodendron",
                "scientific_name" => "Philodendron 'Pink Princess'",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_32_Philodendron_Pink+_Princess.jpg",
            ],
            [
                "common_name" => "Cretan Brake",
                "scientific_name" => "Pteris Cretica",
                "sunlight" => "Full Sun/Part Shade",
                "watering" => "Average",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_33_Cretan_Brake.jpg",
            ],
            [
                "common_name" => "Rubber Plant",
                "scientific_name" => "Ficus elastica",
                "sunlight" => "Full Sun/Part Sun",
                "watering" => "Average",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_34_Rubber_Plant.jpg",
            ],
            [
                "common_name" => "Venus Fly Trap",
                "scientific_name" => "Dionaea Muscipula",
                "sunlight" => "Full Sun/Part Sun",
                "watering" => "Average",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_35_Venus_Fly_Trap.jpg",
            ],
            [
                "common_name" => "Snake Plant",
                "scientific_name" => "Sansevieria",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Minimum",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_36_Snake_Plant.jpg",
            ],
            [
                "common_name" => "Inchplant",
                "scientific_name" => "Tradescantia Zebrina",
                "sunlight" => "Full Sun/Part Sun",
                "watering" => "Average",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_37_Inchplant.jpg",
            ],
            [
                "common_name" => "Peace Lily",
                "scientific_name" => "Spathiphyllum",
                "sunlight" => "Full Sun/Part Shade",
                "watering" => "Minimum",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_38_Peace_Lily.jpg",
            ],
            [
                "common_name" => "ZZ plant",
                "scientific_name" => "Zamioculcas zamiifolia",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_39_ZZ_Plant.jpg",
            ],
            [
                "common_name" => "Alocasia zebrina",
                "scientific_name" => "Alocasia zebrina",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
                "image" => "https://plantas.s3.eu-west-2.amazonaws.com/plantas+db/plant_40_Alocasia_Zebrina.jpg",
            ],
        ]);
    }
}
