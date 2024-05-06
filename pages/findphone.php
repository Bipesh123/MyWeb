<?php include_once"../config.php"; ?>
<?php include_once '../partials/header.php';
include '../algorithm/cosine.php';
?>
<script type="text/javascript">

</script>
   <div class="login">
    <div class="findphone_title">
   <h4> Please select all options.</h4>
  </div>
  <form method="post" action="result.php" onsubmit="return validate()" name="filter">
    <div class="login_box">
<div class="login-col1">
            <label>Product Brand :</label>
            <div id="brand_ref">
                          <select name="brand[]" id="brands" class="form-control" required="" onchange="myFunction()" multiple>
                                 <option value="" disabled selected>Select</option>
                                  <option value="1">Samsung</option>
                                  <option value="2" >Apple</option>
                                 <option value="3">Xiaomi</option>
                                 <option value="4">Huawei</option>
                                 <option value="5">Oppo</option>
                                  <option value="6">Colors</option>
                                  <option value="7">Nokia</option>
                                  <option value="12">Vivo</option>
                                  <option value="15">Lenovo</option>
                                  <option value="16">OnePlus</option>
                                  <option value="17">ZTE</option>
                                  <option value="18">Honor</option>
                                  <option value="19">Realme</option>
                                  <option value="20">Panasonic</option>
                                  <option value="21">Sony</option>
                                  <option value="22">HTC</option>
                            </select>
                          </div>
                          <label>Network:</label>
                         <select name="network" class="form-control" required="">
                                 <option value="">Select</option>
                                  <option value="2g">2G</option>
                                  <option value="2g/3g">2G/3G</option>
                                  <option value="2g/3g/4g">2G/3G/4G</option>
                            </select>
                          <label>SIM:</label>
                             <select name="sim" class="form-control" required="">
                                 <option value="">Select</option>
                                  <option value="single">Single</option>
                                  <option value="dual">Dual</option>
                            </select>
                          <label>PLATFORM:</label>
                            <label>OS:</label>
                            <div id="refresh">
                            
                        <select name="os" class="form-control" required="">
                                 <option value="">Select</option>
                                  <option value="andriod">Andriod</option>
                                  <option value="ios">IOS</option>
                                  <option value="windows">Windows</option>
                            </select>
                         
                          </div>
                            <label>Chipset:</label>
                           <select name="chipset" class="form-control" required="">
                                 <option value="">Select</option>
                                  <option value="snapdragon">Snapdragon</option>
                                  <option value="exynos">Exynos</option>
                                  <option value="helio">Helio</option>
                                  <option value="kirin">Kirin</option>
                                  <option value="mediatek">MediaTek</option>
                                  <option value="a_series">A series</option>

                            </select>   
                          <label>Memory:</label>
                            <label>RAM:</label>
                             <select name="ram" class="form-control" required="">
                                 <option value="">Select</option>
                                  <option value="1gb">1GB</option>
                                  <option value="2gb">2GB</option>
                                  <option value="3gb">3Gb</option>
                                  <option value="4gb">4GB</option>
                                  <option value="6gb">6GB</option>
                                  <option value="8gb">8Gb</option>
                            </select>
                            <label>Internal Storage:</label>
                            <select name="internalstorage" class="form-control" required="">
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
                          <label>Display:</label>
                            <label>Resoultion:</label>
                            <select name="dresolution" class="form-control" required="">
                                 <option value="">Select</option>
                                  <option value="240x400">240x400</option>
                                  <option value="320x480">320x480</option>
                                  <option value="480x800">480x800</option>
                                  <option value="540x960">540x960</option>
                                  <option value="720x1280">720x1280</option>
                                  <option value="1080x1920">1080x1920</option>
                                  <option value="1440x2560">1440x2560</option>
                            </select>
                            </div>
                          <div class="login-col2"> 
                            <label>Size:...(inch)</label>
                             <select name="dsize" class="form-control" required="">
                                 <option value="">Select</option>
                                   <option value="4-4.5">4-4.5</option>
                                  <option value="4.5-5.2">4.5-5.2</option>
                                  <option value="5.2-5.5">5.2-5.5</option>
                                  <option value="5.5-6">5.5-6</option>
                                  <option value="6-6.5">6-6.5</option>
                                  <option value="above 7">above 7</option>
                            </select>
                          
                                             
                          <label >Main-Camera:</label>
                           
                     <select name="resolution" class="form-control" required="">
                                 <option value="">Select</option>
                                  <option value="2mp">2MP</option>
                                  <option value="5mp">5MP</option>
                                  <option value="8mp">8MP</option>
                                  <option value="12mp">12MP</option>
                                  <option value="13mp">13MP</option>
                                  <option value="16mp">16MP</option>
                                  <option value="20mp">20MP</option>
                                  <option value="32mp">32MP</option>
                                  <option value="48mp">48MP</option>
                            </select>
                          <label>Selfiee-Camera:</label>
                            <label>Resoultion:</label>
                    <select name="selfieeresolution" class="form-control" required="">
                                 <option value="">Select</option>
                                  <option value="2mp">2MP</option>
                                  <option value="5mp">5MP</option>
                                  <option value="8mp">8MP</option>
                                  <option value="12mp">12MP</option>
                                  <option value="16mp">16MP</option>
                                  <option value="20mp">20MP</option>
                            </select>
                            
                          <label>FingerPrint:</label>
                          <select name="fingerprint" class="form-control" required="">
                                  <option value="">Select</option>
                                  <option value="yes">YES</option>
                                  <option value="no">NO</option>
                            </select>
                          
                          

                          <label >Battery:</label>
                            <label>Capacity:</label>
                     <select name="batterycapacity" class="form-control" required="">
                                 <option value="">Select</option>
                                  <option value="0-2500 mah">0-2500 mah</option>
                                  <option value="2500-3000 mah">2500-3000 mah</option>
                                  <option value="3000-3500mah">3000-3500mah</option>
                                  <option value="3500-4000mah">3500-4000mah</option>
                                  <option value="4000-4500mah">4000-4500mah</option>
                                  <option value="4500-5000mah">4500-5000mah</option>
                                  <option value="above 5000mah">above 5000mah</option>
                            </select>
                            <label>Removable:</label>
                           <select name="removable" class="form-control" required="">
                                 <option value="">Select</option>
                                  <option value="yes">YES</option>
                                  <option value="no">NO</option>
                            </select>
                            <label>Wireless Charge:</label>
                    <select name="wirelesscharge" class="form-control" required="">
                                 <option value="">Select</option>
                                  <option value="yes">YES</option>
                                  <option value="no">NO</option>
                            </select>
                               <label>lower price</label>
                      <input type="number" name="price1" required="" class="form-control inputMin" required="" min="8000" step="1000">
                              <label>highter price</label>
                      <input type="number" name="price2" required="" class="form-control inputMax" required="" min="10000" step="5000">

                        
                      </div>
                      <div class="btn-footer">
                      <input type="submit" class="btn btn-primary" name="submit" value="submit">
                        <a href="findphone.php" class="btn btn-danger">Cancel</a>
                    </div>
                  </div>

                    </form>
  

</div>
<?php include_once '../partials/footer.php'; ?>

