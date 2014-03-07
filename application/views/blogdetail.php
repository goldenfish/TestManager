<?php $this->load->view("header");?>
<div>
    <dl>
           <dt>标题:<?php echo $blog->title?></dt>
           <dd>ID:<?php echo $blog->id?></dd>
           <dd>内容:<?php echo $blog->content?></dd>
           <dd>创建日期：</td><?php echo date("Y-m-d H:i:s",$blog->date);?></dd>
    </dl>
</div>
<?php $this->load->view("footer");?>