<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsTableSeeder extends Seeder
{
    public function run()
    {
        $questions = [
            // Liste des questions avec leurs détails
            ['Votre adresse mail', 'B', []],
            ['Votre âge', 'B', []],
            ['Votre sexe', 'A', ['Homme', 'Femme', 'Préfère ne pas répondre']],
            ['Nombre de personne dans votre foyer (adulte & enfants)', 'C', []],
            ['Votre profession', 'B', []],
            ['Quel marque de casque VR utilisez-vous ?', 'A', ['Oculus Quest', 'Oculus Rift/s', 'HTC Vive', 'Windows Mixed Reality', 'Valve index']],
            ['Sur quel magasin d’application achetez-vous des contenus VR ?', 'A', ['SteamVR', 'Occulus store', 'Viveport', 'Windows store']],
            ['Quel casque envisagez-vous d’acheter dans un futur proche ?', 'A', ['Occulus Quest', 'Occulus Go', 'HTC Vive Pro', 'PSVR', 'Autre', 'Aucun']],
            ['Au sein de votre foyer, combien de personnes utilisent votre casque VR pour regarder Bigscreen ?', 'C', []],
            ['Vous utilisez principalement Bigscreen pour :', 'A', ['regarder la TV en direct', 'regarder des films', 'travailler', 'jouer en solo', 'jouer en équipe']],
            ['Combien donnez-vous de point pour la qualité de l’image sur Bigscreen ?', 'C', []],
            ['Combien donnez-vous de point pour le confort d’utilisation de l’interface Bigscreen ?', 'C', []],
            ['Combien donnez-vous de point pour la connexion réseau de Bigscreen ?', 'C', []],
            ['Combien donnez-vous de point pour la qualité des graphismes 3D dans Bigscreen ?', 'C', []],
            ['Combien donnez-vous de point pour la qualité audio dans Bigscreen ?', 'C', []],
            ['Aimeriez-vous avoir des notifications plus précises au cours de vos sessions Bigscreen ?', 'A', ['Oui', 'Non']],
            ['Aimeriez-vous pouvoir inviter un ami à rejoindre votre session via son smartphone ?', 'A', ['Oui', 'Non']],
            ['Aimeriez-vous pouvoir enregistrer des émissions TV pour pouvoir les regarder ultérieurement ?', 'C', []],
            ['Aimeriez-vous jouer à des jeux exclusifs sur votre Bigscreen ?', 'C', []],
            ['Quelle nouvelle fonctionnalité devrait exister sur Bigscreen ?', 'B', []],
        ];

        foreach ($questions as $index => $question) {
            DB::table('questions')->insert([
                // 'id' => $index + 1,
                'title' => $index + 1,
                'body' => $question[0],
                'type' => $question[1],
                'choices' => json_encode($question[2]),
                'survey_id' => 1,
            ]);
        }
    }
}
