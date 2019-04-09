<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

/**
 * Site controller
 */
class LessonController extends Controller
{
    public $lessons = [
        [
            'id' => 1,
            'name' => '1. Introducing Yourself and Hospital Staff',
        ],
        [
            'id' => 2,
            'name' => '2. Illness and Disease',
        ],
        [
            'id' => 3,
            'name' => '3. The Anatomical Positions and Body Parts',
        ],
    ];

    public $readingQuestions = [
        [
            'id' => 1,
            'question' => 'What is the main cause of heart disease in the USA?',
            'is_true' => 'c',
            'answers' => [
                'a' => 'a. Bad stress management',
                'b' => 'b. Sleep deprivation',
                'c' => 'c. Unorganized eating plan',
            ],
        ],
        [
            'id' => 2,
            'question' => 'The word “combatting” in the text is best replaced by..?',
            'is_true' => 'a',
            'answers' => [
                'a' => 'a. Attack',
                'b' => 'b. Keep',
                'c' => 'c. Defend',
            ],
        ],
        [
            'id' => 3,
            'question' => 'What does the word “incurable” in the text mean?',
            'is_true' => 'a',
            'answers' => [
                'a' => 'a. Cannot be healed',
                'b' => 'b. Cannot be transmitted',
                'c' => 'c. Cannot be diagnosed',
            ],
        ],
        [
            'id' => 4,
            'question' => 'What disease in the USA that only can be treated by vaccine?',
            'is_true' => 'b',
            'answers' => [
                'a' => 'a. Anemia',
                'b' => 'b. Flu',
                'c' => 'c. AIDS',
            ],
        ],
        [
            'id' => 5,
            'question' => 'Viral disease can also be said as..?',
            'is_true' => 'a',
            'answers' => [
                'a' => 'a. Endemic disease',
                'b' => 'b. Curable disease',
                'c' => 'c. Infectious disease',
            ],
        ],
    ];
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'lessons' => $this->lessons,
        ]);
    }

    public function actionView($id)
    {
        $key = array_search($id, array_column($this->lessons, 'id'));
        
        $post_flag = 0;
        $count_true = 0;
        if ($post = Yii::$app->request->post()) {
            $post_flag = 1;
            foreach ($this->readingQuestions as $question) {
                if (isset($post[$question['id']]) && $post[$question['id']] == $question['is_true']) $count_true++;
            }
        }

        return $this->render('view', [
            'id' => $id,
            'lesson' => $this->lessons[$key],
            'readingQuestions' => $this->readingQuestions,
            'count_true' => $count_true,
            'post_flag' => $post_flag,
        ]);
    }
}
