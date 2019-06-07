<?php include("config/config.php");?>
<!DOCTYPE html>
<html>
<head>
    <?php include("includes/head-tag.php");?>
</head>
<body>
    <?php include("includes/nav.php");?>
    <div class="container">
        <!-- <div class="row">
            <h1 class='col-12 display-1' style="text-align: center">DAB Lite</h1>
        </div> -->
        <div class="row justify-content-center">
            <form action='src/search.php' method='get'>
                <div class="form-row">
                    <div class="form-group col-12 mx-auto" style="text-align: center">
                        <label for="inputSearch" class="display-5">Search by Product Keyword or Manufacturer Name</label>
                        <input type="text" class="form-control" name="k" size="50" />
                    </div>
                </div>
                <div class="form-group col-12 mx-auto filters">
                    <label> CAD
                        <input type="checkbox" name="cad" value="cad" onclick="">
                        <span class="checkmark"></span>
                    </label>
                    <label> BIM
                        <input type="checkbox" name="bim" value="bim" onclick="">
                        <span class="checkmark"></span>
                    </label>
                    <label> LEED V4
                        <input type="checkbox" name="leed" value="leed" onclick="">
                        <span class="checkmark"></span>
                    </label>
                    <label> EPD
                        <input type="checkbox" name="epd" value="epd" onclick="">
                        <span class="checkmark"></span>
                    </label>
                    <label> HPD
                        <input type="checkbox" name="hpd" value="hpd" onclick="">
                        <span class="checkmark"></span>
                    </label>
                    <label> LBC
                        <input type="checkbox" name="lbc" value="lbc" onclick="">
                        <span class="checkmark"></span>
                    </label>
                    <label> C2C
                        <input type="checkbox" name="c2c" value="c2c" onclick="">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="form-group col-12" style='text-align:center'>
                    <input class="btn btn-primary" type="submit" name="submit" value="submit">
                </div>
            </form>
        </div>
        <div class="row justify-content-center">
            <div class="col" style="text-align: center"><h3>OR</h3></div>
        </div>
        <div class="row justify-content-center">
            <div class="col display-5" style="text-align: center">Browse by CSI</div>   
        </div>
        <form action='src/browse.php' method='get'>
            <div class="row">
                <div class='facility-construction col'>
                    <h4>Facility Construction</h4>
                    <div class="div-item">
                        <input class="btn btn-dark" type="submit" name="division" value="03"/><p> Concrete </p>
                    </div>
                    <div class="div-item">
                        <input class="btn btn-dark" type="submit" name="division" value="04"/><p> Masonry and Stone </p>
                    </div>
                    <div class="div-item">
                        <input class="btn btn-dark" type="submit" name="division" value="05"/><p> Metals </p>
                    </div>
                    <div class="div-item">
                        <input class="btn btn-dark" type="submit" name="division" value="06"/><p> Woods, Plastics, and Composites </p>
                    </div>
                    <div class="div-item">
                        <input class="btn btn-dark" type="submit" name="division" value="07"/><p> Thermal and Moisture Protection </p>
                    </div>
                    <div class="div-item">
                        <input class="btn btn-dark" type="submit" name="division" value="08"/><p> Openin Doors and Windows    </p>
                    </div>
                    <div class="div-item">
                        <input class="btn btn-dark" type="submit" name="division" value="09"/><p> Finishes </p>
                    </div>
                    <div class="div-item">
                        <input class="btn btn-dark" type="submit" name="division" value="10"/><p> Specialties </p>
                    </div>
                    <div class="div-item">
                        <input class="btn btn-dark" type="submit" name="division" value="11"/><p> Equipment </p>
                    </div>
                    <div class="div-item"> 
                        <input class="btn btn-dark" type="submit" name="division" value="12"/><p> Furnishings </p>
                    </div>
                    <div class="div-item">
                        <input class="btn btn-dark" type="submit" name="division" value="13"/><p> Specialties </p>
                    </div>
                    <div class="div-item">
                        <input class="btn btn-dark" type="submit" name="division" value="14"/><p> Conveying Systems </p>
                    </div>
                </div>
                <div class='facility-services col'>
                    <h4>Facility Services</h4>
                    <div class="div-item">
                        <input class="btn btn-dark" type="submit" name="division" value="21"/><p> Fire Suppression </p>
                    </div>
                    <div class="div-item">
                        <input class="btn btn-dark" type="submit" name="division" value="22"/><p> Plumbing </p>
                    </div>
                    <div class="div-item">
                        <input class="btn btn-dark" type="submit" name="division" value="23"/><p> HVAC </p>
                    </div>
                    <div class="div-item">
                        <input class="btn btn-dark" type="submit" name="division" value="25"/><p> Integrated Automation </p>
                    </div>
                    <div class="div-item">
                        <input class="btn btn-dark" type="submit" name="division" value="26"/><p> Electrical Systems </p>
                    </div>
                    <div class="div-item">
                        <input class="btn btn-dark" type="submit" name="division" value="27"/><p> Communications </p>
                    </div>
                    <div class="div-item">
                        <input class="btn btn-dark" type="submit" name="division" value="28"/><p> Electronic Safety and Security </p>
                    </div>
                </div>
                <div class='infrastructure col'>
                    <h4>Site and Infrastructure</h4>
                    <div class="div-item">
                        <input class="btn btn-dark" type="submit" name="division" value="31"/><p> Earthwork </p>
                    </div>
                    <div class="div-item">
                        <input class="btn btn-dark" type="submit" name="division" value="32"/><p> Exterior Improvements </p>
                    </div>
                    <div class="div-item">
                        <input class="btn btn-dark" type="submit" name="division" value="33"/><p> Site Utilities </p>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php include("includes/footer.php");?>
</body>
</html>