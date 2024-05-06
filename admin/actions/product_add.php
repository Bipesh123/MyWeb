<?php
include_once "../../config.php";
$brand = new \Lib\Models\Brand();
$brands = $brand->all();
  
$error = null;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $brand = new \Lib\Models\Product();

    try {
        $brandPhotos = _ADMIN_PATH . "/uploads/products";
        $postData = $_POST;
        $postData['photo_name'] = null;
        if(is_uploaded_file($_FILES['photo_name']['tmp_name'])) {
            $fileName = basename($_FILES['photo_name']['name']);
            move_uploaded_file($_FILES['photo_name']['tmp_name'], $brandPhotos . "/" . $fileName);
            $postData['photo_name'] = $fileName;
        }
        $brand->create($postData);
        $_SESSION['success'] = "Product added successfully!";
        header("Location: ../pages/products.php");
        die();
    }
    catch(\Lib\Core\ShoppingException $exception) {
        $error = $exception->getMessage();
    }
    catch(\Exception $exception) {
        $error = $exception->getMessage();
    }
}
?>
  <?php include_once "../partials/header.php"; ?>
        <?php include_once "../partials/navigation.php"; ?>
        <main class="app-content">
          <?php if(isset($error)) : ?>
                      <div class="alert alert-danger">
                          <?php echo $error; ?>
                      </div>
                      <?php endif; ?>
                    <br />
        <div class="login">
    <div class="login_title">
   <h4> Add Product</h4>
   <P><a href="../pages/products.php"> << Back</a></P>
  </div>
        <form enctype="multipart/form-data" method="post" id="brand_edit" name="brand_edit" action="">
            <div class="loginbox">
            <div class="login-col1">
                 <select name="brand_id" id="brand_id" class="form-control">
                                    <option value="" selected>Select Brand</option>
                                    <?php foreach($brands as $brand): ?>
                                        <option value="<?php echo $brand['id']; ?>"><?php echo $brand['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
            <p>Name*</p>
            <input type="text" name="name" vlaue="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>"placeholder="Product name" required=""/>
            <p>Price*</p>
            <input type="text" name="price" vlaue="<?php echo isset($_POST['price']) ? $_POST['price'] : ''; ?>"placeholder="Product price" required=""/>
            <p>Previous price</p>
            <input type="text" name="previous_price" vlaue="<?php echo isset($_POST['previous_price']) ? $_POST['previous_price'] : ''; ?>"placeholder="Product previous price">
            <p>Stock Quantity*</p>
            <input type="text" name="stock_quantity" vlaue="<?php echo isset($_POST['stock_quantity']) ? $_POST['stock_quantity'] : ''; ?>"placeholder="Product stock quantity" required=""/>
              <p>Network:</p>
                          
                         <select name="network" class="form-control">
                                 <option value="">Select</option>
                                  <option value="2g">2G</option>
                                  <option value="2g/3g">2G/3G</option>
                                  <option value="2g/3g/4g">2G/3G/4G</option>
                            </select>
                         
                          <p>SIM:</p>
                         
                             <select name="sim" class="form-control">
                                 <option value="">Select</option>
                                  <option value="single">Single</option>
                                  <option value="dual">Dual</option>
                            </select>
                            <p>PLATFORM:</p>
                            <p>OS:</p>
                        <select name="os" class="form-control">
                                 <option value="">Select</option>
                                  <option value="andriod">Andriod</option>
                                  <option value="ios">IOS</option>
                                  <option value="windows">Windows</option>
                            </select>
                           <p>OS version:</p>
                           <input type="text" name="osversion" value="" class="form-control">   

                           <p>Chipset:</p>
                           <select name="chipset" class="form-control">
                                 <option value="">Select</option>
                                  <option value="snapdragon">Snapdragon</option>
                                  <option value="exynos">Exynos</option>
                                  <option value="helio">Helio</option>
                                  <option value="kirin">Kirin</option>
                                  <option value="mediatek">MediaTek</option>
                                  <option value="aseries">Aseries</option>
                            </select> 
                             <p>Memory:</p>
                            <p>RAM:</p>
                             <select name="ram" class="form-control">
                                 <option value="">Select</option>
                                  <option value="1gb">1GB</option>
                                  <option value="2gb">2GB</option>
                                  <option value="3gb">3Gb</option>
                                  <option value="4gb">4GB</option>
                                  <option value="6gb">6GB</option>
                                  <option value="8gb">8Gb</option>
                            </select>
                            <p>Internal Storage:</p>
                            <select name="internalstorage" class="form-control">
                                 <option value="">Select</option>
                                  <option value="4gb">4GB</option>
                                  <option value="8gb">8GB</option>
                                  <option value="16gb">16GB</option>
                                  <option value="32gb">32GB</option>
                                  <option value="64gb">64GB</option>
                                  <option value="128gb">128GB</option>
                                   <option value="256gb">256GB</option>
                                  <option value="512gb">512GB</option>
                            </select>

                          <p>Display:</p>
                            <p>Resoultion:</p>
                            <select name="dresolution" class="form-control">
                                 <option value="">Select</option>
                                  <option value="240x400">240x400</option>
                                  <option value="320x480">320x480</option>
                                  <option value="480x800">480x800</option>
                                  <option value="540x960">540x960</option>
                                  <option value="720x1280">720x1280</option>
                                  <option value="1080x1920">1080x1920</option>
                                  <option value="1440x2560">1440x2560</option>
                            </select>
                            <p>Size:...(inch)</p>
                             <select name="dsize" class="form-control">
                                 <option value="">Select</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                            </select>           
                            <p>Touch Screen:</p>
                      <select name="touchscreen" class="form-control">
                                 <option value="">Select</option>
                                  <option value="ips">IPS</option>
                                  <option value="amoled">AMOLED</option>
                            </select>
                            <p>NOCH:</p>
                  <select name="noch" class="form-control">
                                 <option value="">Select</option>
                                  <option value="yes">YES</option>
                                  <option value="no">NO</option>
                            </select>      
                          <p>Main-Camera:<p>
                            <p>Resoultion:</p>
                     <select name="resolution" class="form-control">
                                 <option value="">Select</option>
                                  <option value="2mp">2MP</option>
                                  <option value="5mp">5MP</option>
                                  <option value="8mp">8MP</option>
                                  <option value="12mp">12MP</option>
                                  <option value="13mp">13MP</option>
                                  <option value="16mp">16MP</option>
                                  <option value="20mp">20MP</option>
                                  <option value="24mp">24MP</option>
                                  <option value="32mp">32MP</option>
                                  <option value="48mp">48MP</option>
                            </select>
                            <p>Cameras:</p>
                   <select name="camera" class="form-control">
                                 <option value="">Select</option>
                                  <option value="single">Single</option>
                                  <option value="dual">Dual</option>
                                  <option value="triple">Triple</option>
                            </select>
                            <p>Video: </p>
                  <select name="video" class="form-control">
                                 <option value="">Select</option>
                                  <option value="vga">VGA</option>
                                  <option value="720p">720P</option>
                                  <option value="1080p">1080P</option>
                                  <option value="2160p">2160P</option>
                            </select>
                            <p>Flash:</p>
                      <select name="flash" class="form-control">
                                 <option value="">Select</option>
                                  <option value="led">LED</option>
                                  <option value="dual-led">Dual-LED</option>
                            </select>
                          <p>Selfiee-Camera:</p>
                            <p>Resoultion:</p>
                    <select name="selfieeresolution" class="form-control">
                                 <option value="">Select</option>
                                  <option value="2mp">2MP</option>
                                  <option value="5mp">5MP</option>
                                  <option value="8mp">8MP</option>
                                  <option value="12mp">12MP</option>
                                  <option value="13mp">13MP</option>
                                  <option value="16mp">16MP</option>
                                  <option value="20mp">20MP</option>
                                  <option value="24mp">24MP</option>
                                  <option value="32mp">32MP</option>
                                  <option value="48mp">48MP</option>
                            </select>
                            <p> Dual Camera:</p>
                    <select name="selfieedualcamera" class="form-control">
                                 <option value="">Select</option>
                                  <option value="yes">YES</option>
                                  <option value="no">NO</option>
                            </select>
                            <p> Front-Flash:</p>
                        <select name="selfieefontflash" class="form-control">
                                 <option value="">Select</option>
                                  <option value="yes">YES</option>
                                  <option value="no">NO</option>
                            </select>
                     
                          
           
          </div>
        <div class="login-col2 signup">

           <p>Description*</p>
           <textarea name="description" class="prod-description" placeholder="Enter product description here" ></textarea>
             <p>Product image </p>
             <input type="file" id="photo_name" name="photo_name" value="">
               
                            <p>Finger Print:</p>
                        <select name="fingerprint" class="form-control">
                                  <option value="">Select</option>
                                  <option value="yes">YES</option>
                                  <option value="no">NO</option>
                            </select>

                          <p>Connectivity:</p>
                            <p>WLAN:</p>
                      <select name="wlan" class="form-control">
                                 <option value="">Select</option>
                                  <option value="802.11n">802.11n</option>
                                  <option value="802.11ac">802.11ac</option>
                                  <option value="wifi direct">WIFI DIRECT</option>
                                  <option value="wifi hotspot">WIFI HOTSPOT</option>
                                  <option value="dlna">DLNA</option>
                            </select>
                            <p>GPS:</p>
                  <select name="gps" class="form-control">
                                 <option value="">Select</option>
                                  <option value="yes">YES</option>
                                  <option value="no">NO</option>
                            </select>
                            <p>Bluetooth:</p>
                     <select name="bluetooth" class="form-control">
                                 <option value="">Select</option>
                                  <option value="bluetooth 2.0">Bluetooth 2.0</option>
                                  <option value="bluetooth 2.1">Bluetooth 2.1</option>
                                  <option value="bluetooth 3.0">Bluetooth 3.0</option>
                                  <option value="bluetooth 4.0">Bluetooth 4.0</option>
                                  <option value="bluetooth 4.1">Bluetooth 4.1</option>
                                  <option value="bluetooth 4.2">Bluetooth 4.2</option>
                                  <option value="bluetooth 5.0">Bluetooth 5.0</option>
                            </select>
                            <p>USB:</p>
                             <select name="usb" class="form-control">
                                 <option value="">Select</option>
                                  <option value="usb-b">USB-B</option>
                                  <option value="usb-a">USB-A</option>
                                  <option value="micro-usb">Micro-USB</option>
                                  <option value="usb-c">USB-C</option>
                            </select>
                            <p>FM Radio:</p>
                            <select name="fmradio" class="form-control">
                                 <option value="">Select</option>
                                  <option value="yes">YES</option>
                                  <option value="no">NO</option>
                            </select>
                          <label >Battery:</label>
                            <p>Capacity:</p>
                     <select name="batterycapacity" class="form-control">
                                 <option value="">Select</option>
                                  <option value="1500mah">1500MAh</option>
                                  <option value="1700mah">1700MAh</option>
                                  <option value="2000mah">2000MAh</option>
                                  <option value="2200mah">2200MAh</option>
                                  <option value="2500mah">2500MAh</option>
                                  <option value="3000mah">3000MAh</option>
                                  <option value="3500mah">3500MAh</option>
                                  <option value="4000mah">4000MAh</option>
                                  <option value="4500mah">4500MAh</option>
                                  <option value="5000mah">5000MAh</option>
                            </select>
                            <p>Charging Speed:</p>
                        <select name="chargingspeed" class="form-control">
                                 <option value="">Select</option>
                                  <option value="10w">10W</option>
                                  <option value="15w">15W</option>
                                  <option value="18w">18W</option>
                                  <option value="20w">20W</option>
                                  <option value="25w">25W</option>
                                  <option value="30w">30W</option>
                                  <option value="40w">40W</option>
                                  <option value="50w">50W</option>
                            </select>
                            <p>Removable:</p>
                           <select name="removable" class="form-control">
                                 <option value="">Select</option>
                                  <option value="yes">YES</option>
                                  <option value="no">NO</option>
                            </select>
                            <p>Wireless Charge:</p>
                    <select name="wirelesscharge" class="form-control">
                                 <option value="">Select</option>
                                  <option value="yes">YES</option>
                                  <option value="no">NO</option>
                            </select>
            <p>Status*</p>
            <input type="radio" name="status" value="1"> &nbsp; Active &nbsp;
                              <input type="radio" name="status" value="0"> Inactive
            <input type="submit" name="btnLogin" value="Submit">
            </div>
        </div>
        </div>
        </form>
                            
  </div> 
</main>
<?php include_once "../partials/footer.php";?>