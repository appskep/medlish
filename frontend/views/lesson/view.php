<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = $lessons[$id];
// $this->params['breadcrumbs'][] = ['label' => 'Lessons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-lessons">
    <h1><?= Html::encode($this->title) ?></h1>

    <div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#listening" aria-controls="home" role="tab" data-toggle="tab">Listening</a></li>
            <li role="presentation"><a href="#speaking" aria-controls="profile" role="tab" data-toggle="tab">Speaking</a></li>
            <li role="presentation"><a href="#vocabulary" aria-controls="messages" role="tab" data-toggle="tab">Vocabulary</a></li>
            <li role="presentation"><a href="#reading" aria-controls="settings" role="tab" data-toggle="tab">Reading</a></li>
            <li role="presentation"><a href="#writing" aria-controls="settings" role="tab" data-toggle="tab">Writing</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">

            <div style="padding:20px 0" role="tabpanel" class="tab-pane active" id="listening">
                <span class="text-muted"><i>(listening section)</i></span>
            </div>

            <div style="padding:20px 0" role="tabpanel" class="tab-pane" id="speaking">

                <?php if ($id != 1) { ?>
                    <span class="text-muted"><i>(speaking section)</i></span>
                <?php } else { ?>
                <table class="table table-bordered">
                    <tr>
                        <th>Introduction</th>
                        <th>Profession</th>
                    </tr>
                    <tr>
                        <td>
                            My name is Sinta/Raja/James/Anne
                            <br>
                            <br>
                            <br>
                            I am a ...
                        </td>
                        <td>
                        Dentist
                        <br>Nurse
                        <br>Nutritionist
                        <br>Orthopedist 
                        <br>Pharmacist
                        <br>Radiologist
                        <br>Surgeon
                        <br>Therapist
                        </td>
                    </tr>
                </table>

                <br>

                <h4>Speaking Practice</h4>
                <p><i>Situation: Nurse Erika is meeting her patient Ms. Dewi Pertiwi for the first time. The Nurse Erika introduces herself.</i></p>
                <table class="table-condensed">
                    <tr><th valign="top">Nurse</th>     <td valign="top">:</td>     <td valign="top"> Good afternoon, Ms. Dewi Pertiwi. My Name is Erika and I’ll be looking after you this afternoon.</td></tr>
                    <tr><th valign="top">Patient</th>   <td valign="top">:</td>     <td valign="top"> Hello Erika. Please call me Dewi.</td></tr>
                    <tr><th valign="top">Nurse</th>     <td valign="top">:</td>     <td valign="top"> OK! How are you feeling today, Dewi?</td></tr>
                    <tr><th valign="top">Patient</th>   <td valign="top">:</td>     <td valign="top"> Not so good actually, Erika. I had a bad night’s sleep and my back is really aching.</td></tr>
                    <tr><th valign="top">Nurse</th>     <td valign="top">:</td>     <td valign="top"> I’m very sorry to hear that, Dewi. Let me take your abs and then I’ll see if I can do anything about your sore back.</td></tr>
                </table>

                <?php } ?>
            </div>

            <div style="padding:20px 0" role="tabpanel" class="tab-pane" id="vocabulary">
                <span class="text-muted"><i>(vocabulary section)</i></span>
            </div>

            <div style="padding:20px 0" role="tabpanel" class="tab-pane" id="reading">
                <span class="text-muted"><i>(reading section)</i></span>
            </div>

            <div style="padding:20px 0" role="tabpanel" class="tab-pane" id="writing">
                <span class="text-muted"><i>(writing section)</i></span>
            </div>

        </div>

    </div>

</div>
