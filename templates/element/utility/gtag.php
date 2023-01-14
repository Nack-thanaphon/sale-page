<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-122839704-1"></script>
<script type="text/javascript">
    window.dataLayer = window.dataLayer || [];
    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-122839704-1');
<?php if ($this->request->session()->check('Auth.User')): ?>
        gtag('set', {'user_id': '<?php echo hash('sha256', $this->request->session()->read('Auth.User.username')); ?>'});
<?php endif; ?>
</script>