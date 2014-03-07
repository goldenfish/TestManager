<?php $this->load->view("header");?>
<div>
    <form action="<?php echo base_url("blog/update");?>" method="post">
        title:<input type="text" name="title" value="<?php echo $blog->title; ?>"/><br/>
        content:<textarea name="content" rows="6" cols="200"><?php echo $blog->content; ?></textarea><br/>
        <input type="hidden" name="id" value="<?php echo $blog->id; ?>"/>
        <input type="submit" value="Submit"/>
    </form>
</div>
<?php $this->load->view("footer");?>