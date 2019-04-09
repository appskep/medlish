<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = $lesson['name'];
// $this->params['breadcrumbs'][] = ['label' => 'Lessons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-lessons">
    <h1><?= Html::encode($this->title) ?></h1>

    <div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="<?= !$post_flag ? 'active' : '' ?>"><a href="#listening" aria-controls="home" role="tab" data-toggle="tab">Listening</a></li>
            <li role="presentation"><a href="#speaking" aria-controls="profile" role="tab" data-toggle="tab">Speaking</a></li>
            <li role="presentation"><a href="#vocabulary" aria-controls="messages" role="tab" data-toggle="tab">Vocabulary</a></li>
            <li role="presentation" class="<?= $post_flag ? 'active' : '' ?>"><a href="#reading" aria-controls="settings" role="tab" data-toggle="tab">Reading</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">

            <div style="padding:20px 0" role="tabpanel" class="tab-pane <?= !$post_flag ? 'active' : '' ?>" id="listening">
                
            <?php if ($id != 2) { ?>
                    <span class="text-muted"><i>(listening section)</i></span>
                <?php } else { ?>
                    <!-- <p><i>In this lesson, we will learn the phrases you may use when in the hospital.</i></p> -->

                    <table width="100%" class="table-condensed">
                        <tr>
                            <th><h4>Getting a Drip</h4></th>
                            <td width="1px">
                                <a class="btn btn-default" href="javascript:showTranscript(1)" id="showTranscript1">Show Transcript</a>
                                <a class="btn btn-default" href="javascript:hideTranscript(1)" id="hideTranscript1" style="display:none">Hide Transcript</a>
                            </td>
                            <td width="1px">
                                <audio controls class="pull-right">
                                    <source src="audio/Getting_a_Drip.mp3" type="audio/mpeg">
                                </audio>
                            </td>
                        </tr>
                    </table>
                    
                    <div class="transcript" id="1" style="display:none; padding:15px; background:#fafafa; border-radius:4px; margin-top:10px; box-shadow:0 0 1px rgba(0,0,0,0.5)">
                        <table class="table-condensed">
                            <tr><th valign="top">Woman</th>   <td valign="top">:</td> <td>I feel so weak, doctor.</td></tr>
                            <tr><th valign="top">Doctor</th>  <td valign="top">:</td> <td>What happened?</td></tr>
                            <tr><th valign="top">Woman</th>   <td valign="top">:</td> <td>My head is swimming. I feel dizzy.</td></tr>
                            <tr><th valign="top">Doctor</th>  <td valign="top">:</td> <td>Did you get hurt? Are you ill?</td></tr>
                            <tr><th valign="top">Woman</th>   <td valign="top">:</td> <td>I don’t know. I was at the beach, sunbathing all day, and now I feel so dizzy.</td></tr>
                            <tr><th valign="top">Doctor</th>  <td valign="top">:</td> <td>Oh, no! It seems you have got a sunstroke. We will need to admit. </td></tr>
                            <tr><th valign="top">Woman</th>   <td valign="top">:</td> <td>What are you going to do?</td></tr>
                            <tr><th valign="top">Doctor</th>  <td valign="top">:</td> <td>Nothing major, just going to give you a saline drip, and some medicine. </td></tr>
                            <tr><th valign="top">Woman</th>   <td valign="top">:</td> <td>Okay, thanks.</td></tr>
                        </table>
                    </div>
                    <br>

                    <hr>
                    <table width="100%"  class="table-condensed">
                        <tr>
                            <th><h4>Ready for Operation</h4></th>
                            <td width="1px">
                                <a class="btn btn-default" href="javascript:showTranscript(2)" id="showTranscript2">Show Transcript</a>
                                <a class="btn btn-default" href="javascript:hideTranscript(2)" id="hideTranscript2" style="display:none">Hide Transcript</a>
                            </td>
                            <td width="1px">
                                <audio controls class="pull-right">
                                    <source src="audio/Ready_for_Operation.mp3" type="audio/mpeg">
                                </audio>
                            </td>
                        </tr>
                    </table>
                    
                    <div class="transcript" id="2" style="display:none; padding:15px; background:#fafafa; border-radius:4px; margin-top:10px; box-shadow:0 0 1px rgba(0,0,0,0.5)">
                        <table class="table-condensed">
                            <tr><th valign="top">Doctor</th>  <td valign="top">:</td> <td>We are going to do the operation tomorrow. I can see you look worried. But, don’t be!</td></tr>
                            <tr><th valign="top">Man</th>     <td valign="top">:</td> <td>I am trying not to. Is it going to hurt?</td></tr>
                            <tr><th valign="top">Woman</th>   <td valign="top">:</td> <td>You will be under anaesthesia. You will not feel a thing.</td></tr>
                            <tr><th valign="top">Man</th>     <td valign="top">:</td> <td>That is a relief. </td></tr>
                            <tr><th valign="top">Doctor</th>  <td valign="top">:</td> <td>You will need to sign a consent form before we can begin the procedure.</td></tr>
                            <tr><th valign="top">Man</th>     <td valign="top">:</td> <td>No problems. I will sign it.</td></tr>
                            <tr><th valign="top">Doctor</th>  <td valign="top">:</td> <td>You have got a family member here?</td></tr>
                            <tr><th valign="top">Man</th>     <td valign="top">:</td> <td>Yeah, my brother is here. He must be around.</td></tr>
                        </table>
                    </div>
                    <br>

                    <hr>
                    <table width="100%"  class="table-condensed">
                        <tr>
                            <th><h4>Under Observation</h4></th>
                            <td width="1px">
                                <a class="btn btn-default" href="javascript:showTranscript(3)" id="showTranscript3">Show Transcript</a>
                                <a class="btn btn-default" href="javascript:hideTranscript(3)" id="hideTranscript3" style="display:none">Hide Transcript</a>
                            </td>
                            <td width="1px">
                                <audio controls class="pull-right">
                                    <source src="audio/Under_Observation.mp3" type="audio/mpeg">
                                </audio>
                            </td>
                        </tr>
                    </table>
                    
                    <div class="transcript" id="3" style="display:none; padding:15px; background:#fafafa; border-radius:4px; margin-top:10px; box-shadow:0 0 1px rgba(0,0,0,0.5)">
                        <table class="table-condensed">
                            <tr><th valign="top">Doctor</th>  <td valign="top">:</td> <td>How did you get hurt?</td></tr>
                            <tr><th valign="top">Man</th>     <td valign="top">:</td> <td>I tripped on the stairs and banged my head.</td></tr>
                            <tr><th valign="top">Doctor</th>  <td valign="top">:</td> <td>That sounds ugly. Did you lose consciousness?</td></tr>
                            <tr><th valign="top">Man</th>     <td valign="top">:</td> <td>I am not sure. I think, I was out for just a few seconds.</td></tr>
                            <tr><th valign="top">Doctor</th>  <td valign="top">:</td> <td>Okay. Well that is not good. We have got to put you under observation.</td></tr>
                            <tr><th valign="top">Man</th>     <td valign="top">:</td> <td>But I feel better now.</td></tr>
                            <tr><th valign="top">Doctor</th>  <td valign="top">:</td> <td>Sure, you do. But it is a concussion and you lost consciousness. It does not hurt to monitor you for a few hours just to make sure you are fine.</td></tr>
                            <tr><th valign="top">Man</th>     <td valign="top">:</td> <td>Okay, Doc.</td></tr>
                        </table>
                    </div>
                    <br>

                    <hr>
                    <table width="100%"  class="table-condensed">
                        <tr>
                            <th><h4>What is wrong with my mom</h4></th>
                            <td width="1px">
                                <a class="btn btn-default" href="javascript:showTranscript(4)" id="showTranscript4">Show Transcript</a>
                                <a class="btn btn-default" href="javascript:hideTranscript(4)" id="hideTranscript4" style="display:none">Hide Transcript</a>
                            </td>
                            <td width="1px">
                                <audio controls class="pull-right">
                                    <source src="audio/What_is_wrong_with_my_mom.mp3" type="audio/mpeg">
                                </audio>
                            </td>
                        </tr>
                    </table>
                    
                    <div class="transcript" id="4" style="display:none; padding:15px; background:#fafafa; border-radius:4px; margin-top:10px; box-shadow:0 0 1px rgba(0,0,0,0.5)">
                        <table class="table-condensed">
                            <tr><th valign="top">Woman</th>   <td valign="top">:</td> <td>Doctor, what is wrong with my mom.</td></tr>
                            <tr><th valign="top">Doctor</th>  <td valign="top">:</td> <td>She has got a flu. I want you to monitor her temperature. </td></tr>
                            <tr><th valign="top">Woman</th>   <td valign="top">:</td> <td>How often should I check it?</td></tr>
                            <tr><th valign="top">Doctor</th>  <td valign="top">:</td> <td>Once every four hours</td></tr>
                            <tr><th valign="top">Woman</th>   <td valign="top">:</td> <td>What about the diet?</td></tr>
                            <tr><th valign="top">Doctor</th>  <td valign="top">:</td> <td>Regular food but avoid heavy foods and include soups.</td></tr>
                            <tr><th valign="top">Woman</th>   <td valign="top">:</td> <td>Okay. Is there anything else I need to take care of?</td></tr>
                            <tr><th valign="top">Doctor</th>  <td valign="top">:</td> <td>Yes. I want to have a look at her again after three days, so make sure you visit me. </td></tr>
                        </table>
                    </div>
                    <br>

                    
                <?php } ?>

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
                            <a href="javascript:showDentist()">Dentist</a>
                        <br><a href="javascript:showNurse()">Nurse</a>
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
                
                <div id="dentist" style="display:none">
                    <h4>Speaking Practice</h4>
                    <p><i>Dentist and Patient.</i></p>
                    <table class="table-condensed">
                        <tr><th valign="top">Nic		</th> <td valign="top">:</td> <td> Hello, Sir.</td></tr>
                        <tr><th valign="top">Dentist	</th> <td valign="top">:</td> <td> Good morning, Nic. How are you doing today?</td></tr>
                        <tr><th valign="top">Nic		</th> <td valign="top">:</td> <td> I'm fine but I've been having some gum pain recently.</td></tr>
                        <tr><th valign="top">Dentist	</th> <td valign="top">:</td> <td> Well, we'll take a look. Please recline and open your mouth.... could you?</td></tr>
                        <tr><th valign="top">Nic		</th> <td valign="top">:</td> <td>(after being examined) How does it look?</td></tr>
                        <tr><th valign="top">Dentist	</th> <td valign="top">:</td> <td> Well, there is some inflammation of the gums. I think we should also do a new set of S-rays.</td></tr>
                        <tr><th valign="top">Nic		</th> <td valign="top">:</td> <td> Why do you say that? Anything wrong?</td></tr>
                        <tr><th valign="top">Dentist	</th> <td valign="top">:</td> <td> No, no, it's just standard procedure every year. It looks like you may have a few cavities as well.</td></tr>
                        <tr><th valign="top">Nic		</th> <td valign="top">:</td> <td> That's not good news .... hmmm</td></tr>
                        <tr><th valign="top">Dentist	</th> <td valign="top">:</td> <td> There are just two and they look superficial.</td></tr>
                        <tr><th valign="top">Nic		</th> <td valign="top">:</td> <td> I hope so.</td></tr>
                        <tr><th valign="top">Dentist	</th> <td valign="top">:</td> <td> We need to take X-rays to identify tooth decay, as well as check for decay between the teeth. Please come back again next week and we’ll go with the next procedure. </td></tr>
                        <tr><th valign="top">Nic		</th> <td valign="top">:</td> <td> I see. Thank you, doctor!</td></tr>
                    </table>
                </div>

                <div id="nurse" style="display:none">
                    <h4>Speaking Practice</h4>
                    <p><i>Situation: Nurse Erika is meeting her patient Ms. Dewi Pertiwi for the first time. The Nurse Erika introduces herself.</i></p>
                    <table class="table-condensed">
                        <tr><th valign="top">Nurse</th>     <td valign="top">:</td>     <td valign="top"> Good afternoon, Ms. Dewi Pertiwi. My Name is Erika and I’ll be looking after you this afternoon.</td></tr>
                        <tr><th valign="top">Patient</th>   <td valign="top">:</td>     <td valign="top"> Hello Erika. Please call me Dewi.</td></tr>
                        <tr><th valign="top">Nurse</th>     <td valign="top">:</td>     <td valign="top"> OK! How are you feeling today, Dewi?</td></tr>
                        <tr><th valign="top">Patient</th>   <td valign="top">:</td>     <td valign="top"> Not so good actually, Erika. I had a bad night’s sleep and my back is really aching.</td></tr>
                        <tr><th valign="top">Nurse</th>     <td valign="top">:</td>     <td valign="top"> I’m very sorry to hear that, Dewi. Let me take your abs and then I’ll see if I can do anything about your sore back.</td></tr>
                    </table>
                </div>

                <?php } ?>
            </div>

            <div style="padding:20px 0" role="tabpanel" class="tab-pane" id="vocabulary">
            <?php if ($id != 1) { ?>
                    <span class="text-muted"><i>(vocabulary section)</i></span>
                <?php } else { ?>
                <table class="table-condensed">                    
                    <tr>
                        <td align="right" valign="top">
                        <big><b>Dentist</b> <br>/ˈdɛntɪst/</big>
                        <br>a person who is qualified to treat diseases and other conditions that affect the teeth and gums.
                        </td>
                        <td valign="top">
                            <img src="image/dentist.jpg" height="200px" style="box-shadow:0 0 1px rgba(0,0,0,0.5); border-radius:4px">
                        </td>
                    </tr>

                    <tr>
                        <td align="right" valign="top">
                        <big><b>Dietician</b> <br>/dʌɪəˈtɪʃ(ə)n/</big>
                        <br>an expert on diet and nutrition.
                        </td>
                        <td valign="top">
                            <img src="image/dietician.jpg" height="200px" style="box-shadow:0 0 1px rgba(0,0,0,0.5); border-radius:4px">
                        </td>
                    </tr>

                    <tr>
                        <td align="right" valign="top">
                        <big><b>Nurse</b> <br>/nəːs/</big>
                        <br>person who cares for the sick or infirm, specifically
                        </td>
                        <td valign="top">
                            <img src="image/nurse.jpg" height="200px" style="box-shadow:0 0 1px rgba(0,0,0,0.5); border-radius:4px">
                        </td>
                    </tr>

                    <tr>
                        <td align="right" valign="top">
                        <big><b>Orthopaedist</b> <br>/ˌɔːθəˈpiːdɪst/</big>
                        <br>specialist in orthopedics
                        </td>
                        <td valign="top">
                            <img src="image/orthopaedist.jpg" height="200px" style="box-shadow:0 0 1px rgba(0,0,0,0.5); border-radius:4px">
                        </td>
                    </tr>

                    <tr>
                        <td align="right" valign="top">
                        <big><b>Pharmacist</b> <br>/ˈfɑːməsɪst/</big>
                        <br>a person licensed to prepare, compound, and dispense drugs upon written (prescription) from a licensed practitioner such as a physician, dentist, or advanced practice nurse
                        </td>
                        <td valign="top">
                            <img src="image/pharmacist.jpg" height="200px" style="box-shadow:0 0 1px rgba(0,0,0,0.5); border-radius:4px">
                        </td>
                    </tr>

                    <tr>
                        <td align="right" valign="top">
                        <big><b>Physiotherapist</b> <br>/fɪzɪəʊˈθɛrəpɪst/</big>
                        <br>a person who qualified to treat disease, injury, or deformity by physical methods such as massage, heat treatment and exercise.
                        </td>
                        <td valign="top">
                            <img src="image/physiotherapist.jpg" height="200px" style="box-shadow:0 0 1px rgba(0,0,0,0.5); border-radius:4px">
                        </td>
                    </tr>

                    <tr>
                        <td align="right" valign="top">
                        <big><b>Radiologist</b> <br>/reɪdɪˈɒlədʒɪst/</big>
                        <br>a person who use X-rays or other high-energy radiation, especially a doctor specializing in radiology.
                        </td>
                        <td valign="top">
                            <img src="image/radiologist.jpg" height="200px" style="box-shadow:0 0 1px rgba(0,0,0,0.5); border-radius:4px">
                        </td>
                    </tr>

                    <tr>
                        <td align="right" valign="top">
                        <big><b>Surgeon</b> <br>/ˈsəːdʒ(ə)n/</big>
                        <br>a medical specialist who performs surgery
                        </td>
                        <td valign="top">
                            <img src="image/surgeon.jpg" height="200px" style="box-shadow:0 0 1px rgba(0,0,0,0.5); border-radius:4px">
                        </td>
                    </tr>
                </table>

                <?php } ?>
            </div>

            <div style="padding:20px 0" role="tabpanel" class="tab-pane <?= $post_flag ? 'active' : '' ?>" id="reading">
                
            <?php if ($id != 2) { ?>
                    <span class="text-muted"><i>(reading section)</i></span>
                <?php } else { ?>
                    <center><h4>llness and Disease</h4></center>
                    <br>
                    <p>Anemia, for example, is now a treatable disorder but this alone is not enough to get rid of the larger problem of heart disease which now affects over 26.5 million people in America and is largely caused by poor diet. On the other hand modern medicine has proved very effective in combating meningitis, with new treatments offered for both viral and bacterial versions of the disease. Polio, which was one of the major concerns of the last century, is close to being eradicated with only a few outbreaks in certain parts of the developing world.</p>

                    <p>There are of course many diseases which remain incurable such as acquired immunodeficiency syndrome (AIDS), which although is far from the levels of near epidemic of the 1980's remains a major concern for world healthcare. Modern medicine has developed a way to treat for AIDS but has yet to find a cure. Another incurable illness is influenza (flu), which although affecting over 10% of the population of the western world is only treatable proactively in the form of a vaccination. So while medical advances have made it possible to treat, cure or even eradicate illness there are still many conditions which remain dangerous.</p>

                    <br>
                    <br>
                    <?php if ($post_flag) { ?>
                        <div class="alert alert-info">
                            <big>Score : <?= $count_true / 5 * 100 ?></big>
                            <br><small>Benar: <?= $count_true ?>, Salah: <?= 5 - $count_true ?></small>
                        </div>

                        <br>1. What is the main cause of heart disease in the USA?
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a. Bad stress management
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. Sleep deprivation
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red"><b>c. Unorganized eating plan</b></span>
                        <br>
                        <br>2. The word “combatting” in the text is best replaced by..?
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red"><b>a. Attack</b></span>
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. Keep
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c. Defend 
                        <br>
                        <br>3. What does the word “incurable” in the text mean?
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red"><b>a. Cannot be healed</b></span>
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. Cannot be transmitted
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c. Cannot be diagnosed 
                        <br>
                        <br>4. What disease in the USA that only can be treated by vaccine?
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a. Anaemia
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red"><b>b. Flu</b></span>
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c. AIDS
                        <br>
                        <br>5. Viral disease can also be said as..?
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red"><b>a. Endemic disease</b></span>
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. Curable disease
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c. Infectious diseases
                        
                    <?php } else { ?>

                        <b>Please answer the questions below:</b>
                            <br>
                            <?php $form = ActiveForm::begin(); ?>

                            <?php foreach ($readingQuestions as $readingQuestion) { ?>
                                <br><?= $readingQuestion['id'] ?>. <?= $readingQuestion['question'] ?>
                                <?= Html::radioList(
                                    $readingQuestion['id'], 
                                    null, 
                                    $readingQuestion['answers'], 
                                    ['class' => 'checkbox']) 
                                ?>
                            <?php } ?>

                            <br>
                            <?= Html::submitButton('Submit', ['class' => 'btn btn-success'])?>

                            <?php ActiveForm::end(); ?>

                            <style>
                                .checkbox label { display: block;}
                            </style>
                        
                        <?php } ?>
                        
                <?php } ?>

            </div>

        </div>

    </div>

</div>


<?php 
$js = 
<<<JAVASCRIPT
    function showDentist() {
        $('#nurse').hide();
        $('#dentist').fadeIn();
    }
    function showNurse() {
        $('#dentist').hide();
        $('#nurse').fadeIn();
    }

    function showTranscript(id) {
        $('#'+id).fadeIn();
        $('#showTranscript'+id).hide();
        $('#hideTranscript'+id).show();
    }
    function hideTranscript(id) {
        $('#'+id).fadeOut();
        $('#hideTranscript'+id).hide();
        $('#showTranscript'+id).show();
    }
JAVASCRIPT;

$this->registerJs($js, \yii\web\View::POS_END);
?>