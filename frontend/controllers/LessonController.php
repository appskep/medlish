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
        '1' => '1. Introducing Yourself and Hospital Staff',
        '2' => '2. Working Shift, Times, Number, and Daily Activities',
        '3' => '3. The Anatomical Positions and Body Parts',
    ];
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'id' => $id,
            'lessons' => $this->lessons,
        ]);
    }
}
