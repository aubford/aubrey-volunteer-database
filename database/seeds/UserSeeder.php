<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    // users as of 8/8/19
    private $users =
    [
        ['alex.zaborenko@gmail.com', 'Alex Zaborenko'],
        ['alexis.dezaro@gmail.com', 'Alexis Dezaro'],
        ['vibrantamberrose@gmail.com', 'Amber Rose'],
        ['amyfneff@gmail.com', 'Amy Neff'],
        ['anastasialeeshanti@gmail.com', 'Anastasia Lee'],
        ['ashtonblair@gmail.com', 'Ashton Christopher'],
        ['musicaubrey@gmail.com', 'Aubrey Ford'],
        ['bjn@funkyclouds.com', 'B.J. Nolletti'],
        ['brandon@fryslie.com', 'Brandon Fryslie'],
        ['brendan.delisle.berg@gmail.com', 'brendan berg'],
        ['bryce.coomer@gmail.com', 'Bryce Coomer'],
        ['caitlinmorrisco@gmail.com', 'Caitlin Morris'],
        ['cwperkins09@gmail.com', 'Charles Perkins'],
        ['c.himmelbrand@gmail.com', 'Chelsea Amber Skye Himmelbrand'],
        ['Chris.mathisen@buycoloradoinsurance.com', 'Chris  Mathisen'],
        ['cristal.crabtree@gmail.com', 'Cristal Aurelia Crabtree'],
        ['granthamc2202@yahoo.com', 'Crystal'],
        ['Balithzar69@gmail.com', 'David'],
        ['johnathenduran511@gmail.com', 'De La Vaca'],
        ['dnorbie@comcast.net', 'Dorothy Norbie'],
        ['epicunlimitedskateboards@gmail.com', 'Eric Ybarra'],
        ['nicholsel9@gmail.com', 'Evan Nichols'],
        ['gabieflower91@gmail.com', 'Gabriela Espinosa'],
        ['innasplace@gmail.com', 'Inna Gofman'],
        ['resonatebliss@gmail.com', 'Jennifer K Alberts'],
        ['jreinitz@gmail.com', 'Jennifer Reichel'],
        ['diluzional@gmail.com', 'Jenny DiLuzio'],
        ['jeschnittka@gmail.com', 'Jessica Schnittka'],
        ['iamjessiematthews@gmail.com', 'Jessie Matthews'],
        ['josh.bryan.303@gmail.com', 'Josh Bryan'],
        ['jgal@ucdavis.edu', 'Juan'],
        ['kelzbery@gmail.com', 'Kelsey Sailsbery'],
        ['Lauren.peterson.360@gmail.com', 'Lauren'],
        ['ms.lily.berman@gmail.com', 'Lily Berman'],
        ['elizannetaylor@gmail.com', 'Liz Taylor'],
        ['lucasjhenderson@gmail.com', 'Lucas Henderson'],
        ['marz.1115@yahoo.com', 'Maricar Encarnacion'],
        ['matt@notevenremotelydorky.com', 'Matt Bajor'],
        ['makeller0311@gmail.com', 'Melissa Keller'],
        ['mirfrench2@gmail.com', 'Miranda French'],
        ['gandalfg12@gmail.com', 'Natavian Baker'],
        ['mercy.isolated@gmail.com', 'Nicole Brown'],
        ['patrickbeery@gmail.com', 'Patrick Beery'],
        ['rahstarr.8@gmail.com', 'Rachael Starr Dacosta'],
        ['sarahfoley1111@gmail.com', 'Sarah Foley'],
        ['shelbyjunee5@gmail.com', 'Shelby Buck'],
        ['ssaiz@ucdavis.edu', 'Stephanie Saiz'],
        ['sconte789@gmail.com', 'Steve Conte'],
        ['taelorbrody522@gmail.com', 'Taelor Brody'],
        ['tiffanybajor@gmail.com', 'Tiffany Bajor'],
        ['tjfinley@gmail.com', 'Tiffany Finley'],
        ['toddfrei@gmail.com', 'Todd Frei'],
        ['siete.zane@gmail.com', 'Zane'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->users as $user)
        {
            try
            {
                factory(User::class)->create([
                    'email' => $user[0],
                    'name' => $user[1],
                    'password' => ''
                ]);

                dump("New user created: {$user[1]}");
            }
            catch (Exception $exception)
            {
                // Get the MySQL error number
                $error = $exception->getPrevious()->errorInfo[1];

                // Duplicate?
                if ($error == 1062)
                {
                    dump("Email already exists: {$user[0]}");
                }
                else
                {
                    dump("MySQL Error!", $exception);
                }
            }
        }
    }
}
