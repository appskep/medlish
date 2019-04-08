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
            'answers' => [
                'a' => [
                    'is_true' => 0,
                    'answer' => 'Bad stress management'
                ],
                'b' => [
                    'is_true' => 0,
                    'answer' => 'Sleep deprivation'
                ],
                'c' => [
                    'is_true' => 1,
                    'answer' => 'Unorganized eating plan'
                ],
            ],
        ],
        [
            'id' => 2,
            'question' => 'The word “combatting” in the text is best replaced by..?',
            'answers' => [
                'a' => [
                    'is_true' => 1,
                    'answer' => 'Attack'
                ],
                'b' => [
                    'is_true' => 0,
                    'answer' => 'Keep'
                ],
                'c' => [
                    'is_true' => 0,
                    'answer' => 'Defend'
                ],
            ],
        ],
        [
            'id' => 3,
            'question' => 'What does the word “incurable” in the text mean?',
            'answers' => [
                'a' => [
                    'is_true' => 1,
                    'answer' => 'Cannot be healed'
                ],
                'b' => [
                    'is_true' => 0,
                    'answer' => 'Cannot be transmitted'
                ],
                'c' => [
                    'is_true' => 0,
                    'answer' => 'Cannot be diagnosed'
                ],
            ],
        ],
        [
            'id' => 4,
            'question' => 'What disease in the USA that only can be treated by vaccine?',
            'answers' => [
                'a' => [
                    'is_true' => 0,
                    'answer' => 'Anemia'
                ],
                'b' => [
                    'is_true' => 1,
                    'answer' => 'Flu'
                ],
                'c' => [
                    'is_true' => 0,
                    'answer' => 'AIDS'
                ],
            ],
        ],
        [
            'id' => 5,
            'question' => 'Viral disease can also be said as..?',
            'answers' => [
                'a' => [
                    'is_true' => 1,
                    'answer' => 'Endemic disease'
                ],
                'b' => [
                    'is_true' => 0,
                    'answer' => 'Curable disease'
                ],
                'c' => [
                    'is_true' => 0,
                    'answer' => 'Infectious disease'
                ],
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
        return $this->render('view', [
            'id' => $id,
            'lesson' => $this->lessons[$key],
            'readingQuestions' => $this->readingQuestions,
        ]);
    }
}
