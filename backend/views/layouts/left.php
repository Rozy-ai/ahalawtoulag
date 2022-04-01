<aside class="main-sidebar">

    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => Yii::t('app','Sliders'), 'icon' => 'sliders', 'url' => ['/slider/index']],
                    ['label' => Yii::t('app','Pages'), 'icon' => 'leanpub', 'url' => ['/pages/manager/index']],
                    ['label' => Yii::t('app','News'), 'icon' => 'newspaper-o', 'url' => ['/news/admin/index']],
                    ['label' => Yii::t('app','Services'), 'icon' => 'picture-o', 'url' => ['/services/index'],],
                    ['label' => Yii::t('app','Settings'), 'icon' => 'dropbox', 'url' => ['/settings/index']],
                    ['label' => Yii::t('app','Our clients'), 'icon' => 'sliders', 'url' => ['/testimonial/index']],
                    ['label' => Yii::t('app','Users'), 'icon' => 'address-book', 'url' => '#',
                        'items' => [
                            ['label' => Yii::t('app','Users'), 'icon' => 'users', 'url' => ['/user/admin/index'],],
                            ['label' => Yii::t('app','Create'), 'icon' => 'user', 'url' => ['/user/admin/create'],],
                        ]
                    ],
                    ['label' => Yii::t('app','Sign out'), 'url' => ['user/security/logout'], 'template' => '<a href="{url}" data-method="post" style="color:yellow"><i class="fa fa-sign-out"></i><span>{label}</span></a>'],
                ],
            ]
        ) ?>

    </section>

</aside>
