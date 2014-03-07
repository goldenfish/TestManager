<?php $this->load->view("header");?>
<div>
    <table>
    <?php

    if(empty($query)){
        echo '没有数据，点击‘<span style="font-weight: bolder;">添加</span>’插入一条数据试试！';
    }

    foreach($query as $item):?>
       <tr>
           <td><?php echo $item->title?></td>
           <td><?php echo $item->content?></td>
           <td><?php echo $item->date?></td>
           <td><a href="<?php echo base_url("blog/detail/$item->id");?>">Detail</a></td>
           <td><a href="<?php echo base_url("blog/updatepage/$item->id");?>">Update</a></td>
           <td><a href="<?php echo base_url("blog/del/$item->id");?>">Del</a></td>
       </tr>
    <?php endforeach;?>
    </table>
</div>
<?php $this->load->view("footer");?>