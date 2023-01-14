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

    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div>
            <label class="float-right" style="font-size:18px; font-weight:bold; margin-bottom:0px;"><?php echo $this->Paginator->counter(__('Page') . ' {{page}} / {{pages}}'); ?></label>
        </div>

        <br>
        <br>
    
        <div id="bigPagination" class="page list float-right">
            <ul class="pagination bootpag" style="font-size: 18px; font-weight:bold; margin-top:0px !important;">
                <?php echo $this->Paginator->first(__('first')); ?>
                <?php echo $this->Paginator->prev(__('previous')); ?>
                <?php echo $this->Paginator->numbers(); ?>
                <?php echo $this->Paginator->next(__('next')); ?>
                <?php echo $this->Paginator->last(__('last')); ?>
            </ul>
        </div>
        <div id="smallPagination" class="page list float-right">
            <ul class="pagination bootpag" style="font-size: 18px; font-weight:bold; margin-top:0px !important;">
                <?php echo $this->Paginator->first(__('first')); ?>
                <?php echo $this->Paginator->prev(__('previous')); ?>
                <?php echo $this->Paginator->next(__('next')); ?>
                <?php echo $this->Paginator->last(__('last')); ?>
            </ul>
        </div>
    </div>

    <script>
        function myFunction(screen) {
            if (screen.matches) {
                document.getElementById("smallPagination").style.display = 'block';
                document.getElementById("bigPagination").style.display = 'none';
                console.log("Small Pagination");
            } 
            else {
                document.getElementById("bigPagination").style.display = 'block';
                document.getElementById("smallPagination").style.display = 'none';
                console.log("Big Pagination");
            }
        }
        var screen = window.matchMedia("(max-width: 970px)")
        myFunction(screen) // Call listener function at run time
        screen.addListener(myFunction) // Attach listener function on state changes
    </script>
    
<?php endif; ?>