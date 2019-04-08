<?php 
    use yii\helpers\Url;
?>

<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <?php if (!Yii::$app->user->isGuest) { ?>
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= Url::base().'/img/user.jpg' ?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="circle text-success"></i> <?= Yii::$app->user->identity->email ?></a>
            </div>
        </div>
        <?php } ?>

        <?php   
            $menuItems = [
                ['label' => '<b>MENU</b>', 'encode' => false, 'options' => ['class' => 'header']],
                ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],

                ['label' => 'Dashboard', 'icon' => 'dashboard', 'url' => ['/site/index']],
                
                ['label' => 'Category', 'icon' => 'tags', 'url' => ['/category/index']],
                // ['label' => 'Factor', 'icon' => 'cube', 'url' => ['/factor/index']],
                ['label' => 'Project', 'icon' => 'cubes', 'url' => ['/project/index']],
                // ['label' => 'Project Assessment', 'icon' => 'money', 'url' => ['/project-assessment/index']],
                
                // ['label' => 'User', 'icon' => 'user', 'url' => ['/user/index'], /* 'visible' => Yii::$app->user->can('superuser') */],
                /* [
                    'label' => 'Access Control',
                    'icon' => 'lock',
                    'url' => '#',
                    'options' => ['class' => 'treeview'],
                    'visible' => Yii::$app->user->can('superuser'),
                    'items' => [
                        ['label' => 'User',         'url' => ['/user/index']],
                        ['label' => 'Assignment',   'url' => ['/acf/assignment']],
                        ['label' => 'Role',         'url' => ['/acf/role']],
                        ['label' => 'Permission',   'url' => ['/acf/permission']],
                        ['label' => 'Route',        'url' => ['/acf/route']],
                        ['label' => 'Rule',         'url' => ['/acf/rule']],
                    ],
                ], */
                // ['label' => 'Log', 'icon' => 'clock-o', 'url' => ['/log/index'],'visible' => Yii::$app->user->can('superuser')],
            ];

            $menuItems = mdm\admin\components\Helper::filter($menuItems);
        ?>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => $menuItems,
            ]
        ) ?>
        
        <!-- <ul class="sidebar-menu"><li><a href="<?= \yii\helpers\Url::to(['site/logout']) ?>" data-method="post"><i class="sign-out"></i>  <span>Logout</span></a></li></ul> -->
    
    </section>

</aside>
