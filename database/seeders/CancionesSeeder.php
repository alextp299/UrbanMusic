<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Canciones;
class CancionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $canciones = [
            ['id'=>'1','name'=>'Quevedo - Vista Al Mar','audio'=>'Quevedo - Vista Al Mar.mp3','image'=>'Quevedo - Vista Al Mar.webp','id_categoria_cancion'=>'1','created_at'=>null,'updated_at'=>null],
            ['id'=>'2','name'=>'Quevedo - Wanda','audio'=>'Quevedo - Wanda.mp3','image'=>'Quevedo - Wanda.webp','id_categoria_cancion'=>'1','created_at'=>null,'updated_at'=>null],
            ['id'=>'3','name'=>'Quevedo [Prod. Linton] - Universitaria','audio'=>'Quevedo [Prod. Linton] - Universitaria.mp3','image'=>'Quevedo [Prod. Linton] - Universitaria.webp','id_categoria_cancion'=>'1','created_at'=>null,'updated_at'=>null],
            ['id'=>'4','name'=>'Quevedo, Garzi - Nana','audio'=>'Quevedo, Garzi - Nana.mp3','image'=>'Quevedo, Garzi - Nana.webp','id_categoria_cancion'=>'1','created_at'=>null,'updated_at'=>null],
            ['id'=>'5','name'=>'Quevedo, Juseph - Chamaquita','audio'=>'Quevedo, Juseph - Chamaquita.mp3','image'=>'Quevedo, Juseph - Chamaquita.webp','id_categoria_cancion'=>'1','created_at'=>null,'updated_at'=>null],
            ['id'=>'6','name'=>'Quevedo, Linton - Ahora Y Siempre','audio'=>'Quevedo, Linton - Ahora Y Siempre.mp3','image'=>'Quevedo, Linton - Ahora Y Siempre.webp','id_categoria_cancion'=>'1','created_at'=>null,'updated_at'=>null],
            ['id'=>'7','name'=>'Bad Bunny - Como Antes','audio'=>'Bad Bunny - Como Antes.mp3','image'=>'Bad Bunny - Como Antes.webp','id_categoria_cancion'=>'2','created_at'=>null,'updated_at'=>null],
            ['id'=>'8','name'=>'Bad Bunny - De Museo','audio'=>'Bad Bunny - De Museo.mp3','image'=>'Bad Bunny - De Museo.webp','id_categoria_cancion'=>'2','created_at'=>null,'updated_at'=>null],
            ['id'=>'9','name'=>'Bad Bunny - Me Fui de Vacaciones','audio'=>'Bad Bunny - Me Fui de Vacaciones.mp3','image'=>'Bad Bunny - Me Fui de Vacaciones.webp','id_categoria_cancion'=>'2','created_at'=>null,'updated_at'=>null],
            ['id'=>'10','name'=>'Bad Bunny - Tití Me Preguntó','audio'=>'Bad Bunny - Tití Me Preguntó.mp3','image'=>'Bad Bunny - Tití Me Preguntó.webp','id_categoria_cancion'=>'2','created_at'=>null,'updated_at'=>null],
            ['id'=>'11','name'=>'Bad Bunny - Un Coco','audio'=>'Bad Bunny - Un Coco.mp3','image'=>'Bad Bunny - Un Coco.webp','id_categoria_cancion'=>'2','created_at'=>null,'updated_at'=>null],
            ['id'=>'12','name'=>'Bad Bunny - Vete','audio'=>'Bad Bunny - Vete.mp3','image'=>'Bad Bunny - Vete.webp','id_categoria_cancion'=>'2','created_at'=>null,'updated_at'=>null],
            ['id'=>'13','name'=>'Bad Bunny, Eladio Carrión - Kemba Walker','audio'=>'Bad Bunny, Eladio Carrión - Kemba Walker.mp3','image'=>'Bad Bunny, Eladio Carrión - Kemba Walker.webp','id_categoria_cancion'=>'2','created_at'=>null,'updated_at'=>null],
            ['id'=>'14','name'=>'Bad Bunny, Rosalía - La Noche De Anoche','audio'=>'Bad Bunny, Rosalía - La Noche De Anoche.mp3','image'=>'Bad Bunny, Rosalía - La Noche De Anoche.webp','id_categoria_cancion'=>'2','created_at'=>null,'updated_at'=>null],
            ['id'=>'15','name'=>'Shakira  BZRP Music Sessions #53','audio'=>'Shakira  Bizarap.mp3','image'=>'Shakira  BZRP Music Sessions 53.webp','id_categoria_cancion'=>'3','created_at'=>null,'updated_at'=>null],
            ['id'=>'16','name'=>'Shakira - La La La','audio'=>'Shakira - La La La.mp3','image'=>'Shakira - La La La.webp','id_categoria_cancion'=>'3','created_at'=>null,'updated_at'=>null],
            ['id'=>'17','name'=>'Shakira - Loba','audio'=>'Shakira - Loba.mp3','image'=>'Shakira - Loba.webp','id_categoria_cancion'=>'3','created_at'=>null,'updated_at'=>null],
            ['id'=>'18','name'=>'Shakira - Loca','audio'=>'Shakira - Loca.mp3','image'=>'Shakira - Loca.webp','id_categoria_cancion'=>'3','created_at'=>null,'updated_at'=>null],
            ['id'=>'19','name'=>'Shakira - No','audio'=>'Shakira - No.mp3','image'=>'Shakira - No.webp','id_categoria_cancion'=>'3','created_at'=>null,'updated_at'=>null],
            ['id'=>'20','name'=>'Shakira - Rules','audio'=>'Shakira - Rules.mp3','image'=>'Shakira - Rules.webp','id_categoria_cancion'=>'3','created_at'=>null,'updated_at'=>null],
            ['id'=>'21','name'=>'Shakira - Si Te Vas','audio'=>'Shakira - Si Te Vas.mp3','image'=>'Shakira - Si Te Vas.webp','id_categoria_cancion'=>'3','created_at'=>null,'updated_at'=>null],
            ['id'=>'22','name'=>'Shakira - Whenever, Wherever','audio'=>'Shakira - Whenever, Wherever.mp3','image'=>'Shakira - Whenever, Wherever.webp','id_categoria_cancion'=>'3','created_at'=>null,'updated_at'=>null],
            ['id'=>'23','name'=>'Shakira, Ozuna - Monotonía','audio'=>'Shakira, Ozuna - Monotonía.mp3','image'=>'Shakira, Ozuna - Monotonía.webp','id_categoria_cancion'=>'3','created_at'=>null,'updated_at'=>null],
            ['id'=>'24','name'=>'Shakira, Rauw Alejandro - Te Felicito','audio'=>'Shakira, Rauw Alejandro - Te Felicito.mp3','image'=>'Shakira, Rauw Alejandro - Te Felicito.webp','id_categoria_cancion'=>'3','created_at'=>null,'updated_at'=>null],
            ['id'=>'25','name'=>'Rosalía  - Juro Que','audio'=>'Rosalía  - Juro Que.mp3','image'=>'Rosalía  - Juro Que.webp','id_categoria_cancion'=>'4','created_at'=>null,'updated_at'=>null],
            ['id'=>'26','name'=>'Rosalía  - LLYLM','audio'=>'Rosalía  - LLYLM.mp3','image'=>'Rosalía  - LLYLM.webp','id_categoria_cancion'=>'4','created_at'=>null,'updated_at'=>null],
            ['id'=>'27','name'=>'Rosalía - Bagdad','audio'=>'Rosalía - Bagdad.mp3','image'=>'Rosalía - Bagdad.webp','id_categoria_cancion'=>'4','created_at'=>null,'updated_at'=>null],
            ['id'=>'28','name'=>'Rosalía - Despechá','audio'=>'Rosalía - Despechá.mp3','image'=>'Rosalía - Despechá.webp','id_categoria_cancion'=>'4','created_at'=>null,'updated_at'=>null],
            ['id'=>'29','name'=>'Rosalía - Pienso En Tu Mirá','audio'=>'Rosalía - Pienso En Tu Mirá.mp3','image'=>'Rosalía - Pienso En Tu Mirá.webp','id_categoria_cancion'=>'4','created_at'=>null,'updated_at'=>null],
            ['id'=>'30','name'=>'Rosalía - Saoko','audio'=>'Rosalía - Saoko.mp3','image'=>'Rosalía - Saoko.webp','id_categoria_cancion'=>'4','created_at'=>null,'updated_at'=>null],
            ['id'=>'31','name'=>'Rosalía, Ozuna - Yo X Ti, Tu X Mi','audio'=>'Rosalía, Ozuna - Yo X Ti, Tu X Mi.mp3','image'=>'Rosalía, Ozuna - Yo X Ti, Tu X Mi.webp','id_categoria_cancion'=>'4','created_at'=>null,'updated_at'=>null],
            ['id'=>'32','name'=>'Rosalía, Rauw Alejandro - Beso','audio'=>'Rosalía, Rauw Alejandro - Beso.mp3','image'=>'Rosalía, Rauw Alejandro - Beso.webp','id_categoria_cancion'=>'4','created_at'=>null,'updated_at'=>null],
            ['id'=>'33','name'=>'Rosalía, The Weeknd - La Fama','audio'=>'Rosalía, The Weeknd - La Fama.mp3','image'=>'Rosalía, The Weeknd - La Fama.webp','id_categoria_cancion'=>'4','created_at'=>null,'updated_at'=>null],
            ['id'=>'34','name'=>'Rosalía, Travis Scott, Lil Baby - Highest In The Room (Remix)','audio'=>'Rosalía, Travis Scott, Lil Baby - Highest In The Room (Remix).mp3','image'=>'Rosalía, Travis Scott, Lil Baby - Highest In The Room (Remix).webp','id_categoria_cancion'=>'4','created_at'=>null,'updated_at'=>null],
            ['id'=>'35','name'=>'Eladio Carrión - Claro Cristal','audio'=>'Eladio Carrión - Claro Cristal.mp3','image'=>'Eladio Carrión - Claro Cristal.webp','id_categoria_cancion'=>'5','created_at'=>null,'updated_at'=>null],
            ['id'=>'36','name'=>'Eladio Carrión - Hola Cómo Vas','audio'=>'Eladio Carrión - Hola Cómo Vas.mp3','image'=>'Eladio Carrión - Hola Cómo Vas.webp','id_categoria_cancion'=>'5','created_at'=>null,'updated_at'=>null],
            ['id'=>'37','name'=>'Eladio Carrión - Padre Tiempo','audio'=>'Eladio Carrión - Padre Tiempo.mp3','image'=>'Eladio Carrión - Padre Tiempo.webp','id_categoria_cancion'=>'5','created_at'=>null,'updated_at'=>null],
            ['id'=>'38','name'=>'Eladio Carrión - Paz Mental','audio'=>'Eladio Carrión - Paz Mental.mp3','image'=>'Eladio Carrión - Paz Mental.webp','id_categoria_cancion'=>'5','created_at'=>null,'updated_at'=>null],
            ['id'=>'39','name'=>'Eladio Carrión - Problema','audio'=>'Eladio Carrión - Problema.mp3','image'=>'Eladio Carrión - Problema.webp','id_categoria_cancion'=>'5','created_at'=>null,'updated_at'=>null],
            ['id'=>'40','name'=>'Eladio Carrión, 50 Cent - Si Salimos','audio'=>'Eladio Carrión, 50 Cent - Si Salimos.mp3','image'=>'Eladio Carrión, 50 Cent - Si Salimos.webp','id_categoria_cancion'=>'5','created_at'=>null,'updated_at'=>null],
            ['id'=>'41','name'=>'Karol G - Ay, Dios Mío!','audio'=>'Karol G - Ay, Dios Mío!.mp3','image'=>'Karol G - Ay, Dios Mío!.webp','id_categoria_cancion'=>'6','created_at'=>null,'updated_at'=>null],
            ['id'=>'42','name'=>'Karol G - Bichota','audio'=>'Karol G - Bichota.mp3','image'=>'Karol G - Bichota.webp','id_categoria_cancion'=>'6','created_at'=>null,'updated_at'=>null],
            ['id'=>'43','name'=>'Karol G - Cairo','audio'=>'Karol G - Cairo.mp3','image'=>'Karol G - Cairo.webp','id_categoria_cancion'=>'6','created_at'=>null,'updated_at'=>null],
            ['id'=>'44','name'=>'Karol G - Mientras Me Curo Del Cora','audio'=>'Karol G - Mientras Me Curo Del Cora.mp3','image'=>'Karol G - Mientras Me Curo Del Cora.webp','id_categoria_cancion'=>'6','created_at'=>null,'updated_at'=>null],
            ['id'=>'45','name'=>'Karol G - Provenza','audio'=>'Karol G - Provenza.mp3','image'=>'Karol G - Provenza.webp','id_categoria_cancion'=>'6','created_at'=>null,'updated_at'=>null],
            ['id'=>'46','name'=>'Karol G , Becky G- Mamiii','audio'=>'Karol G , Becky G- Mamiii.mp3','image'=>'Karol G , Becky G- Mamiii.webp','id_categoria_cancion'=>'6','created_at'=>null,'updated_at'=>null],
            ['id'=>'47','name'=>'Karol G, Quevedo - Pero Tu','audio'=>'Karol G, Quevedo - Pero Tu.mp3','image'=>'Karol G, Quevedo - Pero Tu.webp','id_categoria_cancion'=>'6','created_at'=>null,'updated_at'=>null],
            ['id'=>'48','name'=>'Karol G, Sech -  Dañamos La Amistad','audio'=>'Karol G, Sech -  Dañamos La Amistad.mp3','image'=>'Karol G, Sech -  Dañamos La Amistad.webp','id_categoria_cancion'=>'6','created_at'=>null,'updated_at'=>null],
            ['id'=>'49','name'=>'Karol G, Shakira - TQG','audio'=>'Karol G, Shakira - TQG.mp3','image'=>'Karol G, Shakira - TQG.webp','id_categoria_cancion'=>'6','created_at'=>null,'updated_at'=>null],
        ];

        Canciones::insert($canciones);
    }
}

