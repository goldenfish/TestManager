<?php $this->load->view("header"); ?>
<div>

    <form action="<?php echo base_url("blog/addBlog");?>" method="post">
        title:<input type="text" name="title"/><br/>
        content:<textarea name="content" rows="6" cols="200"></textarea><br/>
        <input type="submit" value="Submit" class="btn"/>
    </form>
</div>
<?php $this->load->view("footer");?>