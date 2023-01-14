<?php
#{"message":"The subject has been saved.","type":"success"}
$notification = $this->Flash->render();
if (!empty($notification)) {
    $notification = json_decode($notification, true);
    if (empty($notification['type']))
        $notification['type'] = 'success';
    ?>
    <script>
        setTimeout(function () {
            notification('<?php echo $notification['message']; ?>', '<?php echo $notification['type']; ?>');
        }, 300);
    </script>
<?php } ?>
