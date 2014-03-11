<?php $this->load->view("header");?>
    <p>
        <img src="<?php echo base_url("uploads/".$upload_data['file_name']);?>"/>
    </p>
<ul>

    <?php foreach($upload_data as $item => $value):?>
        <li><?php echo $item;?>: <?php echo $value;?></li>
    <?php endforeach; ?>
</ul>

<p><?php echo anchor('upload', 'Upload Another File!'); ?></p>

<?php $this->load->view("footer");?>