<?php

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionsTableSeeder extends Seeder
{
    public function run()
    {
        $questions = [
            [
                'title' => 'Votre adresse mail',
                'body' => 'Entrez votre adresse e-mail',
                'type' => 'B',
            ],
            [
                'title' => 'Votre âge',
                'body' => 'Entrez votre âge',
                'type' => 'B',
            ],
            [
                'title' => 'Votre sexe',
                'body' => '',
                'type' => 'A',
                'choices' => ['Homme', 'Femme', 'Préfère ne pas répondre'],
            ],
            [
                'title' => 'Nombre de personnes dans votre foyer (adulte & enfants)',
                'body' => '',
                'type' => 'C',
            ],
            [
                'title' => 'Votre profession',
                'body' => 'Entrez votre profession',
                'type' => 'B',
            ],
            [
                'title' => 'Quel marque de casque VR utilisez-vous ?',
                'body' => '',
                'type' => 'A',
                'choices' => ['Oculus Quest', 'Oculus Rift/s', 'HTC Vive', 'Windows Mixed Reality', 'Valve Index'],
            ],
            [
                'title' => 'Sur quel magasin d’application achetez-vous des contenus VR ?',
                'body' => '',
                'type' => 'A',
                'choices' => ['SteamVR', 'Occulus store', 'Viveport', 'Windows store'],
            ],
            [
                'title' => 'Quel casque envisagez-vous d’acheter dans un futur proche ?',
                'body' => '',
                'type' => 'A',
                'choices' => ['Occulus Quest', 'Occulus Go', 'HTC Vive Pro', 'PSVR', 'Autre', 'Aucun'],
            ],
            [
                'title' => 'Au sein de votre foyer, combien de personnes utilisent votre casque VR pour regarder Bigscreen ?',
                'body' => '',
                'type' => 'C',
            ],
            [
                'title' => 'Vous utilisez principalement Bigscreen pour :',
                'body' => '',
                'type' => 'A',
                'choices' => ['regarder la TV en direct', 'regarder des films', 'travailler', 'jouer en solo', 'jouer en équipe'],
            ],
            [
                'title' => 'Combien donnez-vous de points pour la qualité de l’image sur Bigscreen ?',
                'body' => '',
                'type' => 'C',
            ],
            [
                'title' => 'Combien donnez-vous de points pour le confort d’utilisation de l’interface Bigscreen ?',
                'body' => '',
                'type' => 'C',
            ],
            [
                'title' => 'Combien donnez-vous de points pour la connexion réseau de Bigscreen ?',
                'body' => '',
                'type' => 'C',
            ],
            [
                'title' => 'Combien donnez-vous de points pour la qualité des graphismes 3D dans Bigscreen ?',
                'body' => '',
                'type' => 'C',
            ],
            [
                'title' => 'Combien donnez-vous de points pour la qualité audio dans Bigscreen ?',
                'body' => '',
                'type' => 'C',
            ],
            [
                'title' => 'Aimeriez-vous avoir des notifications plus précises au cours de vos sessions Bigscreen ?',
                'body' => '',
                'type' => 'A',
                'choices' => ['Oui', 'Non'],
            ],
            [
                'title' => 'Aimeriez-vous pouvoir inviter un ami à rejoindre votre session via son smartphone ?',
                'body' => '',
                'type' => 'A',
                'choices' => ['Oui', 'Non'],
            ],
            [
                'title' => 'Aimeriez-vous pouvoir enregistrer des émissions TV pour pouvoir les regarder ultérieurement ?',
                'body' => '',
                'type' => 'C',
            ],
            [
                'title' => 'Aimeriez-vous jouer à des jeux exclusifs sur votre Bigscreen ?',
                'body' => '',
                'type' => 'C',
            ],
            [
                'title' => 'Quelle nouvelle fonctionnalité devrait exister sur Bigscreen ?',
                'body' => 'Décrivez la nouvelle fonctionnalité que vous souhaiteriez voir sur Bigscreen.',
                'type' => 'B',
            ],
        ];

        foreach ($questions as $question) {
            Question::create($question);
        }

        $this->command->info('Table "questions" seeded successfully.');
    }
}
