<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style2.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="icon" href="resources/a.png">
</head>

<body class="home-body">

  <?php
  include "header.php";
  include "connection.php";
  ?>

  <!-- basic search  -->
  <div class="search-container">
    <input type="text" class="search-input" placeholder="Search" id="search_txt">
    <button class="search-button" onclick="search(0);"><i class="bi bi-search"></i></button>&nbsp;
    <button class="filter" onclick="filterButton();">Filter</button>
  </div></br></br>
  <!-- basic search  -->
  <!-- advanced search  -->
  <div class="advanced-search-container" id="advsearchdiv">
  <form class="advanced-search-form">
    <div class="input-group">
      <label for="category">Category:</label>
      <select id="category">
        <option value="0">Select Category</option>
        <?php
        $rs1 = Database::search("SELECT * FROM `category`");
        while ($d1 = $rs1->fetch_assoc()) {
          echo '<option value="' . $d1["cat_id"] . '">' . $d1["cat_name"] . '</option>';
        }
        ?>
      </select>
    </div>
    <div class="input-group">
      <label for="model">Model:</label>
      <select id="model">
        <option value="0">Select Model</option>
        <?php
        $rs2 = Database::search("SELECT * FROM `model`");
        while ($d2 = $rs2->fetch_assoc()) {
          echo '<option value="' . $d2["model_id"] . '">' . $d2["model_name"] . '</option>';
        }
        ?>
      </select>
    </div>
    <div class="input-group">
      <label for="storage">Storage:</label>
      <select id="storage">
        <option value="0">Select Storage</option>
        <?php
        $rs3 = Database::search("SELECT * FROM `storage`");
        while ($d3 = $rs3->fetch_assoc()) {
          echo '<option value="' . $d3["id"] . '">' . $d3["storage_size"] . '</option>';
        }
        ?>
      </select>
    </div>
    <div class="input-group">
      <label for="color">Color:</label>
      <select id="color">
        <option value="0">Select Color</option>
        <?php
        $rs4 = Database::search("SELECT * FROM `color`");
        while ($d4 = $rs4->fetch_assoc()) {
          echo '<option value="' . $d4["id"] . '">' . $d4["clr_name"] . '</option>';
        }
        ?>
      </select>
    </div>
    <div class="input-group">
      <label for="min">Min Price:</label>
      <input type="text" id="min">
    </div>
    <div class="input-group">
      <label for="max">Max Price:</label>
      <input type="text" id="max">
    </div>
    <button type="button" class="search-button" onclick="advSearch(0);">Search</button>
  </form>
</div>
  <!-- advanced search  -->

  <div id="searchResult">
    <div class="carousel-container">
      <div class="carousel-slide">
        <img src="resources/carousel/carousel 1.jpg" alt="Image 1">
        <img src="resources/carousel/carousel 2.jpg" alt="Image 2">
        <img src="resources/carousel/carousel 3.jpg" alt="Image 3">
        <img src="resources/carousel/carousel 4.jpg" alt="Image 3">
        <img src="resources/carousel/carousel 5.jpg" alt="Image 3">
        <img src="resources/carousel/carousel 6.jpg" alt="Image 3">
      </div>
      <div class="control-buttons">
        <button class="prev-btn" onclick="prevSlide()"><i class="bi bi-caret-left"></i></button>
        <button class="next-btn" onclick="nextSlide()"><i class="bi bi-caret-right"></i></button>
      </div>
    </div>

    <img src="resources/home/15promax.png" alt="" class="limg1" />
    <img src="resources/home/15.png" alt="" class="limg2" />
    <img src="resources/home/mac&ipad.png" alt="" class="limg3" />

    <h1 class="purchase-text">PURCHASE YOUR FAVOURITE <span class="typewriter" id="typewriter"></span>
      <span class="cursor" id="cursor">|</span>
    </h1>

    <div class="image-gallery">
      <div class="image-gallery-item">
        <img src="resources/homeimg/h1.jpg" alt="Image 1">
      </div>
      <div class="image-gallery-item">
        <img src="resources/homeimg/h2.jpg" alt="Image 2">
      </div>
      <div class="image-gallery-item">
        <img src="resources/homeimg/h3.jpg" alt="Image 3">
      </div>
      <div class="image-gallery-item">
        <img src="resources/homeimg/h4.jpg" alt="Image 4">
      </div>
    </div>
  </div>


  <?php include "footer.php" ?>

  <script src="scriptH.js"></script>
</body>

</html>