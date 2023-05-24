<?php
class Product 
{
    private $title;
    public $id;
    private $price;
    private $discount;
    private $quantity;
    private $images;
    public $research;

    public function __construct($id='')
    {
        
        if ($id)
        {
            $this->id = $id;
            $this->getData();
        }
    }
    private function getData()
    {
        $mysqli = new Database();
        $sql = "Select * from product where id=".$this->id;
        $mysqli->getConnection();
        $mysqli->runQuery($sql);
        if ($mysqli->num_rows == 1)
        {
            $this->research = $mysqli->getRow();
            $this->price = $this->research['price'];
            $this->title = $this->research['title'];
            $this->title = $this->research['discount'];
            $this->quantity = $this->research['quantity'];
            $this->images = $this->research['images'];
        }
        
    }
    public function displayInput()
    {
        ?>
        <div class="col-md-12">
            <form action="" method="POST" name='form' enctype="multipart/form-data">
                 <div class="card mb-4 product-wap rounded-0">
                     <div class="card rounded-0">
                     <div>
                        <input type="number" id="id" name ="id" hidden value="<?= $this->research['id'] ?>"/>

                    </div>
                    <div class = "mt-3">
                    <label for="title">Set Title</label>
                     <input type="text" id="title" name="title"  value="<?= $this->research['title'] ?>" />
                    </div>
                    

                    <div class = "mt-3">
                    <label for="price">Set Price</label>
                     <input  type="number"  id="price"  name="price" value="<?= $this->research['price'] ?>" min='0' max='99' />
                    </div>

                    <div class = "mt-3">
                    <label for="price">Set Discount</label>
                     <input  type="number"  id="discount"  name="discount" value="<?= $this->research['discount'] ?>" step ="0.01" />
                    </div>

                    <div class = "mt-3">
                    <label for="price">Set Quantity</label>
                     <input type="number" id="quantity" name="quantity" value="<?= $this->research['quantity'] ?>" />
                    </div>
                    <div id='product_IMG'>
            <?php
            if ($this->research['image_URL'])
            {
            ?> 
                <img src="<?= $this->research['image_URL']?>" height= '100px' />
            <?php
            }
            ?>
                    </div>
                    <div>
                     <label for="images">Set Image (PNG, JPG)</label>
                     <input type="file" id="FILE" name="FILE" accept=".jpg, .jpeg, .png" multiple onclick = "document.getElementById('product_IMG').hidden=true;" />   </div>
                     <div>
                        <input type="submit" id="submmit" name="Send" value="SAVE"/>
                     </div>
                </div>
            </form>
           
                  
</div>
<?php
    }
    public function saveData($data)
    {
        if ($data['id'])
        {
            if (file_exists($_SERVER['DOCUMENT_ROOT'].$this->research['image_URL']) && $_POST['image_URL'])
            { 
                unlink($_SERVER['DOCUMENT_ROOT'].$this->research['image_URL']);
            }
            $sql = "UPDATE product set ";
        }
        else 
        {
            $sql = "INSERT into product set ";
        }
        foreach ($data as $key => $val)
        {
            if ($key != 'id' && $key != 'Send')
            {
                $sql .= $key . "='".addslashes($val)."', ";
            }
        }
         $sql .= " userId=".$_SESSION['user_id']." ";
        
         
       if ($data['id'])
       {
         $sql .= ", updatedAt=now() where id=".$data['id'];
       }
       else $sql .= ", createdAt=now()";
       $mysqli = new Database();
       $mysqli->getConnection();
       $mysqli->runQuery($sql);
    }
    public function deleteData()
    {
        if (file_exists($_SERVER['DOCUMENT_ROOT'].$this->research['image_URL']))
        { 
            unlink($_SERVER['DOCUMENT_ROOT'].$this->research['image_URL']);
        }
        
       $mysqli = new Database();
       $mysqli->getConnection();
       $mysqli->runQuery('delete from product where id='.$this->research['id']);
        
    }
    public function displayCard($atribute='')
    {
        ?>  
            <div class="product_box no_margin_right" style="margin-left:6px;margin-right:6px;height:300px;width:220px">
            <a><img src="<?= $this->research['image_URL'] ?>" height=150px, width=205px/></a>
            <?php if($this->research['discount']) { ?>
            <h3><?= $this->research['title'] ?></h3>
            <?php }else{ ?>
            <h3 style="margin-bottom:35px"><?= $this->research['title'] ?></h3>
            <?php } ?>
            <?php if($this->research['discount']) { ?>
            <p class="product_price"><s><?= $this->research['price']?> $</s></p>
            <?php } ?>
            <p class="product_price"><?= round($this->research['price']*(100- $this->research['discount'])/100,2 )?> $</p>
            <?php if (!$atribute) { ?>
            <p style="background-color:#e3e3e3">
                <a style="text-decoration: none; color:#3b3b3b; font-size:14px" onclick="window.open('/itempanel.php?id=<?= $this->research['id'] ?>', 'edit', 'left=200,top=100,height=400,width=600')">Change</a>
            </p>
            <p style="background-color:#e3e3e3">
                <a style="text-decoration: none; color:#3b3b3b; font-size:14px" onclick="window.open('/delete.php?id=<?= $this->research['id'] ?>', 'edit', 'left=200,top=100,height=100,width=100')">Delete</a>
            </p>
            <?php } ?>
            </div>
    <?php
    }
}
?>
