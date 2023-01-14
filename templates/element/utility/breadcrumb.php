<?php
/**
 * application breadcrumb 
 * @author sarawutt.b
 */
use Cake\Utility\Inflector;
?>
<div class="small-header transition animated fadeIn">
    <div class="hpanel">
        <div class="panel-body">
            <!--right bread crumb--> 
            <div id="hbreadcrumb" class="pull-right">
                <ol class="hbreadcrumb breadcrumb">
                    <li><i class="fa fa-home"></i> <a href="/"><?php echo __('Home'); ?></a></li>
                    <li><span><?php echo $this->Html->link(__(Inflector::humanize($this->request->controller)), ['controller' => $this->request->controller, 'action' => 'index']); ?></span></li>
                    <li class="active"><a href="#"><span><?php echo __(Inflector::humanize($this->request->action)); ?></span></a></li>
                </ol>
            </div>

            <!--left system name-->
            <h2 class="font-light m-b-xs">
                <?php echo $this->configure->read('Application.Name'); ?>
            </h2>
            <small><?php echo __('Control panel') . ' ( ' .__(Inflector::humanize($this->request->controller)) . ' )'; ?></small>
        </div>
    </div>
</div>