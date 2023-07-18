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
            ],
            [
                "common_name" => "Aloe",
                "scientific_name" => "Aloe Vera",
                "sunlight" => "Full Sun",
                "watering" => "Minimun",
            ],
            [
                "common_name" => "Elephant's ear",
                "scientific_name" => "Colocasia esculenta",
                "sunlight" => "Full sun/Part Shade",
                "watering" => "Average",
            ],
            [
                "common_name" => "Anthurium",
                "scientific_name" => "Anthurium Andraeanum",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
            ],
            [
                "common_name" => "Asparagus fern",
                "scientific_name" => "Asparagus Setaceus",
                "sunlight" => "Part Shade",
                "watering" => "Frequent",
            ],
            [
                "common_name" => "Cast Iron Plant",
                "scientific_name" => "Aspidistra Elatior",
                "sunlight" => "Part Shade/Full Shade",
                "watering" => "Average",
            ],
            [
                "common_name" => "Bird's Nest Fern",
                "scientific_name" => "Asplenium Nidus 'Antiquum' ",
                "sunlight" => "Full Sun/Part Shade",
                "watering" => "Average",
            ],
            [
                "common_name" => "Rex Begonia",
                "scientific_name" => "Begonia Rex-Cultorum",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
            ],
            [
                "common_name" => "Boston fern",
                "scientific_name" => "Nephrolepis Exaltata",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
            ],
            [
                "common_name" => "Bird of paradise",
                "scientific_name" => "Strelitzia Reginae",
                "sunlight" => "Full sun",
                "watering" => "Average",
            ],
            [

                "common_name" => "Angel Wings",
                "scientific_name" => "Caladium Bicolor",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
            ],
            [
                "common_name" => "Peacock Plant",
                "scientific_name" => "Calathea makoyana",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
            ],
            [
                "common_name" => "Zebra Plant",
                "scientific_name" => "Calathea zebrina",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
            ],
            [
                "common_name" => "Chinese Money Plant",
                "scientific_name" => "Pilea peperomioides",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Low",
            ],
            [
                "common_name" => "Croton",
                "scientific_name" => "Codiaeum Variegatum",
                "sunlight" => "Full Sun/Part Shade",
                "watering" => "Average",
            ],
            [
                "common_name" => "Spider Plant",
                "scientific_name" => "Chlorophytum",
                "sunlight" => "Part Shade/Full Shade",
                "watering" => "Average",
            ],
            [
                "common_name" => "Dracaena",
                "scientific_name" => "Dracaena Fragans",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
            ],
            [
                "common_name" => "English Ivy",
                "scientific_name" => "Hedera Helix",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Frequent",
            ],
            [
                "common_name" => "Pothos",
                "scientific_name" => "Epipremnum Aureum 'Neon'",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
            ],
            [
                "common_name" => "Fishbone cactus",
                "scientific_name" => "Epiphyllum Anguliger",
                "sunlight" => "Indirect Sun",
                "watering" => "Low",
            ],

            [
                "common_name" => "Weeping Fig",
                "scientific_name" => "Ficus Benjamina",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
            ],
            [
                "common_name" => "Fiddle-Leaf Fig",
                "scientific_name" => "Ficus Lyrata",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
            ],
            [
                "common_name" => "Flaming Sword",
                "scientific_name" => "Vriesea splendens",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
            ],
            [
                "common_name" => "Wax Plant",
                "scientific_name" => "Hoya carnosa",
                "sunlight" => "Full Sun/Part Sun",
                "watering" => "Average",
            ],
            [
                "common_name" => "Kentia palm",
                "scientific_name" => "Howea forsteriana",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
            ],
            [
                "common_name" => "Maidenhair fern",
                "scientific_name" => "Adiantum Capillus-Veneris",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
            ],
            [
                "common_name" => "Prayer Plant",
                "scientific_name" => "Maranta Leuconeura",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
            ],

            [
                "common_name" => "Swiss Cheese Plant",
                "scientific_name" => "Monstera Deliciosa",
                "sunlight" => "Full Sun/Part Sun",
                "watering" => "Average",
            ],
            [
                "common_name" => "Orchid",
                "scientific_name" => "Phalaenopsis",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
            ],
            [
                "common_name" => "Guiana Chestnut",
                "scientific_name" => "Pachira aquatica",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
            ],
            [
                "common_name" => "Watermelon Peperomia",
                "scientific_name" => "Peperomia Argyreia",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
            ],
            [
                "common_name" => "Philodendron",
                "scientific_name" => "Philodendron 'Pink Princess'",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
            ],
            [
                "common_name" => "Cretan Brake",
                "scientific_name" => "Pteris Cretica",
                "sunlight" => "Full Sun/Part Shade",
                "watering" => "Average",
            ],
            [
                "common_name" => "Rubber Plant",
                "scientific_name" => "Ficus elastica",
                "sunlight" => "Full Sun/Part Sun",
                "watering" => "Average",
            ],
            [
                "common_name" => "Venus Fly Trap",
                "scientific_name" => "Dionaea Muscipula",
                "sunlight" => "Full Sun/Part Sun",
                "watering" => "Average",
            ],
            [
                "common_name" => "Snake Plant",
                "scientific_name" => "Sansevieria",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Minimum",
            ],
            [
                "common_name" => "Inchplant",
                "scientific_name" => "Tradescantia Zebrina",
                "sunlight" => "Full Sun/Part Sun",
                "watering" => "Average",
            ],
            [
                "common_name" => "Peace Lily",
                "scientific_name" => "Spathiphyllum",
                "sunlight" => "Full Sun/Part Shade",
                "watering" => "Minimum",
            ],
            [
                "common_name" => "ZZ plant",
                "scientific_name" => "Zamioculcas zamiifolia",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
            ],
            [
                "common_name" => "Alocasia zebrina",
                "scientific_name" => "Alocasia zebrina",
                "sunlight" => "Part Sun/Part Shade",
                "watering" => "Average",
            ],


        ]);
    }
}
