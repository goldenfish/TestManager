<?php $this->load->view("header");?>
<div>
    <h3>上传文件</h3>
    <?php echo $error;?>

    <?php echo form_open_multipart('upload/do_upload');?>

    <input type="file" name="userfile" size="20" />

    <br /><br />

    <input type="submit" value="upload" />

    </form>
</div>
<?php $this->load->view("footer");?>