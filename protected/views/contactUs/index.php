<?php
$this->breadcrumbs = array(
    'Contact Uses' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => Yii::t('translate', 'List ContactUs'), 'url' => array('index')),
    array('label' => Yii::t('translate', 'Create ContactUs'), 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('contact-us-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Manage Contact Uses'); ?>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php
$this->renderPartial('_search', array(
    'model' => $model,
));
?>
</div><!-- search-form -->

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'contact-us-grid',
    'type' => 'striped  condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        //'id',
        'company_name',
        'first_name',
        'last_name',
        'email',
        'subject',
        'send_updates'=>array(
            'name'=>'send_updates',
            'value'=>'$data->send_updates?"Yes":"No"',
            'filter'=>array('1'=>'Yes', '0'=>'No')
        ),
        /*
          'comment',
         */
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
