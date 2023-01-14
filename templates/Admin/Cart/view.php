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
            <?= $this->Html->link(__('Edit Cart'), ['action' => 'edit', $cart->c_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Cart'), ['action' => 'delete', $cart->c_id], ['confirm' => __('Are you sure you want to delete # {0}?', $cart->c_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cart'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Cart'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cart view content">
            <h3><?= h($cart->c_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('C Status') ?></th>
                    <td><?= h($cart->c_status) ?></td>
                </tr>
                <tr>
                    <th><?= __('C Id') ?></th>
                    <td><?= $this->Number->format($cart->c_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('C User Id') ?></th>
                    <td><?= $cart->c_user_id === null ? '' : $this->Number->format($cart->c_user_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('C Created At') ?></th>
                    <td><?= h($cart->c_created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('C Updated At') ?></th>
                    <td><?= h($cart->c_updated_at) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('C Detail') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($cart->c_detail)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
