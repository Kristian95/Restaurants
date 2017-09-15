<?php

use Illuminate\Database\Seeder;
use App\Exceptions\AlreadySeededException;
use App\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (City::count() > 0) {
            throw new AlreadySeededException('City table already seeded');
        }

        City::create([
            'name' => 'Париж',
            'description' => 'Париж (на френски: Paris Paris; IPA: [pa.ˈʁi]) е столицата и най-големият град на Франция. Разположен е в меандър на река Сена, която го разделя на 2 части – десен бряг (Rive droite) на север и по-малкия ляв бряг (Rive gauche) на юг. Реката е известна с многобройните си кейове, които в голямата си част са озеленени и предназначени за разходка, с букинистите – продавачи на книги на открито, и с историческите мостове, свързващи северната и южната част.'
        ]);

        City::create([
            'name' => 'Мадрѝд',
            'description' => 'Мадрѝд (на испански: Madrid, [maˈðɾið]) е столицата на Испания. Населението на града е 3 165 235 души (2014), а на градската агломерация – около 5 960 000 души (2003).'
        ]);

        City::create([
            'name' => 'Берлѝн',
            'description' => 'Берлѝн (на немски: Berlin [bɛɐ̯ˈliːn]) е столицата и една от 16-те провинции на Германия. С население от 3 466 164 души (към 2014 г.[1]) и площ от 892 km² Берлин е най-населеният и най-голям по размери град в страната.',
        ]);
    }
}
