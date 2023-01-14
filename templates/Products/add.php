<!-- 
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside> -->
<div class="card p-1 m-1 ">
    <div class="m-3">
        <?= $this->form->create($product) ?>
        <div class="form-group">
            <h3 class="font-weight-bold"><?= __('เพิ่มสินค้า') ?></h3>
            <div class="form-floating mb-1">
                <?= $this->form->input('p_promotion', ['class' => 'form-control ']); ?>
                <label for="floatingemail">โปรโมชั่น</label>
            </div>
            <div class="form-floating mb-1">
                <?= $this->form->input('p_title', ['class' => 'form-control ']); ?>
                <label for="floatingemail">ชื่อสินค้า</label>
            </div>
            <div class="form-floating mb-1">
                <?= $this->form->input('p_type_id', ['class' => 'form-control ']); ?>
                <label for="floatingemail">ชนิดสินค้า</label>
            </div>
            <div class="form-floating mb-1">
                <?= $this->form->input('p_detail', ['class' => 'form-control ']); ?>
                <label for="floatingemail">รายละเอียดสินค้า</label>
            </div>
            <div class="form-floating mb-1">
                <?= $this->form->input('p_price', ['class' => 'form-control ']); ?>
                <label for="floatingemail">ราคาสินค้า</label>
            </div>
            <div class="form-group my-2">
                <small>ภาพสินค้า</small>
                <?= $this->form->file('p_image_id', ['class' => 'form-control ']); ?>

            </div>


        </div>
        <?= $this->form->button(__('Submit'), ['class' => 'btn btn-primary w-100']) ?>
        <?= $this->form->end() ?>
    </div>