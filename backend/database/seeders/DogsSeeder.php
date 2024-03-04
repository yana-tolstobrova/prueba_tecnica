<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DogsSeeder extends Seeder
{
    public function run()
    {
        $dogs = [
            ['Labrador Retriever', 'Dorado', 'Grande', 'Amigable y extrovertido, el Labrador Retriever tiene un temperamento gentil.', 'https://res.cloudinary.com/dck5v63wz/image/upload/v1709518003/labradorretrieversegurosantevet_icdvbv.jpg'],
            ['Pastor Alemán', 'Negro y Marrón', 'Grande', 'Inteligente y versátil, el Pastor Alemán es altamente entrenable y leal.', 'https://res.cloudinary.com/dck5v63wz/image/upload/v1709518003/descarga_i49mq7.jpg'],
            ['Golden Retriever', 'Dorado', 'Grande', 'Carismático y juguetón, el Golden Retriever es conocido por su disposición amigable.', 'https://res.cloudinary.com/dck5v63wz/image/upload/v1709517998/descarga_2_ybuy4n.jpg'],
            ['Bulldog', 'Blanco', 'Mediano', 'A pesar de su apariencia resistente, los Bulldogs son tranquilos, valientes y afectuosos.', 'https://res.cloudinary.com/dck5v63wz/image/upload/v1709517998/descarga_1_u8rjdq.jpg'],
            ['Beagle', 'Tricolor', 'Mediano', 'Los Beagles son amigables, curiosos y excelentes compañeros para las familias.', 'https://res.cloudinary.com/dck5v63wz/image/upload/v1709517998/descarga_4_zbduox.jpg'],
            ['Caniche', 'Albaricoque', 'Mediano', 'Los Caniches son altamente inteligentes y tienen un pelaje que no se cae, lo que los hace ideales para personas alérgicas.', 'https://res.cloudinary.com/dck5v63wz/image/upload/v1709517998/descarga_5_mb89id.jpg'],
            ['Bulldog Francés', 'Cervato', 'Pequeño', 'Los Bulldogs Franceses son conocidos por sus características orejas de murciélago y su naturaleza afectuosa.', 'https://res.cloudinary.com/dck5v63wz/image/upload/v1709517998/descarga_6_bn3cdi.jpg'],
            ['Boxer', 'Atigrado', 'Grande', 'Los Boxers son juguetones, enérgicos y hacen grandes compañeros para familias activas.', 'https://res.cloudinary.com/dck5v63wz/image/upload/v1709517999/descarga_7_ssdp1m.jpg'],
            ['Husky Siberiano', 'Negro y Blanco', 'Grande', 'Los Huskies Siberianos son conocidos por su apariencia llamativa y su naturaleza amigable.', 'https://res.cloudinary.com/dck5v63wz/image/upload/v1709517999/descarga_8_veckuo.jpg'],
            ['Teckel', 'Rojo', 'Pequeño', 'Los Teckel son curiosos, valientes y tienen un cuerpo largo y patas cortas distintivo.', 'https://res.cloudinary.com/dck5v63wz/image/upload/v1709518000/descarga_9_xycrbc.jpg'],
            ['Yorkshire Terrier', 'Azul y Marrón', 'Pequeño', 'Los Yorkies son pequeños pero bravos, con una gran personalidad y un lujoso pelaje sedoso.', 'https://res.cloudinary.com/dck5v63wz/image/upload/v1709518000/descarga_10_izezpx.jpg'],
            ['Rottweiler', 'Negro y Marrón', 'Grande', 'Los Rottweilers son leales, seguros de sí mismos y son excelentes perros guardianes.', 'https://res.cloudinary.com/dck5v63wz/image/upload/v1709518000/descarga_11_ibrocf.jpg'],
            ['Shih Tzu', 'Blanco y Dorado', 'Pequeño', 'Los Shih Tzus son conocidos por sus largos abrigos fluidos y su temperamento amistoso.', 'https://res.cloudinary.com/dck5v63wz/image/upload/v1709518000/descarga_12_n7gljy.jpg'],
            ['Doberman', 'Negro y Marrón', 'Grande', 'Los Dobermans son inteligentes, alertas y leales, con un pelaje brillante y lustroso.', 'https://res.cloudinary.com/dck5v63wz/image/upload/v1709518001/descarga_13_ru4uwu.jpg'],
            ['Gran Danés', 'Cervato', 'Grande', 'Los Gran Daneses son gigantes gentiles, conocidos por su disposición amigable y paciente.', 'https://res.cloudinary.com/dck5v63wz/image/upload/v1709518001/descarga_14_nve8oy.jpg'],
            ['Chihuahua', 'Marrón', 'Pequeño', 'Los Chihuahuas son pequeños pero poderosos, con una personalidad audaz y leal.', 'https://res.cloudinary.com/dck5v63wz/image/upload/v1709518001/descarga_15_pgv30d.jpg'],
            ['Carlino', 'Cervato', 'Pequeño', 'Los Pugs son encantadores y afectuosos, con una cara arrugada y una cola rizada.', 'https://res.cloudinary.com/dck5v63wz/image/upload/v1709518001/descarga_16_qedq3g.jpg'],
            ['Border Collie', 'Negro y Blanco', 'Mediano', 'Los Border Collies son altamente inteligentes y enérgicos, destacándose en agilidad y obediencia.', 'https://res.cloudinary.com/dck5v63wz/image/upload/v1709518002/descarga_17_cu9su1.jpg'],
            ['Shetland Sheepdog', 'Sable y Blanco', 'Mediano', 'Los Shelties son leales y afectuosos, con un abrigo impresionante y una naturaleza suave.', 'https://res.cloudinary.com/dck5v63wz/image/upload/v1709518002/descarga_18_raqj5m.jpg'],
            ['Boston Terrier', 'Atigrado y Blanco', 'Pequeño', 'Los Boston Terriers son animados y amigables, conocidos por su abrigo similar a un esmoquin.', 'https://res.cloudinary.com/dck5v63wz/image/upload/v1709518002/descarga_19_uiepfx.jpg'],
        ];

        foreach ($dogs as $dog) {
            DB::table('dogs')->insert([
                'photo' => $dog[4],
                'breed' => $dog[0],
                'color' => $dog[1],
                'size' => $dog[2],
                'description' => $dog[3],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
