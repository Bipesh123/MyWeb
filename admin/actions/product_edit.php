<?php
include_once "../../config.php";

$brand = new \Lib\Models\Brand();
$brands = $brand->all();

$product = new \Lib\Models\Product();

$id = (int) $_GET['id'];
$info = $product->getSingle($id);

if(!$info) {
    $_SESSION['error'] = "Product with ID $id not found!";
    header("Location: products.php");
    die();
}

$error = null;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // check if the given brandname already exists or not
    try {
        $brandPhotos = _ADMIN_PATH . "/uploads/products";
        $postData = $_POST;
        $postData['photo_name'] = $postData['photo_name_old'];
        if(is_uploaded_file($_FILES['photo_name']['tmp_name'])) {
            $fileName = basename($_FILES['photo_name']['name']);
            move_uploaded_file($_FILES['photo_name']['tmp_name'], $brandPhotos . "/" . $fileName);
            $postData['photo_name'] = $fileName;

            /**
             * Delete old file if the brand has already
             */
            if(file_exists($brandPhotos . "/" . $postData['photo_name_old'])) {
                unlink($brandPhotos . "/" . $postData['photo_name_old']);
            }
        }

        $product->update($postData, $id);
        $_SESSION['success'] = "Product information updated successfully!";
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
   <h4> Edit Product</h4>
   <P><a href="../pages/products.php"> << Back</a></P>
  </div>
                  <form enctype="multipart/form-data" method="post" id="brand_edit" name="brand_edit" action="">
            <div class="loginbox">
            <div class="login-col1">
                 <select name="brand_id" id="brand_id" class="form-control">
                                     <option value="" selected>Select Brand</option>
                                    <?php foreach($brands as $brand): ?>
                                        <option value="<?php echo $brand['id']; ?>" <?php echo $brand['id'] == $info['brand_id'] ? ' selected=""' : ''; ?>><?php echo $brand['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
            <p>Name*</p>
            <input type="text" name="name" value="<?php echo htmlentities($info['name']); ?>"required=""/>
            <p>Price*</p>
            <input type="text" name="price" value="<?php echo isset($info['price']) ? $info['price'] : ''; ?>"required=""/>
            <p>Stock Quantity*</p>
            <input type="text" name="stock_quantity" value="<?php echo isset($info['stock_quantity']) ? $info['stock_quantity'] : ''; ?>"required=""/>
              <p>Network:</p>
                          
                         <select name="network" class="form-control">
                                 <option value="<?php echo isset($info['network']) ? $info['network'] : ''; ?>"><?php echo isset($info['network']) ? $info['network'] : ''; ?></option>
                                  <option value="2g">2G</option>
                                  <option value="2g/3g">2G/3G</option>
                                  <option value="2g/3g/4g">2G/3G/4G</option>
                            </select>
                         
                          <p>SIM:</p>
                         
                             <select name="sim" class="form-control">
                                 <option value="<?php echo isset($info['sim']) ? $info['sim'] : ''; ?>"><?php echo isset($info['sim']) ? $info['sim'] : ''; ?></option>
                                  <option value="single">Single</option>
                                  <option value="dual">Dual</option>
                            </select>
                            <p>PLATFORM:</p>
                            <p>OS:</p>
                        <select name="os" class="form-control">
                                 <option value="<?php echo isset($info['os']) ? $info['os'] : ''; ?>"><?php echo isset($info['os']) ? $info['os'] : ''; ?></option>
                                  <option value="andriod">Andriod</option>
                                  <option value="ios">IOS</option>
                                  <option value="windows">Windows</option>
                            </select>
                            <p>OS version:</p>
                           <select name="osversion" class="form-control">
                                 <option value="<?php echo isset($info['osversion']) ? $info['osversion'] : ''; ?>"><?php echo isset($info['osversion']) ? $info['osversion'] : ''; ?></option>
                                 <input type="text" name="osversion" value="" class="form-control">
                            </select>
                            <p>Chipset:</p>
                           <select name="chipset" class="form-control">
                                 <option value="<?php echo isset($info['chipset']) ? $info['chipset'] : ''; ?>"><?php echo isset($info['chipset']) ? $info['chipset'] : ''; ?></option>
                                  <option value="snapdragon">Snapdragon</option>
                                  <option value="exynos">Exynos</option>
                                  <option value="helio">Helio</option>
                                  <option value="kirin">Kirin</option>
                                  <option value="mediatek">MediaTek</option>
                            </select> 
                             <p>Memory:</p>
                            <p>RAM:</p>
                             <select name="ram" class="form-control">
                                 <option value="<?php echo isset($info['ram']) ? $info['ram'] : ''; ?>"><?php echo isset($info['ram']) ? $info['ram'] : ''; ?></option>
                                  <option value="1gb">1GB</option>
                                  <option value="2gb">2GB</option>
                                  <option value="3gb">3Gb</option>
                                  <option value="4gb">4GB</option>
                                  <option value="6gb">6GB</option>
                                  <option value="8gb">8Gb</option>
                            </select>
                            <p>Internal Storage:</p>
                            <select name="internalstorage" class="form-control">
                                 <option value="<?php echo isset($info['internalstorage']) ? $info['internalstorage'] : ''; ?>"><?php echo isset($info['internalstorage']) ? $info['internalstorage'] : ''; ?></option>
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
                                 <option value="<?php echo isset($info['dresolution']) ? $info['dresolution'] : ''; ?>"><?php echo isset($info['dresolution']) ? $info['dresolution'] : ''; ?></option>
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
                                 <option value="<?php echo isset($info['dsize']) ? $info['dsize'] : ''; ?>"><?php echo isset($info['dsize']) ? $info['dsize'] : ''; ?></option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                            </select>
                            <p>Touch Screen:</p>
                    <select name="touchscreen" class="form-control">
                                 <option value="<?php echo isset($info['touchscreen']) ? $info['touchscreen'] : ''; ?>"><?php echo isset($info['touchscreen']) ? $info['touchscreen'] : ''; ?></option>
                                  <option value="ips">IPS</option>
                                  <option value="amoled">AMOLED</option>
                            </select>                     
                            <p>NOCH:</p>
                  <select name="noch" class="form-control">
                                 <option value="<?php echo isset($info['noch']) ? $info['noch'] : ''; ?>"><?php echo isset($info['noch']) ? $info['noch'] : ''; ?></option>
                                  <option value="yes">YES</option>
                                  <option value="no">NO</option>
                            </select>      
                          <p>Main-Camera:<p>
                            <p>Resoultion:</p>
                     <select name="resolution" class="form-control">
                                 <option value="<?php echo isset($info['resolution']) ? $info['resolution'] : ''; ?>"><?php echo isset($info['resolution']) ? $info['resolution'] : ''; ?></option>
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
                                 <option value="<?php echo isset($info['camera']) ? $info['camera'] : ''; ?>"><?php echo isset($info['camera']) ? $info['camera'] : ''; ?></option>
                                  <option value="single">Single</option>
                                  <option value="dual">Dual</option>
                                  <option value="triple">Triple</option>
                            </select>
                            <p>Video: </p>
                  <select name="video" class="form-control">
                                 <option value="<?php echo isset($info['video']) ? $info['video'] : ''; ?>"><?php echo isset($info['video']) ? $info['video'] : ''; ?></option>
                                  <option value="vga">VGA</option>
                                  <option value="720p">720P</option>
                                  <option value="1080p">1080P</option>
                                  <option value="2160p">2160P</option>
                            </select>
                            <p>Flash:</p>
                      <select name="flash" class="form-control">
                                 <option value="<?php echo isset($info['flash']) ? $info['flash'] : ''; ?>"><?php echo isset($info['flash']) ? $info['flash'] : ''; ?></option>
                                  <option value="led">LED</option>
                                  <option value="dual-led">Dual-LED</option>
                            </select>
                          <p>Selfiee-Camera:</p>
                            <p>Resoultion:</p>
                    <select name="selfieeresolution" class="form-control">
                                 <option value="<?php echo isset($info['selfieeresolution']) ? $info['selfieeresolution'] : ''; ?>"><?php echo isset($info['selfieeresolution']) ? $info['selfieeresolution'] : ''; ?></option>
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
                                 <option value="<?php echo isset($info['selfieedualcamera']) ? $info['selfieedualcamera'] : ''; ?>"><?php echo isset($info['selfieedualcamera']) ? $info['selfieedualcamera'] : ''; ?></option>
                                  <option value="yes">YES</option>
                                  <option value="no">NO</option>
                            </select>
                            <p> Front-Flash:</p>
                        <select name="selfieefontflash" class="form-control">
                                 <option value="<?php echo isset($info['selfieefontflash']) ? $info['selfieefontflash'] : ''; ?>"><?php echo isset($info['selfieefontflash']) ? $info['selfieefontflash'] : ''; ?></option>
                                  <option value="yes">YES</option>
                                  <option value="no">NO</option>
                            </select>
                     
                          


           
          </div>
        <div class="login-col2 signup">

           <p>Description*</p>
           <textarea name="description" class="prod-description"><?php echo $info['description']; ?></textarea>
             <p>Product images </p>
            <input type="hidden" name="photo_name_old" value="<?php echo $info['photo_name']; ?>">
                                <?php if(!empty($info['photo_name'])): ?>
                                <img width="100" src="<?php echo _ADMIN_URL . "/uploads/products/" . $info['photo_name']; ?>" class="img">
                                <?php endif; ?>

                                <input type="file" class="form-control" id="photo_name" name="photo_name">
                            <p>Finger Print:</p>
                        <select name="fingerprint" class="form-control">
                                  <option value="<?php echo isset($info['fingerprint']) ? $info['fingerprint'] : ''; ?>"><?php echo isset($info['fingerprint']) ? $info['fingerprint'] : ''; ?></option>
                                  <option value="yes">YES</option>
                                  <option value="no">NO</option>
                            </select>

                          <p>Connectivity:</p>
                            <p>WLAN:</p>
                      <select name="wlan" class="form-control">
                                 <option value="<?php echo isset($info['wlan']) ? $info['wlan'] : ''; ?>"><?php echo isset($info['wlan']) ? $info['wlan'] : ''; ?></option>
                                  <option value="802.11n">802.11n</option>
                                  <option value="802.11ac">802.11ac</option>
                                  <option value="wifi direct">WIFI DIRECT</option>
                                  <option value="wifi hotspot">WIFI HOTSPOT</option>
                                  <option value="dlna">DLNA</option>
                            </select>
                            <p>GPS:</p>
                  <select name="gps" class="form-control">
                                 <option value="<?php echo isset($info['gps']) ? $info['gps'] : ''; ?>"><?php echo isset($info['gps']) ? $info['gps'] : ''; ?></option>
                                  <option value="yes">YES</option>
                                  <option value="no">NO</option>
                            </select>
                            <p>Bluetooth:</p>
                     <select name="bluetooth" class="form-control">
                                 <option value="<?php echo isset($info['bluetooth']) ? $info['bluetooth'] : ''; ?>"><?php echo isset($info['bluetooth']) ? $info['bluetooth'] : ''; ?></option>
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
                                 <option value="<?php echo isset($info['usb']) ? $info['usb'] : ''; ?>"><?php echo isset($info['usb']) ? $info['usb'] : ''; ?></option>
                                  <option value="usb-b">USB-B</option>
                                  <option value="usb-a">USB-A</option>
                                  <option value="micro-usb">Micro-USB</option>
                                  <option value="usb-c">USB-C</option>
                            </select>
                            <p>FM Radio:</p>
                            <select name="fmradio" class="form-control">
                                 <option value="<?php echo isset($info['fmradio']) ? $info['fmradio'] : ''; ?>"><?php echo isset($info['fmradio']) ? $info['fmradio'] : ''; ?></option>
                                  <option value="yes">YES</option>
                                  <option value="no">NO</option>
                            </select>
                          <label >Battery:</label>
                            <p>Capacity:</p>
                     <select name="batterycapacity" class="form-control">
                                 <option value="<?php echo isset($info['batterycapacity']) ? $info['batterycapacity'] : ''; ?>"><?php echo isset($info['batterycapacity']) ? $info['batterycapacity'] : ''; ?></option>
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
                                 <option value="<?php echo isset($info['chargingspeed']) ? $info['chargingspeed'] : ''; ?>"><?php echo isset($info['chargingspeed']) ? $info['chargingspeed'] : ''; ?></option>
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
                                 <option value="<?php echo isset($info['removable']) ? $info['removable'] : ''; ?>"><?php echo isset($info['removable']) ? $info['removable'] : ''; ?></option>
                                  <option value="yes">YES</option>
                                  <option value="no">NO</option>
                            </select>
                            <p>Wireless Charge:</p>
                    <select name="wirelesscharge" class="form-control">
                                 <option value="<?php echo isset($info['wirelesscharge']) ? $info['wirelesscharge'] : ''; ?>"><?php echo isset($info['wirelesscharge']) ? $info['wirelesscharge'] : ''; ?></option>
                                  <option value="yes">YES</option>
                                  <option value="no">NO</option>
                            </select>
            <p>Status*</p>
            <input type="radio"<?php echo $info['status'] == 1 ? ' checked' : null; ?> name="status" value="1"> Active
                            </label>
                            <label class="btn btn-default<?php echo $info['status'] == 0 ? ' active' : null; ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio"<?php echo $info['status'] == 0 ? ' checked' : null; ?> name="status" value="0"> Inactive
            <input type="submit" name="btnLogin" value="Submit">
            </div>
        </div>
        </div>
        </form>
                            
  </div> 
</main>
<?php include_once "../partials/footer.php";?>