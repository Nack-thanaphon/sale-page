<?php
/**
 *
 * Paginate page element display all paginate page in box-footer
 * @author
 */

$params = $this->Paginator->params();
$showSummary = isset($showSummary) ? $showSummary : true;
?>

<?php if ($params['pageCount'] > 1): ?>
    <div class="page list">
        <ul class="pagination bootpag">
            <?php echo $this->Paginator->first('<< ' . __('first')); ?>
            <?php echo $this->Paginator->prev('< ' . __('previous')); ?>
            <?php echo $this->Paginator->numbers(); ?>
            <?php echo $this->Paginator->next(__('next') . ' >'); ?>
            <?php echo $this->Paginator->last(__('last') . ' >>'); ?>
        </ul>
        <p><?php echo $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')); ?></p>
    </div>
<?php endif; ?>