<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cart $cart
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Cart'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cart form content">
            <?= $this->form->create($cart) ?>
            <fieldset>
                <legend><?= __('Add Cart') ?></legend>
                <?php
                    echo $this->form->control('c_detail');
                    echo $this->form->control('c_user_id');
                    echo $this->form->control('c_status');
                    echo $this->form->control('c_created_at');
                    echo $this->form->control('c_updated_at');
                ?>
            </fieldset>
            <?= $this->form->button(__('Submit')) ?>
            <?= $this->form->end() ?>
        </div>
    </div>
</div>
