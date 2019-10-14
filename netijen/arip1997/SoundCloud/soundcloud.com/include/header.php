<?php
    session_start();
    @$username = $_SESSION["username"];
    $level = @$_SESSION["level"];
?>

<script>
function myFunction() {
    var x = document.getElementById("showdrpdwn");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>


<header role="banner" class="header sc-selection-disabled fixed g-dark g-z-index-header show"><div class="header__inner l-container l-fullwidth ">
  <div class="header__left">
    <div class="header__logo left">
      <a href="index.php" title="Home" class="header__logoLink header__logoLink-iconOnly sc-border-box sc-ir">SoundCloud</a>
      <a href="index.php" title="Home" class="header__logoLink header__logoLink-wordmark sc-border-box sc-ir">SoundCloud</a>
    </div>
    <nav class="left header__navWrapper" role="navigation">
      <ul class="header__navMenu left sc-list-nostyle">
          <li>
            <a class="header__navMenuItem" data-menu-name="home" href="index.php">Home</a>
          </li>
      </ul>
    </nav>
  </div>
  <div class="header__middle">
    <div class="header__search" role="search">
      <!-- <form class="headerSearch"><input class="headerSearch__input sc-input g-all-transitions-300" placeholder="Search for artists, bands, tracks, podcasts" type="search" name="q" autocomplete="off" aria-label="Search" aria-autocomplete="list" aria-owns="searchMenuList">
<button class="headerSearch__submit submit sc-ir" type="submit">Search</button> -->
</form>
    </div>
  </div>
  <div class="header__right sc-clearfix">
      <div class="header__loginMenu left">
      <?php if (isset($username)) { ?>
        <button type="button" class="g-opacity-transition sc-button sc-button-medium loginButton" tabindex="0" title="Sign in"><span>Welcome</span>, <span style="color:red;"><?php echo @$username; ?></span></button>
      <?php } else { ?>
        <button type="button" class="g-opacity-transition sc-button sc-button-medium loginButton" tabindex="0" title="Sign in" onclick="window.location.href='signin.php'">Sign In</button>
        <button type="button" class="g-opacity-transition sc-button sc-button-medium signupButton sc-button-cta" tabindex="0" title="Create a SoundCloud account" onclick="window.location.href='register.php'">Create account</button>
      <?php } ?>
      </div>
      <div class="header__upload left">
        <a href="upload.php" class="uploadButton header__link" tabindex="0"><span class="uploadButton__title">Upload</span><span class="uploadButton__status"></span></a>
      </div>
    <ul class="header__navMenu sc-clearfix sc-list-nostyle left">
      <li><a onclick="myFunction()" class="header__moreButton sc-ir" tabindex="0" aria-haspopup="true" role="button" aria-owns="dropdown-button-37">Settings and more</a></li>
    </ul>
  </div>
</div>
</header>
<div id="showdrpdwn" class="dropdownMenu g-z-index-header-menu" style="transition: 1s; outline: currentcolor none medium; display:none; width: 170px; min-height: auto; position: fixed; top: 46px; left: 1126px;" tabindex="-1" id="dropdown-button-34"><div class="moreMenu g-dark g-dark-bg">
<ul class="moreMenu__list sc-list-nostyle">
  <li><a class="moreMenu__link" href="about.php">About us</a></li>
</ul>
<?php if (isset($username)) { ?>
  <ul class="moreMenu__list sc-list-nostyle">
  <li><a class="moreMenu__link" href="profile.php">Profile</a></li>
  <li><a class="moreMenu__link" href="collection.php">Collection</a></li>
  <li><a class="moreMenu__link" href="resetpass.php">Reset Password</a></li>
</ul>
<ul class="moreMenu__list sc-list-nostyle">
  <li><a class="moreMenu__link" href="config/logout.php">Logout</a></li>
</ul>
<?php } ?>

</div></div>

