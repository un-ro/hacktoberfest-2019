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
  
  <div class="header__right sc-clearfix" style="margin-left:730px;">
      <div class="header__loginMenu left">
        <button type="button" class="g-opacity-transition sc-button sc-button-medium loginButton" tabindex="0" title="Sign in"><span>Welcome</span>, <span style="color:red;"><?php echo @$username; ?></span></button>
      </div>
    <ul class="header__navMenu sc-clearfix sc-list-nostyle left">
      <li><a onclick="myFunction()" class="header__moreButton sc-ir" tabindex="0" aria-haspopup="true" role="button" aria-owns="dropdown-button-37">Settings and more</a></li>
    </ul>
  </div>
</div>
</header>
<div id="showdrpdwn" class="dropdownMenu g-z-index-header-menu" style="transition: 1s; outline: currentcolor none medium; display:none; width: 170px; min-height: auto; position: fixed; top: 46px; left: 1126px;" tabindex="-1" id="dropdown-button-34"><div class="moreMenu g-dark g-dark-bg">
<?php if (isset($username)) { ?>
  <ul class="moreMenu__list sc-list-nostyle">
  <li><a class="moreMenu__link" href="profile.php">Profile</a></li>
  <li><a class="moreMenu__link" href="userdata.php">User's Data</a></li>
</ul>
<ul class="moreMenu__list sc-list-nostyle">
  <li><a class="moreMenu__link" href="genre.php">Genre</a></li>
</ul>
<ul class="moreMenu__list sc-list-nostyle">
  <li><a class="moreMenu__link" href="resetpass.php">Reset Password</a></li>
  <li><a class="moreMenu__link" href="../config/logout.php">Logout</a></li>
</ul>
<?php } ?>

</div></div>

